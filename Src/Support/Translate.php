<?php

namespace Wordpress\Support;

class Translate
{
    public static function translate($fileName,$key)
    {
        $lang = Lang::get();
        $fileName = include(__DIR__ . "/../Langs/{$lang}/{$fileName}.php");
        return $fileName[$key];
    }
}