<?php

namespace Wordpress\Services;

use Wordpress\Database\Seeders\DatabaseSeeder;
use Wordpress\Database\Migrations\PostsTable;

class InitializationService
{

    /**
     * * it's migrate database tables  and create seeders when plugin installed
     */
    public static function  install()
    {
        flush_rewrite_rules();
        $postsTable = new PostsTable();
        $postsTable->up();

        $runSeeder = new DatabaseSeeder();
        $runSeeder->run();
        
    }

    /**
     * This function deactivate the plugin
     */
    public static function deactivate()
    {
        flush_rewrite_rules();
    }

    /**
     * This function to uninstall the plugin
     */
    public static function uninstall()
    {
        $postsTable = new PostsTable();
        $postsTable->down();
    }
}
