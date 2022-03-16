<?php

namespace Wordpress\Controllers\RestApi;

use Wordpress\Requests\Post\PostUpdateRequest;
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

    public function store(PostStoreRequest $request)
    {
        $validatedData = $request->validated();
        $post = new Post();
        $post->create($validatedData);
        return Response::json(['message' => 'Post Created Successfully.'], 201);
    }

    public function show(Post $post)
    {
        $session = new Session();
        $post = $post->get_query_result();
        return !!$post ? Response::json([
            'message' => 'Post Retrieved Successfully.',
            'post' => $post,
        ], 200) : Response::json([
            'message' => 'Note Found.',
        ], 404);
    }

    public function update(PostUpdateRequest $request)
    {
        $validatedData = $request->validated();
        $params = $request->get_route_params();
        $post = new Post();
        $post->update($validatedData, ['id' => $params['id']]);
        $post = $post->first($params['id']);
        return Response::json(['message' => 'Post update Successfully.', 'post' => $post], 206);
    }

    public function destroy($request)
    {
        $params = $request->get_route_params();
        $post = new Post();
        $post->delete(['id' => $params['id']]);
        return Response::json([], 204);
    }
}
