<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recommendation;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recommendation::create([
            'game_id' => 1, // ID game Mobile Legends
            'category' => 'Game Terpopuler',
            'reason' => 'Game MOBA yang paling banyak dimainkan di Indonesia.',
        ]);

        // Tambahkan data rekomendasi lainnya di sini
    }
}