<?php

namespace App\Models;

use CodeIgniter\Model;

class DataTimModel extends Model
{
    protected $table = 'data_tim';
    protected $primaryKey = 'tim_id';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'tim_id',
        'nama_tim',
        'id_kompetisi',
        'order_id',
        'status',
    ];
}
