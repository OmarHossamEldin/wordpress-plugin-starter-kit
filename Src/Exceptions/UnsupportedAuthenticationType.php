<?php

namespace Wordpress\PluginName\Exceptions;

use Wordpress\PluginName\Support\Facades\Exception\ExceptionHandler;

class UnsupportedAuthenticationType extends ExceptionHandler
{
    protected $message = "Unsupported Authentication Type"; 
}
