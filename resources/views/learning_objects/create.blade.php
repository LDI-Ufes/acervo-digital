@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Objetos
    <small>Cadastrar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-book"></i> Objetos</li>
    <li><a href="{{ route('learning_objects.index') }}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-plus-circle"></i> Cadastrar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- ADICIONAR LIVRO -->
<section class="content">
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
		 $('#course_id').on('change', function(e){
			 $('#module').empty();
			 $('#module').append($('<option/>', { 
					'value': 0,
					'text': 'Sem módulo' 
				}));
		 	 for (var i=0; i < this.options[this.selectedIndex].getAttribute('data-module-number'); i++){
				$('#module').append($('<option/>', { 
					'value': (i+1),
					'text': (i+1) 
				}));
			 }
		 });
	</script>
@endsection
