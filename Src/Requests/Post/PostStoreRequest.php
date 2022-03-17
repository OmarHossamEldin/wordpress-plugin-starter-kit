<?php

namespace Wordpress\PluginName\Requests\Post;

use Wordpress\PluginName\Support\Facades\Traits\ValidationTrait;
use Wordpress\PluginName\Support\Facades\Http\Request;

class PostStoreRequest extends Request
{
    use ValidationTrait;

    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'image_path'=> 'required'
        ];
    }
}
