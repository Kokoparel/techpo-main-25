<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDataSeminarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'name' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'phone' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'email' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'instansi' => [
                'type'              => 'varchar',
                'constraint'        => 100,
                'null'              => true,
            ],
            'domisili' => [
                'type'              => 'varchar',
                'constraint'        => 100,
                'null'              => true,
            ],
            'status' => [
                'type'              => 'enum',
                'constraint'        => ['Mahasiswa', 'Siswa', 'Lainnya'],
                'default'           => 'Lainnya',
            ],
            'kategori' => [
                'type'              => 'enum',
                'constraint'        => ['Reguler', 'VIP'],
            ],
            'order_id' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'created_at' => [
                'type'              => 'datetime',
            ],
            'updated_at' => [
                'type'              => 'datetime',
            ],
        ]);
        $this->forge->addKey('username', true);
        $this->forge->addForeignKey('username', 'users', 'username');
        $this->forge->createTable('data_seminar');
    }

    public function down()
    {
        $this->forge->dropTable('data_seminar');
    }
}