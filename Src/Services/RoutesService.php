<?php

namespace Wordpress\Services;

use Wordpress\Support\Route;

class RoutesService
{
    public function adminRoutes()
    {
        /* routes */
        Route::post('EventController@create');
        Route::delete('EventController@destroy');
        Route::update('EventController@update');
    }

    public function websiteRoutes()
    {
        /* routes */
        Route::get('EventController@index');
    }
}
