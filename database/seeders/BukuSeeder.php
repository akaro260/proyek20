<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bukus')->insert([
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => 2005,
                'isbn' => '9789793062792',
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Bumi',
                'penulis' => 'Tere Liye',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2014,
                'isbn' => '9786020332956',
                'stok' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2009,
                'isbn' => '9789792248616',
                'stok' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'penerbit' => 'Kompas',
                'tahun_terbit' => 2018,
                'isbn' => '9786024125189',
                'stok' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pulang',
                'penulis' => 'Tere Liye',
                'penerbit' => 'Republika',
                'tahun_terbit' => 2015,
                'isbn' => '9786020822129',
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2019,
                'isbn' => '9786020633176',
                'stok' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Dilan 1990',
                'penulis' => 'Pidi Baiq',
                'penerbit' => 'Pastel Books',
                'tahun_terbit' => 2014,
                'isbn' => '9786027870992',
                'stok' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Sang Pemimpi',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => 2006,
                'isbn' => '9789793062921',
                'stok' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Ronggeng Dukuh Paruk',
                'penulis' => 'Ahmad Tohari',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2003,
                'isbn' => '9789792230964',
                'stok' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Bicara Itu Ada Seninya',
                'penulis' => 'Oh Su Hyang',
                'penerbit' => 'Bhuana Ilmu Populer',
                'tahun_terbit' => 2018,
                'isbn' => '9786024553920',
                'stok' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
