<?php

namespace Wordpress\Models;

class Task extends Model
{
    protected $table    = 'tasks';

    protected $primaryKey  = 'id';

    protected $fillable = [
        'task',
        'fromdate',
        'todate'
    ];
}
