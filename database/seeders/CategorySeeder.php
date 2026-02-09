<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            [
                'nama_kategori' => 'Teknologi',
                'deskripsi' => 'Buku tentang perkembanngan teknologi informasi di bidang pemrograman komputer'
            ],
            [
                'nama_kategori' => 'Sains',
                'deskripsi' => 'Buku yang membahas ilmu pengetahuan alam dan penerapannya'
            ],
            [
                'nama_kategori' => 'Sastra',
                'deskripsi' => 'Kumpulan karya sastra seperti novel, puisi, dan cerpen'
            ],
        ]);
    }
}
