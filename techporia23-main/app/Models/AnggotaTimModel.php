<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaTimModel extends Model
{
    protected $table = 'anggota_tim';
    protected $primaryKey = 'id_anggota';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_anggota',
        'tim_id',
        'anggota',
        'role',
    ];
}