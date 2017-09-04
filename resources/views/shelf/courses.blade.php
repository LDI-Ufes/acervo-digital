@extends('layouts.public')

@section('content')

	<div class="breadcrumbs">
		<div class="container">
			<small>Acervo EAD</small>
		</div>
	</div>

	<div class="container" id="container">

		@forelse($courses as $group)
			<div class="page-header">
				<h2> {{$group->first()->type->name}} </h2>
			</div>

			<ul class="row">
				@foreach($group as $course)
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						{{-- <a href="/shelf/course/{{$course->id}}/module/0/type/0"> --}}
						{{-- <a href="/shelf/course/{{$course->id}}/type/0/year/0">   --}}
						<a href="/curso/{{ $course->slug }}">
							<div class="panel panel-default" style=" border-left: 7px solid {{ $course->bg_color }}; color: {{ $course->fg_color }}">
								<div class="panel-body">
									<p>{{$course->name}}</p>
									{{--@if (Auth::check())
										<a href="/courses/{{$course->id}}/edit">[editar]</a> --}}
								</div>
							</div>
						</a>
					</li>	
				@endforeach
			</ul>
		@empty
			<div>Não há cursos cadastrados.</div>
		@endforelse


		{{-- <a href="/shelf/course/0/module/0/type/0">Todos os Cursos</a> --}}

		@if (! $inactive_courses->isEmpty() )
			<button class="page-header" tabindex="0" role="button" id="inativos-mostra">
				<h2>Cursos Inativos 
				<i id="seta" class="fa fa-caret-down" aria-hidden="true"></i>

				</h2> 
			</button>

			<div id="inativos"> 
				<ul class="row"> 
					@foreach($inactive_courses as $course)
						<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							{{-- <a href="/shelf/course/{{$course->id}}/module/0/type/0"> --}}
							{{-- <a href="/shelf/course/{{$course->id}}/type/0/year/0">   --}}
							<a href="/curso/{{ $course->slug }}">
								<div class="panel panel-default" style=" border-left: 7px solid #656565; color: #656565">
									<div class="panel-body">
										<p>{{$course->name}}</p>
										{{--@if (Auth::check())
											<a href="/courses/{{$course->id}}/edit">[editar]</a> --}}
									</div>
								</div>
							</a>
						</li>	
					@endforeach 
				</ul> 
			</div>
		@endif

	</div>

@endsection

@section('scripts')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
      $( "#inativos-mostra").click(
      	function() {
      		$( "#inativos" ).toggle();
      		$('#seta').toggleClass('fa-caret-down');
    		$('#seta').toggleClass('fa-caret-up');
      	}
      );
	</script>

@endsection
