@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
    <h1>
        Livros
        <small>Listagem</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-learning_object"></i> Livros</li>
        <li class="active"><i class="fa fa-list"></i> Listagem</li>
    </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- TABELA - LISTA DE LIVROS -->
<section class="content">
    <div class="row">
        <section class="listaLivros col-md-12 connectedSortable ui-sortable">
            <div class="box box-ldi">
                <div class="box-header">
                    <div>
                        <h3 class="box-title">
                            <i class="fa fa-learning_object"></i> Livros cadastrados
                        </h3>
                    </div>
                    <hr style="margin-bottom:0;">
                </div>

                <div class="box-body table-responsive">
                    <table id="projecttable" class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Livro</th>
                                <th>Autor</th>
                                <th class="icone"></th>
                                <th class="icone"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $all_learning_objects as $learning_object)
                          <tr>
                            <td class="box-curso" title="{{$learning_object->course->name }}"></td>
                            <td>{{ $learning_object->title }}</td>
                            <td>{{ $learning_object->author }}</td>
                            <td><a href="{{ route('learning_objects.show', $learning_object->id) }}"><i class="fa fa-eye"></i></a></td>
                            <td><a href="{{ route('learning_objects.edit', $learning_object->id) }}"><i class="fa fa-edit"></i></a></td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

		    {{ $all_learning_objects->links() }}
                </div>
            </div>
        </section>
    </div>
</section>
<!-- FIM TABELA - LISTA DE LIVROS -->

@endsection
