<?php

namespace Wordpress\Services;

use Wordpress\Support\Facades\Filesystem\DirectoryComposer;
use Wordpress\Support\Facades\Filesystem\DirectoryMaker;
use Wordpress\Database\Migrations\DatabaseMigration;
use Wordpress\Support\Facades\Filesystem\Storage;
use Wordpress\Database\Seeders\DatabaseSeeder;
use Wordpress\Models\Option;

class InitializationService
{

    /**
     * * it's migrate database tables  and create seeders when plugin installed
     */
    public static function  install()
    {
        flush_rewrite_rules();

        $directoryMaker =  new DirectoryMaker();
        $directoryComposer = new DirectoryComposer();
        $storage = new Storage();
        // move template
        $storage->move_template('PostsThemeTemplate');
        // activate template
        $option = new Option();
        $option->update(['option_value' => 'PostsThemeTemplate'], ['option_name' => 'template']);
        $option->update(['option_value' => 'PostsThemeTemplate'], ['option_name' => 'stylesheet']);

        // seed plugin pages with it's content

        // make Directory for uploads
        $directory = $directoryComposer->uploadPath['basedir'] . '/' . $directoryComposer::PLUGIN_NAME_DIR;
        $directoryMaker->make_directory($directory);
   
        $databaseMigration = new DatabaseMigration();
        $databaseMigration->run_up();

        $databaseSeeder = new DatabaseSeeder();
        $databaseSeeder->run();
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
        $databaseMigration = new DatabaseMigration();
        $databaseMigration->run_down();
    }
}
