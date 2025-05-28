<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stocks = [
            ['stock' => 10, 'barang_id' => 1], // Mikroskop
            ['stock' => 5, 'barang_id' => 2], // Laptop
            ['stock' => 15, 'barang_id' => 3], // Bola Basket
            ['stock' => 8, 'barang_id' => 4], // Proyektor
            ['stock' => 20, 'barang_id' => 5], // Whiteboard Marker
            ['stock' => 3, 'barang_id' => 6], // Gitar Akustik
            ['stock' => 0, 'barang_id' => 7], // Meja Lipat
        ];

        $data = array_map(function ($item) {
            return [
                'stock' => $item['stock'],
                'barang_id' => $item['barang_id'],
                'status_barang' => ($item['stock'] > 0) ? 'Tersedia' : 'Tidak Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $stocks);

        DB::table('stocks')->insert($data);
    }
}
