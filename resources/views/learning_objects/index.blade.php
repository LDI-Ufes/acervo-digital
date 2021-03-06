@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
    <h1>
        Objetos
        <small>Listagem</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-book"></i> Objetos</li>
        <li class="active"><i class="fa fa-list"></i> Listagem</li>
    </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- TABELA - LISTA DE LIVROS -->
<section class="content">
    <div class="row">
        <section class="listaLivros col-md-12 connectedSortable ui-sortable">
            <div class="box box-ldi" id="object_list">

                <div class="box-header">
                    <div>
                        <h3 class="box-title">
                            <i class="fa fa-book"></i> Objetos cadastrados
                        </h3>
                        <!-- CAMPO DE PESQUISA -->
							<input type="text" class="search" placeholder="Busca">
						<!-- ################# -->
                    </div>
                    <hr style="margin-bottom:0;">
                </div>

                <div class="box-body table-responsive">
                    <table id="projecttable" class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Objeto</th>
                                <th>Responsável</th>
                                <th class="icone"></th>
                                <th class="icone"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                          @foreach( $all_learning_objects as $learning_object)
                          <tr>
				            <td class="box-curso" style="background-color:{{ $learning_object->course->bg_color }}" title="{{ $learning_object->course->name }}">{{ $learning_object->course->short }}</td>
                         	<td class="table-title"  >{{ $learning_object->title }}</td>
	                        <td class="table-author" >{{ $learning_object->author }}</td>
        	                <td><a href="{{ route('learning_objects.show', $learning_object->id) }}"><i class="fa fa-eye"></i></a></td>
                 	        <td><a href="{{ route('learning_objects.edit', $learning_object->id) }}"><i class="fa fa-edit"></i></a></td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

			<div class="pagination-container">
				<ul class="pagination"></ul>
			</div>

                </div>
            </div>
        </section>
    </div>
</section>
<!-- FIM TABELA - LISTA DE LIVROS -->

@endsection


@section('scripts')
    <script src="/js/ldi.list.min.js"></script>

	<script>
		
		// list.js
		var options = {
			valueNames: ['table-title', 'table-author'],
			page: 15,
			pagination: true
		};

		var learning_objectList = new List('object_list', options);

	</script>
@endsection
