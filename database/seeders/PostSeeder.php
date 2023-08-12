<?php

namespace Database\Seeders;

use App\Models\{
  Category,
  Comment,
  Post,
};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([ 'name' => 'Tutorial' ]);
        Category::create([ 'name' => 'Learn' ]);

        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'category_id' => mt_rand(1,2),
                'user_id' => 1,
                'title' => fake()->name(),
                'body' => fake()->paragraph(2),
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Comment::create([
                'user_id' => 1,
                'post_id' => mt_rand(1, 10),
                'body' => fake()->sentence(),
            ]);
        }
    }
}
