<?php

namespace Wordpress\Exceptions;

use Wordpress\Exceptions\Debugger;

class RelationClassException extends \Exception
{
    protected $message = "Relation Class Exception";
    
    public function __construct()
    {
        $debugger = new Debugger();
        $debugger->log($this->message);
    }
}
