<?php

namespace Wordpress\PluginName\Database\Seeders;

use Wordpress\PluginName\Models\Post;
use Wordpress\PluginName\Support\Facades\Faker\Faker;

class PostsTableSeeder
{
    public function create()
    {
        $faker = new Faker();
        for ($i = 0; $i <= 7; $i++) {
            $post     = new Post();
            $faker->fakerImage->fake_image('posts', "picture$i.jpg");
            $post->create([
                'title' => 'title' . $i,
                'body' => 'body' . $i,
                'image_path' => "picture$i.jpg"
            ]);
        }
    }
}
