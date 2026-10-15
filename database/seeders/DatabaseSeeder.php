<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Barang;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
    {
        // Data Kategori sesuai LKS
        Kategori::create([
            'nama_kategori' => 'Komputer & Laptop',
            'deskripsi' => 'Perangkat komputer, laptop, dan aksesorisnya',
        ]);
        Kategori::create([
            'nama_kategori' => 'Perangkat Jaringan',
            'deskripsi' => 'Router, switch, access point, dan kabel jaringan',
        ]);
        Kategori::create([
            'nama_kategori' => 'Alat Perkabelan',
            'deskripsi' => 'Kabel, konektor, dan alat pendukung instalasi',
        ]);
        Kategori::create([
            'nama_kategori' => 'Multimedia',
            'deskripsi' => 'Proyektor, speaker, mikrofon, dan perangkat presentasi',
        ]);
    }
}
