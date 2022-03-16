<?php

namespace Wordpress\PluginName\Database\Seeders;

use Wordpress\PluginName\Database\Initialization\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PostsTableSeeder::class
        ]);
    }
}
