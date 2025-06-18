<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasModel extends Model
{
    protected $table = 'berkas';
    protected $primaryKey = 'berkas_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'berkas_id',
        'tim_id',
        'berkas',
        'jenis',
        'created_at',
    ];
}