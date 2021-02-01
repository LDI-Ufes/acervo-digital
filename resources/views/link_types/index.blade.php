@extends('layouts.app')
@section('content')

<!-- TABELA - LISTA DE USUÁRIOS -->
<section class="content">

    <div class="breadcrumb">
    Você está em: Tipos de Link<span class="greather-than">&gt;</span>Listagem
    </div>
        <section class="listaCursos">

        <h1 class="">Tipos de link cadastrados</h3>

            <div class="listagem">
                @foreach( $all_link_types as $link_type)
                <ul>
                    <li class="header-lista"><h2>{{ $link_type->name }}</h2></li>
                    <li>
                        <ul class="btns">
                            <li><a class="btn-s -config" href="{{ route('link_types.show', $link_type->id) }}"><i class="fa fa-eye"></i> Ver</a></li>
                            <li><a class="btn-s -config" href="{{ route('link_types.edit', $link_type->id) }}"><i class="fa fa-edit"></i> Editar</a></li>
                        </ul>
                    </li>
                </ul>
                @endforeach
            </div>

        <form method="POST" action="{{ route('link_types.store') }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            @include ('link_types/form')
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
                          @foreach( $all_link_types as $link_type)
				  <tr> -->
				    <!--<td class="box-curso" title="{{ $link_type->name }}"></td>-->
				    <!-- <td>{{ $link_type->name }}</td>
                    <td><a class="btn-s -config" href="{{ route('link_types.show', $link_type->id) }}"><i class="fa fa-eye"></i> Ver</a></td>
				    <td><a class="btn-s -config" href="{{ route('link_types.edit', $link_type->id) }}"><i class="fa fa-edit"></i> Editar</a></td>
				  </tr>
                           @endforeach
                        </tbody>
                    </table> -->
                <!-- </div> -->
        </section>
</section>
<!-- FIM TABELA - LISTA DE USUÁRIOS -->

@endsection
