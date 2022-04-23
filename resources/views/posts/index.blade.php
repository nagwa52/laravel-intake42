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
                <td style="width: 216px;">
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
                    <td>{{ \Carbon\carbon::parse($post['created_at'])->format('Y-m-d'); }}</td>
                    {{-- <td>{{ $post['created_at'] }}</td> --}}
                    <td>
                        <a href={{ route('posts.show', ['post' => $post['id']]) }} class="btn btn-primary">View</a>

                        <a href={{ route('posts.edit', ['post' => $post['id']]) }} class="btn btn-success">Edit</a>

                      <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $post['id']}}">
    Delete
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop-{{ $post['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Do you want to delete?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-primary">Yes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
 </td>
</tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
