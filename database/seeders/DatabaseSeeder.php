<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Follow;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!$user = User::first()){
            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        Follow::factory()->count(1000)->create([
            'user_id' => $user->id
        ]);

        Post::factory()->count(10)->create(['user_id' => $user->id])->each(function($post) {
            Comment::factory()->count(10)->create([
                'post_id' => $post->id
            ]);
        });
        
    }
}
