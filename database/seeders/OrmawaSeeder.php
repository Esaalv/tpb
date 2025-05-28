<?php

namespace Database\Seeders;

use App\Models\Ormawa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ormawa::create([
            'name' => 'Esa',
            'nim' => '1234567',
            'organisasi' => 'Himasi',
            'password' => Hash::make('password'),
        ]);

        Ormawa::create([
            'name' => 'deco',
            'nim' => '2307099',
            'organisasi' => 'Himarpl',
            'password' => Hash::make('password'),
        ]);
    }
}
