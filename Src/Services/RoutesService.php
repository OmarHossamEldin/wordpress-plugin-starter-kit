<?php

namespace Wordpress\Services;

use Wordpress\Support\Request;
use Wordpress\Support\Route\Route;

class RoutesService
{
    public function adminRoutes()
    {
        /* routes */
        Route::post('create', 'PostController@create');
        Route::delete('destroy', 'PostController@destroy');
        Route::put('update', 'PostController@update');

        Route::get('request','TasksController@index');
        Route::post('create', 'TasksController@create');
        Route::delete('destroy', 'TasksController@destroy');
        Route::put('update', 'TasksController@update');

        Route::resolve(Request::uri(), Request::type());
    }

    public function websiteRoutes()
    {
        /* routes */
        Route::execute('PostController@index');
    }
}
