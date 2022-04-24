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
      </form>
      <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>
                        Comments
                    </td>
                    <td>
                        comment creator
                    </td>
                    <td>
                        Actions
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                  <tr>
                        <td>{{$comment->body }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>
                            <a href={{ route('comments.edit', ['comment' => $comment['id']]) }} class="btn btn-success">Edit</a>
                        <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $comment['id']}}">
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
              <form action="{{ route('comments.destroy', ['comment' => $comment['id']]) }}" method="POST">
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
