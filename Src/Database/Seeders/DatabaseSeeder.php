<?php

namespace Wordpress\Database\Seeders;


class DatabaseSeeder
{
    public function run()
    {
        $postSeeder = new PostsSeeder();
        $postSeeder->create();
    }
}
