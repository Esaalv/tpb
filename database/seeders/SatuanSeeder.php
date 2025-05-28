<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuans')->insert([
            ['nama_satuan' => 'Unit', 'created_at' => now(), 'updated_at' => now()],
            ['nama_satuan' => 'Set', 'created_at' => now(), 'updated_at' => now()],
            ['nama_satuan' => 'Buah', 'created_at' => now(), 'updated_at' => now()],
            ['nama_satuan' => 'Lembar', 'created_at' => now(), 'updated_at' => now()],
            ['nama_satuan' => 'Paket', 'created_at' => now(), 'updated_at' => now()],
            ['nama_satuan' => 'Dus', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
