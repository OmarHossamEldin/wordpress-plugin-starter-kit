<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Facades\Exception\ExceptionHandler;

class UnsupportedValidationRuleException extends ExceptionHandler
{
    protected $message = "Unsupported Validation Rule Has Been Used"; 
}
