<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return  PostResource::collection($post);
    }
    public function show($postId)
    {
        $post=Post::find($postId);
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        $data = request()->all();
        $post = Post::create([
            'title'=> $data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creator'],

        ]);
        return new PostResource($post);
    }
}
