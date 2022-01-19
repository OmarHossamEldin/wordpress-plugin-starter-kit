<?php

namespace Wordpress\Support\Template;

class View
{
    private static $path = __DIR__ . '\\..\\..\\Resources\\Views\\';

    public static function render($file, $data)
    {
        extract($data);
        ob_start();
        include self::$path . $file . '.php';
        echo (string) ob_get_clean();
    }
}
