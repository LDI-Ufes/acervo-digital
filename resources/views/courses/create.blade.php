@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<!-- <section class="content-header">
  <h1>
    Cursos
    <small>Cadastrar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Cursos</li>
    <li><a href="{!! url('/admin/courses') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-plus-circle"></i> Cadastrar</li>
  </ol>
</section> -->
<!-- FIM CABEÇALHO -->


<!-- ADICIONAR CURSO -->
<section class="content">

<div class="breadcrumb">
    Você está em: Cursos <span class="greather-than">></span>Cadastrar
</div>
      <div class="box box-ldi">
        <div class="box-body">
        <div>
          <h1 class="box-title">Cadastrar Curso</h1>
        </div>
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('courses.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            @include ('courses/form')
          </form>

        </div>
  </div>
</section>

@endsection

