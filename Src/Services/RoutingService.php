<?php

namespace Wordpress\PluginName\Services;

use Wordpress\PluginName\Support\Facades\Http\Request;
use Wordpress\PluginName\Support\Facades\Router\Route;

class RoutingService
{
    public static function initialize()
    {
        add_action('rest_api_init', function () {
            Route::get('/posts', 'RestApi\PostsController@index');
            Route::get('/posts/{id}', 'RestApi\PostsController@show');
            Route::put('/posts/{id}', 'RestApi\PostsController@update');
            Route::delete('/posts/{id}', 'RestApi\PostsController@destroy');

            Route::resolveApi(Request::uri(), Request::type());
        });
    }
}
