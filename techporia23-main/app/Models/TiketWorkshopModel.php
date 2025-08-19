<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketWorkshopModel extends Model
{
    protected $table            = 'tiket_workshop';
    protected $primaryKey       = 'order_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'order_id', 'username', 'ticket', 'created_at'
    ];
}
