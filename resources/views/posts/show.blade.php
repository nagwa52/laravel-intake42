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
                <p class="card-text"></p>

                <h5 class="card-title">Created At</h5>
                <p class="card-text">{{ $post->created_at }}</p>

            </div>
        </div>

    </div>
@endsection
