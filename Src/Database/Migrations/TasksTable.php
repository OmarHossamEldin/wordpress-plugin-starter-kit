<?php

namespace Wordpress\Database\Migrations;

use Wordpress\Database\Initialization\Schema;
use Wordpress\Database\Initialization\Table;

class TasksTable  
{
    public function up()
    {
        $table =  new Table('tasks');
        $table->id('id');
        $table->string('task');
        $table->string('fromdate');
        $table->string('todate');
        $table->timestamps();
        $table->primaryKey('id');
        Schema::create($table);
    }

    public function down()
    {
        Schema::dropIfExistsdrop('tasks');
    }
}
