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

		small a{
			color: {{ $learning_objects->first()->course->fg_color }} !important; 
		}

		@endif 
	</style>

		<!-- HEADER -->
	<style>
		@if (!empty($learning_objects))
		
		.header-top{
			background-color: {{ $learning_objects->first()->course->aux_color }};
		}

		.header-main{
			background-color: {{ $learning_objects->first()->course->bg_color }};
		}

		@endif 
	</style>

@endsection


@section('content')

<!--      ESSA PARTE SÓ É MOSTRADA NO LINK EXTERNO       -->

<header>
  <div class="header-top">
    <div class='container'>
      <p class="navbar-text"><a href="http://www.especializacao.aperfeicoamento.ufes.br/">
        <i class="fa fa-home"></i>  
      Início</a></p>
      <p class="navbar-text"><a href="http://www.eadufes.org/" target="_blank">
        <i class="fa fa-info-circle"></i>  
      EAD na Ufes</a></p>
      <p class="navbar-text"><a href="https://aluno.ufes.br/" target="_blank">
        <i class="fa fa-graduation-cap"></i>  
      Portal do Aluno</a></p>
      <p class="navbar-text"><a href="http://www.bc.ufes.br/" target="_blank">
        <i class="fa fa-book"></i>  
      Biblioteca Ufes</a></p>
      <p class="navbar-text"><a href="">  <!-- link para home  -->
        <i class="fa fa-desktop"></i>  
      Acervo Digital EAD</a></p>
    </div>  
  </div>

  <div class="header-main">
    <div class='container'>
      <div class="tamanho">
        <div id="logo">
          <a href="">  <!-- link para home  -->
            <img src="{{asset("/icons/marca-ufes-cor.svg")}}">
          </a>
        </div>
        <div class="rotulo">
          <h1>Acervo Digital</h1>
          <h2>{{$current->course}}</h2>
        </div>
      </div>  
    </div>  
  </div>

<div class="breadcrumbs">
	<div class="container">
	<small> <a href="#">Acervo SEAD</a> &raquo; {{$current->course}} {{--&raquo; {{$current->type}} &raquo; {{ $current->year }}--}} </small> <!-- link para home  -->

	</div>
</div>

</header>

<!--    fim do header     -->




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
						{{-- <input type="text" class="form-control" placeholder="Busca"> --}}
						<input type="text" class="form-control search" placeholder="Busca">

						{{-- //Botões de Ordenação do List.js //

						<button class="sort" data-sort="title">Título</button>
						<button class="sort" data-sort="course">Curso</button>
						<button class="sort" data-sort="module">Modulo</button>

						--}}

						<div class="input-group-btn">
							<button type="submit">
								<img src="{{asset("/icons/buscar.svg")}}">
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
								<img src="{{asset("/icons/". $learning_object->type->id .".svg")}}">
							</div> 
							
							{{ $learning_object->type->name }}
						</span>
						<div class="wrap-image">
							<img class="max-size" src="/covers/{{ $learning_object->cover}}" alt="Image do objeto">
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
									<img src="{{asset("icons/fechar.svg")}}">
									</button> 

									<img class="modal-image" src="/covers/{{ $learning_object->cover}}" alt="Imagem do objeto">
									<div class="modal-caption">
										<h3 class="modal-title">{{ $learning_object->title }}</h3>
										<p class="modal-author">{{ $learning_object->author }}</p>
										<p class="modal-year">{{ $learning_object->year }}</p>
										<a class="btn-download" href="{{ $learning_object->link }}" role="button">
											<img src="{{asset("/icons/baixar.svg")}}">
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
				<div>Não há materiais nessa categoria.</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

<script>
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').focus();
	});


	$('#select-type').on('change', function(){
		params = document.location.href.split('/');
		document.location.href = '/shelf/course/'+ params[5] +'/type/'+ this.value +'/year/'+ params[9];
	});


	$('#select-year').on('change', function(){
		params = document.location.href.split('/');
		document.location.href = '/shelf/course/'+ params[5] +'/type/'+ params[7] +'/year/'+ this.value;
	});
	

	var options = {
		valueNames: ['modal-title', 'modal-body'],
		page: 6,
		pagination: true
	};

	var learning_objectList = new List('learning_objects', options);
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@endsection
