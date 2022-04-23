@extends('layouts.app')
@section('title')
    create
@endsection
@section('header')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action={{ route('posts.store') }}>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name ="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <div class="form-floating">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">post creator</label>
            <select name="post_creator" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <!-- <option selected>post creator</option> -->
                @foreach ($users as $user )
                      <option value={{ $user->id }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">create</button>
    </form>
@endsection
