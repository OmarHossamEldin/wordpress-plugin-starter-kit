<?php

namespace Wordpress\Requests\Post;

use Wordpress\Support\Facades\Traits\ValidationTrait;
use Wordpress\Support\Facades\Http\Request;

class PostUpdateRequest extends Request
{
    use ValidationTrait;

    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required'
        ];
    }
}
