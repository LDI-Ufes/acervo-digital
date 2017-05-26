@extends('layouts.shelf')
@section('content')

	<section class="content-header">
		<h1>
			Acervo UAB/SEAD/UFES 
		</h1>
	</section>

	<section class="content">
		<a href="/shelf/course/0/module/0/type/0">Todos os Cursos</a>
		<hr>

		@forelse($courses as $group)
			<h2> {{$group->first()->type->name}} </h2>
			@foreach($group as $course)
				<p>
					<a href="/shelf/course/{{$course->id}}/module/0/type/0">{{$course->name}}</a>
					@if (Auth::check())
						<a href="/courses/{{$course->id}}/edit">[editar]</a>
					@endif
				</p>	
			@endforeach
		@empty
			<div>Não há cursos cadastrados.</div>
		@endforelse
	<hr>
	</section>

@endsection
