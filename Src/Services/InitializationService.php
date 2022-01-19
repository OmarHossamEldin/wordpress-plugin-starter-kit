<?php

namespace Wordpress\Services;

use Wordpress\Database\Migrations\TasksTable;

class InitializationService
{

    /**
     * * it's migrate database tables  and create seeders when plugin installed
     */

    public static function  install()
    {
        flush_rewrite_rules();
        $tasksTable = new TasksTable;
        $tasksTable->up();

        // $post = new WpPost;
        // $post->create(['post_title'=>'post',
        // 'post_content'=>'post']);
    }

    /**
     * This function deactivate the plugin
     */
    public static function deactivate()
	{
		flush_rewrite_rules();
	}

        // $runSeeder = new DatabaseSeeder;
        // $runSeeder->run();
    
    /**
     * This function to uninstall the plugin
     */
    public static function uninstall()
    {
        $tasksTable = new TasksTable;
        $tasksTable->down();
    }

    


}


// $wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'Items'");
// $wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id From wp_posts)");
// $wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id From wp_posts)");