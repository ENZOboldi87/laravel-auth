@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
          <h1 class="text-center"> BoldiBlog</h1>
      </div>
    </div>
    <div class="d-flex align-items-end">
      @foreach ($posts as $post)
        <div class="">
          <h4><a class="" href="">{{$post->title}}</a> </h4>
          <img src="{{$post->image_path}}" alt="..." class="img-thumbnail">
        </div>
      @endforeach
    </div>

  </div>
@endsection
