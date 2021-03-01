@extends('layouts.app')

@section('content')
<div class='container'>
<h1>Blog</h1>
    @foreach($posts as $post)
        <div class="card my-2">
            <div class="card-body">
                <h2>{{$post->title}}</h2>
                <p>{{$post->body}}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection