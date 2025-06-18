<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserDataTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'unique'        => true,
            ],
            'nim' => [
                'type'          => 'VARCHAR',
                'constraint'    => 20,
            ],
            'nama' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'universitas' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'kontak' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'kpm' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
        ]);
        $this->forge->addKey('username', true);
        $this->forge->addForeignKey('username', 'users', 'username');
        $this->forge->createTable('user_data');
    }

    public function down()
    {
        $this->forge->dropTable('user_data');
    }
}