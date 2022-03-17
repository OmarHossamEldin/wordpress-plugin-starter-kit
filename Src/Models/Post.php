<?php

namespace Wordpress\PluginName\Models;

use Wordpress\PluginName\Database\Initialization\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'image_path'
    ];
}
