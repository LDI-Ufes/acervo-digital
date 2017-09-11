@extends('layouts.shelf')

@section('styles')
	<style> 
		@if(!empty($course_info->bg_color))

			@if ($course_info->active == 1)
				.btn-download {
					background-color: {{ $course_info->bg_color }}; 	/* chamar cor primaria */
				}

				.btn-download:hover {
					background-color: {{ $course_info->aux_color }}; 	/* chamar cor auxiliar */
				}

				small a{
					color: {{ $course_info->fg_color }} !important; 
				}

					@if ($course_info->name == 'Biologia')

						.rotulo h1, .rotulo h2{
							color: #000;
						}

						.btn-download{
							color: #000;
						}
					@endif
			@else
			
				.btn-download {
					background-color: #656565; 	/* chamar cor primaria */
				}

				.btn-download:hover {
					background-color: #373737; 	/* chamar cor auxiliar */
				}

				small a{
					color: #656565 !important;  
				}

			@endif	

		@endif 
	
	
		@if(!empty($course_info->bg_color))
			
			@if ($course_info->active == 1)

				.header-top{
					background-color: {{ $course_info->aux_color }};
				}

				.header-main{
					background-color: {{ $course_info->bg_color }};
				}

				footer{
					background: {{ $course_info->aux_color }};
					border-top: 5px solid {{ $course_info->bg_color }};
				}

			@else

				.header-top{
					background-color: #373737;
				}

				.header-main{
					background-color: #656565;
				}

				footer{
					background: #373737;
					border-top: 5px solid #656565;
				}

			@endif

		@endif 
	</style>
@endsection


@section('content')

<!--      ESSA PARTE SÓ É MOSTRADA NO LINK EXTERNO       -->


<!--    fim do header     -->


<div class="container" id="container">

	<div id="learning_objects" class="annotated-list">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">

					<button type="button" class="navbar-toggle collapsed navbar-text" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					   <!-- <span class="sr-only">Toggle navigation</span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>-->
					    <i class="fa fa-bars" aria-hidden="true" alt="Menu expansível"></i>
					</button>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-text">

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
							<select class="selectpicker" id="select-year">
								<option selected disabled="">Ano</option>
								<option value="0">Todos</option>

								@foreach ($current->years_by_course as $year)
									@if($year != null)
										@if($current->year == $year)
											<option value="{{ $year }}" selected>{{ $year }}</option>
										@else
											<option value="{{ $year }}">{{ $year }}</option>
										@endif
									@endif


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
						
							<span class="input-group-addon">
								<img src="{{asset("/icons/buscar.svg")}}" alt="Ícone de Lupa">
								<!--<i class="fa fa-search" aria-hidden="true"></i>-->

							</span>
							<input type="text" class="form-control search" placeholder="Busca">

							{{-- //Botões de Ordenação do List.js //

							<button class="sort" data-sort="title">Título</button>
							<button class="sort" data-sort="course">Curso</button>
							<button class="sort" data-sort="module">Modulo</button>

							--}}				
						</div>
					</form>
				</div>
			</div>
		</nav>

		<ul class="row list conteudo">
			@forelse($learning_objects as $learning_object)
				<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<button class="thumbnail no-shadow" type="button" data-toggle="modal" data-target="#learning_object{{ $learning_object->id }}">
							<span class="label label-default">
								<div class="icone-objeto">
									<img src="{{asset("/icons/". $learning_object->type->id .".svg")}}">
								</div> 
								
								{{ $learning_object->type->name }}
							</span>
							<div class="wrap-image">
								<img class="max-size" src="/covers/{{ $learning_object->cover}}" alt="Image do objeto">
							</div>
							<div class="caption"> 
								<h3>{{  str_limit($learning_object->title, 60) }}</h3>
							</div>	
					</button>
				
					<div class="modal fade" id="learning_object{{ $learning_object->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="fechar" data-dismiss="modal" aria-label="Close">
									<img src="{{ asset('icons/fechar.svg') }}">
									</button> 

									<img class="modal-image" src="/covers/{{ $learning_object->cover}}" alt="Imagem do objeto">
									<div class="modal-caption">
										<h3 class="modal-title">{{ $learning_object->title }}</h3>
										<p class="modal-author">{{ $learning_object->author }}</p>
										<p class="modal-year">{{ $learning_object->year }}</p>
										<a class="btn-download" href="{{ $learning_object->link }}" role="button" target="_blank">
											<i class="fa fa-external-link" aria-hidden="true"></i>
											<!--<i class="fa fa-external-link-square" aria-hidden="true"></i>-->
											Abrir
										</a> 
									</div>
								</div>
								
								@if (!empty($learning_object->summary))
								<div class="modal-body">

									<p><strong>Resumo:</strong><br>
										{{ $learning_object->summary }}
									</p>
								</div>
								@endif
						
							</div>
						</div>
					</div>	
				</li>

			@empty
				<div class="curso-vazio">Não há materiais nessa categoria.</div>
			@endforelse
		</ul>
		<div class="pagination-container">
		<ul class="pagination"></ul>
		</div>
	</div>
</div>

@endsection


@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

<script>
	// modais 
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').focus();
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
	
	// list.js
	var options = {
		valueNames: ['modal-title', 'modal-author', 'modal-body'],
		page: 9,
		pagination: true
	};

	var learning_objectList = new List('learning_objects', options);

	$(document).on("keypress", "input", function(event) { 
    return event.keyCode != 13;
	});
</script>



@endsection
