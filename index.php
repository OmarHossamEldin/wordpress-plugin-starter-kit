<?php
/*
Plugin Name: To-do-List Plugin
Plugin URI: http://todolistPlugin.com
Description: This is plugin designed to help users with their daily activities.
Version: 1.0.0
Author: M.Hassan
Author URI: http://yourdomain.com
License: GPLv2 or later 

*/
require_once __DIR__ . '/vendor/autoload.php';

//use Wordpress\Resources\Views\Shortcode;

use Wordpress\Support\Request;
use Wordpress\Support\Route\Route;


// add_action('admin_enqueue_scripts', array($this, 'enqueue'));

// condation method called should be static
// activation 
register_activation_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'install']);

// deactivation
register_deactivation_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'deactivate']);

//uninstall
register_uninstall_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'uninstall']);


add_action('admin_menu', function () {
    add_menu_page('To-Do-List', 'To-Do-List', 'manage_options', 'tasks', function () {

        Route::get('tasks', 'TasksController@index');



        Route::resolve(Request::uri(), Request::type());
    }, 'dashicons-welcome-write-blog', 110);
});
add_action('admin_menu', function () {
    add_menu_page('To-Do-List', 'To-Do-List', 'manage_options', 'taskscreate', function () {

        Route::post('taskscreate', 'TasksController@create');
        Route::delete('destroy', 'TasksController@destroy');



        Route::resolve(Request::uri(), Request::type());
    }, 'dashicons-welcome-write-blog', 110);
});



add_filter("plugin_action_links_" . plugin_basename(__FILE__), function ($links) {
    $settings_link = '<a href="admin.php?page=tasks">Settings</a>';
    array_push($links, $settings_link);
    return $links;
});

add_action('init', function () {
    register_post_type('To-Do List', ['public' => true, 'label' => 'To-Do-List']);
});
