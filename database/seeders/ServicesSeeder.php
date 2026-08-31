<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Review;
use App\Models\User;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Produk Kantin
        Product::create([
            'name' => 'Nasi Goreng Special',
            'description' => 'Nasi goreng dengan telur, ayam suwir, dan kerupuk.',
            'price' => 15000,
            'stock' => 25,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Mie Ayam Bakso',
            'description' => 'Mie ayam pangsit dengan 2 bakso sapi manis gurih.',
            'price' => 12000,
            'stock' => 15,
            'status' => 'available',
        ]);

        Product::create([
            'name' => 'Es Teh Manis',
            'description' => 'Es teh segar melati.',
            'price' => 4000,
            'stock' => 50,
            'status' => 'available',
        ]);

        // Ambil user pertama dari database Sabil/Domain A (jika ada) untuk mengisi Q&A/Review dummy
        $user = User::first();

        if ($user) {
            // 2. Seed Q&A
            $question = Question::create([
                'user_id' => $user->id,
                'title' => 'Jam Operasional Perpustakaan Sekolah?',
                'content' => 'Halo admin, ingin bertanya jam berapa perpustakaan buka selama ujian nasional?',
            ]);

            Answer::create([
                'question_id' => $question->id,
                'user_id' => $user->id,
                'content' => 'Perpustakaan buka seperti biasa dari jam 07.00 - 15.30 WIB.',
            ]);

            // 3. Seed Review
            Review::create([
                'user_id' => $user->id,
                'rating' => 5,
                'comment' => 'Fasilitas sekolah dan pelayanan kantin sangat bersih dan cepat!',
            ]);
        }
    }
}