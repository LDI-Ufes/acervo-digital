@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<span class="pull-left">Curso # {{ $course->id }}</span>
			
			<div class="btn-group bth-group-xs pull-right" role="group">
			<a href="{{ route('courses.index') }}" class="btn btn-primary" title="Listar cursos">
				<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
			</a>

			<a href="{{ route('courses.create') }}" class="btn btn-primary" title="Adicionar curso">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</a>

			</div>
		</div>


		<div class="panel-body">
			@if ($errors->any())
				<ul class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif

			<form method="POST" action="{{ route('courses.update', $course->id) }}" accept-charset="UTF-8" class="form-horizontal">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
				@include ('courses/form', [
					'submitButtonLabel' => 'Atualizar',
					'course' => $course,				
				])
			</form>
		</div>
	</div>

@endsection
