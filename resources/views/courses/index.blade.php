@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">Listagem de Cursos</div>

				<div class="panel-body">
					<ul>
						@foreach( $all_courses as $course)
							<li> {{ $course->name }} [#{{$course->modules}} Módulos] <a href="{{ route('courses.show', $course->id) }}">[ver]</a> <a href="{{ route('courses.edit', $course->id) }}">[editar]</a> </li>
						@endforeach
					</ul>
				</div>

				

			    </div>
			</div>
		</div<>
	</div>
@endsection
