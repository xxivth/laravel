@extends('articles.applayout')
@section('main_content')

<a href="{{ url('articles') }}">Back</a>
@if (count($errors) > 0)
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<h1>
  Create a new article
</h1>

<form class="" action="" method="POST">
  {{ csrf_field() }}
  Title: <input type="text" name="title" value=""> <br>
  Content: <br>
  <textarea name="content" rows="8" cols="80"></textarea> <br>
  <input type="submit">
</form>

@endsection
