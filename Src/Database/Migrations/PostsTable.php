<?php

namespace Wordpress\Database\Migrations;

use Wordpress\Database\Initialization\Schema;
use Wordpress\Database\Initialization\Table;

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
