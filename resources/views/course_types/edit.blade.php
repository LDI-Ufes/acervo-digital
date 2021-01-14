@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<!-- <section class="content-header">
  <h1>
    Tipos de Curso
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tipos de Curso</li>
    <li><a href="{!! url('/admin/course_types') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-plus-circle"></i> Editar</li>
  </ol>
</section> -->
<!-- FIM CABEÇALHO -->

<!-- ADICIONAR USUÁRIO -->
<section class="content">

<div class="breadcrumb">
    Você está em: Tipos de Curso <span class="greather-than">></span>{{ $course_type->name }}<span class="greather-than"> > </span> Editar
    </div>

      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('course_types.update', $course_type->id) }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('course_types/form', [
            'editLabel' => 'Editar Tipo de Curso',
            'submitButtonLabel' => 'Atualizar',
            'course_type' => $course_type,				
            ])
          </form>

        </div>
  </div>
</section>

@endsection
