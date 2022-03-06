<?php

namespace Wordpress\Controllers\RestApi;

use Wordpress\Requests\Post\PostUpdateRequest;
use Wordpress\Requests\Post\PostDeleteRequest;
use Wordpress\Requests\Post\PostStoreRequest;
use Wordpress\Helpers\Response;
use Wordpress\Models\Post;

class PostsController
{
    public function index()
    {
        $post = new Post();
        $posts = $post->all();
        return Response::json([
            'message' => 'Posts Retrieved Successfully.',
            'posts' => $posts
        ], 200);
    }

    public function show(Post $post)
    {
        return Response::json([
            'message' => 'Post Retrieved Successfully.',
            'post' => $post,
        ], 201);
    }

    public function store(PostStoreRequest $request)
    {
        $validatedData = $request->validated();
        $post = new Post();
        $post->create($validatedData);
        return Response::json(['message' => 'Post Created Successfully.'], 201);
    }

    public function update(PostUpdateRequest $request)
    {
        $validatedData = $request->validated();
        $post = new Post();
        $post->delete($validatedData);
        return Response::json([], 204);
    }

    public function destroy(PostDeleteRequest $request)
    {
        $validatedData = $request->validated();
        $post = new Post();
        $post->delete($validatedData);
        return Response::json([], 204);
    }
}
