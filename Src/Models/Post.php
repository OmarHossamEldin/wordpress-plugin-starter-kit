<?php

namespace Wordpress\Models;

class Post extends Model
{
    protected $table    = 'posts';

    protected $primaryKey  = 'id';

    protected $fillable = [
        'title',
        'body'
    ];
}
