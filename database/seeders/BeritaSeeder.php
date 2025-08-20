<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::create([
"judul" => "Berita Pertama",
"isi" => "Ini Berita 1",
"penulis" => "satu",

        ]);

        Berita::create([
            "judul" => "Berita Kedua",
            "isi" => "Ini Berita 2",
            "penulis" => "dua",
        ]);
    }
}