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
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\File;

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
    public function store(StorePostRequest $request)
    {
        $data = request()->all();
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        Post::create([
            'title'=> $data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creator'],
            'image'=>$imageName,

        ]);
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        $users = User::all();
        $post = Post::where('id', $postId)->first();
        $comments = Post::find($postId)->comments;
        return view('posts.show', ['post' => $post ,'users'=> $users,'comments'=>$comments]);
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

    public function update(UpdatePostRequest $request, $postId)
    {
        $data = request()->all();
        $imageName = $request->image->getClientOriginalName();
        $post = Post::where('id', $postId)->first();
        if ($post->image !==$imageName) {
            $request->image->move(public_path('images'), $imageName);
            File::delete(public_path('images/'.$post->image));
            Post::where('id', $postId)
            ->update(['title' => $data['title'],'description'=> $data['description'],
            'user_id'=>$data['post_creator'],'image'=>$imageName]);
        }
        Post::where('id', $postId)
            ->update(['title' => $data['title'],'description'=> $data['description'],
            'user_id'=>$data['post_creator']]);
        return redirect()->route('posts.index');
    }
    public function destroy($postId)
    {
        $post = Post::where('id', $postId)->first();
        File::delete(public_path('images/'.$post->image));
        $deleted = DB::table('posts')->where('id', $postId)->delete();
        return redirect()->route('posts.index');
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });
    }
}
