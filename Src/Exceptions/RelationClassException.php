<?php

namespace Wordpress\Exceptions;

use Wordpress\Support\Facades\Exception\ExceptionHandler;

class RelationClassException extends ExceptionHandler
{
    protected $message = "Relation Class Exception";   
}
