@extends('layouts.shelf')

@section('content')

	<div class="container">
		<!--<div class="page-header">
			<h2>Acervo UAB/SEAD/UFES</h2>
		</div>-->



		@forelse($courses as $group)
			<div class="page-header">
				<h2> {{$group->first()->type->name}} </h2>
			</div>

			<ul class="row">
				@foreach($group as $course)
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						{{-- <a href="/shelf/course/{{$course->id}}/module/0/type/0"> --}}
						<a href="/shelf/course/{{$course->id}}/type/0/year/0"> 
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
		<hr>

		{{-- <a href="/shelf/course/0/module/0/type/0">Todos os Cursos</a> --}}

		@if (!empty($inactive_courses))
			<div class="container">	
			<div class="page-header">
				<h2>Batidão dos Inativos</h2> 
			</div>

			<div id="inativos" class="deveria-ser-collapsible"> 
				<ul class="row"> 
					@foreach($inactive_courses as $course)
						<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							{{-- <a href="/shelf/course/{{$course->id}}/module/0/type/0"> --}}
							<a href="/shelf/course/{{$course->id}}/type/0/year/0">
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
			</div>

		@else
			Testando esse &at;if na encolha aqui, mas na moral não tem nem esse &at;else que usei aqui, tá ligado? <br\>
			Não vai ficar nada aqui porque não tem curso inativo, fraga? (não faz sentido ter um campo vísivel para cursos inativos se não existirem cursos inativos.... ou faz?) <br\>

		@endif

	</div>

@endsection
