<?php

namespace Wordpress\PluginName\Database\Migrations;

use Wordpress\PluginName\Database\Initialization\Schema;
use Wordpress\PluginName\Database\Initialization\Table;

class PostsTable
{
    public function up()
    {
        Schema::create('posts', function (Table $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
