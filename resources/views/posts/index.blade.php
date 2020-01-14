@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')
    <h1>Posts</h1>

    <form id="submit_form" method="post" action="{{ url('/posts/') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>カテゴリ</label>
       <select name="category" class="selectNormal" id="category" value="{{old('category')}}">
                @foreach($categorie as $value)
                    <option value="{{ $value->id }}">{{ $value->categoryName }}</option>
                @endforeach
        </select>
    </div>
    </form>

    @foreach($posts as $post)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text">{{ $post->image }}</p>
                <p class="card-text"><img class="" src="{{ asset('public/storage/') }}/{{ $post->id }}/{{ $post->image }}"></p>
                <p class="card-text">{{ $post->categoryName }}</p>
                <p class="card-text">{{ $post->number }}</p>

                <div class="d-flex" style="height: 36.4px;">
                    <a href="/laravel/posts/{{ $post->id }}" class="btn btn-outline-primary">表示</a>
                    <a href="/laravel/posts/{{ $post->id }}/edit" class="btn btn-outline-primary">編集</a>
                    <form action="/laravel/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('本当に削除しますか?')) { return true } else {return false };">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-outline-danger">削除</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <a href="/laravel/posts/create">新規登録</a>
    {{ $posts->links() }}
 @endsection
 <script>
 const selected = $("select[name=category]");
    selected.on('change', function(){
        window.location.href = selected.val();
    });
 </script>