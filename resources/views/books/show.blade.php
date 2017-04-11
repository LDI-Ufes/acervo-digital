@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Livros
    <small>Visualizar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-book"></i> Livros</li>
    <li><a href="{{ route('books.index') }}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-eye"></i> Visualizar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- VISUALIZAR LIVRO -->
<section class="content visualizarLivro">
  <div class="row">
    <section class="col-md-12">
      <div class="box box-ldi" title="{{ $book->course->name }}">
        <div class="box-header">
          <h3 class="box-title">Livro de {{ $book->course->name }}</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table>
                <tr>
                  <td class="box-curso" title="{{ $book->course->name }}"></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="miniatura">
              <div class="img">
                <span>{{ $book->cover }}</span>
              </div>
            </div>
            <div class="ficha">
              <ul>
                <li><b>Curso:</b> {{ $book->course->name }}</li>
                <li><b>Módulo:</b> {{ $book->module }}</li>
                <li><b>Título:</b> {{ $book->title }}</li>
                <li><b>Autor:</b> {{ $book->author }}</li>
                <li><b>Endereço:</b> {{ $book->pdf }}</li>
                <li>
                  <b>Resumo</b> <br>
                  {{ $book->summary }}
                </li>
              </ul>
            </div>
          </div>
          
          <hr>

          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('books.edit', $book->id ) }}" title="Editar">
                <button class="btn btn-primary">Editar</button></span>
              </a>
              <form method="POST" action="{!! route('books.destroy', $book->id) !!}" accept-charset="UTF-8" style="display: inline;" novalidate="novalidate">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" title="Deletar" onclick="return confirm( & quot; Tem certeza que quer apagar? & quot; )" id="sometest">
                  Deletar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</section> <!-- FIM VISUALIZAR LIVRO -->

@endsection
