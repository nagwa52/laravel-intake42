<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use App\Models\User;

class PostController extends BaseController
{
    public function index()
    {
        $posts= Post::all();
        $filteredPosts =Post::where('title', 'laravel')->get();
        //another way for select

        return
            view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users'=>$users]);
    }
    public function store()
    {
        $data = request()->all();
        // dd($data);
        Post::create([
            'title'=> $data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creator'],

        ]);
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        $post = Post::where('id', $postId)->first();
        return view('posts.show', ['post' => $post]);
        //  another way for select
        // $post =Post::find($postId);
    }
    public function edit($postId)
    {
        $posts = $this->sendArray();
        foreach ($posts as $post) {
            if ($postId == $post['id']) {
                $post = $post;
            }
        }
        return view(
            'posts.edit',
            ['post' => $post]
        );
    }

    public function update($postId)
    {
        return $this->index();
    }
}
