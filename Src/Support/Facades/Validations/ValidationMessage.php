<?php

namespace Wordpress\Support\Facades\Validations;

use Wordpress\Support\Facades\Localization\Lang;

class ValidationMessage
{
    public static function get($key)
    {
        $lang = Lang::get();
        $messages = include(__DIR__ . "/../Langs/{$lang}/validations.php");
        return $messages[$key];
    }
}