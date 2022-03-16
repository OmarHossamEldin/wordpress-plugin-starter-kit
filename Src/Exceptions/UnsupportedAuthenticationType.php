<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Facades\Exception\ExceptionHandler;

class UnsupportedAuthenticationType extends ExceptionHandler
{
    protected $message = "Unsupported Authentication Type"; 
}
