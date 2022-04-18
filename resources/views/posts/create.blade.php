@extends('layouts.app')
@section('title')
    create
@endsection
@section('header')
    <form method="POST" action={{ route('posts.store') }}>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">post creator</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <!-- <option selected>post creator</option> -->
                <option value="1">Ahmed</option>
                <option value="2">Mohamed</option>
                <option value="3">Nagwa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">create</button>
    </form>
@endsection
