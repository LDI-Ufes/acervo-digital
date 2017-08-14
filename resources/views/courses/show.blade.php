@extends('layouts.app')

@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Cursos
    <small>Visualizar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Cursos</li>
    <li><i class="fa fa-list"></i> Listagem</li>
    <li class="active"><i class="fa fa-eye"></i> Visualizar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- VISUALIZAR CURSOS -->
<section class="content visualizarLivro">
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi" title="{{ $course->name }}">
        <div class="box-header">
          <h3 class="box-title">Curso {{ $course->name }}</h3>
        </div>
        <div class="box-body">
          <div class="row"> 
            <div class="miniatura">
		        <div class="img" style="overflow:hidden">
              	</div>
            </div>
              <div class="ficha">
              <ul>
              	<li><b>Nome:</b> {{ $course->name }} </li>
                <li><b>ID:</b> {{ $course->id }} </li>
                <li><b>Tipo de Curso:</b> {{ $course->type->name}} </li>
                <li><b>Número de Módulos:</b> {{ $course->modules }} </li>
                <li><b>Cor Principal:</b> {{ $course->bg_color }} </li>
                <li><b>Cor Auxiliar:</b> {{ $course->fg_color }} </li>
                <li><b>Cor da Tipografia:</b> {{ $course->aux_color}} </li>
                <li><b>Abreviação:</b> {{ $course->short }} </li>
                <li><b>Ativo</b> 
                	@if ($course->active)
						Sim, ativo.
					@else
						Não, desativado.
					@endif
              </ul>
            </div>
          </div> 
          <hr>
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('courses.edit', $course->id ) }}" title="Editar">
                <button class="btn btn-primary">Editar</button>
              </a>
            </div>
          </div>         
        </div>
    </section>
  </div>
</section> 

<!-- FIM VISUALIZAR CURSOS -->

@endsection
