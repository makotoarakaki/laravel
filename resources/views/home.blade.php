@extends('layouts.app')

@section('content')
<!--<goals-component></goals-component>-->
<div class="container-fruid h-100 pt-5">
    <form method="POST" action="/upload" enctype="multipart/form-data">
 

            {{ csrf_field() }}

        <input type="file" id="file" name="file" class="form-control">

        <button type="submit" class="btn btn-outline-primary">アップロード</button>

    </form>
</div>

<form method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
    <input type="file" id="file" name="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>

<a href="/posts">Back</a>


@endsection