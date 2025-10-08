<?php

namespace App\Controllers;

use App\Libraries\Utils;
use App\Models\AnggotaTimModel;
use App\Models\DataSeminarModel;
use App\Models\DataWorkshopModel;
use App\Models\DataTimModel;
use App\Models\KompetisiModel;
use App\Models\TransactionsModel;
use CodeIgniter\HTTP\Files\UploadedFile;
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
                return redirect()->to('talkshow/daftar');
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

                    return redirect()->to('talkshow/daftar');
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
                'callbacks' => [
                'finish' => base_url('payment/finish'),
                'unfinish' => base_url('payment/finish'),
                'error' => base_url('payment/error')
            ]
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
            return redirect()->to('talkshow/tiket');
        }

        if ($transaction['transaction_status'] == 'expire' || strtotime($transaction['expiry_time']) < time()) {
            $dataSeminarModel->where('username', auth()->user()->username)->delete();
            $session = Services::session();
            $session->setFlashdata('alert', 'Pembayaran anda telah kadaluwarsa, silahkan lakukakan pendaftaran ulang');
            $session->setFlashdata('alertTitle', 'Pembayaran kadaluwarsa');
            $session->setFlashdata('alertType', 'error');
            return redirect()->to('talkshow/daftar');
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

        return redirect()->to('/talkshow');
    }

   public function workshop()
    {
        $dataWorkshopModel = new \App\Models\DataWorkshopModel();
        $transactionsModel = new \App\Models\TransactionsModel();

        $dataWorkshop = $dataWorkshopModel->find(auth()->user()->username);

        if ($dataWorkshop == null) {
            if (!$this->request->is('post')) {
                return redirect()->to('workshop/daftar');
            }

        $validation = Services::validation();
        $validation->setRuleGroup('daftarWorkshop');
        if ($validation->withRequest($this->request)->run() === false) {
            return view('daftar-workshop');
        }

        // Siapkan data workshop (tapi jangan insert dulu)
        $dataWorkshop = [
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

        // Buat transaksi terlebih dahulu
        $amount = $dataWorkshop['kategori'] == 'Reguler' ? 75000 : 115000;
        $gross_amount = $amount + 4440;

        $name = $this->splitName($dataWorkshop['name']);

        $transactionData = [
            'transaction_details' => [
                'order_id' => $dataWorkshop['order_id'],
                'gross_amount' => $gross_amount,
            ],
            'item_details' => [
                ['id' => 'W001', 'price' => $amount, 'quantity' => 1, 'name' => 'Tiket Workshop Technology Euphoria'],
                ['id' => 'ADMIN', 'price' => 4440, 'quantity' => 1, 'name' => 'Biaya Transaksi']
            ],
            'customer_details' => [
                'first_name' => $name[0],
                'last_name' => $name[1],
                'email' => $dataWorkshop['email'],
                'phone' => $dataWorkshop['phone'],
            ],

                'callbacks' => [
                'finish' => base_url('payment/finish'),
                'unfinish' => base_url('payment/finish'),
                'error' => base_url('payment/error')
            ]
        ];

        $snapToken = Snap::getSnapToken($transactionData);

        $transactionsModel->insert([
            'order_id' => $dataWorkshop['order_id'],
            'gross_amount' => $gross_amount,
            'snap_token' => $snapToken,
            'transaction_time' => date('Y-m-d H:i:s'),
            'expiry_time' => date('Y-m-d H:i:s', strtotime('+1 days')),
            'transaction_status' => 'not_start',
        ]);

        // Baru simpen data workshop abis transaksi dibuat
        $dataWorkshopModel->insert($dataWorkshop);
        }

        // Ambil ulang data untuk ditampilkan
        $dataWorkshop = $dataWorkshopModel->find(auth()->user()->username);
        $transaction = $transactionsModel->where('order_id', $dataWorkshop['order_id'])->first();

        if ($transaction['transaction_status'] == 'settlement' || $transaction['transaction_status'] == 'capture') {
            return redirect()->to('workshop/tiket');
        }

        if ($transaction['transaction_status'] == 'expire' || strtotime($transaction['expiry_time']) < time()) {
            $dataWorkshopModel->where('username', auth()->user()->username)->delete();
            $session = Services::session();
            $session->setFlashdata('alert', 'Pembayaran anda telah kadaluwarsa, silahkan daftar ulang.');
            $session->setFlashdata('alertTitle', 'Pembayaran kadaluwarsa');
            $session->setFlashdata('alertType', 'error');
            return redirect()->to('workshop/daftar');
        }

        $item = [
            ['nama' => 'Tiket Workshop Technology Euphoria ' . $dataWorkshop['kategori'], 'harga' => 'Rp. ' . number_format($transaction['gross_amount'] - 4440, 0, ',', '.'), 'jumlah' => 1, 'total' => 'Rp. ' . number_format($transaction['gross_amount'] - 4440, 0, ',', '.')],
            ['nama' => 'Biaya Transaksi', 'harga' => 'Rp. 4.440', 'jumlah' => 1, 'total' => 'Rp. 4.440'],
            ['nama' => 'Total', 'harga' => '', 'jumlah' => 2, 'total' => 'Rp. ' . number_format($transaction['gross_amount'], 0, ',', '.')]
        ];

        return view('confirm-payment-workshop', [
            'data' => $dataWorkshop,
            'type' => 'workshop',
            'item' => $item,
            'snap_token' => $transaction['snap_token'],
        ]);
    }

    public function cancelWorkshop($id)
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

        $dataWorkshopModel = new \App\Models\DataWorkshopModel();
        $dataWorkshopModel->where('order_id', $id)->delete();

        $session = Services::session();
        $session->setFlashdata('alert', 'Pembayaran anda telah dibatalkan');
        $session->setFlashdata('alertTitle', 'Pembayaran dibatalkan');
        $session->setFlashdata('alertType', 'info');

        return redirect()->to('/workshop');
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
            'Band' => 150000,  
            'Mobile Legends' => 50000
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
                
                'callbacks' => [
                'finish' => base_url('payment/finish'),
                'unfinish' => base_url('payment/finish'),
                'error' => base_url('payment/error')
            ]
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

        if ($this->request->getVar('status_code') == 201) {
            $session->setFlashdata('alert', 'Pembayaran anda belum selesai, silahkan selesaikan terlebih dahulu');
            $session->setFlashdata('alertTitle', 'Pembayaran tertunda');
            $session->setFlashdata('alertType', 'warning');
            return redirect()->back();
        }

        $session->setFlashdata('alert', 'Terimakasih telah melakukan pembayaran');
        $session->setFlashdata('alertTitle', 'Pembayaran Berhasil');
        $session->setFlashdata('alertType', 'success');

        // Cek apakah ini untuk talkshow
        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel->where('order_id', $orderId)->first();
        if ($dataSeminar) {
            return redirect()->to('talkshow/tiket');
        }

        // Cek apakah ini untuk workshop
        $dataWorkshopModel = new DataWorkshopModel();
        $dataWorkshop = $dataWorkshopModel->where('order_id', $orderId)->first();
        if ($dataWorkshop) {
            return redirect()->to('workshop/tiket');
        }

        // Jika tidak diketahui, redirect ke profile
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

        // Cek apakah order_id milik talkshow
        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel->where('order_id', $order_id)->first();
        if ($dataSeminar) {
            $dataSeminarModel->where('order_id', $order_id)->delete();
            return redirect()->to('talkshow');
        }

        // Cek apakah order_id milik workshop
        $dataWorkshopModel = new DataWorkshopModel();
        $dataWorkshop = $dataWorkshopModel->where('order_id', $order_id)->first();
        if ($dataWorkshop) {
            $dataWorkshopModel->where('order_id', $order_id)->delete();
            return redirect()->to('workshop');
        }

        // Jika bukan keduanya, redirect ke dashboard
        return redirect()->to('/profile');
    }


    function splitName($name)
    {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim(preg_replace('#' . preg_quote($last_name, '#') . '#', '', $name));
        return array($first_name, $last_name);
    }

    public function uploadProof()
    {
        $session = Services::session();

        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        $orderId = $this->request->getPost('order_id');
        $type = $this->request->getPost('type');
        $file = $this->request->getFile('payment_proof');

        if (!$orderId || !$file || !$file->isValid()) {
            $session->setFlashdata('alert', 'Data tidak valid. Mohon coba lagi.');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back();
        }

        $validation = Services::validation();
        $validation->setRules([
            'payment_proof' => [
                'uploaded[payment_proof]',
                'max_size[payment_proof,5120]',
                'ext_in[payment_proof,png,jpg,jpeg,pdf]',
                'mime_in[payment_proof,image/png,image/jpg,image/jpeg,application/pdf]'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            $session->setFlashdata('alert', implode(', ', $errors));
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back()->withInput();
        }

        $uploadDirectory = FCPATH . 'uploads/payment_proofs/';
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $safeFileName = $orderId . '_' . time() . '.' . $file->getClientExtension();
        if (!$file->hasMoved()) {
            $file->move($uploadDirectory, $safeFileName);
        }

        $relativePath = 'uploads/payment_proofs/' . $safeFileName;

        $transactionsModel = new TransactionsModel();
        $transaction = $transactionsModel->where('order_id', $orderId)->first();
        if (!$transaction) {
            $session->setFlashdata('alert', 'Transaksi tidak ditemukan.');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back();
        }

        $transactionsModel
            ->set('transaction_status', 'pending_manual')
            ->where('order_id', $orderId)
            ->update();

        $db = \Config\Database::connect();
        $db->table('payment_proofs')->insert([
            'order_id' => $orderId,
            'username' => auth()->user()->username,
            'path' => $relativePath,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $session->setFlashdata('alert', 'Bukti pembayaran berhasil dikirim. Mohon tunggu verifikasi panitia.');
        $session->setFlashdata('alertTitle', 'Terkirim');
        $session->setFlashdata('alertType', 'success');

        if ($type === 'seminar') {
            return redirect()->to('payment/talkshow');
        }
        if ($type === 'workshop') {
            return redirect()->to('payment/workshop');
        }
        if ($type === 'lomba') {
            return redirect()->back();
        }

        return redirect()->to('/profile');
    }
}

    