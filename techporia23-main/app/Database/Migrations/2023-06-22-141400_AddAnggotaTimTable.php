<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAnggotaTimTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_anggota' => [
                'type'          => 'INT',
                'unsigned'      => true,
                'unique'        => true,
                'auto_increment'=> true,
            ],
            'tim_id' => [
                'type'          => 'VARCHAR',
                'constraint'    => 6,
            ],
            'anggota' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'role' => [
                'type'          => 'ENUM',
                'constraint'    => ['ketua', 'anggota'],
            ],
        ]);
        $this->forge->addKey('id_anggota', true);
        $this->forge->addForeignKey('tim_id', 'data_tim', 'tim_id');
        $this->forge->addForeignKey('anggota', 'users', 'username');
        $this->forge->createTable('anggota_tim');
    }

    public function down()
    {
        $this->forge->dropTable('anggota_tim');
    }
}