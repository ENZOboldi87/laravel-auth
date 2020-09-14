@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
          <h2 class="text-center"> Titolo: {{$post->title}}</h2>
      </div>
    </div>
    {{-- <ul>
      @foreach ($posts as $post)
        <li>Autore: {{$post->user->name}} - {{$post->title}}
        <a class="btn btn-secondary" href="">Dettagli</a> </li>
      @endforeach
    </ul> --}}
  </div>
@endsection
