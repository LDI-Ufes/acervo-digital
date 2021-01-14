@extends('layouts.app')
@section('content')



<!-- ADICIONAR LIVRO -->
<section class="content">

<div class="breadcrumb">
    Você está em: Materiais Didáticos <span class="greather-than">></span>Cadastrar
</div>

  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('learning_objects.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            @include ('learning_objects/form')
          </form>
        </div>
      </div>
    </section>
  </div>
</section> <!-- FIM ADICIONAR LIVRO -->

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
