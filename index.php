<?php
/*
Plugin Name: Tasks Plugin
Plugin URI: https://github.com/OmarHossamEldin/wordpress-starter-kit
Description: This is plugin designed to help users with their daily activities [it's for testing kit].
Version: 1.0.0
Author: OmarHossameldin
Author URI: https://www.linkedin.com/in/omar-hossameldin-kandil-74633a1bb/
License: MIT

*/
require_once __DIR__ . '/vendor/autoload.php';

//use Wordpress\Resources\Views\Shortcode;

use Wordpress\Support\Request;
use Wordpress\Support\Route\Route;


// add_action('admin_enqueue_scripts', array($this, 'enqueue'));


// activation 
register_activation_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'install']);

// deactivation
register_deactivation_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'deactivate']);

//uninstall
register_uninstall_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'uninstall']);


add_action('admin_menu', function () {
    add_menu_page('tasks', 'tasks', 'manage_options', 'tasks', function () {

        Route::get('tasks', 'TasksController@index');



        Route::resolve(Request::uri(), Request::type());
    }, 'dashicons-welcome-write-blog', 110);
});



add_action('test-test', function () {
    echo 'test';
});
add_filter("plugin_action_links_" . plugin_basename(__FILE__), function ($links) {
    $settings_link = '<a href="admin.php?page=tasks">Settings</a>';
    array_push($links, $settings_link);
    return $links;
});

add_action('init', function () {
    register_post_type('To-Do List', ['public' => true, 'label' => 'To-Do-List']);
});
