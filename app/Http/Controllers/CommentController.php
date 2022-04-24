<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends BaseController
{
    public function store(Request $request)
    {
        $data = request()->all();
        // Comment::create([
        //     'body'=> $data['body'],
        //     'user_id'=>$data['user_id'],
        //     'commentable_id'=>$data['post'],
        //     'commentable_type'=>'post',

        // ]);
        $comments = Post::find($data['post'])->comments()->create([
        'body'=> $data['body'],
        'user_id'=>$data['user_id'],
        'commentable_id'=>$data['post'],
        'commentable_type'=>'post']);
        return redirect()->route('posts.show', ['post'=>$data['post'],'comments'=>$comments]);
    }
    public function show($postId)
    {
        $users = User::all();
        $post = Post::where('id', $postId)->first();
        $comments = Post::find($postId)->comments();
        return view('posts.show', ['post' => $post ,'users'=> $users,'comments'=>$comments]);
    }
}
