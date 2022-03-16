<?php

namespace Wordpress\PluginName\Exceptions;

use Wordpress\PluginName\Support\Facades\Exception\ExceptionHandler;

class ModelInsertionException extends ExceptionHandler
{
    protected $message = 'insert values should be identical with model columns';
}