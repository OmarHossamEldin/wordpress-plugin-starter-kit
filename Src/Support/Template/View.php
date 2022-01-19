<?php

namespace Wordpress\Support\Template;

class View
{
    private static $path = __DIR__ . '\\..\\..\\Resources\\Views\\';

    public static function render($file)
    {
        ob_end_flush();
        include  (string) self::$path . $file;
        ob_get_clean();
    }
}
