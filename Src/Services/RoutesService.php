<?php

namespace Wordpress\Services;

use Wordpress\Support\Route\Route;

class RoutesService
{
    public function adminRoutes()
    {
        /* routes */
        Route::post('create', 'EventController@create');
        Route::delete('destroy', 'EventController@destroy');
        Route::put('update', 'EventController@update');
    }

    public function websiteRoutes()
    {
        /* routes */
        Route::execute('EventController@index');
    }
}
