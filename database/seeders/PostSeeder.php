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
        $userId = \App\Models\User::first()->id;

        \App\Models\Post::factory()->count(10)->create(['user_id' => $userId]);
    }
}
