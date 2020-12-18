@extends('layouts.public')

@section('content')

<div class="container">
  <form class="form-pesquisa" action="/catalogo" method="GET">  
    <input type="search" name="pesquisa" placeholder="Pesquisar no Acervo..." id="search-bar">
    <button type="submit" class="btn-primario"><i class="fas fa-search"></i></button>     
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

