@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Tipos de Objetos de Aprendizagem
    <small>Listagem</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tipos de Objetos de Aprendizagem</li>
    <li class="active"><i class="fa fa-list"></i> Listagem</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- TABELA - LISTA DE USUÁRIOS -->
<section class="content">
    <div class="row">
        <section class="listaCursos col-md-12 connectedSortable ui-sortable">
            <div class="box box-ldi">
                <div class="box-header">
                    <div>
                        <h3 class="box-title">
                            <i class="fa fa-university"></i> Tipos de objetos cadastrados
                        </h3>
                    </div>
                    <hr style="margin-bottom:0;">
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Ícone</th>
                                <th>Tipo</th>
                                <th class="icone"></th>
                                <th class="icone"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $all_object_types as $object_type)
				  <tr>
				    <td class="box-icone" title="{{ $object_type->name }}"><img src="{{asset("/icons/". $object_type->id .".svg")}}"></td>
				    <td>{{ $object_type->name }}</td>
                    <td><a href="{{ route('object_types.show', $object_type->id) }}"><i class="fa fa-eye"></i></a></td>
				    <td><a href="{{ route('object_types.edit', $object_type->id) }}"><i class="fa fa-edit"></i></a></td>
				  </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
</section>
<!-- FIM TABELA - LISTA DE USUÁRIOS -->

@endsection
