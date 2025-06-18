<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKompetisiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kompetisi' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'unique'            => true,
                'auto_increment'    => true,
            ],
            'nama_kompetisi' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'unique'            => true,
            ],
        ]);
        $this->forge->addKey('id_kompetisi', true);
        $this->forge->createTable('kompetisi');
    }

    public function down()
    {
        $this->forge->dropTable('kompetisi');
    }
}