<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTiketSeminarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'username' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'ticket' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'created_at' => [
                'type'              => 'datetime',
            ],
        ]);
        $this->forge->addKey('order_id', true);
        $this->forge->addForeignKey('order_id', 'transactions', 'order_id');
        $this->forge->addForeignKey('username', 'users', 'username');
        $this->forge->createTable('tiket_seminar');
    }

    public function down()
    {
        $this->forge->dropTable('tiket_seminar');
    }
}