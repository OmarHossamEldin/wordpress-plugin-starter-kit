<?php

namespace Wordpress\Requests\Post;

use Wordpress\Support\Facades\Traits\ValidationTrait;
use Wordpress\Support\Facades\Http\Request;

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
