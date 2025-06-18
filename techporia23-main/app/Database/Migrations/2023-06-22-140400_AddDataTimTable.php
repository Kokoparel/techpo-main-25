<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDataTimTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tim_id' => [
                'type'          => 'VARCHAR',
                'constraint'    => 6,
                'unique'        => true,
            ],
            'nama_tim' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'unique'        => true,
            ],
            'id_kompetisi' => [
                'type'          => 'INT',
                'unsigned'      => true,
            ],
            'order_id' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'status' => [
                'type'          => 'ENUM',
                'constraint'    => ['verified', 'rejected', 'on_review'],
                'default'       => 'on_review',
            ],
        ]);
        $this->forge->addKey('tim_id', true);
        $this->forge->addForeignKey('id_kompetisi', 'kompetisi', 'id_kompetisi');
        $this->forge->createTable('data_tim');
    }

    public function down()
    {
        $this->forge->dropTable('data_tim');
    }
}