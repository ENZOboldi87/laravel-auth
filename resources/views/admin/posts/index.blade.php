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
        <a class="btn btn-secondary" href="">Dettagli</a> </li>
      @endforeach
    </ul>
  </div>
@endsection
