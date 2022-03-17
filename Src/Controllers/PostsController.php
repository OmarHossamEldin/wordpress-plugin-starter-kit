<?php

namespace Wordpress\PluginName\Controllers;

use Wordpress\PluginName\Support\Facades\Template\View;

class PostsController
{
    public function index()
    {
        return View::render('admin/index');
    }
}
