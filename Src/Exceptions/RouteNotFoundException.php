<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Debug\Debugger;

class RouteNotFoundException extends \Exception
{
    protected $message = "This route is not found";
    
    public function __construct()
    {
        $debugger = new Debugger();
        $debugger->log($this->message);
    }
}
