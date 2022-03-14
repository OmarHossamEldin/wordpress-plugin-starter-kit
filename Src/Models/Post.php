<?php

namespace Wordpress\Models;

use Wordpress\Database\Initialization\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'image_path'
    ];
}
