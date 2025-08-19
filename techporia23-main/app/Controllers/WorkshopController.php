<?php

namespace App\Controllers;

use App\Models\DataWorkshopModel;
use App\Models\TiketWorkshopModel;
use App\Models\TransactionsModel;
use App\Libraries\Utils;

class WorkshopController extends BaseController
{
    public function tiket()
    {
        $tiketModel = new TiketWorkshopModel();
        $dataWorkshopModel = new DataWorkshopModel();
        $tiket = $tiketModel->where('username', auth()->user()->username)->first();

        if ($tiket == null) {
            $dataWorkshop = $dataWorkshopModel->where('username', auth()->user()->username)->first();

            if ($dataWorkshop == null) {
                return redirect()->to('workshop/daftar');
            }

            $transactionsModel = new TransactionsModel();
            $transaction = $transactionsModel->find($dataWorkshop['order_id']);

            if ($transaction == null || ($transaction['transaction_status'] != 'settlement' && $transaction['transaction_status'] != 'capture')) {
                return redirect()->to('payment/workshop');
            }

            $tiketData = [
                'order_id' => $dataWorkshop['order_id'],
                'username' => $dataWorkshop['username'],
                'ticket' => Utils::getUniqueTiket(),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $id = $tiketModel->insert($tiketData, true);
            $tiket = $tiketModel->find($id);

            $pdf = Utils::generatePdf($tiket['ticket']);
            Utils::sendMail($pdf, auth()->getUser()->getEmail());
        }

        $dataWorkshop = $dataWorkshopModel->where('username', auth()->user()->username)->first();
        $transactionModel = new TransactionsModel();
        $transaction = $transactionModel->find($dataWorkshop['order_id']);

        $item = [
            'nama' => 'Tiket Workshop Technology Euphoria 2024 ' . $dataWorkshop['kategori'],
            'harga' => 'Rp. ' . number_format($transaction['gross_amount'], 0, ',', '.'),
            'jumlah' => 1,
            'total' => 'Rp. ' . number_format($transaction['gross_amount'], 0, ',', '.'),
        ];

        return view('invoice_workshop', [
            'data' => $dataWorkshop,
            'transaction' => $transaction,
            'item' => $item,
            'harga' => $item['harga'],
        ]);
    }

    public function downloadTiket()
    {
        $tiketModel = new TiketWorkshopModel();
        $tiket = $tiketModel->where('username', auth()->user()->username)->first();

        if (!$tiket) {
            return redirect()->to('workshop/tiket');
        }

        Utils::generatePdf($tiket['ticket'], true);
    }
}