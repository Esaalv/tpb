<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permohonans')->insert([
            [
                'unit_kerja' => 'Himpunan Mahasiswa Teknik',
                'nama_kegiatan' => 'Seminar Teknologi AI',
                'hari_atau_tanggal' => Carbon::now(),
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '12:00:00',
                'mahasiswa_id' => 1, // Pastikan ada di tabel ormawas
                'phone' => '081234567890',
                'barang_id' => 1, // Pastikan ada di tabel barangs
                'jumlah' => 2,
                'status' => 'Menunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit_kerja' => 'BEM Fakultas Ekonomi',
                'nama_kegiatan' => 'Workshop Kewirausahaan',
                'hari_atau_tanggal' => Carbon::now()->addDays(3),
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '14:00:00',
                'mahasiswa_id' => 2,
                'phone' => '081298765432',
                'barang_id' => 2,
                'jumlah' => 2,
                'status' => 'Menunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
