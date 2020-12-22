@extends('layouts.public')

@section('content')

<div class="container">
  <form class="form-pesquisa" role="search" action="/catalogo" method="GET">  

    <input type="search" 
      name="pesquisa" 
      placeholder="Pesquisar no Acervo..." 
      aria-label="Pesquisar materiais no acervo"
      minlength="4"
      id="search-bar">

    <select name="curso">
      <option value="">Curso</option>
      @foreach ($current->course as $key => $name) 
        <option value="{{ $key }}">{{ $name }}</option>
      @endforeach
    </select>

    <select name="ano">
      <option value="">Ano</option>
      @foreach ($current->year as $year)
        <option value="{{ $year }}">{{ $year }}</option>
      @endforeach
    </select>

    <select name="tipo">
      <option value="">Tipo de Material</option>
      @foreach ($current->type as $key => $name)
        <option value="{{ $key }}">{{ $name }}</option>
      @endforeach
    </select>

    <select name="tag">
      <option value="">Tags</option>
      @foreach ($current->tag as $key => $name)
        <option value="{{ $key }}">{{ $name }}</option>
      @endforeach
    </select>

    <button type="submit" class="btn-primario">
      <i class="fas fa-search"></i>
    </button>     

  </form>
</div>

<main class="pagina-material container">

  @forelse($learning_objects as $item)
    @include('shelf/card')
  @empty
    <div>A pesquisa não retornou nenhum resultado.</div>
  @endforelse


  <nav class="container">
    {{ $learning_objects->links() }}
  </nav>

</main>

@endsection

