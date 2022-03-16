<?php

namespace Wordpress\Database\Seeders;

use Wordpress\Database\Initialization\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PostsTableSeeder::class
        ]);
    }
}
