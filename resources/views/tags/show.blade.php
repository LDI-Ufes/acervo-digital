@extends('layouts.app')

@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Tags
    <small>Visualizar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tags</li>
    <li><a href="{!! url('/admin/tags') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-eye"></i> Visualizar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- VISUALIZAR CURSOS -->
<section class="content visualizarLivro">
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi" title="{{ $tag->name }}">
        <div class="box-header">
          <h3 class="box-title">Tag {{ $tag->name }}</h3>
        </div>
        <div class="box-body">
          <div class="row"> 
            <div class="ficha">
              <ul>
                <li><b>Nome:</b> {{ $tag->name }} </li>
                <li><b>ID:</b> {{ $tag->id }} </li>
              </ul>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('tags.edit', $tag->id ) }}" title="Editar">
                <button class="btn btn-primary">Editar</button>
              </a>
              <form method="POST" action="{!! route('tags.destroy', $tag->id) !!}" accept-charset="UTF-8" style="display: inline;" novalidate="novalidate">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" title="Deletar" onclick="return confirm('Tem certeza que quer apagar?')">
                  Deletar
                </button>
              </form>
            </div>
          </div>         
        </div>
    </section>
  </div>
</section> 

<!-- FIM VISUALIZAR CURSOS -->

@endsection
