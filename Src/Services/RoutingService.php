<?php

namespace Wordpress\Services;

use Wordpress\Support\Facades\Http\Request;
use Wordpress\Support\Facades\Router\Route;

class RoutingService
{
    public static function initialize()
    {
        add_action('rest_api_init', function () {
            Route::get('plugin/v1/posts', 'RestApiController@index');
            Route::get('plugin/v1/posts/{id}', 'RestApiController@show');
            Route::put('plugin/v1/posts/{id}', 'RestApiController@update');
            Route::delete('plugin/v1/posts/{id}', 'RestApiController@destroy');
            
            Route::resolveApi(Request::uri(), Request::type());
        });
    }
}
