@extends('layouts.app')
@section('content')
  <h1>Modifica il post</h1>

  {{-- validazione --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

<form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')

	<div>
		<label> Modifica Titolo</label>
		<input type="text" name="title" value="{{ $post->title }}">
	</div>

	<div>
		<label>Modifica Contenuto</label>
		<textarea name="content" rows="8" cols="80">{{ $post->content }}</textarea>
	</div>
  <div>
    <label> Modifica Immagine</label>
    <input type="file" name="image_path" accept="image/*">
    @if (strpos($post->image_path,'lorempixel'))
      <img src="{{$post->image_path}}" alt="{{$post->title}}" class="img-thumbnail">
      @else
      <img src=" {{ asset('storage') . '/' . $post->image_path }} " alt="{{$post->title}}" class="img-thumbnail">
    @endif
  </div>

	<div>
		<input type="submit" value="Salva modifica">
	</div>
</form>
@endsection
