<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDataModel extends Model
{
    protected $table = 'user_data';
    protected $primaryKey = 'username';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'username',
        'nim',
        'nama',
        'universitas',
        'kontak',
        'kpm',
    ];
}