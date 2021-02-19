@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Objetos
    <small>Visualizar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-book"></i> Objetos</li>
    <li><a href="{{ route('learning_objects.index') }}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-eye"></i> Visualizar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- VISUALIZAR LIVRO -->
<section class="content visualizarLivro">
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi" title="{{ $learning_object->course->pluck('short')->implode(' ') }}">
        <div class="box-header">
          <h3 class="box-title">Objeto de {{ $learning_object->course->pluck('short')->implode(' ') }}</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table>
                <tr>
                  <td class="box-curso" title="{{ $learning_object->course->pluck('short')->implode(' ') }}"></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="miniatura col-xs-12 col-md-6">
		    <div class="img" style="overflow:hidden">
		<img src="/covers/{{ $learning_object->cover }}">
                <span>{{ $learning_object->cover }}</span>
              </div>
            </div>
            <div class="ficha col-xs-12 col-md-6">
              <ul>
                <li><b>Curso:</b> {{ $learning_object->course->pluck('short')->implode(' ') }}</li>
                <!--<li><b>Módulo:</b> {{ $learning_object->module }}</li>-->
                <li><b>Título:</b> {{ $learning_object->title }}</li>
                <li><b>Autor:</b> {{ $learning_object->author }}</li>
		            <li><b>Ano:</b> {{ $learning_object->year }}</li>
                <li><b>Endereço:</b> {{ $learning_object->link }}</li>
                <li>
                  <b>Resumo</b> <br>
                  {{ $learning_object->summary }}
                </li>
                <li><b>Tags:</b> {{ $learning_object->tags()->pluck('name')->implode(' / ') }} </li>
              </ul>
            </div>
          </div>
          
          <hr>

          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('learning_objects.edit', $learning_object->id ) }}" title="Editar">
                <button class="btn btn-primary">Editar</button></span>
              </a>
              <form method="POST" action="{!! route('learning_objects.destroy', $learning_object->id) !!}" accept-charset="UTF-8" style="display: inline;" novalidate="novalidate">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" title="Deletar" onclick="return confirm('Tem certeza que quer apagar?')" id="sometest">
                  Deletar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- adicionar novos links ou arquivos ao material -->
  <div>
    <form 
      method="POST" 
      action="{{ route('learning_objects.store') }}" 
      accept-charset="UTF-8" 
      enctype="multipart/form-data" 
      class="form-horizontal">
      {{ csrf_field() }}
      @include ('links/form')
    </form>
  </div>

</section> <!-- FIM VISUALIZAR LIVRO -->

@endsection
