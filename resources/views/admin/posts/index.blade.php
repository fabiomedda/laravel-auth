@extends('layouts.dashboard')

@section('content')
<h1>All posts for the admin</h1>
<a class="btn btn-primary" href="{{route('admin.posts.create')}}">create a new post</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td scope="row">{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->slug }}</td>
            <td>
                <a href="{{route( 'admin.posts.show', ['post' => $post->slug] )}}" class="btn btn-primary">View</a>
                <a href="{{route( 'admin.posts.edit', ['post' => $post->slug] )}}" class="btn btn-warning">Edit</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$post->id}}">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade text-dark" id="delete-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="post-delete-{{$post->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete post {{$post->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ route('admin.posts.destroy', ['post'=> $post->slug]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Modal -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection