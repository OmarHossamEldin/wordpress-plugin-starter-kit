<?php

namespace Wordpress\Database\Seeders;

use Wordpress\Database\Seeders\EventSeeder;

class DatabaseSeeder
{

    public function run()
    {
        $seedEvents = new EventSeeder;
        $seedEvents->createEvent(); 
    }
}
