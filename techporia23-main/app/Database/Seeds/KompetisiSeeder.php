<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KompetisiSeeder extends Seeder
{
    public function run()
    {
        $data = [
        ['id_kompetisi' => 1, 'nama_kompetisi' => 'Competitive Programming'],
        ['id_kompetisi' => 2, 'nama_kompetisi' => 'Web Development'],
        ['id_kompetisi' => 3, 'nama_kompetisi' => 'UI/UX Design'],
        ['id_kompetisi' => 4, 'nama_kompetisi' => 'Essay'],
        ['id_kompetisi' => 5, 'nama_kompetisi' => 'Business Plan'],
        ['id_kompetisi' => 6, 'nama_kompetisi' => 'Painting'], // Added Painting competition
        ['id_kompetisi' => 7, 'nama_kompetisi' => 'Dance Competition'],    // Added Dance competition
        ['id_kompetisi' => 8, 'nama_kompetisi' => 'Band/acoustic'],       ];

        $this->db->table('kompetisi')->insertBatch($data);
    }
}
