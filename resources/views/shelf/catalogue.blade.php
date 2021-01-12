@extends('layouts.public')

@section('content')

<div class="container">
  <form class="form-pesquisa" role="search" action="/catalogo" method="GET">  

    <input type="search" 
      name="pesquisa" 
      placeholder="Pesquisar no Acervo..." 
      aria-label="Pesquisar materiais no acervo"
      minlength="4"
      {{ $current->search != '' ? "value=$current->search" : '' }}
      id="search-bar">

    <select name="curso">
      <option value="">Curso</option>
      @foreach ($current->course_list as $key => $name) 
        <option value="{{ $key }}" {{ $key == $current->course ? 'selected=selected' : '' }}>{{ $name }}</option>
      @endforeach
    </select>

    <select name="ano">
      <option value="">Ano</option>
      @foreach ($current->year_list as $year)
        <option value="{{ $year }}" {{ $year == $current->year ? 'selected=selected' : '' }}>{{ $year }}</option>
      @endforeach
    </select>

    <select name="tipo">
      <option value="">Tipo de Material</option>
      @foreach ($current->type_list as $key => $name)
        <option value="{{ $key }}" {{ $key == $current->type_id ? 'selected=selected' : '' }}>{{ $name }}</option>
      @endforeach
    </select>

    <select name="tags">
      <option value="">Tags</option>
      @foreach ($current->tag_list as $key => $name)
        <option value="{{ $key }}" {{ $key == $current->tags ? 'selected=selected' : ''  }}>{{ $name }}</option>
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
    {{ $learning_objects->appends( request()->query() )->links() }}
  </nav>

</main>

@endsection

