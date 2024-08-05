<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i++){
            \App\Models\Post::create([
                'title' => 'Post Title ' . $i,
                'content' => 'Post Content ' . $i,
                'date' => now(),
                'iduser' => 2,
            ]);
        }
    }
}
