<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;

class PostController extends BaseController
{
    public function index()
    {
        $posts= Post::all();
        return
            view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        return
            view('posts.create');
    }
    public function store()
    {
        return 'we are in store';
    }
    private function sendArray()
    {
        $posts = [[
            'id' => 1, 'title' => 'Laravel',
            'post_creator' => 'nagwa', 'created_at' => '2022-04-16'
        ], ['id' => 2, 'title' =>
        'node js', 'post_creator' => 'ahmed', 'created_at' => '2022-04-16'], [
            'id' => 3,
            'title' => 'javascript', 'post_creator' => 'mohamed', 'created_at' =>
            '2022-04-16'
        ],];
        return $posts;
    }
    public function show($postId)
    {
        $newPost ='';
        $posts =
            $this->sendArray();
        foreach ($posts as $post) {
            if ($postId == $post['id']) {
                $newPost = $post;
            }
        }
        return view('posts.show', ['post' => $newPost]);
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
