<?php

namespace Wordpress\Exceptions;

class MethodNotFoundException extends \Exception
{
    protected $message = 'method not found';
}