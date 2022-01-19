<?php

namespace Wordpress\Validations;

use Wordpress\Support\Lang;

class ValidationMessage
{
    public static function get($key)
    {
        $lang = Lang::get('en');
        $messages = include(__DIR__ . "/../Langs/{$lang}/validations.php");
        return $messages[$key];
    }
}