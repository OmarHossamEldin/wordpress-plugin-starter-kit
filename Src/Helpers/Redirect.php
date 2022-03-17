<?php

namespace Wordpress\PluginName\Helpers;

use Wordpress\PluginName\Support\Server\Server;

class Redirect
{
    public static function to($url)
    {
        header('Location:' . $url);
        exit;
    }

    public static function back()
    {
        $server = new Server();
        header("Location:$server->previousUrl");
        exit;
    }

    public static function homeWith($url)
    {
        $server = new Server(); 
        header("Location:$server->homeUrl $url");
        exit;
    }
}
