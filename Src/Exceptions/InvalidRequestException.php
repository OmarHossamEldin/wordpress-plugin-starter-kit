<?php

namespace Wordpress\PluginName\Exceptions;

use Wordpress\PluginName\Support\Facades\Exception\ExceptionHandler;

class InvalidRequestException extends ExceptionHandler
{
    protected $message = "this request is not found";
  
}
