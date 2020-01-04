@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<h1>Editing Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php
//<form enctype="multipart/form-data" method="post" action="{{ url('/posts')}}">
?>
<form enctype="multipart/form-data" method="post" action="{{ url('/posts/') }}/{{ $post->id }}">

@csrf
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label for="exampleInputEmail1">タイトル</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="{{ old('title') == '' ? $post->title : old('title') }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">コンテンツ</label>
        <textarea class="form-control" name="content">{{ old('content') == '' ? $post->content : old('content') }}</textarea>
    </div>
    <div class="form-group">
        <label>イメージ</label>
        <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $post->image) == '' ? $post->image : old('image') }}">
        <img class="" src="{{ asset('public/storage/') }}/{{ $post->id }}/{{ $post->image }}">
        <input type="hidden" name="hiddenimage" value="{{ $post->image }}">
        <p>{{ $post->image }}</p>
    </div>
    <div class="form-group">
        <label>カテゴリ</label>
        <select name="category" class="selectNormal">
            <option value="{{ old('category', $post->category) }}" selected="">
                {{ old('category', $post->category) }}
            </option>
            <option value="">選択してください</option>
            <option value="食品">食品</option>
            <option value="おもちゃ">おもちゃ</option>
            <option value="生活">生活</option>
        </select>
    </div>
    <div class="form-group">
        <label>番号</label>
        <input type="number" class="form-control" name="number" value="{{ old('number') == '' ? $post->number : old('number') }}">
   </div>
    <button type="submit" class="btn btn-outline-primary">更新</button>
</form>

<a href="/posts/{{ $post->id }}">Show</a> | 
<a href="/posts">Back</a>

@endsection