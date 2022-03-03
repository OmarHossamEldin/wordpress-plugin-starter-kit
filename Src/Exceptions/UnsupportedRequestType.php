<?php

namespace Wordpress\Exceptions;

use Wordpress\Exceptions\Debugger;

class UnsupportedRequestType extends \Exception
{
    protected $message = "Unsupported Request Type";

    public function __construct()
    {
        $debugger = new Debugger();
        $debugger->log($this->message);
    }
}
