<?php

namespace Wordpress\PluginName\Helpers;

use Wordpress\PluginName\Support\Facades\Http\Header;

class Response
{
    public static function json($data, $statusCode = 200)
    {
        $header = new Header();
        $header->set('Content-Type', 'application/json; charset=utf-8')
        ->statusCode($statusCode);
        echo json_encode($data);
        exit;
    }
}
