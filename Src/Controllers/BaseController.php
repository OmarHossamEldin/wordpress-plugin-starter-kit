<?php

namespace Wordpress\Controllers;

use Wordpress\Support\Request;

class BaseController
{
    protected $request;

    public function __construct()
    {
        if(Request::type() === 'post')
        {
            $this->request = array_map(fn($item) => $item, $_POST);
        }

        if(Request::type() === 'get')
        {
            $this->request = array_map(fn($item) => $item, $_GET);
        }
    }    
}
