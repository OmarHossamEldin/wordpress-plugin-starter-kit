<?php

namespace Wordpress\PluginName\Database\Migrations;

use Wordpress\PluginName\Database\Initialization\Migration;

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
