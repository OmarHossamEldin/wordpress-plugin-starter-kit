<?php

namespace Wordpress\PluginName\Middlewares;

use Wordpress\PluginName\Helpers\Redirect;
use Wordpress\PluginName\Support\Facades\Http\Header;

class VerifyAjaxRequest
{
    public static function handle()
    {
        if (!(Header::has('Content-Type') && Header::get('Content-Type') === 'application/json')) {
            Redirect::to('/404');
        }
    }     
}
