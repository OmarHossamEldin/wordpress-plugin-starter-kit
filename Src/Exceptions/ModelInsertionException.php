<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Facades\Exception\ExceptionHandler;

class ModelInsertionException extends ExceptionHandler
{
    protected $message = 'insert values should be identical with model columns';
}