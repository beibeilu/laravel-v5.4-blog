@extends('layouts.layout')


@section ('content')

<h1>Publish a Post</h1>


<hr>

<form method="POST" action="/posts">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title">
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="body" name="body" rows="10"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Publish</button>

</form>



@endsection
