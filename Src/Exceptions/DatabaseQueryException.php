<?php

namespace Wordpress\Exceptions;

use Wordpress\Exceptions\Debugger;

class DatabaseQueryException extends \Exception
{
    protected $message = "database query exception";

    public function __construct()
    {
        $debugger = new Debugger();
        $debugger->log($this->message);
    }
}
