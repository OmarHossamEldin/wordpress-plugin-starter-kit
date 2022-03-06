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
        // move template

        // activate template

        // seed plugin pages with it's content

        // make directory for uploads

        // create tables
        flush_rewrite_rules();
        $postsTable = new PostsTable();
        $postsTable->up();

        // seed testing data
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
        // deactivate template

        // remove template

        // remove pages

        // remove upload folder

        // remove tables
        $postsTable = new PostsTable();
        $postsTable->down();
    }
}
