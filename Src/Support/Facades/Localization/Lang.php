<?php

namespace Wordpress\Support\Facades\Localization;

class Lang
{
    public static function get(): string
    {
        $lang =  2;

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
