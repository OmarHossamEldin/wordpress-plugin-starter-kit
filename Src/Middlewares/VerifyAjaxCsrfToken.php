<?php

namespace Wordpress\Middlewares;

use Wordpress\Support\Facades\Authentication\CsrfAuthentication;

use Wordpress\Support\Facades\Http\Request;
use Wordpress\Support\Facades\Http\Header;
use Wordpress\Helpers\Response;

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
