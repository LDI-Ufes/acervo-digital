@extends('layouts.app')

@section('content')

<!-- VISUALIZAR TIPOS DE CURSO -->
<section class="content visualizarLivro">

<div class="breadcrumb">
    Você está em: Tipos de Curso <span class="greather-than">></span>{{ $course_type->name }}
</div>

<!-- CABEÇALHO -->
<!-- <div class="content-header">
  <h1>
    Tipos de Curso
    <small>Visualizar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tipos de Cursos</li>
    <li><a href="{!! url('/admin/course_types') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-eye"></i> Visualizar</li>
  </ol>
</div> -->
<!-- FIM CABEÇALHO -->


        <h1 class="box">Informações do Tipo de Curso</h3>
        <div class="box-body">
          <div class="row">
              <div class="ficha">
              <ul>
              	<li><b>Nome:</b> {{ $course_type->name }} </li>
                <li><b>ID:</b> {{ $course_type->id }}</li>
              </ul>
            </div>
          </div> 
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('course_types.edit', $course_type->id ) }}" title="Editar">
                <button class="btn-s -prim">Editar</button>
              </a>
            </div>
          </div>         

  </div>
</section> 

<!-- FIM VISUALIZAR TIPOS DE CURSO -->

@endsection
