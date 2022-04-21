@extends('layouts.app')
@section('title')
    index
@endsection
@section('header')
<a class="btn btn-success" href ={{ route('posts.create') }}>create </a>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>
                    id
                </td>
                <td>
                    Title
                </td>
                <td>
                    description
                </td>
                <td>
                    Post_creator
                </td>
                <td>
                    Created at
                </td>
                <td>
                    Actions
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)

                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['description'] }}</td>
                    <td>{{ $post->user ? $post->user->name : 'Not found' }}</td>
                    <td>{{ $post['created_at'] }}</td>
                    <td>
                        <a href={{ route('posts.show', ['post' => $post['id']]) }} class="btn btn-primary">View</a>
                        {{-- ,$post['title'],$post['post_creator'],$post['created_at'] --}}
                        <a href={{ route('posts.edit', ['post' => $post['id']]) }} class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
