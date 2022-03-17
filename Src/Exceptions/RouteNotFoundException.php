<?php

namespace Wordpress\PluginName\Exceptions;

use Wordpress\PluginName\Support\Facades\Exception\ExceptionHandler;

class RouteNotFoundException extends ExceptionHandler
{
    protected $message = "This route is not found";
}
