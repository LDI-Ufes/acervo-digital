@extends('layouts.app')

@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Tipos de Curso
    <small>Visualizar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tipos de Curso</li>
    <li><i class="fa fa-list"></i> Listagem</li>
    <li class="active"><i class="fa fa-eye"></i> Visualizar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- VISUALIZAR TIPOS DE CURSO -->
<section class="content visualizarLivro">
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi" title="{{ $course_type->name }}">
        <div class="box-header">
          <h3 class="box-title">Curso tipo {{ $course_type->name }}</h3>
        </div>
        <div class="box-body">
          <div class="row">
              <div class="ficha">
              <ul>
              	<li><b>Nome:</b> {{ $course_type->name }} </li>
                <li><b>ID:</b> {{ $course_type->id }}</li>
              </ul>
            </div>
          </div> 
          <hr>
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('course_types.edit', $course_type->id ) }}" title="Editar">
                <button class="btn btn-primary">Editar</button>
              </a>
            </div>
          </div>         
        </div>
    </section>
  </div>
</section> 

<!-- FIM VISUALIZAR TIPOS DE CURSO -->

@endsection
