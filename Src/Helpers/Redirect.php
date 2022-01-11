<?php

namespace Wordpress\Helpers;

class Redirect
{
    protected $previous_url;
    public static function to($url)
    {
        header('Location:' . $url);
        exit();
    }

    public static function back()
    {

        $previous_url = $_SERVER['HTTP_REFERER'];
        header('Location:' . $previous_url);
        exit();
    }
}
