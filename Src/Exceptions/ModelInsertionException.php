<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Debug\Debugger;

class ModelInsertionException extends \Exception
{
    protected $message = 'insert values should be identical with model columns';

    public function __construct()
    {
        $debugger = new Debugger();
        $debugger->log($this->message);
    }
}