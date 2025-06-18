<?php

namespace App\Libraries;

use App\Models\DataSeminarModel;
use App\Models\TiketModel;
use App\Models\TransactionsModel;
use Dompdf\Dompdf;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Utils
{
    public static function generateOrderId()
    {
        // Generate random ID
        $id = uniqid(rand(), 1);
        $id = substr($id, 0, 14);

        $transactionsModel = new TransactionsModel();
        $check = $transactionsModel->where('order_id', $id)->first();

        if ($check) {
            return self::generateOrderId();
        }

        return $id;
    }

    public static function sendMail($pdf, $emailFrom = null)
    {
        $email = \Config\Services::email();
        $email->setTo($emailFrom);

        $dataSeminarModel = new DataSeminarModel();
        $data = $dataSeminarModel->where('email', $emailFrom)->first();
        if (!$data) {
            return redirect()->to('seminar/daftar');
        }
        $price = $data['kategori'] == 'Reguler' ? 'Rp. 75.000' : 'Rp. 115.000';

        $transactionModel = new TransactionsModel();
        $transaction = $transactionModel->where('order_id', $data['order_id'])->first();

        $email->setSubject('Tiket Seminar Technology Euphoria');
        $email->setMessage(view('template/email-tiket', [
            'data' => $data,
            'transaction' => $transaction,
            'harga' => $price,
        ]));

        $email->attach($pdf, 'application/pdf', "Tiket Seminar Technology Euphoria 2023.pdf", false);
        $email->send();
    }

    public static function generateQRCode($data)
    {
        $qrCode = QrCode::create($data)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(250)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255, 127));

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        return $result->getDataUri();
    }

    public static function generatePdf($ticket, $download = false)
    {
        $filename = date('ymdHis') . '-seminar-techphoria';
        $dompdf = new Dompdf([
            'chroot' => FCPATH,
            'isHtml5ParserEnabled' => true,
        ]);

        $qrCode = self::generateQRCode($ticket);
        $dompdf->loadHtml(view('template/tiket', ['qrCode' => $qrCode]));
        $dompdf->setPaper([0, 0, 1500, 700]);
        $dompdf->render();

        if (!$download) {
            return $dompdf->output();
        }

        $dompdf->stream($filename);
    }

    public static function getUniqueTiket()
    {
        $ticket = bin2hex(random_bytes(3));
        $tiketModel = new TiketModel();
        $check = $tiketModel->where('ticket', $ticket)->first();

        if ($check) {
            return self::getUniqueTiket();
        }

        return $ticket;
    }
}