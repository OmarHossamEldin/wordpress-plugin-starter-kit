<?php

namespace Wordpress\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = 'method not found';
}