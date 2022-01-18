<?php

namespace Wordpress\Services;

use Wordpress\Database\Seeders\DatabaseSeeder;
use Wordpress\Database\Migrations\PostsTable;

class InstallService
{

    /**
     * * it's migrate database tables  and create seeders when plugin installed
     */

    public static function  install()
    {
        flush_rewrite_rules();
        $postsTable = new PostsTable;
        $postsTable->up();

        // $runSeeder = new DatabaseSeeder;
        // $runSeeder->run();
    }

    public static function unInstall()
    {
        $postsTable = new PostsTable;
        $postsTable->down();
        flush_rewrite_rules();
    }
}
