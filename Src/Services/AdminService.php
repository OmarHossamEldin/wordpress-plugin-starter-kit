<?php

namespace Wordpress\Services;

use Wordpress\Support\Facades\Router\Route;

class AdminService
{
    public static function initialize()
    {
        add_action('admin_menu', function () {
            add_menu_page(
                'posts',
                'posts',
                'manage_options',
                Route::execute('PostController@index'),
                'posts',
                plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
                110
            );
        });
    }
}
