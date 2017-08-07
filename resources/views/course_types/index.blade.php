@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Tipos de Curso
    <small>Listagem</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Cursos</li>
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
                            <i class="fa fa-university"></i> Tipos de cursos cadastrados
                        </h3>
                    </div>
                    <hr style="margin-bottom:0;">
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Tag</th>
                                <th>Tipo de Curso</th>
                                <th class="icone"></th>
                                <th class="icone"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $all_course_types as $course_type)
				  <tr>
				    <td class="box-curso" title="{{ $course_type->name }}"></td>
				    <td>{{ $course_type->name }}</td>
                    <td><a href="{{ route('course_types.show', $course_type->id) }}"><i class="fa fa-eye"></i></a></td>
				    <td><a href="{{ route('course_types.edit', $course_type->id) }}"><i class="fa fa-edit"></i></a></td>
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
