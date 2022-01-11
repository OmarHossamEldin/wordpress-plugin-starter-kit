<?php

namespace Wordpress\Middlewares;

use Wordpress\Helpers\Header;
use Wordpress\Helpers\Redirect;

class VerifyAjaxRequest 
{
    public static function handel()
    {
        if(Header::checkHeaderContain('Content-Type', 'application/json') === false)
        {
            Redirect::to('/404');
        }
    }
}