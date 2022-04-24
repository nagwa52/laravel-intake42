@extends('layouts.app')
@section('title')
    view
@endsection
@section('header')
    <div class="card mb-6">
        <div class="card-header">
            post info
        </div>

        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <p class="card-text">{{ $post->title}}</p>
            <h5 class="card-title">Description</h5>
            <p class="card-text">{{ $post->description }}</p>
        </div>
        <div class="card ">
            <div class="card-header">
                post creator info
            </div>

            <div class="card-body">
                <h5 class="card-title">Name</h5>
                <p class="card-text">{{$post->user->name }}</p>

                <h5 class="card-title">Created At</h5>
                <p class="card-text">{{ \Carbon\carbon::parse($post['created_at'])->format('Y-m-d'); }}</p>

            </div>
        </div>

    </div>
    <form  action="{{ Route('comments.store', ['post' => $post['id']]) }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Add comment</label>
          <input type="text" name="body" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
        <select name="user_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <!-- <option selected>post creator</option> -->
            @foreach ($users as $user )
                  <option value={{ $user->id }}>{{ $user->name }}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="text" class="btn btn-primary">Edit</button>
        <button type="text" class="btn btn-danger">Delete</button>
      </form>

@foreach ($comments as $comment )
<div class="mb-3 comments">
    {{ $comment->body }} <span>{{ $comment->user->name }}</span>

</div>
@endforeach
{{-- @dd($comments); --}}

@endsection
