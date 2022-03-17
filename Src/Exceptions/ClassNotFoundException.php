<?php

namespace Wordpress\PluginName\Exceptions;

use Wordpress\PluginName\Support\Facades\Exception\ExceptionHandler;

class ClassNotFoundException extends ExceptionHandler
{
    protected $message = 'class not found';
}