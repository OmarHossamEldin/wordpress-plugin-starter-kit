<?php

namespace Wordpress\Middlewares;

use Wordpress\Helpers\Redirect;
use Wordpress\Support\Facades\Http\Header;

class VerifyAjaxRequest
{
    public static function handle()
    {
        if (!(Header::has('Content-Type') && Header::get('Content-Type') === 'application/json')) {
            Redirect::to('/404');
        }
    }     
}
