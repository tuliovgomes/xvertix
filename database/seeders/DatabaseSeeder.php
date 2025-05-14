<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();
        $userId = User::first()->id;
        if(!$userId){
            $userId = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ])->id;
        }

        Post::factory()->count(10)->create(['user_id' => $userId]);
    }
}
