@extends('layouts.shelf')
@section('content')

	<div class="container">
		<div class="page-header">
			<h2>Acervo UAB/SEAD/UFES</h2>
		</div>



		@forelse($courses as $group)
			<div class="page-header">
				<h2> {{$group->first()->type->name}} </h2>
			</div>

			<ul class="row">
				@foreach($group as $course)
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<a href="/shelf/course/{{$course->id}}/module/0/type/0">{{$course->name}}</a>
								@if (Auth::check())
									<a href="/courses/{{$course->id}}/edit">[editar]</a>
								@endif
							</div>
						</div>
					</li>	
				@endforeach
			</ul>
		@empty
			<div>Não há cursos cadastrados.</div>
		@endforelse
		<hr>

		{{-- <a href="/shelf/course/0/module/0/type/0">Todos os Cursos</a> --}}
	</div>

@endsection
