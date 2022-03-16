<?php

namespace Wordpress\Database\Migrations;

use Wordpress\Database\Initialization\Migration;

class DatabaseMigration extends Migration
{
    public function run_up()
    {
        $this->call([
            PostsTable::class
        ], 'up');
    }

    public function run_down()
    {
        $this->call([
            PostsTable::class
        ], 'down');
    }
}
