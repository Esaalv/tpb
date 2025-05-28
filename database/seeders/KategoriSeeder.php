<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Peralatan Laboratorium', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Peralatan Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Peralatan Olahraga', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Buku dan Modul', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Peralatan Kebersihan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Peralatan Seni dan Musik', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Alat Tulis Kantor', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Peralatan Acara dan Seminar', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
