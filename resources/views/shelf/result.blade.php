	@extends('layouts.shelf')
	@section('content')

	<section class="content-header">
		<h1>
			Acervo Dummy	
			<small> {{$current->course}} / {{$current->module}} / {{$current->type}} </small>
		</h1>
	</section>


	{{-- CAIXA DE PESQUISA
	<section class="search-bar">
		<form method="POST" action="/shelf/search" accept-charset="UTF-8" class="form-horizontal">
			{{ csrf_field() }}
			<input type="text" name="searchbox" id="searchbox">
			<input type="submit" name="go_search" id="go_search" value="lupa.png">
		</form>
	</section>
	--}}

	<section class="content">
		<a href="/shelf/course/0/module/0/type/0">Todos os Cursos</a>

		@forelse($courses as $course)
			/ <a href="/shelf/course/{{$course->id}}/module/0/type/0">{{$course->name}}</a> 
		@empty
			<div>Não há cursos cadastrados.</div>
		@endforelse

	<hr>
	<div id="learning_objects" class="annotated-list">
		<input class="search" placeholder="Pesquisar" />
		<button class="sort" data-sort="title">Título</button>
		<!-- button class="sort" data-sort="course">Curso</button -->
		<button class="sort" data-sort="module">Modulo</button>

		<ul class="list">
			@forelse($learning_objects as $learning_object)
				<li>
					<!-- strong>Livro:</strong --><h3 class="title">{{$learning_object->title}}</h3> (#{{$learning_object->id}})   
					<strong>Curso:</strong> <span class="course">{{$learning_object->course->name}}</span>;
					<strong>Modulo:</strong> <span class="module">{{$learning_object->module}}</span>;
					<strong>Resumo:</strong> <span class="summary">{{$learning_object->summary}}</span>.
					<!-- img src="/covers/{{ $learning_object->cover }}"-->
				</li>
			@empty
				<div>Não há livros nessa categoria.</div>
			@endforelse
		</ul>
		<ul class="pagination"></ul>
	</div>
</section>

<script>
	var options = {
		valueNames: [ 'title', 'course', 'module'], //, 'summary' 
		page: 6,
		pagination: true
	};

	var learning_objectList = new List('learning_objects', options);
</script>
@endsection
