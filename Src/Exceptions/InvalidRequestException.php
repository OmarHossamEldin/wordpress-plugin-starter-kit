<?php

namespace Wordpress\Exceptions;

use Wordpress\Exceptions\Debugger;

class InvalidRequestException extends \Exception
{
    protected $message = "this request is not found";
    
    public function __construct()
    {
        $debugger = new Debugger();
        $debugger->log($this->message);
    }
}
