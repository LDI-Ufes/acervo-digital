@extends('layouts.public')

@section('content')


<main class="pagina-material container">
  @forelse($learning_objects as $item)
    @include('shelf/card')
  @empty
    <div>Não há materiais cadastrados ainda.</div>
  @endforelse
</main>


<nav class="container">
  {{ $learning_objects->links() }}
</nav>

@endsection

