@extends('layouts.app')

@section('content')

<!-- VISUALIZAR TIPOS DE LINK -->
<section class="content visualizarLivro">

<div class="breadcrumb">
    Você está em: Tipos de Link <span class="greather-than">></span>{{ $link_type->name }}
</div>

<!-- CABEÇALHO -->
<!-- <div class="content-header">
  <h1>
    Tipos de Link
    <small>Visualizar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tipos de Links</li>
    <li><a href="{!! url('/admin/link_types') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-eye"></i> Visualizar</li>
  </ol>
</div> -->
<!-- FIM CABEÇALHO -->


        <h1 class="box">Informações do Tipo de Link</h3>
        <div class="box-body">
          <div class="row">
              <div class="ficha">
              <ul>
              	<li><b>Nome:</b> {{ $link_type->name }} </li>
                <li><b>ID:</b> {{ $link_type->id }}</li>
                <li><b>icone:</b> {{ $link_type->icon }} <i class="{{ $link_type->icon }}"></i> </li>
                <li><b>call to action:</b> {{ $link_type->call_to_action }}</li>
              </ul>
            </div>
          </div> 
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('link_types.edit', $link_type->id ) }}" title="Editar">
                <button class="btn-s -prim">Editar</button>
              </a>
            </div>
          </div>         

  </div>
</section> 

<!-- FIM VISUALIZAR TIPOS DE LINK -->

@endsection
