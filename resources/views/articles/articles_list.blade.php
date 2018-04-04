@extends('articles.applayout')
@section('main_content')

<h2>
  <a href="{{ url("articles/create") }}">Create a new article</a>
</h2>

<h2>Current preference: {{ $preference }}</h2>
<h2>Set preference:</h2>
<form class="" action="{{"setpreference"}}" method="post">
  {{ csrf_field() }}
  Preference:
  <select class="" name="preference">
    <option value="politics">Politics</option>
    <option value="weather">Weather</option>
    <option value="sports">Sports</option>
  </select>
  <input type="submit" value="Set">
</form>

<div class="card" style="width: 18rem;">
  <div class="card-header">
    <h3>List of articles</h3>
  </div>
  <ul class="list-group list-group-flush">
    @foreach($all_articles as $article)
      <li class="list-group-item">
        <a href='{{url("articles/$article->id")}}'>{{$article->title}}</a>
      </li>
    @endforeach
  </ul>
</div>

@endsection
