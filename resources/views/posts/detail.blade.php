@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')
    <div class="card">
        <div class="card-body">
        @foreach($posts as $post)
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text">{{ $post->image }}</p>
            <p class="card-text"><img class="" src="{{ asset('public/storage/') }}/{{ $post->id }}/{{ $post->image }}"></p>
            <p class="card-text">{{ $post->categoryName }}</p>
            <p class="card-text">{{ $post->number }}</p>
        @endforeach
            <div class="d-flex" style="height: 36.4px;">
                <button class="btn btn-outline-primary">Show</button>
                <a href="/laravel/posts/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit</a>
                <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <a href="/laravel/posts/{{ $post->id }}/edit">Edit</a> | 
    <a href="/laravel/posts">Back</a>

@endsection