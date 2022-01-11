<?php

namespace Wordpress\Support;

class RequestType 
{
    public static function get()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getNotEmpty()
    {
        return !empty($_GET);
    }
}