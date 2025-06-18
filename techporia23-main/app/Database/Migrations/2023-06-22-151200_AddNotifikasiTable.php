<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNotifikasiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'notifikasi_id' => [
                'type'              => 'int',
                'unsigned'          => true,
                'unique'            => true,
                'auto_increment'    => true,
            ],
            'ketua' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'peminta' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'tim_id' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,            
            ],
            'status' => [
                'type'              => 'ENUM',
                'constraint'        => ['pending', 'confirmed', 'declined'],
                'default'           => 'pending',
            ],
        ]);
        $this->forge->addKey('notifikasi_id', true);
        $this->forge->addForeignKey('ketua', 'users', 'username');
        $this->forge->addForeignKey('peminta', 'users', 'username');
        $this->forge->addForeignKey('tim_id', 'data_tim', 'tim_id');
        $this->forge->createTable('notifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('notifikasi');
    }
}