<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Debug\Debugger;

class UnsupportedValidationRuleException extends \Exception
{
    protected $message = "Unsupported Validation Rule Has Been Used";

    public function __construct()
    {
        $debugger = new Debugger();
        $debugger->log($this->message);
    }
}
