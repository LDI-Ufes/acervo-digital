@extends('layouts.app')
@section('content')

<section class="content-header">
	<h1>
		Estante Dummy
		<small>os livros e cursos aparecem aqui, falta criar a estante real agora</small>
	</h1>
</section>

<section class="search-bar">
	<form method="POST" action="/shelf/search" accept-charset="UTF-8" class="form-horizontal">
		{{ csrf_field() }}
		<input type="text" name="searchbox" id="searchbox">
		<input type="submit" name="go_search" id="go_search" value="lupa.png">
	</form>
</section>


<section class="content">
	livros livros e tals
</section>

@endsection
