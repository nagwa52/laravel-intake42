@extends('layouts.app')
@section('title')
    Edit comment
@endsection
@section('header')
    <form method="POST" action={{ route('comments.update', [$comment->id]) }}>
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edit Comment</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="body" value="{{ $comment->body }}">
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>
@endsection
