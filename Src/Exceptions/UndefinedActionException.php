<?php

namespace Wordpress\Exceptions;

class UndefinedActionException extends \Exception
{
    protected $message = 'method not found';
}