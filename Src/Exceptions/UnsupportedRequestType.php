<?php

namespace Wordpress\PluginName\Exceptions;

use Wordpress\PluginName\Support\Facades\Exception\ExceptionHandler;

class UnsupportedRequestType extends ExceptionHandler
{
    protected $message = "Unsupported Request Type";   
}
