@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<h1>New Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form enctype="multipart/form-data" method="post" action="{{ url('/posts/')}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">タイトル</label>
        <input type="text" class="form-control" name="title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">コンテンツ</label>
        <textarea class="form-control" name="content">{{old('content')}}</textarea>
    </div>
    <div class="form-group">
        <label>イメージ</label>
        <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
    </div>
    <div class="form-group">
        <label>カテゴリ</label>
       <select name="category" class="selectNormal" value="{{old('category')}}">
        <option value="" selected="">選択してください</option>
                @foreach($categorie as $value)
                    <option value="{{ $value->id }}">{{ $value->categoryName }}</option>
                @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>番号</label>
        <input type="number" class="form-control" name="number" value="{{old('number')}}">
   </div>
    <button type="submit" class="btn btn-outline-primary">登録</button>
</form>

<a href="/posts">Back</a>

@endsection