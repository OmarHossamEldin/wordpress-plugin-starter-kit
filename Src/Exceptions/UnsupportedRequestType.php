<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Facades\Exception\ExceptionHandler;

class UnsupportedRequestType extends ExceptionHandler
{
    protected $message = "Unsupported Request Type";   
}
