<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recommendation;

class RecommendationSeeder extends Seeder
{
    public function run()
    {
        Recommendation::create([
            'game_id' => 1, // Ganti dengan ID game yang sesuai
            'category' => 'Game Terbaik Bulan Ini',
            'reason' => 'Game dengan gameplay yang adiktif dan grafis yang memukau.',
        ]);

        Recommendation::create([
            'game_id' => 2, // Ganti dengan ID game yang sesuai
            'category' => 'Game yang Harus Dimainkan',
            'reason' => 'Game dengan cerita yang menarik dan karakter yang kuat.',
        ]);

        // Tambahkan data rekomendasi lainnya di sini
    }
}