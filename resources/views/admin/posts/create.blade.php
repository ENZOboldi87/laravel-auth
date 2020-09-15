@extends('layouts.app')
@section('content')
  <h1>Crea il post</h1>

<form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('POST')

	<div>
		<label>Title</label>
		<input type="text" name="title" value="{{ old('title') }}">
	</div>

	<div>
		<label>Content</label>
		<textarea name="content" rows="8" cols="80">{{ old('content') }}</textarea>
	</div>

  <div>
    <label>Carica Immagine</label>
    <input type="file" name="image_path" accept="image/jpeg">
  </div>

	<div>
		<input type="submit" value="Salva modifica">
	</div>
</form>
@endsection
