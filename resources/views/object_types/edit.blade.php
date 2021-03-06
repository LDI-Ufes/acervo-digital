@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Tipos de Objetos de Aprendizagem
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tipos de Objetos de Aprendizagem</li>
    <li><a href="{!! url('/admin/object_types') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-plus-circle"></i> Editar</li>
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
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('object_types.update', $object_type->id) }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('object_types/form', [
            'submitButtonLabel' => 'Atualizar',
            'object_type' => $object_type,				
            ])
          </form>

        </div>
      </div>
    </section>
  </div>
</section>

@endsection
