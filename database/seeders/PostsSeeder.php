<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'user_id' => 1,
                'post' => 'Post 1'
            ],
            [
                'user_id' => 1,
                'post' => 'Post 2'
            ],
            [
                'user_id' => 1,
                'post' => 'Post 3'
            ],
            [
                'user_id' => 1,
                'post' => 'Post 4'
            ],
            [
                'user_id' => 1,
                'post' => 'Post 5'
            ],
            [
                'user_id' => 2,
                'post' => 'Post 6'
            ],
            [
                'user_id' => 2,
                'post' => 'Post 7'
            ],
        ];


        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
