<?php

namespace Wordpress\PluginName\Services;

use Wordpress\PluginName\Support\Facades\Router\Route;
use Wordpress\PluginName\Support\Facades\Template\Asset;

class AdminService
{
    public static function initialize()
    {
        // register Admin assets
        add_action('admin_enqueue_scripts', fn () => Asset::register_assets());

        add_action('admin_menu', function () {
            add_menu_page(
                'posts',
                'posts',
                'manage_options',
                'posts',
                fn () => Route::execute('PostsController@index'),
                'dashicons-welcome-write-blog',
                110
            );
        });
    }
}
