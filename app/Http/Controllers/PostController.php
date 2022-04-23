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

class PostController extends BaseController
{
    public function index()
    {
        $posts= Post::all();
        $filteredPosts =Post::where('title', 'laravel')->get();
        $posts= Post::paginate(5);

        return
            view('posts.index', ['posts' => $posts,'derivedPosts' => $posts]);
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users'=>$users]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|min:3',
            'description' => 'required:posts|min:5',
        ]);
        $data = request()->all();
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
        $users = User::all();
        $post = Post::where('id', $postId)->first();
        return view(
            'posts.edit',
            ['post' => $post,'users'=>$users]
        );
    }

    public function update($postId)
    {
        return $this->index();
    }
    public function destroy($postId)
    {
        $deleted = DB::table('posts')->where('id', $postId)->delete();
        return redirect()->route('posts.index');
    }
}
