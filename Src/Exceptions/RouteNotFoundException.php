<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Facades\Exception\ExceptionHandler;

class RouteNotFoundException extends ExceptionHandler
{
    protected $message = "This route is not found";
}
