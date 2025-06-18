<?php

namespace App\Models;

use CodeIgniter\Model;

class KompetisiModel extends Model
{
    protected $table = 'kompetisi';
    protected $primaryKey = 'id_kompetisi';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_kompetisi',
        'nama_kompetisi',
    ];
}