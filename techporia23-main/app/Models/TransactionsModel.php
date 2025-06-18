<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $table = 'transactions';

    protected $primaryKey = 'order_id';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'order_id',
        'gross_amount',
        'payment_type',
        'transaction_status',
        'transaction_time',
        'expiry_time',
        'snap_token',
        'transaction_id',
    ];
}