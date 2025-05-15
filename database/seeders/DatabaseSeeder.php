<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!User::first()){
            $userId = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ])->id;
        }

        Post::factory()->count(10)->create(['user_id' => $userId]);
        Comment::factory()->count(10)->create();
    }
}
