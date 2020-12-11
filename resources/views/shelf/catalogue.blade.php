@extends('layouts.public')

@section('content')

<main class="pagina-material container">

  
  <form class="container" role="search" method="get" action="">
    <input type="search" name="pesquisa" placeholder="Pesquisa por texto..."></input>
    <button id="pesquisar">Pesquisar</button>
  </form>




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

