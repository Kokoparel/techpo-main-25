<?php

namespace App\Controllers;

use App\Models\AnggotaTimModel;
use App\Models\DataSeminarModel;
use App\Models\DataTimModel;
use App\Models\KompetisiModel;
use App\Models\TransactionsModel;
use App\Models\UserDataModel;

class MainController extends BaseController
{
    public function index()
    {
        return view('main');
    }

    public function seminar()
    {
        if (auth()->loggedIn()) {
            $transactionsModel = new TransactionsModel();
            $status = $transactionsModel->select('transaction_status')
                ->join('data_seminar', 'data_seminar.order_id=transactions.order_id')
                ->where('data_seminar.username', auth()->user()->username)
                ->first();

            if ($status) {
                $status = $status['transaction_status'];
            }

            $isOrdered = $status == 'capture' || $status == 'settlement' ? true : false;
        } else {
            $isOrdered = false;
        }

        return view('seminar', [
            'isOrdered' => $isOrdered,
        ]);
    }

    public function daftarSeminar()
    {
        $dataSeminarModel = new DataSeminarModel();
        $order = $dataSeminarModel->where('username', auth()->user()->username)->first();

        if ($order != null) {
            return redirect()->to('payment/seminar');
        }

        return view('daftar-seminar');
    }

    public function kompetisi($kompetisi)
    {
        if (auth()->loggedIn()) {
            $anggotaTimModel = new AnggotaTimModel();
            $data = $anggotaTimModel->select('data_tim.tim_id, nama_tim')
                ->join('data_tim', 'data_tim.tim_id=anggota_tim.tim_id', 'left')
                ->join('kompetisi', 'kompetisi.id_kompetisi=data_tim.id_kompetisi', 'left')
                ->like('nama_kompetisi', substr($kompetisi, 0, 2), 'after')
                ->where('anggota', auth()->user()->username)->first();

            $isVerified = false;
            if ($data) {
                $dataTimModel = new DataTimModel();
                $isVerified = $dataTimModel->select('status')
                    ->where('tim_id', $data['tim_id'])
                    ->first()['status'] == 'verified';
            }

            return view('kompetisi/' . $kompetisi, [
                'data' => $data,
                'isVerified' => $isVerified,
            ]);
        }

        return view('kompetisi/' . $kompetisi, [
            'data' => null,
            'isVerified' => false,
        ]);
    }

    public function kilasBalik()
    {
        return view('sejarah/sejarah');
    }

    public function sejarah($tahun = null)
    {
        if ($tahun < 2014 || $tahun > 2024) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            return view('sejarah/sejarah-' . $tahun, [
                'tahun' => substr($tahun, 2),
            ]);
        }
    }

    public function downloadTemplate($fileName)
    {
        $file = realpath('assets/template/' . $fileName);
        if ($file) {
            return $this->response->download($file, null);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function bazar($category)
    {
        if (!auth()->loggedIn()) {
            return redirect()->to('login');
        }
        

        // Validate the category
        $validCategories = ['Musik', 'Lukis', 'Tari'];
        if (!in_array($category, $validCategories)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Load data based on category, for example from a model

        // Return the view with the items
        return view('bazar/' . strtolower($category), [
        ]);
    }
}