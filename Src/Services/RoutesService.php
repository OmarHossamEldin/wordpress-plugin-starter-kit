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

        Route::resolve(Request::uri(), Request::type());
    }

    public function websiteRoutes()
    {
        /* routes */
        Route::execute('PostController@index');
    }
}
