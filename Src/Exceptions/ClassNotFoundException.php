<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Facades\Exception\ExceptionHandler;

class ClassNotFoundException extends ExceptionHandler
{
    protected $message = 'class not found';
}