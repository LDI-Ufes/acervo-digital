@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Livros
    <small>Cadastrar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-book"></i> Livros</li>
    <li><a href="{{ route('books.index') }}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-plus-circle"></i> Cadastrar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- ADICIONAR LIVRO -->
<section class="content">
  <div class="row">
    <section class="col-md-12">
      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('books.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            @include ('books/form')
          </form>
        </div>
      </div>
    </section>
  </div>
</section> <!-- FIM ADICIONAR LIVRO -->

@endsection
