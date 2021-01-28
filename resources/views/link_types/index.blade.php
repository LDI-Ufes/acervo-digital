@extends('layouts.app')
@section('content')

<!-- TABELA - LISTA DE USUÁRIOS -->
<section class="content">

    <div class="breadcrumb">
    Você está em: Tipos de Curso <span class="greather-than">></span>Listagem
    </div>
        <section class="listaCursos">

        <h1 class="">Tipos de cursos cadastrados</h3>

            <div class="listagem">
                @foreach( $all_course_types as $course_type)
                <ul>
                    <li class="header-lista"><h2>{{ $course_type->name }}</h2></li>
                    <li>
                        <ul class="btns">
                            <li><a class="btn-s -config" href="{{ route('course_types.show', $course_type->id) }}"><i class="fa fa-eye"></i> Ver</a></li>
                            <li><a class="btn-s -config" href="{{ route('course_types.edit', $course_type->id) }}"><i class="fa fa-edit"></i> Editar</a></li>
                        </ul>
                    </li>
                </ul>
                @endforeach
            </div>

        <form method="POST" action="{{ route('course_types.store') }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            @include ('course_types/form')
        </form>

                <!-- <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr> -->
                                <!--<th style="text-align:center;">Tag</th>-->
                                <!-- <th>Tipo de Curso</th>
                                <th class="icone"></th>
                                <th class="icone"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $all_course_types as $course_type)
				  <tr> -->
				    <!--<td class="box-curso" title="{{ $course_type->name }}"></td>-->
				    <!-- <td>{{ $course_type->name }}</td>
                    <td><a class="btn-s -config" href="{{ route('course_types.show', $course_type->id) }}"><i class="fa fa-eye"></i> Ver</a></td>
				    <td><a class="btn-s -config" href="{{ route('course_types.edit', $course_type->id) }}"><i class="fa fa-edit"></i> Editar</a></td>
				  </tr>
                           @endforeach
                        </tbody>
                    </table> -->
                <!-- </div> -->
        </section>
</section>
<!-- FIM TABELA - LISTA DE USUÁRIOS -->

@endsection
