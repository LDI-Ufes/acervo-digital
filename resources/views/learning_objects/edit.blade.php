@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Livros
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-learning_object"></i> Livros</li>
    <li><a href="{{ route('learning_objects.index') }}"><i class="fa fa-list"></i> Listagem</a></li>
    <li class="active"><i class="fa fa-edit"></i> Editar</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- EDITAR LIVRO -->
<section class="content">
  <div class="row">
    <section class="col-md-12">
      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('learning_objects.update', $learning_object->id) }}" accept-charset="UTF-8" class="form-horizontal">
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
		 });	</script>
@endsection
