@extends('layouts.app')

@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Tipos de Objetos de Aprendizagem
    <small>Visualizar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tipos de Objetos de Aprendizagem</li>
    <li><a href="{!! url('/admin/object_types') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-eye"></i> Visualizar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- VISUALIZAR TIPOS DE OBJETO -->
<section class="content visualizarLivro">
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi" title="{{ $object_type->name }}">
        <div class="box-header">
          <h3 class="box-title">Objeto tipo {{ $object_type->name }}</h3>
        </div>
        <div class="box-body">
          <div class="row"> 
            <div class="miniatura">
		          <div class="img" style="overflow:hidden">
		            <img src="{{asset("/icons/". $object_type->id .".svg")}}">
                <span> {{ $object_type->id }}.svg </span>
              </div>
            </div>
              <div class="ficha">
              <ul>
              	<li><b>Tipo:</b> {{ $object_type->name }} </li>
                <li><b>ID:</b> {{ $object_type->id }}</li>
              </ul>
            </div>
          </div> 
          <hr>
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('object_types.edit', $object_type->id ) }}" title="Editar">
                <button class="btn btn-primary">Editar</button>
              </a>
            </div>
          </div>         
        </div>
    </section>
  </div>
</section> 

<!-- FIM VISUALIZAR TIPOS DE OBJETO -->

@endsection
