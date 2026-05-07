<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Teknologi', 'slug' => 'teknologi'],
            ['name' => 'Ilustrasi', 'slug' => 'ilustrasi'],
            ['name' => 'Fotografi', 'slug' => 'fotografi'],
        ];

        foreach ($categories as $cat) {
            $category = Category::updateOrCreate(['slug' => $cat['slug']], $cat);

            if ($cat['slug'] === 'teknologi') {
                Article::updateOrCreate(
                    ['slug' => 'masa-depan-ai-dalam-pemrograman'],
                    [
                        'category_id' => $category->id,
                        'title' => 'Masa Depan AI dalam Pemrograman',
                        'content' => '<p>Kecerdasan Buatan (AI) telah mengubah cara kita menulis kode. Dengan adanya tool seperti GitHub Copilot dan model bahasa besar, produktivitas pengembang meningkat drastis. Namun, apakah AI akan menggantikan peran manusia sepenuhnya? Tentu tidak. AI adalah asisten, bukan pengganti kreativitas manusia.</p>',
                        'status' => 'published',
                        'published_at' => now(),
                    ]
                );
            } elseif ($cat['slug'] === 'ilustrasi') {
                Article::updateOrCreate(
                    ['slug' => 'tips-membuat-ilustrasi-digital'],
                    [
                        'category_id' => $category->id,
                        'title' => 'Tips Membuat Ilustrasi Digital yang Menarik',
                        'content' => '<p>Ilustrasi digital membutuhkan pemahaman tentang komposisi, warna, dan pencahayaan. Gunakan layer secara efektif dan jangan takut untuk bereksperimen dengan berbagai brush. Konsistensi adalah kunci utama dalam menemukan gaya unik Anda sendiri.</p>',
                        'status' => 'published',
                        'published_at' => now(),
                    ]
                );
            } elseif ($cat['slug'] === 'fotografi') {
                Article::updateOrCreate(
                    ['slug' => 'seni-fotografi-malam-hari'],
                    [
                        'category_id' => $category->id,
                        'title' => 'Seni Fotografi di Malam Hari',
                        'content' => '<p>Fotografi malam hari memberikan tantangan tersendiri dengan kondisi cahaya yang minim. Penggunaan tripod dan pengaturan shutter speed yang lambat sangat diperlukan untuk menangkap cahaya dengan detail tanpa adanya noise yang mengganggu.</p>',
                        'status' => 'published',
                        'published_at' => now(),
                    ]
                );
            }
        }
    }
}
