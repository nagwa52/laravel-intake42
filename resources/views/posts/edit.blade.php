@extends('layouts.app')
@section('title')
    create
@endsection
@section('header')
    <form method="PUT" action={{ route('posts.update', ['post' => $post['id']]) }}>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">post creator</label>
            <select class="form-select form-select-sm" name="post_creator">
                <!-- <option selected>post creator</option> -->
                <option value="1">Ahmed</option>
                <option value="2">Mohamed</option>
                <option value="3">Nagwa</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">created at</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="created_at">
        </div>
        <button type="submit" class="btn btn-success">create</button>
    </form>
@endsection
