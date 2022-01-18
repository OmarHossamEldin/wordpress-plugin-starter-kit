<?php

namespace Wordpress\Support;

class Request
{
    public static function type()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function uri()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
