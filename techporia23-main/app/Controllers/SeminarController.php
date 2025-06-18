<?php

namespace App\Controllers;

use App\Models\DataSeminarModel;
use App\Models\TiketModel;
use App\Models\TransactionsModel;
use App\Libraries\Utils;

class SeminarController extends BaseController
{
    public function tiket()
    {
        $tiketModel = new TiketModel();
        $dataSeminarModel = new DataSeminarModel();
        $tiket = $tiketModel->where('username', auth()->user()->username)->first();

        if ($tiket == null) {
            $dataSeminar = $dataSeminarModel->where('username', auth()->user()->username)->first();

            if ($dataSeminar == null) {
                return redirect()->to('seminar/daftar');
            }

            $transactionsModel = new TransactionsModel();
            $transaction = $transactionsModel->find($dataSeminar['order_id']);

            if ($transaction == null || ($transaction['transaction_status'] != 'settlement' && $transaction['transaction_status'] != 'capture')) {
                return redirect()->to('payment/seminar');
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
            Utils::sendMail($pdf, auth()->getUser()->getEmail());
        }

        $dataSeminar = $dataSeminarModel->where('username', auth()->user()->username)->first();

        $transactionModel = new TransactionsModel();
        $transaction = $transactionModel->where('order_id', $dataSeminar['order_id'])->first();
        $item = [
            'nama' => 'Tiket Seminar Nasional Technology Euphoria 2023 ' . $dataSeminar['kategori'],
            'harga' => 'Rp. ' . number_format($transaction['gross_amount'], 0, ',', '.'),
            'jumlah' => 1,
            'total' => 'Rp. ' . number_format($transaction['gross_amount'], 0, ',', '.'),
        ];

        return view('invoice', [
            'data' => $dataSeminar,
            'transaction' => $transaction,
            'item' => $item,
            'harga' => 'Rp. ' . number_format($transaction['gross_amount'], 0, ',', '.'),
        ]);
    }

    public function downloadTiket()
    {
        $tiketModel = new TiketModel();
        $tiket = $tiketModel->where('username', auth()->user()->username)->first();

        if ($tiket == null) {
            return redirect()->to('seminar/tiket');
        }

        Utils::generatePdf($tiket['ticket'], true);
    }
}