<?php

namespace Wordpress\Support;

class Lang
{
    public static function get(?string $lang)
    {
        $lang ??=  'en';
        switch ($lang) {
            case 1:
                $lang = 'de';
                break;
            case 2:
                $lang = 'en';
                break;
            default:
                $lang = 'de';
        };
        return $lang;
    }
}
