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
        $comments = Post::find($data['post'])->comments()->create([
        'body'=> $data['body'],
        'user_id'=>$data['user_id'],
        'commentable_id'=>$data['post'],
        'commentable_type'=>'post']);
        return redirect()->route('posts.show', ['post'=>$data['post'],'comments'=>$comments]);
    }
    public function edit($postId)
    {
        $comment = Post::find($postId);
        return view(
            'comments.edit',
            ['comment'=>$comment]
        );
    }
    public function show($postId)
    {
        $users = User::all();
        $post = Post::where('id', $postId)->first();
        $comments = Post::find($postId)->comments;
        return view('posts.show', ['post' => $post ,'users'=> $users,'comments'=>$comments]);
    }
    public function update(Request $request, $commentId)
    {
        $comment = Comment::find($commentId);
        $validatedData = $request->validate([
            'comment'=>'required',
        ]);
        $comment->body = $request->body;
        $request->session()->flash('success');
        $comment->save();

        return redirect('comments.show');
    }
}
