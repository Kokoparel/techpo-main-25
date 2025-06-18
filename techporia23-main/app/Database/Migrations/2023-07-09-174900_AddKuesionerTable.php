<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKuesionerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'int',
                'unsigned'          => true,
                'unique'            => true,
                'auto_increment'    => true,
            ],
            'username' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'jawaban' => [
                'type'              => 'text',
            ],
            'tanggal_jawab' => [
                'type'              => 'datetime',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('username', 'users', 'username');
        $this->forge->createTable('kuesioner');
    }

    public function down()
    {
        $this->forge->dropTable('kuesioner');
    }
}