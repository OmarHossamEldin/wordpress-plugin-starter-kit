<?php

namespace Wordpress\Controllers;

use Wordpress\Support\Facades\Template\View;

class PostsController
{
    public function index()
    {
        return View::render('admin/index');
    }
}
