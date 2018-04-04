@extends('articles.applayout')
@section('main_content')

<a href="{{ url('articles') }}">Back to list of articles</a>

<h2>{{ $article->title }}</h2>
<p>{{ $article->content }}</p>

<a href='{{url("articles/$article->id/delete")}}'>Delete</a>

@endsection
