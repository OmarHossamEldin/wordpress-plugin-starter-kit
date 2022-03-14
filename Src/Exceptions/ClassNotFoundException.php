<?php

namespace Wordpress\Exceptions;

class ClassNotFoundException extends \Exception
{
    protected $message = 'class not found';
}