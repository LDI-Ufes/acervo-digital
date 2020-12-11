@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Objetos
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-book"></i> Objetos</li>
    <li><a href="{{ route('learning_objects.index') }}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-edit"></i> Editar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- EDITAR LIVRO -->
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

          <form method="POST" action="{{ route('learning_objects.update', $learning_object->id) }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('learning_objects/form', [
            'submitButtonLabel' => 'Atualizar',
            'learning_object' => $learning_object,				
            ])
          </form>
        </div>
      </div>
    </section>
  </div>
</section> <!-- FIM EDITAR LIVRO -->

@endsection

@section('scripts')
<script type="text/javascript">
$('.opcao-link').change(function(){
  if(this.value == "usar_link"){
    $('#link_input').removeAttr('disabled');
    $('#upload_input').attr('disabled','disabled');
    $('#upload_input').val("");
  } else {
    $('#upload_input').removeAttr('disabled');
    $('#link_input').attr('disabled','disabled');
    $('#link_input').val("");
  }
});
</script>
@endsection
