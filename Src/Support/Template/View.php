<?php

namespace Wordpress\Support\Template;

class View
{
    private static $path = __DIR__ . '\\..\\..\\Resources\\Views\\';

    public static function render($file)
    {
        ob_start();
        include self::$path . $file;
        return (string) ob_get_clean();
    }
}
