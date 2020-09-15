@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
          <h1 class="text-center"> Ciao {{$user->name}} qui ci sono tutti i post</h1>
      </div>
    </div>
    <ul>
      @foreach ($posts as $post)
        <li>Autore: {{$post->user->name}} - {{$post->title}}
          <a class="btn btn-secondary" href="{{route('admin.posts.show', $post)}}">Dettagli</a>
          <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">Modifica</a>
          <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')

            <input class="btn btn-success" type="submit" value="Cancella Post">
          </form>
        </li>
      @endforeach
    </ul>
  </div>
  <a class="btn btn-info" href="{{route('admin.posts.create')}}">Crea nuovo post</a>
@endsection
