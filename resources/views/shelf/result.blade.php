@extends('layouts.shelf')

@section('styles')
			
	<style>
		@if (!empty($learning_objects))
		.btn-download {
			background-color: {{ $learning_objects->first()->course->bg_color }}; 	/* chamar cor primaria */
		}

		.btn-download:hover {
			background-color: {{ $learning_objects->first()->course->aux_color }}; 	/* chamar cor auxiliar */
		}
		@endif 
	</style>

@endsection


@section('content')

<div class="container">
	{{--<div class="page-header">
		<h2>{{$current->course}}</h2>
	</div>--}}

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">

				{{--<a class="btn btn-default navbar-text" href="{{ url('shelf/courses') }}">Voltar</a>--}}

				<button type="button" class="navbar-toggle collapsed navbar-text" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				    <span class="sr-only">Toggle navigation</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</button>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-text">
					{{-- //Seletor de Módulo de Materiais
					<li>
				 		<p>Módulo</p>
						<select class="selectpicker" id="select-module">
							<option value="0">Todos</option>
							@for ($i = 1; $i <= $current->number_of_modules; $i++)
								@if ($current->module_id == $i)
									<option value="{{ $i }}" selected>{{ $i }}</option>
								@else
									<option value="{{ $i }}">{{ $i }}</option>
								@endif
							@endfor
						</select>
					</li>
					--}}

					<li>
						<!-- TIPOS DE OBJETO DE APRENDIZAGEM -->
						<select class="selectpicker" id="select-type">
							<option selected disabled="">Tipo de Objeto</option>
							<option value="0">Todos</option>
							@foreach ($current->object_types as $type)								
								@if ($current->type_id == $type->id)
									<option value="{{$type->id}}" selected>{{$type->name}}</option>
								@else
									<option value="{{$type->id}}">{{$type->name}}</option>
								@endif
							@endforeach
						</select>
					</li>

					<li>
						<!-- ANO -->
						<select class="selectpicker" id="select-type">
							<option selected disabled="">Ano</option>
							<option value="0">Todos</option>

							@foreach ($learning_objects->pluck('year')->unique() as $year)
								<option value="{{ $year }}"> </option>




								{{-- SÓ FAZ SENTIDO CRIAR ISSO DEPOIS DO BACKEND FAZE A SELECAO... VALE A PENA???
								@if ($current->type_id == $type->id)
									<option value="{{$type->id}}" selected>{{$type->year}}</option>
								@else
									<option value="{{$type->id}}">{{$type->year}}</option>
								@endif
								--}}
							@endforeach
						</select>
					</li>


				</ul>
				<form class="navbar-form navbar-right navbar-text">
					<div class="input-group">
						{{-- <input type="text" class="form-control" placeholder="Busca"> --}}
						<input type="text" class="form-control search" placeholder="Busca">

						{{-- //Botões de Ordenação do List.js //

						<button class="sort" data-sort="title">Título</button>
						<button class="sort" data-sort="course">Curso</button>
						<button class="sort" data-sort="module">Modulo</button>

						--}}

						<div class="input-group-btn">
							<button type="submit">
								<img src="{{asset("/icons-local/buscar.svg")}}">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</nav>

	<div id="learning_objects" class="annotated-list">
		<ul class="row list">
			@forelse($learning_objects as $learning_object)
				<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="thumbnail no-shadow" type="button" data-toggle="modal" data-target="#learning_object{{ $learning_object->id }}">
						<span class="label label-default">
							<div class="icon">
								<img src="{{asset("/icons-local/". $learning_object->type->id .".svg")}}">
							</div> 
							
							{{ $learning_object->type->name }}
						</span>
						<div class="wrap-image">
							<img class="max-size" src="{{ config('app.url') }}/covers/_default.jpg" data-src="{{ config('app.url') }}/covers/{{ $learning_object->cover}}" alt="Image do objeto">
						</div>
						<div class="caption"> 
							<h3>{{  str_limit($learning_object->title, 40) }}
								@if (Auth::check())
									<a href="/learning_objects/{{$learning_object->id}}/edit">[editar]</a>
								@endif
							</h3>
						</div>
					</div>
				
				
					<div class="modal fade" id="learning_object{{ $learning_object->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="fechar" data-dismiss="modal" aria-label="Close">
									<img src="{{asset("icons-local/fechar.svg")}}">
									</button> 

									<img class="modal-image" src="{{ config('app.url') }}/covers/_default.jpg" data-src="{{ config('app.url') }}/covers/{{ $learning_object->cover}}" alt="Imagem do objeto">
									<div class="modal-caption">
										<h3 class="modal-title">{{ $learning_object->title }}</h3>
										<p class="modal-author">{{ $learning_object->author }}</p>
										<p class="modal-year">{{ $learning_object->year }}</p>
										<a class="btn-download" href="{{ $learning_object->link }}" role="button">
											<img src="{{asset("/icons-local/baixar.svg")}}">
											Abrir
										</a> 
									</div>
								</div>
								<div class="modal-body">
									@if (!empty($learning_object->summary))
										<p><strong>Resumo:</strong><br>
											{{ $learning_object->summary }}
										</p>
									@endif

									@if (empty($learning_object->summary))
										<strong> VAZIO </strong>
									@else
										<strong> NOT VAZIO </strong>
									@endif

								</div>
							</div>
						</div>
					</div>	
				</li>

			@empty
				<div>Não há materiais nessa categoria.</div>
			@endforelse
		</ul>

		<ul class="pagination"></ul>
	</div>
	<div><small> {{$current->course}} / {{$current->module}} / {{$current->type}} </small></div>
</div>

@endsection



@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{config('app.url')}}/js/ldi.list.min.js"></script>

<script>
	// modais 
	$('.modal').on('shown.bs.modal', function () {
		$('h3').focus();
	});

	// menus 
	$('#select-type').on('change', function(){
		params = document.location.href.split('/');
		
		if (typeof params[5] == 'undefined') params[5] = 0;
		if (typeof params[6] == 'undefined') params[6] = 0;
		
		document.location.href = '/curso/'+ params[4] + '/' + this.value +'/'+ params[6];
	});


	$('#select-year').on('change', function(){
		params = document.location.href.split('/');
		
		if (typeof params[5] == 'undefined') params[5] = 0;
		if (typeof params[6] == 'undefined') params[6] = 0;
		
		document.location.href = '/curso/'+ params[4] + '/' + params[5] + '/' + this.value;
	});
	
	// lazyloading
	function runLoader() {
		var defer = document.getElementsByTagName('img')
		Array.prototype.slice.call(defer).map(lazyLoad)
	}

	function lazyLoad(item){
		if (item.getAttribute('data-src')) item.setAttribute('src', item.getAttribute('data-src'))
	}

	runLoader();

	// list.js
	var options = {
		valueNames: ['modal-title', 'modal-author', 'modal-body'],
		page: 12,
		pagination: false
	};

	var learning_objectList = new List('learning_objects', options);

	$(document).on("keypress", "input", function(event) { 
		return event.keyCode != 13;
	});

</script>

@endsection
