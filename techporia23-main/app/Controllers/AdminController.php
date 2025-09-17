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
use App\Models\DataWorkshopModel;
use App\Models\TiketWorkshopModel;
use CodeIgniter\Shield\Entities\User;
use Config\Services;

class AdminController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
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
            
        $dataWorkshopModel = new DataWorkshopModel();
        $dataWorkshop = $dataWorkshopModel
            ->select('username, name, phone, email, instansi, domisili, kategori, transaction_time')
            ->join('transactions', 'transactions.order_id=data_workshop.order_id')
            ->findAll();

        $jumlahWorkshopSettlement = $dataWorkshopModel->selectCount("transaction_status")
            ->join('transactions', 'transactions.order_id=data_workshop.order_id')
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

        // Map bukti pembayaran per order_id
        $proofRows = $db->table('payment_proofs')
            ->select('order_id, MAX(created_at) as latest_created_at')
            ->groupBy('order_id')
            ->get()->getResultArray();
        $orderIdToProofAt = [];
        foreach ($proofRows as $pr) {
            $orderIdToProofAt[$pr['order_id']] = $pr['latest_created_at'];
        }

        // Tambahkan flag bukti ke dataset
        foreach ($dataSeminar as $i => $row) {
            $orderId = $db->table('data_seminar')->select('order_id')->where('username', $row['username'])->get()->getRowArray();
            $dataSeminar[$i]['proof_at'] = $orderId && isset($orderIdToProofAt[$orderId['order_id']]) ? $orderIdToProofAt[$orderId['order_id']] : null;
        }
        foreach ($dataWorkshop as $i => $row) {
            $orderId = $db->table('data_workshop')->select('order_id')->where('username', $row['username'])->get()->getRowArray();
            $dataWorkshop[$i]['proof_at'] = $orderId && isset($orderIdToProofAt[$orderId['order_id']]) ? $orderIdToProofAt[$orderId['order_id']] : null;
        }
        foreach ($dataTim as $i => $row) {
            $orderId = $db->table('data_tim')->select('order_id')->where('tim_id', $row['tim_id'])->get()->getRowArray();
            $dataTim[$i]['proof_at'] = $orderId && isset($orderIdToProofAt[$orderId['order_id']]) ? $orderIdToProofAt[$orderId['order_id']] : null;
        }

        // Hitung pending manual untuk kartu dashboard
        $jumlahPendingManual = $db->table('transactions')->where('transaction_status', 'pending_manual')->countAllResults();

        return view('admin/dashboard_v2', [
            'dataSeminar' => $dataSeminar,
            'dataWorkshop' => $dataWorkshop,
            'dataTim' => $dataTim,
            'jumlahSeminarSettlement' => $jumlahSeminarSettlement,
            'jumlahWorkshopSettlement' => $jumlahWorkshopSettlement,
            'jumlahTimSettlement' => $jumlahTimSettlement,
            'jumlahPendingManual' => $jumlahPendingManual,
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

        // Payment proofs for this seminar/order
        $db = \Config\Database::connect();
        $paymentProofs = $db->table('payment_proofs')
            ->where('order_id', $dataSeminar['order_id'])
            ->orderBy('created_at', 'DESC')
            ->get()->getResultArray();

        return view('admin/detail_seminar', [
            'data' => $dataSeminar,
            'tiket' => $tiket,
            'paymentProofs' => $paymentProofs,
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
            $ml = $dataTimModel->where('id_kompetisi', 9)->countAllResults();

            return view('admin/data_lomba_all', [
                'dataTim' => $dataTim,
                'bp' => $bp,
                'cp' => $cp,
                'essay' => $essay,
                'uiux' => $uiux,
                'web' => $web,
                'band' => $band,
                'painting' => $painting,
                'dance' => $dance,
                'ml' => $ml
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
            ->select('data_tim.tim_id, nama_tim, nama_kompetisi, kompetisi.id_kompetisi, status, data_tim.ml_follow_proof, transactions.order_id, transaction_status, transaction_time, payment_type')
            ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi', 'left')
            ->join('transactions', 'transactions.order_id=data_tim.order_id', 'left')
            ->find($id);

        // Jika tim Mobile Legends (id_kompetisi = 9)
        if ($dataTim['id_kompetisi'] == 9) {
            // Query data anggota ML dari tabel data_tim_ml_anggota
            $db = \Config\Database::connect();
            $dataTim['anggota_ml'] = $db->query("
                SELECT * FROM data_tim_ml_anggota 
                WHERE tim_id = ? 
                ORDER BY FIELD(posisi, 'ketua', 'anggota', 'cadangan'), id
            ", [$id])->getResultArray();
            
            // Tetap ambil data ketua dari tabel biasa untuk informasi lengkap
            $anggotaTimModel = new AnggotaTimModel();
            $dataTim['ketua'] = $anggotaTimModel->select('users.username, nama, nim, universitas, auth_identities.secret, kontak')
                ->join('user_data', 'user_data.username=anggota_tim.anggota')
                ->join('users', 'users.username=anggota_tim.anggota')
                ->join('auth_identities', 'users.id=auth_identities.user_id')
                ->where('tim_id', $id)
                ->where('role', 'ketua')
                ->first();
        } else {
            // Untuk kompetisi selain ML, gunakan query biasa
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
        }

            $berkasModel = new BerkasModel();
            $berkasProposal = $berkasModel->where('tim_id', $id)->where('jenis', 'proposal')->first();
            $berkasSourceCode = $berkasModel->where('tim_id', $id)->where('jenis', 'source_code')->first();

            // Payment proofs for this team/order
            $db = \Config\Database::connect();
            $paymentProofs = $db->table('payment_proofs')
                ->where('order_id', $dataTim['order_id'])
                ->orderBy('created_at', 'DESC')
                ->get()->getResultArray();

            return view('admin/detail_tim', [
                'data' => $dataTim,
                'berkasProposal' => $berkasProposal,
                'berkasSourceCode' => $berkasSourceCode,
                'paymentProofs' => $paymentProofs,
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

    public function workshop()
    {
        $dataWorkshopModel = new DataWorkshopModel();
        $dataWorkshop = $dataWorkshopModel
            ->select('username, name, phone, email, instansi, domisili, kategori, transaction_time, transaction_status')
            ->join('transactions', 'transactions.order_id=data_workshop.order_id')
            ->findAll();

        $dataVip = $dataWorkshopModel->where('kategori', 'VIP')->countAllResults();
        $dataReguler = $dataWorkshopModel->where('kategori', 'Reguler')->countAllResults();

        $dataVipSettlement = $dataWorkshopModel->selectCount("transaction_status")
            ->join('transactions', 'transactions.order_id=data_workshop.order_id')
            ->where('kategori', 'VIP')
            ->where('transaction_status', 'settlement')
            ->orwhere('transaction_status', 'capture')
            ->countAllResults();

        $dataRegulerSettlement = $dataWorkshopModel->selectCount("transaction_status")
            ->join('transactions', 'transactions.order_id=data_workshop.order_id')
            ->where('kategori', 'Reguler')
            ->where('transaction_status', 'settlement')
            ->orwhere('transaction_status', 'capture')
            ->countAllResults();

        return view('admin/data_workshop', [
            'dataWorkshop' => $dataWorkshop,
            'dataVip' => $dataVip,
            'dataReguler' => $dataReguler,
            'dataVipSettlement' => $dataVipSettlement,
            'dataRegulerSettlement' => $dataRegulerSettlement,
        ]);
    }

    public function detailWorkshop($username)
    {
        $dataWorkshopModel = new DataWorkshopModel();
        $dataWorkshop = $dataWorkshopModel
            ->select('username, name, phone, email, instansi, domisili, status, kategori, transactions.order_id, transaction_status, transaction_time, payment_type')
            ->join('transactions', 'transactions.order_id=data_workshop.order_id')
            ->where('data_workshop.username', $username)
            ->first();

        $tiketWorkshopModel = new TiketWorkshopModel();
        $tiket = $tiketWorkshopModel->find($dataWorkshop['order_id']);
        if ($tiket) {
            $tiket = $tiket['ticket'];
        }

        // Payment proofs for this workshop/order
        $db = \Config\Database::connect();
        $paymentProofs = $db->table('payment_proofs')
            ->where('order_id', $dataWorkshop['order_id'])
            ->orderBy('created_at', 'DESC')
            ->get()->getResultArray();

        return view('admin/detail_workshop', [
            'data' => $dataWorkshop,
            'tiket' => $tiket,
            'paymentProofs' => $paymentProofs,
        ]);
    }

    public function addWorkshop()
    {
        if (!$this->request->is('post')) {
            return view('admin/add_workshop');
        }

        // Validasi email admin
        $inputEmail = $this->request->getPost('email');
        $adminEmail = auth()->user()->email;
        
        if (strtolower($inputEmail) === strtolower($adminEmail)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', ['Email admin tidak boleh digunakan untuk pendaftaran peserta workshop!']);
        }

        $validation = Services::validation();
        $validation->setRuleGroup('adminWorkshop');
        if ($validation->withRequest($this->request)->run() === false) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // 1. Simpan user terlebih dahulu
        $usersModel = auth()->getProvider();
        $user = new User([
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);
        $usersModel->save($user);
        $user = $usersModel->find($usersModel->getInsertID());
        $user->activate();

        // Generate order_id
        $orderId = Utils::generateOrderId();

        // 2. SIMPAN TRANSACTIONS TERLEBIH DAHULU
        $transactionsModel = new TransactionsModel();
        $kategori = $this->request->getPost('kategori');
        $transactions = [
            'order_id' => $orderId,
            'gross_amount' => $kategori == 'VIP' ? 115000 : 75000,
            'payment_type' => 'Offline',
            'transaction_status' => 'settlement',
            'transaction_time' => date('Y-m-d H:i:s'),
            'snap_token' => 'no_snap',
            'transaction_id' => 'no_transaction',
        ];
        $transactionsModel->save($transactions);

        // 3. BARU SIMPAN DATA_WORKSHOP
        $dataWorkshopModel = new DataWorkshopModel();
        $dataWorkshop = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('nama'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'instansi' => $this->request->getPost('instansi'),
            'domisili' => $this->request->getPost('domisili'),
            'kategori' => $kategori,
            'status' => $this->request->getPost('status'),
            'order_id' => $orderId, // Menggunakan order_id yang sudah ada di transactions
        ];
        $dataWorkshopModel->save($dataWorkshop);

        return redirect()->to('admin/detail-workshop/' . $this->request->getPost('username'));
    }

    public function createTiketWorkshop($username = null)
    {
        $dataWorkshopModel = new DataWorkshopModel();
        $dataWorkshop = $dataWorkshopModel->where('username', $username)->first();

        if ($dataWorkshop == null) {
            return redirect()->back()->with('error', 'Data workshop tidak ditemukan');
        }

        $transactionsModel = new TransactionsModel();
        $transaction = $transactionsModel->find($dataWorkshop['order_id']);

        if ($transaction == null || ($transaction['transaction_status'] != 'settlement' && $transaction['transaction_status'] != 'capture')) {
            return redirect()->back()->with('error', 'Pembayaran belum diverifikasi');
        }

        $tiketWorkshopModel = new TiketWorkshopModel();
        $tiket = $tiketWorkshopModel->where('username', $username)->first();
        if ($tiket) {
            return redirect()->back()->with('error', 'Tiket sudah dibuat');
        }

        $tiketData = [
            'order_id' => $dataWorkshop['order_id'],
            'username' => $dataWorkshop['username'],
            'ticket' => Utils::getUniqueTiket(),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $id = $tiketWorkshopModel->insert($tiketData, true);
        $tiket = $tiketWorkshopModel->find($id);

        $pdf = Utils::generatePdf($tiket['ticket']);
        Utils::sendMail($pdf, $dataWorkshop['email']);

        return redirect()->back()->with('success', 'Tiket berhasil dibuat dan dikirim ke email user');
    }

    public function downloadTiketWorkshop($username)
    {
        $tiketWorkshopModel = new TiketWorkshopModel();
        $tiket = $tiketWorkshopModel->where('username', $username)->first();

        if (!$tiket) {
            return redirect()->back()->with('error', 'Tiket tidak ditemukan');
        }

        Utils::generatePdf($tiket['ticket'], true);
    }

    public function financeWorkshop()
    {
        $dataWorkshopModel = new DataWorkshopModel();

        // Workshop Offline
        $workshopOffline = $dataWorkshopModel->select('name, instansi, status, kategori, gross_amount, payment_type')
            ->join('transactions', 'transactions.order_id=data_workshop.order_id')
            ->where('transaction_status', 'settlement')
            ->where('payment_type', 'offline')
            ->findAll();

        foreach ($workshopOffline as $idx => $val) {
            switch ($val['payment_type']) {
                case 'qris':
                    $fee = floor($val['gross_amount'] * 0.7 / 100);
                    break;
                case 'gopay':
                    $fee = floor($val['gross_amount'] * 2 / 100);
                    break;
                case 'bank_transfer':
                case 'echannel':
                    $fee = 4440;
                    break;
                default:
                    $fee = 0;
            }
            $workshopOffline[$idx]['fee'] = $fee;
            $workshopOffline[$idx]['pendapatan'] = $val['gross_amount'] - $fee;
        }

        $grossAmountOffline = 0;
        $pendapatanOffline = 0;
        foreach ($workshopOffline as $val) {
            $grossAmountOffline += $val['gross_amount'];
            $pendapatanOffline += $val['pendapatan'];
        }

        // Workshop Online
        $workshopOnline = $dataWorkshopModel->select('name, instansi, status, kategori, gross_amount, payment_type')
            ->join('transactions', 'transactions.order_id=data_workshop.order_id')
            ->where('transaction_status', 'settlement')
            ->where('payment_type !=', 'offline')
            ->findAll();

        foreach ($workshopOnline as $idx => $val) {
            switch ($val['payment_type']) {
                case 'qris':
                    $fee = floor($val['gross_amount'] * 0.7 / 100);
                    break;
                case 'gopay':
                    $fee = floor($val['gross_amount'] * 2 / 100);
                    break;
                case 'bank_transfer':
                case 'echannel':
                    $fee = 4440;
                    break;
                default:
                    $fee = 0;
            }
            $workshopOnline[$idx]['fee'] = $fee;
            $workshopOnline[$idx]['pendapatan'] = $val['gross_amount'] - $fee;
        }

        $grossAmountOnline = 0;
        $pendapatanOnline = 0;
        foreach ($workshopOnline as $val) {
            $grossAmountOnline += $val['gross_amount'];
            $pendapatanOnline += $val['pendapatan'];
        }

        return view('admin/finance_workshop', [
            'workshopOffline' => $workshopOffline,
            'grossAmountOffline' => $grossAmountOffline,
            'pendapatanOffline' => $pendapatanOffline,
            'workshopOnline' => $workshopOnline,
            'grossAmountOnline' => $grossAmountOnline,
            'pendapatanOnline' => $pendapatanOnline,
        ]);
    }


    public function approvePayment($orderId)
    {
        $transactionsModel = new TransactionsModel();
        $transactionsModel->set('transaction_status', 'settlement')
            ->set('payment_type', 'offline')
            ->where('order_id', $orderId)
            ->update();

        return redirect()->back();
    }

    public function rejectPayment($orderId)
    {
        $transactionsModel = new TransactionsModel();
        $transactionsModel->set('transaction_status', 'cancel')
            ->where('order_id', $orderId)
            ->update();

        return redirect()->back();
    }
}

