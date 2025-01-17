<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Comment::factory(10)->create();

        \App\Models\Comment::factory()->create([
    
            'name'            => 'Test Comment',
            'Comment Content' => 'This is a test comment content.',
            'Date'            => now(),
        ]);
    }
}
