<?php

namespace App\Controllers;

use App\Libraries\Utils;
use App\Models\AnggotaTimModel;
use App\Models\BerkasModel;
use App\Models\DataSeminarModel;
use App\Models\DataTimModel;
use App\Models\TiketModel;
use App\Models\TransactionsModel;
use App\Models\UserDataModel;
use CodeIgniter\Shield\Entities\User;
use Config\Services;

class AdminController extends BaseController
{
    public function index()
    {

        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel
            ->select('username, name, phone, email, instansi, domisili, kategori, transaction_time')
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->findAll();

        $jumlahSeminarSettlement = $dataSeminarModel->selectCount("transaction_status")
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->where('transaction_status', 'settlement')
            ->orwhere('transaction_status', 'capture')
            ->countAllResults();

        $dataTimModel = new DataTimModel();
        $dataTim = $dataTimModel
            ->select('tim_id, nama_tim, nama_kompetisi, status, transaction_status')
            ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi')
            ->join('transactions', 'transactions.order_id=data_tim.order_id')
            ->findAll();

        $jumlahTimSettlement = $dataTimModel->selectCount("transaction_status")
            ->join('transactions', 'transactions.order_id=data_tim.order_id')
            ->where('transaction_status', 'settlement')
            ->orwhere('transaction_status', 'capture')
            ->countAllResults();

        return view('admin/dashboard_v2', [
            'dataSeminar' => $dataSeminar,
            'dataTim' => $dataTim,
            'jumlahSeminarSettlement' => $jumlahSeminarSettlement,
            'jumlahTimSettlement' => $jumlahTimSettlement,
        ]);
    }

    public function seminar()
    {
        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel
            ->select('username, name, phone, instansi, domisili, kategori, transaction_time, transaction_status')
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->findAll();

        $dataVip = $dataSeminarModel->where('kategori', 'VIP')->countAllResults();
        $dataReguler = $dataSeminarModel->where('kategori', 'Reguler')->countAllResults();

        $dataVipSettlement = $dataSeminarModel->selectCount("transaction_status")
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->where('kategori', 'VIP')
            ->where('transaction_status', 'settlement')
            ->orwhere('transaction_status', 'capture')
            ->countAllResults();

        $dataRegulerSettlement = $dataSeminarModel->selectCount("transaction_status")
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->where('kategori', 'Reguler')
            ->where('transaction_status', 'settlement')
            ->orwhere('transaction_status', 'capture')
            ->countAllResults();

        return view('admin/data_seminar', [
            'dataSeminar' => $dataSeminar,
            'dataVip' => $dataVip,
            'dataReguler' => $dataReguler,
            'dataVipSettlement' => $dataVipSettlement,
            'dataRegulerSettlement' => $dataRegulerSettlement,
        ]);
    }

    public function detailSeminar($username)
    {
        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel
            ->select('username, name, phone, email, instansi, domisili, status, kategori, transactions.order_id, transaction_status, transaction_time, payment_type')
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->where('data_seminar.username', $username)
            ->first();

        $tiketModel = new TiketModel();
        $tiket = $tiketModel->find($dataSeminar['order_id']);
        if ($tiket) {
            $tiket = $tiket['ticket'];
        }

        return view('admin/detail_seminar', [
            'data' => $dataSeminar,
            'tiket' => $tiket,
        ]);
    }

    public function lomba($id = null)
    {
        $dataTimModel = new DataTimModel();

        if ($id == 0) {
            $dataTim = $dataTimModel
                ->select('tim_id, nama_tim, nama_kompetisi, status, transaction_status')
                ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi')
                ->join('transactions', 'transactions.order_id=data_tim.order_id')
                ->findAll();

            $bp = $dataTimModel->where('id_kompetisi', 5)->countAllResults();
            $cp = $dataTimModel->where('id_kompetisi', 1)->countAllResults();
            $essay = $dataTimModel->where('id_kompetisi', 4)->countAllResults();
            $uiux = $dataTimModel->where('id_kompetisi', 3)->countAllResults();
            $web = $dataTimModel->where('id_kompetisi', 2)->countAllResults();
            $band = $dataTimModel->where('id_kompetisi', 8)->countAllResults();
            $painting = $dataTimModel->where('id_kompetisi', 6)->countAllResults();
            $dance = $dataTimModel->where('id_kompetisi', 7)->countAllResults();

            return view('admin/data_lomba_all', [
                'dataTim' => $dataTim,
                'bp' => $bp,
                'cp' => $cp,
                'essay' => $essay,
                'uiux' => $uiux,
                'web' => $web,
                'band' => $band,
                'painting' => $painting,
                'dance' => $dance
            ]);
        }

        $dataTim = $dataTimModel
            ->select('tim_id, nama_tim, nama_kompetisi, status, transaction_status')
            ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi')
            ->join('transactions', 'transactions.order_id=data_tim.order_id')
            ->where('kompetisi.id_kompetisi', $id)
            ->findAll();

        return view('admin/data_lomba', [
            'dataTim' => $dataTim,
        ]);
    }

    public function detailTim($id = null)
    {
        $dataTimModel = new DataTimModel();
        $dataTim = $dataTimModel
            ->select('data_tim.tim_id, nama_tim, nama_kompetisi, kompetisi.id_kompetisi, status, transactions.order_id, transaction_status, transaction_time, payment_type')
            ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi', 'left')
            ->join('transactions', 'transactions.order_id=data_tim.order_id', 'left')
            ->find($id);

        $anggotaTimModel = new AnggotaTimModel();
        $dataTim['ketua'] = $anggotaTimModel->select('users.username, nama, nim, universitas, auth_identities.secret, kontak')
            ->join('user_data', 'user_data.username=anggota_tim.anggota')
            ->join('users', 'users.username=anggota_tim.anggota')
            ->join('auth_identities', 'users.id=auth_identities.user_id')
            ->where('tim_id', $id)
            ->where('role', 'ketua')
            ->first();

        $dataTim['anggota'] = $anggotaTimModel->select('users.username, nama, nim, universitas, auth_identities.secret, kontak')
            ->join('user_data', 'user_data.username=anggota_tim.anggota')
            ->join('users', 'users.username=anggota_tim.anggota')
            ->join('auth_identities', 'users.id=auth_identities.user_id')
            ->where('tim_id', $id)
            ->where('role', 'anggota')
            ->findAll();

        $berkasModel = new BerkasModel();
        $berkasProposal = $berkasModel->where('tim_id', $id)->where('jenis', 'proposal')->first();
        $berkasSourceCode = $berkasModel->where('tim_id', $id)->where('jenis', 'source_code')->first();

        return view('admin/detail_tim', [
            'data' => $dataTim,
            'berkasProposal' => $berkasProposal,
            'berkasSourceCode' => $berkasSourceCode,
        ]);
    }

    public function addSeminar()
    {
        if (!$this->request->is('post')) {
            return view('admin/add_seminar');
        }

        $validatoin = Services::validation();
        $validatoin->setRuleGroup('adminSeminar');
        if ($validatoin->withRequest($this->request)->run() === false) {
            return redirect()->back()->withInput()->with('errors', $validatoin->getErrors());
        }

        $usersModel = auth()->getProvider();
        $user = new User([
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);
        $usersModel->save($user);
        $user = $usersModel->find($usersModel->getInsertID());
        $user->activate();

        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('nama'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'instansi' => $this->request->getPost('instansi'),
            'domisili' => $this->request->getPost('domisili'),
            'kategori' => $this->request->getPost('kategori'),
            'status' => $this->request->getPost('status'),
            'order_id' => Utils::generateOrderId(),
        ];
        $dataSeminarModel->save($dataSeminar);

        $transactionsModel = new TransactionsModel();
        $transactions = [
            'order_id' => $dataSeminar['order_id'],
            'gross_amount' => $dataSeminar['kategori'] == 'VIP' ? 115000 : 75000,
            'payment_type' => 'Offline',
            'transaction_status' => 'settlement',
            'transaction_time' => date('Y-m-d H:i:s'),
            'snap_token' => 'no_snap',
            'transaction_id' => 'no_transaction',
        ];
        $transactionsModel->save($transactions);

        return redirect()->to('admin/detail-seminar/' . $this->request->getPost('username'));
    }

    public function createTiket($username = null)
    {
        $dataSeminarModel = new DataSeminarModel();
        $dataSeminar = $dataSeminarModel->where('username', $username)->first();

        if ($dataSeminar == null) {
            return redirect()->back()->with('error', 'Data seminar tidak ditemukan');
        }

        $transactionsModel = new TransactionsModel();
        $transaction = $transactionsModel->find($dataSeminar['order_id']);

        if ($transaction == null || ($transaction['transaction_status'] != 'settlement' && $transaction['transaction_status'] != 'capture')) {
            return redirect()->back()->with('error', 'Pembayaran belum diverifikasi');
        }

        $tiketModel = new TiketModel();
        $tiket = $tiketModel->where('username', $username)->first();
        if ($tiket) {
            return redirect()->back()->with('error', 'Tiket sudah dibuat');
        }

        $tiketData = [
            'order_id' => $dataSeminar['order_id'],
            'username' => $dataSeminar['username'],
            'ticket' => Utils::getUniqueTiket(),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $id = $tiketModel->insert($tiketData, true);
        $tiket = $tiketModel->find($id);

        $pdf = Utils::generatePdf($tiket['ticket']);
        Utils::sendMail($pdf, $dataSeminar['email']);

        return redirect()->back()->with('success', 'Tiket berhasil dibuat dan dikirim ke email user');
    }

    public function downloadTiket($username)
    {
        $tiketModel = new TiketModel();
        $tiket = $tiketModel->where('username', $username)->first();

        if (!$tiket) {
            return redirect()->back()->with('error', 'Tiket tidak ditemukan');
        }

        Utils::generatePdf($tiket['ticket'], true);
    }

    public function berkasUser($username)
    {
        $userDataModel = new UserDataModel();
        $userData = $userDataModel->find($username);

        return $this->response->download(WRITEPATH . $userData['kpm'], null);
    }

    public function terimaBerkas($id = null)
    {
        $dataTimModel = new DataTimModel();
        $dataTimModel->set('status', 'verified')
            ->where('tim_id', $id)->update();

        return redirect()->back();
    }

    public function tolakBerkas($id = null)
    {
        $dataTimModel = new DataTimModel();
        $dataTimModel->set('status', 'rejected')
            ->where('tim_id', $id)->update();

        return redirect()->back();
    }



    public function downloadBerkas($idBerkas = null)
    {
        $berkasModel = new BerkasModel();
        $berkas = $berkasModel->where('berkas_id', $idBerkas)->first();

        return $this->response->download(WRITEPATH . $berkas['berkas'], null);
    }

    public function dashboardFinance()
    {
        $dataTimModel = new DataTimModel();
        $competitions = $dataTimModel->select('data_tim.tim_id, nama_tim, nama_kompetisi, gross_amount, payment_type')
            ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi')
            ->join('transactions', 'transactions.order_id=data_tim.order_id')
            ->where('transaction_status', 'settlement')
            ->findAll();
        
        foreach ($competitions as $idx => $val) {
            switch ($val['payment_type']) {
                case 'qris':
                    $fee = floor($val['gross_amount'] * 0.7 / 100);
                    break;
                case 'gopay':
                    $fee = floor($val['gross_amount'] * 2 / 100);
                    break;
                case 'bank_transfer':
                    $fee = 4440;
                    break;
                case 'echannel':
                    $fee = 4440;
                    break;
                default:
                    $fee = 0;
                }

                $competitions[$idx]['fee'] = $fee;
                $competitions[$idx]['pendapatan'] = $val['gross_amount'] - $fee;
        }

        $grossAmountLomba = 0;
        $pendapatanLomba = 0;
        foreach ($competitions as $val) {
            $grossAmountLomba += $val['gross_amount'];
            $pendapatanLomba += $val['pendapatan'];
        }

        $dataSeminarModel = new DataSeminarModel();
        $seminar = $dataSeminarModel->select('name, instansi, status, kategori, gross_amount, payment_type')
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->where('transaction_status', 'settlement')
            ->findAll();

        foreach ($seminar as $idx => $val) {
            switch ($val['payment_type']) {
                case 'qris':
                    $fee = floor($val['gross_amount'] * 0.7 / 100);
                    break;
                case 'gopay':
                    $fee = floor($val['gross_amount'] * 2 / 100);
                    break;
                case 'bank_transfer':
                    $fee = 4440;
                    break;
                case 'echannel':
                    $fee = 4440;
                    break;
                default:
                    $fee = 0;
                }

                $seminar[$idx]['fee'] = $fee;
                $seminar[$idx]['pendapatan'] = $val['gross_amount'] - $fee;
        }

        $grossAmountSeminar = 0;
        $pendapatanSeminar = 0;
        foreach ($seminar as $val) {
            $grossAmountSeminar += $val['gross_amount'];
            $pendapatanSeminar += $val['pendapatan'];
        }

        return view('admin/finance', [
            'competitions' => $competitions,
            'grossAmountLomba' => $grossAmountLomba,
            'pendapatanLomba' => $pendapatanLomba,
            'seminar' => $seminar,
            'grossAmountSeminar' => $grossAmountSeminar,
            'pendapatanSeminar' => $pendapatanSeminar,
        ]);
    }

    public function financeSeminar()
    {
        $dataSeminarModel = new DataSeminarModel();
        $seminarOffline = $dataSeminarModel->select('name, instansi, status, kategori, gross_amount, payment_type')
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->where('transaction_status', 'settlement')
            ->where('payment_type', 'offline')
            ->findAll();
        
        foreach ($seminarOffline as $idx => $val) {
            switch ($val['payment_type']) {
                case 'qris':
                    $fee = floor($val['gross_amount'] * 0.7 / 100);
                    break;
                case 'gopay':
                    $fee = floor($val['gross_amount'] * 2 / 100);
                    break;
                case 'bank_transfer':
                    $fee = 4440;
                    break;
                case 'echannel':
                    $fee = 4440;
                    break;
                default:
                    $fee = 0;
                }

                $seminarOffline[$idx]['fee'] = $fee;
                $seminarOffline[$idx]['pendapatan'] = $val['gross_amount'] - $fee;
        }

        $grossAmountOffline = 0;
        $pendapatanOffline = 0;
        foreach ($seminarOffline as $val) {
            $grossAmountOffline += $val['gross_amount'];
            $pendapatanOffline += $val['pendapatan'];
        }

        $seminarOnline = $dataSeminarModel->select('name, instansi, status, kategori, gross_amount, payment_type')
            ->join('transactions', 'transactions.order_id=data_seminar.order_id')
            ->where('transaction_status', 'settlement')
            ->where('payment_type !=', 'offline')
            ->findAll();
        
        foreach ($seminarOnline as $idx => $val) {
            switch ($val['payment_type']) {
                case 'qris':
                    $fee = floor($val['gross_amount'] * 0.7 / 100);
                    break;
                case 'gopay':
                    $fee = floor($val['gross_amount'] * 2 / 100);
                    break;
                case 'bank_transfer':
                    $fee = 4440;
                    break;
                case 'echannel':
                    $fee = 4440;
                    break;
                default:
                    $fee = 0;
                }

                $seminarOnline[$idx]['fee'] = $fee;
                $seminarOnline[$idx]['pendapatan'] = $val['gross_amount'] - $fee;
        }

        $grossAmountOnline = 0;
        $pendapatanOnline = 0;
        foreach ($seminarOnline as $val) {
            $grossAmountOnline += $val['gross_amount'];
            $pendapatanOnline += $val['pendapatan'];
        }

        return view('admin/finance_seminar', [
            'seminarOffline' => $seminarOffline,
            'grossAmountOffline' => $grossAmountOffline,
            'pendapatanOffline' => $pendapatanOffline,
            'seminarOnline' => $seminarOnline,
            'grossAmountOnline' => $grossAmountOnline,
            'pendapatanOnline' => $pendapatanOnline,
        ]);
    }

    public function financeLomba()
    {
        $dataTimModel = new DataTimModel();
        $competitions = $dataTimModel->select('data_tim.tim_id, nama_tim, nama_kompetisi, gross_amount, payment_type')
            ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi')
            ->join('transactions', 'transactions.order_id=data_tim.order_id')
            ->where('transaction_status', 'settlement')
            ->findAll();
        
        foreach ($competitions as $idx => $val) {
            switch ($val['payment_type']) {
                case 'qris':
                    $fee = floor($val['gross_amount'] * 0.7 / 100);
                    break;
                case 'gopay':
                    $fee = floor($val['gross_amount'] * 2 / 100);
                    break;
                case 'bank_transfer':
                    $fee = 4440;
                    break;
                case 'echannel':
                    $fee = 4440;
                    break;
                default:
                    $fee = 0;
                }

                $competitions[$idx]['fee'] = $fee;
                $competitions[$idx]['pendapatan'] = $val['gross_amount'] - $fee;
        }

        $grossAmountLomba = 0;
        $pendapatanLomba = 0;
        foreach ($competitions as $val) {
            $grossAmountLomba += $val['gross_amount'];
            $pendapatanLomba += $val['pendapatan'];
        }

        return view('admin/finance_lomba', [
            'competitions' => $competitions,
            'grossAmountLomba' => $grossAmountLomba,
            'pendapatanLomba' => $pendapatanLomba,
        ]);
    }
}