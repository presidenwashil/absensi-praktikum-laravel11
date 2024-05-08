<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::insert([
            ['kode' => 'TI', 'nama' => 'Teknik Informatika', 'jenjang' => 'S1', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'SI', 'nama' => 'Sistem Informasi', 'jenjang' => 'S1', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'BD', 'nama' => 'Bisnis Digital', 'jenjang' => 'S1', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
