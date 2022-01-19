<?php

namespace Wordpress\Support;

class Session
{
    public function __construct()
    {
        if (!!session_status() === false) {
            session_start();
        }
    }

    public function setSesstion($key, $value)
    {
        return $_SESSION[$key][] = $value;
    }

    public function refreshSession()
    {
        session_unset();
    }
}
