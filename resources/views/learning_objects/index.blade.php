@extends('layouts.app')
@section('content')

<!-- TABELA - LISTA DE LIVROS -->
<section class="content">

<div class="breadcrumb">
    Você está em: Materiais Didáticos <span class="greather-than">></span>Listagem
</div>

    <div class="row">
        <section class="listaLivros col-md-12 connectedSortable ui-sortable">
            <div class="box box-ldi" id="object_list">

                <div class="box-header">
                    <div>
                        <h1 class="box-title">
                            Materiais Didáticos Cadastrados
                        </h1>
                        <!-- CAMPO DE PESQUISA -->
							<input type="text" class="search" placeholder="Busca">
						<!-- ################# -->
                    </div>
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
                                <td class="box-curso" style="color:black" title="cursos relacionados">{{ $learning_object->course->pluck('short')->implode('/') }}</td>
                                
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
