<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'notifikasi_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'notifikasi_id',
        'ketua',
        'peminta',
        'tim_id',
        'status',
    ];
}