<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $table = 'tiket_seminar';
    protected $primaryKey = 'order_id';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'order_id',
        'username',
        'ticket',
        'created_at',
    ];
}