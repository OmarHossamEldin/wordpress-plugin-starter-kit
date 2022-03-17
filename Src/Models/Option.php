<?php

namespace Wordpress\PluginName\Models;

use Wordpress\PluginName\Database\Initialization\Model;

/**
 * used for controlling site options
 */
class Option extends Model
{
    protected $table = 'wp_options';

    protected $primaryKey = 'option_id';

    protected $fillable = [
        'option_name',
        'option_value',
        'autoload', //  yes most of time
    ];
}
