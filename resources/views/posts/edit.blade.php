@extends('layouts.app')
@section('title')
    Edit Post
@endsection
@section('header')
    <form method="post" action={{ route('posts.update', ['post' => $post['id']]) }} enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" name="title" value="{{ $post['title'] }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" name="description" value="{{ $post['description'] }}">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Upload image</label>
            <input type="file" name="image" class="form-control" name="image" value="{{public_path('images/'.$post['image']) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">post creator</label>
            <select name="post_creator" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <!-- <option selected>post creator</option> -->
                @foreach ($users as $user )
                      {{-- <option value={{ $user->id }}>{{ $user->name }}</option> --}}
                      <option value="{{ $user->id }}" {{ ( $post['user_id'] == $user->id ) ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">created at</label>
            <input type="text" value="{{ \Carbon\carbon::parse($post['created_at'])->format('Y-m-d'); }}" class="form-control" id="exampleInputEmail1" name="created_at">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        {{-- @dd($post['title']); --}}
    </form>
@endsection
