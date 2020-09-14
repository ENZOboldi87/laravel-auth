@extends('layouts.app')
@section('content')
  <h1>Modifica il post</h1>

<form action="{{ route('admin.posts.update', $post) }}" method="post">
	@csrf
	@method('PUT')

	<div>
		<label>Title</label>
		<input type="text" name="title" value="{{ $post->title }}">
	</div>

	<div>
		<label>Content</label>
		<textarea name="content" rows="8" cols="80">{{ $post->content }}</textarea>
	</div>


	<div>
		<input type="submit" value="Salva modifica">
	</div>
</form>
@endsection
