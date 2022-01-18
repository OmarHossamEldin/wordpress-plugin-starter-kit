<?php

namespace Wordpress\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = 'route not found';
}