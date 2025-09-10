<?php

namespace App\Controllers;

use App\Libraries\Utils;
use App\Models\AnggotaTimModel;
use App\Models\BerkasModel;
use App\Models\KuesionerModel;
use App\Models\UserDataModel;
use App\Models\DataTimModel;
use App\Models\NotifikasiModel;
use \Config\Services;

class UserController extends BaseController
{
    public function index()
    {
        $userDataModel = new UserDataModel();
        $userData = $userDataModel->find(auth()->user()->username);
        if ($userData == null) {
            return redirect()->to('/profile/confirm');
        }

        $kuesionerModel = new KuesionerModel();
        $kuesioner = $kuesionerModel->where('username', auth()->user()->username)->first();
        if ($kuesioner == null) {
            return redirect()->to('/profile/kuesioner');
        }

        $notifikasiModel = new NotifikasiModel();
        $notifikasi = $notifikasiModel->join('user_data', 'user_data.username=notifikasi.peminta')
            ->join('data_tim', 'data_tim.tim_id=notifikasi.tim_id')
            ->where('ketua', auth()->user()->username)
            ->where('notifikasi.status', 'pending')
            ->findAll();

        $anggotaTimModel = new AnggotaTimModel();
        $db = \Config\Database::connect();
        $tim = $anggotaTimModel
            ->select('data_tim.tim_id, nama_tim, kompetisi.id_kompetisi, nama_kompetisi, status, role, transaction_status')
            ->join('data_tim', 'data_tim.tim_id=anggota_tim.tim_id', 'left')
            ->join('user_data', 'user_data.username=anggota_tim.anggota', 'left')
            ->join('transactions', 'transactions.order_id=data_tim.order_id', 'left')
            ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi', 'left')
            ->where('anggota', auth()->user()->username)->findAll();

        foreach ($tim as $key => $value) {

             if ($value['id_kompetisi'] == 9) {
                $ml_anggota = [
                    'ketua' => $db->table('data_tim_ml_anggota')->where(['tim_id' => $value['tim_id'], 'posisi' => 'ketua'])->get()->getRowArray(),
                    'anggota' => $db->table('data_tim_ml_anggota')->where(['tim_id' => $value['tim_id'], 'posisi' => 'anggota'])->get()->getResultArray(),
                    'cadangan' => $db->table('data_tim_ml_anggota')->where(['tim_id' => $value['tim_id'], 'posisi' => 'cadangan'])->get()->getRowArray(),
                ];
                error_log('DEBUG ML ANGGOTA: ' . json_encode($ml_anggota));
                $tim[$key]['ml_anggota'] = $ml_anggota;
            }

            $tim[$key]['ketua'] = $anggotaTimModel
                ->select('nama, nim, universitas')
                ->join('user_data', 'user_data.username=anggota_tim.anggota')
                ->where('tim_id', $value['tim_id'])
                ->where('role', 'ketua')->first();

            $tim[$key]['anggota'] = $anggotaTimModel
                ->select('nama, nim, universitas')
                ->join('user_data', 'user_data.username=anggota_tim.anggota')
                ->where('tim_id', $value['tim_id'])
                ->where('role', 'anggota')->findAll();
        }

        return view('user/dashboard', [
            'userData' => $userData,
            'notifikasi' => $notifikasi,
            'tim' => $tim,
        ]);
    }

    public function confirm()
    {
        if (!$this->request->is('post')) {
            return view('user/confirm');
        }

        $validation = Services::validation();
        $userDataModel = new UserDataModel();

        if ($this->request->getPost('confirm')) {

            $validation->setRuleGroup('userData');

            if ($validation->withRequest($this->request)->run() === false) {
                return view('user/confirm');
            }

            $kpm = $this->request->getFile('kpm');

            $data = [
                'username' => auth()->user()->username,
                'nama' => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'universitas' => $this->request->getPost('universitas'),
                'kontak' => $this->request->getPost('kontak'),
            ];

            if (!$kpm->hasMoved()) {
                $filepath = 'uploads/' . $kpm->store();
                $data['kpm'] = $filepath;
            }

            $userDataModel->insert($data);
        }

        if ($this->request->getPost('change')) {

            $userDataModel = new UserDataModel();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'universitas' => $this->request->getPost('universitas'),
                'kontak' => $this->request->getPost('kontak'),
            ];

            $userDataModel->where('username', auth()->user()->username)
                ->set($data)
                ->update();
        }

        return redirect()->to('/profile');
    }

    public function kuesioner()
    {
        if (!$this->request->is('post')) {
            return view('user/kuesioner');
        }

        $data = [
            'username' => auth()->user()->username,
            'tanggal_jawab' => date('Y-m-d H-i-s'),
        ];

        if ($this->request->getPost('kuesioner') == 'lain-lain') {
            $data['jawaban'] = $this->request->getPost('kuesioner-text');
        } else {
            $data['jawaban'] = $this->request->getPost('kuesioner');
        }

        $kuesionerModel = new KuesionerModel();
        $kuesionerModel->insert($data);

        return redirect()->to('/profile');
    }

    public function daftarLomba()
{
    $userDataModel = new UserDataModel();
    $userData = $userDataModel->find(auth()->user()->username);
    if (!$userData) {
        return redirect()->to('/profile/confirm');
    }

    if (!$this->request->is('post')) {
        return view('user/daftar-lomba', [
            'userData' => $userData,
        ]);
    }

    $session = Services::session();
    
    // Validasi khusus untuk Mobile Legends
    if ($this->request->getPost('kompetisi') == '9') {
        $validation = Services::validation();
        
        // Cek apakah file diupload
        $followProofFile = $this->request->getFile('ml_follow_proof');
        
        if (!$followProofFile || !$followProofFile->isValid()) {
            $session->setFlashdata('alert', 'File bukti follow Instagram wajib diupload');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back()->withInput();
        }
        
        // Validasi file
        $rules = [
            'ml_follow_proof' => [
                'uploaded[ml_follow_proof]',
                'max_size[ml_follow_proof,2048]', // 2MB
                'ext_in[ml_follow_proof,png,jpg,jpeg]',
                'mime_in[ml_follow_proof,image/png,image/jpg,image/jpeg]'
            ]
        ];
        $validation->setRules($rules);
        
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            $errorMessage = implode(', ', $errors);
            $session->setFlashdata('alert', 'Error upload file: ' . $errorMessage);
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back()->withInput();
        }
    }

    // Cek nama tim
    $dataTimModel = new DataTimModel();
    $checkName = $dataTimModel->where('nama_tim', $this->request->getPost('nama_tim'))->first();
    if ($checkName) {
        $session->setFlashdata('alert', 'Nama tim sudah digunakan');
        $session->setFlashdata('alertTitle', 'Error');
        $session->setFlashdata('alertType', 'error');
        return redirect()->back();
    }

    // Prepare data tim
    $data = [
        'tim_id' => $this->getUniqueId(),
        'nama_tim' => $this->request->getPost('nama_tim'),
        'id_kompetisi' => $this->request->getPost('kompetisi'),
        'order_id' => Utils::generateOrderId(),
    ];

    // Handle upload file untuk Mobile Legends
    if ($this->request->getPost('kompetisi') == '9') {
        $followProofFile = $this->request->getFile('ml_follow_proof');
        
        if ($followProofFile && $followProofFile->isValid() && !$followProofFile->hasMoved()) {
            try {
                // Buat folder jika belum ada
                $uploadPath = FCPATH . 'uploads/ml_follow_proof/';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                // Generate nama file unik
                $fileName = $data['tim_id'] . '_' . time() . '.' . $followProofFile->getClientExtension();
                
                // Pindahkan file
                $followProofFile->move($uploadPath, $fileName);
                
                // Simpan path ke database
                $data['ml_follow_proof'] = 'uploads/ml_follow_proof/' . $fileName;
                
                // Log untuk debugging
                error_log('ML Follow Proof uploaded: ' . $data['ml_follow_proof']);
                
            } catch (Exception $e) {
                error_log('Error uploading ML follow proof: ' . $e->getMessage());
                $session->setFlashdata('alert', 'Error saat upload file: ' . $e->getMessage());
                $session->setFlashdata('alertTitle', 'Error');
                $session->setFlashdata('alertType', 'error');
                return redirect()->back()->withInput();
            }
        } else {
            error_log('ML Follow Proof file not valid or already moved');
            $session->setFlashdata('alert', 'File bukti follow Instagram tidak valid');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back()->withInput();
        }
    }

    // Insert data tim ke database
    try {
        $dataTimModel->insert($data);
        error_log('Team data inserted: ' . json_encode($data));
    } catch (Exception $e) {
        error_log('Error inserting team data: ' . $e->getMessage());
        $session->setFlashdata('alert', 'Error saat menyimpan data tim');
        $session->setFlashdata('alertTitle', 'Error');
        $session->setFlashdata('alertType', 'error');
        return redirect()->back()->withInput();
    }

    // Handle Mobile Legends member data
    if ($this->request->getPost('kompetisi') == '9') {
        $db = \Config\Database::connect();
        $userDataModel = new UserDataModel();
        $userData = $userDataModel->find(auth()->user()->username);

        try {
            // Simpan ketua tim (nama dari akun)
            $ml_member = $this->request->getPost('ml_member');
            
            if (!$ml_member || !isset($ml_member[1])) {
                throw new Exception('Data member Mobile Legends tidak lengkap');
            }
            
            $db->table('data_tim_ml_anggota')->insert([
                'tim_id' => $data['tim_id'],
                'nama' => $userData['nama'], // nama dari akun
                'nickname' => $ml_member[1]['nickname'] ?? '',
                'ml_id' => $ml_member[1]['id'] ?? '',
                'posisi' => 'ketua'
            ]);
            
            // Simpan anggota 2-5
            for ($i = 2; $i <= 5; $i++) {
                if (isset($ml_member[$i])) {
                    $member = $ml_member[$i];
                    $db->table('data_tim_ml_anggota')->insert([
                        'tim_id' => $data['tim_id'],
                        'nama' => $member['nama'] ?? '',
                        'nickname' => $member['nickname'] ?? '',
                        'ml_id' => $member['id'] ?? '',
                        'posisi' => 'anggota'
                    ]);
                }
            }
            
            // Simpan cadangan jika diisi
            $ml_cadangan = $this->request->getPost('ml_cadangan');
            if ($ml_cadangan && !empty($ml_cadangan['nama']) && !empty($ml_cadangan['nickname']) && !empty($ml_cadangan['id'])) {
                $db->table('data_tim_ml_anggota')->insert([
                    'tim_id' => $data['tim_id'],
                    'nama' => $ml_cadangan['nama'],
                    'nickname' => $ml_cadangan['nickname'],
                    'ml_id' => $ml_cadangan['id'],
                    'posisi' => 'cadangan'
                ]);
            }
            
            error_log('ML member data inserted for tim_id: ' . $data['tim_id']);
            
        } catch (Exception $e) {
            error_log('Error inserting ML member data: ' . $e->getMessage());
            $session->setFlashdata('alert', 'Error saat menyimpan data member Mobile Legends: ' . $e->getMessage());
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back()->withInput();
        }
    }

    // Insert anggota tim
    $anggotaTimModel = new AnggotaTimModel();
    $anggota = [
        'tim_id' => $data['tim_id'],
        'anggota' => auth()->user()->username,
        'role' => 'ketua',
    ];
    
    try {
        $anggotaTimModel->insert($anggota);
        error_log('Team member inserted: ' . json_encode($anggota));
    } catch (Exception $e) {
        error_log('Error inserting team member: ' . $e->getMessage());
    }

    return redirect()->to('/kompetisi/payment/' . $data['tim_id']);
}

    public function joinTim()
    {
        $dataTimModel = new DataTimModel();
        $dataTim = $dataTimModel->find($this->request->getPost('kode_tim'));

        $session = Services::session();

        if ($dataTim == null) {
            $session->setFlashdata('alert', 'Kode tim tidak ditemukan');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back();
        }

        $anggotaTimModel = new AnggotaTimModel();
        $checkAnggota = $anggotaTimModel->where('anggota', auth()->user()->username)
            ->where('tim_id', $dataTim['tim_id'])->first();
        if ($checkAnggota) {
            $session->setFlashdata('alert', 'Kamu sudah berada di dalam tim ini');
            $session->setFlashdata('alertTitle', 'Info');
            $session->setFlashdata('alertType', 'info');
            return redirect()->back();
        }

        $checkJumlah = $anggotaTimModel->where('tim_id', $dataTim['tim_id'])->findAll();
        if (count($checkJumlah) >= 5) {
            $session->setFlashdata('alert', 'Tim sudah penuh');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back();
        }

        $ketua = $anggotaTimModel->where('role', 'ketua')->where('tim_id', $dataTim['tim_id'])->first();

        $notifikasiModel = new NotifikasiModel();
        $data = [
            'ketua' => $ketua['anggota'],
            'peminta' => auth()->user()->username,
            'tim_id' => $dataTim['tim_id'],
        ];

        $notifikasiModel->insert($data);

        if ($dataTim['id_kompetisi'] == 9) {
            $userDataModel = new UserDataModel();
            $userData = $userDataModel->find(auth()->user()->username);

            $ml_nickname = $this->request->getPost('ml_nickname_join');
            $ml_id = $this->request->getPost('ml_id_join');
            $db = \Config\Database::connect();
            $db->table('data_tim_ml_anggota')->insert([
                'tim_id' => $dataTim['tim_id'],
                'nama' => $userData['nama'],
                'nickname' => $ml_nickname,
                'ml_id' => $ml_id,
                'posisi' => 'anggota'
            ]);
        }
        
        $session->setFlashdata('success', 'Permintaan bergabung berhasil dikirimkan');

        return redirect()->to('/profile');
    }

    public function terimaAnggota()
    {
        $notifikasiModel = new NotifikasiModel();
        $post = $this->request->getPost('action');

        if ($post == 'Tolak') {
            $notifikasiModel->set('status', 'declined')
                ->where('notifikasi_id', $this->request->getPost('id'))
                ->update();
        }

        if ($post == 'Terima') {
            $notifikasiModel->set('status', 'confirmed')
                ->where('notifikasi_id', $this->request->getPost('id'))
                ->update();

            $anggotaTimModel = new AnggotaTimModel();
            $data = [
                'tim_id' => $this->request->getPost('tim_id'),
                'anggota' => $this->request->getPost('peminta'),
                'role' => 'anggota',
            ];

            $anggotaTimModel->insert($data);
        }

        return redirect()->to('/profile');
    }

    public function submission()
    {
        $idTim = $this->request->getVar('id');

        $dataTimModel = new DataTimModel();
        $data = $dataTimModel->where('tim_id', $idTim)->first();

        if (!$data) {
            $session = Services::session();
            $session->setFlashdata('alert', 'Tim tidak ditemukan');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back();
        }

        $anggotaTimModel = new AnggotaTimModel();
        $checkAnggota = $anggotaTimModel->where('anggota', auth()->user()->username)
            ->where('tim_id', $idTim)->first();

        if (!$checkAnggota) {
            $session = Services::session();
            $session->setFlashdata('alert', 'Anda bukan anggota tim ini');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back();
        }

        $berkasModel = new BerkasModel();
        $dataProposal = $berkasModel->select('created_at')->where('tim_id', $idTim)->where('jenis', 'proposal')->first();
        $dataSourceCode = $berkasModel->select('created_at')->where('tim_id', $idTim)->where('jenis', 'source_code')->first();

        return view('kompetisi/submission', [
            'data' => $data,
            'dataProposal' => $dataProposal,
            'dataSourceCode' => $dataSourceCode,
        ]);
    }

    public function submissionProposal()
    {
        $anggotaTimModel = new AnggotaTimModel();
        $checkAnggota = $anggotaTimModel->where('anggota', auth()->user()->username)
            ->where('tim_id', $this->request->getPost('tim_id'))->first();

        if (!$checkAnggota) {
            $session = Services::session();
            $session->setFlashdata('alert', 'Anda bukan anggota tim ini');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->to('/');
        }

        $validation = Services::validation();
        $validation->setRuleGroup('submissionProposal');

        if ($validation->withRequest($this->request)->run() === false) {
            return redirect()->back()->withInput();
        }

        $proposal = $this->request->getFile('proposal');
        if ($proposal->getSize() > 5 * 1024 * 1024) { // Check if file is larger than 5 MB
            $session = Services::session();
            $session->setFlashdata('alert', 'File size exceeds 5 MB');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->back()->withInput();
        }

        $berkasModel = new BerkasModel();
        $dataProposal = $berkasModel->where('tim_id', $this->request->getPost('tim_id'))
            ->where('jenis', 'proposal')->first();

        if (!$dataProposal) {
            $dataProposal = [
                'tim_id' => $this->request->getPost('tim_id'),
                'jenis' => 'proposal',
            ];
        } else {
            unlink(WRITEPATH . $dataProposal['berkas']);
        }

        $dataProposal['created_at'] = date('Y-m-d H-i-s');

        if (!$proposal->hasMoved()) {
            $filepath = 'uploads/' . $proposal->store();
            $dataProposal['berkas'] = $filepath;
        }

        $berkasModel->save($dataProposal);

        $session = Services::session();
        $session->setFlashdata('alert', 'Submission Proposal berhasil di Upload');
        $session->setFlashdata('alertTitle', 'Success');
        $session->setFlashdata('alertType', 'success');

        return redirect()->to('/profile');
    }

    public function submissionSourceCode()
    {
        $anggotaTimModel = new AnggotaTimModel();
        $checkAnggota = $anggotaTimModel->where('anggota', auth()->user()->username)
            ->where('tim_id', $this->request->getPost('tim_id'))->first();

        if (!$checkAnggota) {
            $session = Services::session();
            $session->setFlashdata('alert', 'Anda bukan anggota tim ini');
            $session->setFlashdata('alertTitle', 'Error');
            $session->setFlashdata('alertType', 'error');
            return redirect()->to('/');
        }

        $validation = Services::validation();
        $validation->setRuleGroup('submissionSourceCode');

        if ($validation->withRequest($this->request)->run() === false) {
            return redirect()->back()->withInput();
        }

        $berkasModel = new BerkasModel();
        $dataSourceCode = $berkasModel->where('tim_id', $this->request->getPost('tim_id'))
            ->where('jenis', 'source_code')->first();

        if (!$dataSourceCode) {
            $dataSourceCode = [
                'tim_id' => $this->request->getPost('tim_id'),
                'jenis' => 'source_code',
            ];
        } else {
            unlink(WRITEPATH . $dataSourceCode['berkas']);
        }

        $dataSourceCode['created_at'] = date('Y-m-d H-i-s');

        $sourceCode = $this->request->getFile('source_code');
        if (!$sourceCode->hasMoved()) {
            $filepath = 'uploads/' . $sourceCode->store();
            $dataSourceCode['berkas'] = $filepath;
        }

        $berkasModel->save($dataSourceCode);

        $session = Services::session();
        $session->setFlashdata('alert', 'Submission Source Code berhasil di Upload');
        $session->setFlashdata('alertTitle', 'Success');
        $session->setFlashdata('alertType', 'success');

        return redirect()->to('/profile');
    }

    public function ubahPassword()
    {
        $newPassword = $this->request->getPost('password');
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $db = \Config\Database::connect();
        $query = $db->table('auth_identities');
        $query->set('secret2', $hashedPassword)
            ->where('user_id', auth()->user()->id)
            ->update();

        $session = Services::session();
        $session->setFlashdata('success', 'Password berhasil diubah');

        return redirect()->to('/profile');
    }

    function getUniqueId()
    {
        $id = bin2hex(random_bytes(3));
        $dataTimModel = new DataTimModel();
        $check = $dataTimModel->find($id);

        if ($check) {
            return $this->getUniqueId();
        }

        return $id;
    }
}