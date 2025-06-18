<?php

namespace App\Controllers;

use App\Libraries\Utils;
use App\Models\AnggotaTimModel;
use App\Models\DataSeminarModel;
use App\Models\DataTimModel;
use App\Models\KompetisiModel;
use App\Models\TransactionsModel;
use App\Models\UserDataModel;
use \Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;
use \Config\Services;

class PaymentController extends BaseController
{
    public function __construct()
    {
        Config::$serverKey = getenv('SERVER_KEY');
        Config::$clientKey = getenv('CLIENT_KEY');
        Config::$isProduction = false;
    }
    public function seminar()
    {
        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel->find(auth()->user()->username);

        if ($dataSeminar == null) {

            if (!$this->request->is('post')) {
                return redirect()->to('seminar/daftar');
            }

            $validation = Services::validation();
            $validation->setRuleGroup('daftarSeminar');
            if ($validation->withRequest($this->request)->run() === false) {
                return view('daftar-seminar');
            }

            $dataSeminar = [
                'username' => auth()->user()->username,
                'name' => $this->request->getPost('nama'),
                'phone' => $this->request->getPost('kontak'),
                'email' => auth()->user()->getEmail(),
                'instansi' => $this->request->getPost('instansi'),
                'domisili' => $this->request->getPost('domisili'),
                'kategori' => $this->request->getPost('kategori'),
                'status' => $this->request->getPost('status'),
                'order_id' => Utils::generateOrderId(),
            ];

            if ($dataSeminar['kategori'] == 'VIP') {
                if (count($dataSeminarModel->where('kategori', 'VIP')->findAll()) >= 20) {
                    $session = Services::session();
                    $session->setFlashdata('alert', 'Kuota VIP telah penuh silahkan pilih kategori Reguler');
                    $session->setFlashdata('alertTitle', 'Kuota VIP Penuh');
                    $session->setFlashdata('alertType', 'info');

                    return redirect()->to('seminar/daftar');
                }
            }

            $dataSeminarModel->insert($dataSeminar);
            $dataSeminar = $dataSeminarModel->find(auth()->user()->username);
        }

        $transactionsModel = new TransactionsModel();
        $transaction = $transactionsModel->where('order_id', $dataSeminar['order_id'])->first();

        if ($transaction == null) {

            $amount = $dataSeminar['kategori'] == 'Reguler' ? 75000 : 115000;
            $gross_amount = $amount + 4440;

            $name = $this->splitName($dataSeminar['name']);
            $transactionData = [
                'transaction_details' => [
                    'order_id' => $dataSeminar['order_id'],
                    'gross_amount' => $gross_amount,
                ],
                'item_details' => [
                    array(
                        'id' => 'S001',
                        'price' => $amount,
                        'quantity' => 1,
                        'name' => 'Tiket Seminar Nasional Technology Euphoria 2023',
                    ),
                    array(
                        'id' => 'ADMIN',
                        'price' => 4440,
                        'quantity' => 1,
                        'name' => 'Biaya Transaksi'
                    )
                ],
                'customer_details' => [
                    'first_name' => $name[0],
                    'last_name' => $name[1],
                    'email' => $dataSeminar['email'],
                    'phone' => $dataSeminar['phone'],
                ],
            ];

            $snapToken = Snap::getSnapToken($transactionData);

            $transactionsModel->insert([
                'order_id' => $dataSeminar['order_id'],
                'gross_amount' => $gross_amount,
                'snap_token' => $snapToken,
                'transaction_time' => date('Y-m-d H:i:s'),
                'expiry_time' => date('Y-m-d H:i:s', strtotime('+1 days')),
                'transaction_status' => 'not_start',
            ]);

            $transaction = $transactionsModel->where('order_id', $dataSeminar['order_id'])->first();
        }

        if ($transaction['transaction_status'] == 'settlement' || $transaction['transaction_status'] == 'capture') {
            return redirect()->to('seminar/tiket');
        }

        if ($transaction['transaction_status'] == 'expire' || strtotime($transaction['expiry_time']) < time()) {
            $dataSeminarModel->where('username', auth()->user()->username)->delete();
            $session = Services::session();
            $session->setFlashdata('alert', 'Pembayaran anda telah kadaluwarsa, silahkan lakukakan pendaftaran ulang');
            $session->setFlashdata('alertTitle', 'Pembayaran kadaluwarsa');
            $session->setFlashdata('alertType', 'error');
            return redirect()->to('seminar/daftar');
        }

        $item = [
            array(
                'nama' => 'Tiket Seminar Nasional Technology Euphoria 2023 ' . $dataSeminar['kategori'],
                'harga' => 'Rp. ' . number_format(($transaction['gross_amount'] - 4440), 0, ',', '.'),
                'jumlah' => 1,
                'total' => 'Rp. ' . number_format(($transaction['gross_amount'] - 4440), 0, ',', '.'),
            ),
            
            array(
                'nama' => 'Biaya Transaksi',
                'harga' => 'Rp. 4.440',
                'jumlah' => 1,
                'total' => 'Rp. 4.440'
            ),
            array(
                'nama' => 'Total',
                'harga' => '',
                'jumlah' => 2,
                'total' => 'Rp. ' . number_format($transaction['gross_amount'], 0, ',', '.'),
            ),
        ];

        return view('confirm-payment', [
            'data' => $dataSeminar,
            'type' => 'seminar',
            'item' => $item,
            'snap_token' => $transaction['snap_token'],
        ]);
    }

    public function cancelSeminar($id)
    {
        $transactionsModel = new TransactionsModel();
        $transaction = $transactionsModel->where('order_id', $id)->first();
        if ($transaction) {
            if ($transaction['transaction_status'] != 'not_start') {
                Transaction::cancel($id);
                $transactionsModel->set('transaction_status', 'cancel')->where('order_id', $id)->update();
            } else {
                $transactionsModel->where('order_id', $id)->delete();
            }
        }

        $dataSeminarModel = new DataSeminarModel();
        $dataSeminarModel->where('order_id', $id)->delete();

        $session = Services::session();
        $session->setFlashdata('alert', 'Pembayaran anda telah dibatalkan');
        $session->setFlashdata('alertTitle', 'Pembayaran dibatalkan');
        $session->setFlashdata('alertType', 'info');

        return redirect()->to('/seminar');
    }

    public function lomba($id)
    {
        $fee = 75000; // Example fee
        $gross_amount = $fee + 4440;

        $anggotaTimModel = new AnggotaTimModel();
        $check = $anggotaTimModel->where('anggota', auth()->user()->username)
            ->where('tim_id', $id)->first();

        if (!$check) {
            return redirect()->to('/profile');
        }

        $dataTimModel = new DataTimModel();
        $dataTim = $dataTimModel->find($id);

        if (!$dataTim) {
            return redirect()->to('/daftar-lomba');
        }

        $userDataModel = new UserDataModel();
        $user = $userDataModel->find(auth()->user()->username);
        $name = $this->splitName($user['nama']);

        $kompetisiModel = new KompetisiModel();
        $kompetisi = $kompetisiModel->select('nama_kompetisi')->where('id_kompetisi', $dataTim['id_kompetisi'])->first();
        $kompetisiFees = [
            'Competitive Programming' => 75000,
            'Web Development' => 75000,
            'UI/UX Design' => 75000,
            'Essay' => 75000,
            'Business Plan' => 75000,
            'Lukis' => 50000, 
            'Tari' => 80000,  
            'Band' => 150000  
        ];
        if ($kompetisi && array_key_exists($kompetisi['nama_kompetisi'], $kompetisiFees)) {
            $fee = $kompetisiFees[$kompetisi['nama_kompetisi']];
        } else {
            log_message('error', 'Competition name not found or does not match fee structure: ' . json_encode($kompetisi));
        }

        $gross_amount = $fee + 4440; // Update gross amount based on the fee
        $transactionsModel = new TransactionsModel();
        $transaction = $transactionsModel->where('order_id', $dataTim['order_id'])->first();

        if (!$transaction) {

            if ($kompetisi && array_key_exists($kompetisi['nama_kompetisi'], $kompetisiFees)) {
                $fee = $kompetisiFees[$kompetisi['nama_kompetisi']];
            } else {
                log_message('error', 'Competition name not found or does not match fee structure: ' . json_encode($kompetisi));
            }

            $gross_amount = $fee + 4440; // Update gross amount based on the fee

            $transactionData = [
                'transaction_details' => [
                    'order_id' => $dataTim['order_id'],
                    'gross_amount' => $gross_amount,
                ],
                'item_details' => [
                    array(
                        'id' => $dataTim['tim_id'],
                        'price' => $fee,
                        'quantity' => 1,
                        'name' => 'Biaya Pendaftaran Lomba ' . ($kompetisi['nama_kompetisi'] ?? 'Unknown'),
                    ),
                    array(
                        'id' => 'ADMIN',
                        'price' => 4440,
                        'quantity' => 1,
                        'name' => 'Biaya Transaksi',
                    )
                ],
                'customer_details' => [
                    'first_name' => $name[0],
                    'last_name' => $name[1],
                    'email' => auth()->getUser()->getEmail(),
                    'phone' => $user['kontak'],
                ],
            ];

            $snapToken = Snap::getSnapToken($transactionData);

            $transactionsModel->insert([
                'order_id' => $dataTim['order_id'],
                'gross_amount' => $gross_amount,
                'snap_token' => $snapToken,
                'transaction_time' => date('Y-m-d H:i:s'),
                'expiry_time' => date('Y-m-d H:i:s', strtotime('+1 days')),
                'transaction_status' => 'not_start',
            ]);

            $transaction = $transactionsModel->where('order_id', $dataTim['order_id'])->first();
        }

        if ($transaction['transaction_status'] == 'expire' || strtotime($transaction['expiry_time']) < time()) {
            $dataTim = $dataTimModel->find($id);
            $dataTim['order_id'] = Utils::generateOrderId();
            $dataTimModel->save($dataTim);
            return redirect()->to('/kompetisi/payment/' . $id);
        }

        $data = [
            'order_id' => $dataTim['order_id'],
            'name' => $user['nama'],
            'phone' => $user['kontak'],
            'email' => auth()->getUser()->getEmail(),
            'instansi' => $user['universitas'],
        ];
        
        $item = [
            [
                'nama' => 'Biaya Pendaftaran Lomba ' . ($kompetisi['nama_kompetisi'] ?? 'Unknown'),
                'harga' => 'Rp. ' . number_format($fee, 0, ',', '.'),
                'jumlah' => 1,
                'total' => 'Rp. ' . number_format($fee, 0, ',', '.'),
            ],
            [
                'nama' => 'Biaya Transaksi',
                'harga' => 'Rp. 4.440',
                'jumlah' => 1,
                'total' => 'Rp. 4.440'
            ],
            [
                'nama' => 'Total',
                'harga' => '',
                'jumlah' => 2,
                'total' => 'Rp. ' . number_format($gross_amount, 0, ',', '.'),
            ],
        ];

        // Debugging right before passing to view
        log_message('debug', 'Final item array: ' . print_r($item, true));

        return view('confirm-payment', [
            'data' => $data,
            'type' => 'lomba',
            'item' => $item,
            'snap_token' => $transaction['snap_token'],
        ]);
    }

    public function cancelLomba($id)
    {
        $transactionsModel = new TransactionsModel();
        $transaction = $transactionsModel->where('order_id', $id)->first();
        if ($transaction) {
            if ($transaction['transaction_status'] != 'not_start') {
                Transaction::cancel($id);
                $transactionsModel->set('transaction_status', 'cancel')->where('order_id', $id)->update();
            } else {
                $transactionsModel->where('order_id', $id)->delete();
            }
        }

        $dataTimModel = new DataTimModel();
        $dataTim = $dataTimModel->where('order_id', $id)->first();

        $anggotaTimModel = new AnggotaTimModel();
        $anggotaTimModel->where('tim_id', $dataTim['tim_id'])->delete();
        $dataTimModel->where('order_id', $id)->delete();

        $session = Services::session();
        $session->setFlashdata('alert', 'Pembayaran anda telah dibatalkan');
        $session->setFlashdata('alertTitle', 'Pembayaran dibatalkan');
        $session->setFlashdata('alertType', 'info');

        return redirect()->to('/');
    }

    public function finishPayment()
    {
        $session = Services::session();

        $orderId = $this->request->getVar('order_id');
        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel->where('order_id', $orderId)->first();

        if ($this->request->getVar('status_code') == 201) {
            $session->setFlashdata('alert', 'Pembayaran anda belum selesai, silahkan selesaikan terlebih dahulu');
            $session->setFlashdata('alertTitle', 'Pembayaran tertunda');
            $session->setFlashdata('alertType', 'warning');

            return redirect()->back();
        }

        $session->setFlashdata('alert', 'Terimakasih telah melakukan pembayaran');
        $session->setFlashdata('alertTitle', 'Pembayaran Berhasil');
        $session->setFlashdata('alertType', 'success');

        if ($dataSeminar) {
            return redirect()->to('seminar/tiket');
        }

        return redirect()->to('/profile');
    }

    public function errorPayment()
    {
        $session = Services::session();

        if ($this->request->getVar('status_code') == 407) {
            $session->setFlashdata('alert', 'Pembayaran anda telah kadaluwarsa, silahkan lakukakan pendaftaran ulang');
            $session->setFlashdata('alertTitle', 'Pembayaran kadaluwarsa');
            $session->setFlashdata('alertType', 'error');
        } else {
            $session->setFlashdata('alert', 'Pembayaran anda gagal, silahkan coba lagi');
            $session->setFlashdata('alertTitle', 'Pembayaran Gagal');
            $session->setFlashdata('alertType', 'error');
        }

        $order_id = $this->request->getVar('order_id');
        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel->where('order_id', $order_id)->first();
        if ($dataSeminar) {
            $dataSeminarModel->where('order_id', $order_id)->delete();
            return redirect()->to('seminar');
        }

        return redirect()->to('/');
    }

    function splitName($name)
    {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim(preg_replace('#' . preg_quote($last_name, '#') . '#', '', $name));
        return array($first_name, $last_name);
    }
}