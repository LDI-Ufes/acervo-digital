@extends('layouts.public')

@section('content')

  <section class="breadcrumb">
    Você está em: <a href="#">???</a> <i class="fas fa-greater-than"></i><span>{{ $learning_object->title }}</span>
  </section>

  <div class="conteudo-material">
    <span class="tipo"> {{ $learning_object->type->name  }} </span>
  </div>

  <h1 class="titulo"> {{ $learning_object->title }} </h1>
  <p class="autor"> {{ $learning_object->author }} </p>
  <p class="edicao"> Edição ??? (não há no banco) </p>

  <div class="acesso">
    <a class="btn-primario" href="{{ $learning_object->link }}" target="_blank"><i class="fa fa-file-pdf"></i>PDF? Interativo? Livro?</a>
  </div>

  <blockquote class="caixa-info">
    <h2>Inscruções de acesso</h2>
    <p>As instruções de acesso vão aqui.</p>
  </blockquote>


  <hr />
  <hr />

  <div>
    <!-- alguns exemplos de como pegar as informações do banco de dados -->
    <ul>
      <li><b>Curso:</b> {{ $learning_object->course->pluck('short')->implode(' ') }}</li>
      <li><b>Título:</b> {{ $learning_object->title }}</li>
      <li><b>Autor:</b> {{ $learning_object->author }}</li>
      <li><b>Ano:</b> {{ $learning_object->year }}</li>
      <li><b>Endereço:</b> {{ $learning_object->link }}</li>
      <li><b>Tipo de Material:</b> {{ $learning_object->type->name  }} </li>
      <li>
        <b>Resumo</b> <br>
        {{ $learning_object->summary }}
      </li>
      <li><b>Tags:</b> {{ $learning_object->tags->pluck('name')->implode(' / ') }}  </li>
    </ul>
  </div>

@endsection


