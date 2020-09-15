@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
          <h2 class="text-center"> Titolo: {{$post->title}}</h2>
          <div class="">
            @if (strpos($post->image_path,'lorempixel'))
              <img src="{{$post->image_path}}" alt="{{$post->title}}">
              @else
              <img src=" {{ asset('storage') . '/' . $post->image_path }} " alt="{{$post->title}}">
            @endif
          </div>
          <div class="">
            <p>{{$post->content}}</p>
          </div>
      </div>
    </div>
  </div>

  <a class="btn btn-primary"href="{{route('posts.index')}}">Torna Indietro</a>
@endsection
