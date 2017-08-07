@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Cursos
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
                            <i class="fa fa-university"></i> Cursos cadastrados
                        </h3>
                    </div>
                    <hr style="margin-bottom:0;">
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Tag</th>
                                <th>Curso</th>
                                <th>Tipo</th>
                                <th>Módulos</th>
	                            <th>Situaçao</th>
                                <th class="icone"></th>
                                <th class="icone"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $all_courses as $course)
				  <tr>
					  <td class="box-curso" style="background-color:{{$course->bg_color}}"title="{{ $course->name }}">{{$course->short}}</td>
                      <td>{{ $course->name }}</td>
					<!--<td>{{ $course->type }}</td>-->
                    <td>Colocar</td>
					<td>{{$course->modules}}</td>
					<td>{{ ($course->active) ? "Ativo" : "Inativo" }}</td>
                    <td><a href="{{ route('courses.show', $course->id) }}"><i class="fa fa-eye"></i></a></td>
					<td><a href="{{ route('courses.edit', $course->id) }}"><i class="fa fa-edit"></i></a></td>
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
