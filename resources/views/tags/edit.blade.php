@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Tags
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tags</li>
    <li><a href="{!! url('/admin/tags') !!}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-plus-circle"></i> Editar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- ADICIONAR TAGS -->
<section class="content">
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('tags.update', $tag->id) }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('tags/form', [
            'submitButtonLabel' => 'Atualizar',
            'tag' => $tag,				
            ])
          </form>

        </div>
      </div>
    </section>
  </div>
</section>

@endsection
