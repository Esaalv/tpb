<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Mikroskop',
                'foto' => null,
                'kategori_id' => 1, // Peralatan Laboratorium
                'satuan_id' => 1, // Unit
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Laptop',
                'foto' => null,
                'kategori_id' => 2, // Peralatan Elektronik
                'satuan_id' => 1, // Unit
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Bola Basket',
                'foto' => null,
                'kategori_id' => 3, // Peralatan Olahraga
                'satuan_id' => 2, // Buah
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Proyektor',
                'foto' => null,
                'kategori_id' => 2, // Peralatan Elektronik
                'satuan_id' => 1, // Unit
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Whiteboard Marker',
                'foto' => null,
                'kategori_id' => 7, // Alat Tulis Kantor
                'satuan_id' => 3, // Pack
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Gitar Akustik',
                'foto' => null,
                'kategori_id' => 6, // Peralatan Seni dan Musik
                'satuan_id' => 1, // Unit
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Meja Lipat',
                'foto' => null,
                'kategori_id' => 8, // Peralatan Acara dan Seminar
                'satuan_id' => 1, // Unit
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
