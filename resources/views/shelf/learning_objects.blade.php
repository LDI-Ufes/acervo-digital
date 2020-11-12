@extends('layouts.public')
@section('styles')

@endsection
@section('content')

<main class="pagina-lista container">

  <section class="breadcrumb">
      Você está em: <span>{{ $current->course }}</span>
  </section>

  <section class="pagina-cabecalho">
      <!-- <span>Resultados de busca:</span> -->
      <h1>{{ $current->course }}</h1>  
  </section>

  <section class="container-cards">
    @forelse($learning_objects as $item)

      @include('shelf/card')

    @empty
      <div class="curso-vazio">Não há materiais nessa categoria.</div>
    @endforelse

  </section>
</main>

@endsection
@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/js/ldi.list.min.js"></script>

<script>
// lazyloading
async function imageExists(url){

  let image

  try {
    image = await fetch(url, { method: 'HEAD' })
  } catch (error) {
    console.log(`Imagem ${url} não foi encontrada.`)
  }

  return !!image.ok
}

function runLoader() {
  const defer = document.getElementsByTagName('img')
  Array.prototype.slice.call(defer).map(lazyLoad)
}

async function lazyLoad(item) {
  const imagePath = item.getAttribute('data-src') 
  if (imagePath && await imageExists(imagePath))
    item.setAttribute('src', imagePath)
}

runLoader();

</script>

@endsection
