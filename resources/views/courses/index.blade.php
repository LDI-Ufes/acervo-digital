@extends('layouts.app')
@section('content')

<!-- TABELA - LISTA DE USUÁRIOS -->
<section class="content">

<div class="breadcrumb">
    Você está em: Cursos <span class="greather-than">></span>Listagem
</div>

    <div class="row">
        <section class="listaCursos col-md-12 connectedSortable ui-sortable">
            <div class="box box-ldi">
                <div class="box-header">
                    <div>
                        <h1 class="box-title">Cursos Cadastrados</h1>
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
                                <!--<th>Módulos</th>-->
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
                                <td>{{ $course->type->name }}</td>
            					<!--<td>{{$course->modules}}</td>-->
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
