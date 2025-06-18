<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTransactionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'gross_amount' => [
                'type'              => 'int',
            ],
            'payment_type' => [
                'type'              => 'varchar',
                'constraint'        => 20,
                'null'              => true,
            ],
            'transaction_status' => [
                'type'              => 'varchar',
                'constraint'        => 20,
                'null'              => true,
            ],
            'transaction_time' => [
                'type'              => 'datetime',
                'null'              => true,
            ],
            'expiry_time' => [
                'type'              => 'datetime',
                'null'              => true,
            ],
            'snap_token' => [
                'type'              => 'varchar',
                'constraint'        => 100,
            ],
            'transaction_id' => [
                'type'              => 'varchar',
                'constraint'        => 100,
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('order_id', true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}