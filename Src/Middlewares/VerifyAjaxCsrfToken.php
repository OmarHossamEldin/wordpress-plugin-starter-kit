<?php

namespace Wordpress\PluginName\Middlewares;

use Wordpress\PluginName\Support\Facades\Authentication\CsrfAuthentication;

use Wordpress\PluginName\Support\Facades\Http\Request;
use Wordpress\PluginName\Support\Facades\Http\Header;
use Wordpress\PluginName\Helpers\Response;

class VerifyAjaxCsrfToken
{
    public static function handle()
    {
        if ((Request::type() === 'POST') || (Request::type() === 'PUT') || (Request::type() === 'DELETE')) {
            if (!(Header::has('wp_artisan_token') && CsrfAuthentication::validate_token(Header::get('wp_artisan_token')))) {
                return Response::json([
                    'message' => 'unauthenticated',
                ], 403);
            }
        }
    }
}
