<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Facades\Exception\ExceptionHandler;

class InvalidRequestException extends ExceptionHandler
{
    protected $message = "this request is not found";
  
}
