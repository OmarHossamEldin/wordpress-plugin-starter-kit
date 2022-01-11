<?php

namespace Wordpress\Database\Migrations;

use Wordpress\Database\Initialization\Schema;
use Wordpress\Database\Initialization\Table;

class PostsTable  
{
    public function up()
    {
        $table =  new Table('posts');
        $table->id();
        $table->string('title');
        $table->string('body');
        $table->timestamps();
        $table->primaryKey('id');
        Schema::create($table);
    }

    public function down()
    {
        Schema::dropIfExistsdrop('posts');
    }
}
