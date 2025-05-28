<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AdminSeeder::class);
        $this->call(OrmawaSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(SatuanSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(PermohonanSeeder::class);
    }
}
