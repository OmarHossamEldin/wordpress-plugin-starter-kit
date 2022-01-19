<?php

namespace Wordpress\Exceptions;

class DatabaseQueryException extends \Exception
{
    protected $message = 'Sql exception please check your query';
}