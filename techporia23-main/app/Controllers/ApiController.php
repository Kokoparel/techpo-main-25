<?php

namespace App\Controllers;

use App\Models\TransactionsModel;
use \Midtrans\Config;
use Midtrans\Notification;

class ApiController extends BaseController
{
    public function __construct()
    {
        Config::$serverKey = getenv('SERVER_KEY');
        Config::$clientKey = getenv('CLIENT_KEY');
        Config::$isProduction = false;
    }

    public function notificationHandler()
    {
        $notif = new Notification();
        
        $notif = $notif->getResponse();
        $status = $notif->status_code;
        $orderId = $notif->order_id;
        $grossAmount = $notif->gross_amount;

        $signature = $orderId.$status.$grossAmount.getenv('SERVER_KEY');
        $signatureHashed = hash('sha512', $signature);
        if ($notif->signature_key != $signatureHashed) {
            return;
        }

        $transactionData = [
            'order_id' => $orderId,
            'payment_type' => $notif->payment_type,
            'transaction_status' => $notif->transaction_status,
            'transaction_time' => $notif->transaction_time,
            'expiry_time' => $notif->expiry_time,
            'transaction_id' => $notif->transaction_id,
        ];

        $transactionsModel = new TransactionsModel();
        $transactionsModel->save($transactionData);
    }
}