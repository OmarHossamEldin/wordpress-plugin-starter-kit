<?php

namespace Wordpress\Controllers;

use Wordpress\Models\Post;
use Wordpress\Requests\PostStoreRequest;

class PostController extends BaseController
{
    public function index()
    {
        $post     = new Post;
        $posts    = $post->select('id', 'title', 'body')->get();
        return $posts;
    }


    public function create()
    {
        $validator = new PostStoreRequest;
        $validatedData = $validator->validate($this->request);

        $post     = new Post;
        $post->create(
            [
                'title' => $validatedData['title'],
                'body' => $validatedData['body'],
            ]
        );
    }

    public function destroy()
    {
        $post     = new Post;
        $post->delete($this->request['postId']);
    }
}
