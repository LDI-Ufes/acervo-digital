@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
	  Tipos de Curso    
    <small>Cadastrar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tipos de Curso</li>
    <li><a href="{!! url('/admin/course_types') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-plus-circle"></i> Cadastrar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->


<!-- ADICIONAR USUÁRIO -->
<section class="content">
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('course_types.store') }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            @include ('course_types/form')
          </form>

        </div>
      </div>
    </section>
  </div>
</section>

@endsection
