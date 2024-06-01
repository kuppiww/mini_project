<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Posts;

class PostSeeder extends Seeder
{
    public function run()
    {
        Posts::create([
            'content' => 'This is a sample post',
            'image_url' => 'images/sample-image.jpg',
            'user_id' => 1
        ]);
    }
}
