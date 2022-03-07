<?php

namespace Wordpress\Database\Seeders;


class DatabaseSeeder
{
    public function run()
    {
        $postTableSeeder = new PostsTableSeeder();
        $postTableSeeder->create();
    }
}
