<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSeminarModel extends Model
{
    protected $table = 'data_seminar';

    protected $primaryKey = 'username';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'username',
        'name',
        'phone',
        'email',
        'instansi',
        'domisili',
        'status',
        'kategori',
        'order_id',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}