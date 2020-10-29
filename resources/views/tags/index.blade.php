@extends('layouts.app')
@section('content')

<!-- CABEÇALHO -->
<section class="content-header">
  <h1>
    Tags
    <small>Listagem</small>
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-university"></i> Tags</li>
    <li class="active"><i class="fa fa-list"></i> Listagem</li>
  </ol>
</section>
<!-- FIM CABEÇALHO -->

<!-- TABELA - LISTA DE TAGS -->
<section class="content">
    <div class="row">
        <section class="listaCursos col-md-12 connectedSortable ui-sortable">
            <div class="box box-ldi">
                <div class="box-header">
                    <div>
                        <h3 class="box-title">
                            <i class="fa fa-university"></i> Tags cadastradas
                        </h3>
                    </div>
                    <hr style="margin-bottom:0;">
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Nome da Tag</th>
                                <th class="icone"></th>
                                <th class="icone"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($all_tags as $tag)
            				      <tr>
                            <td>{{ $tag->name }}</td>                      
                            <td><a href="{{ route('tags.show', $tag->id) }}"><i class="fa fa-eye"></i></a></td>  
            				        <td><a href="{{ route('tags.edit', $tag->id) }}"><i class="fa fa-edit"></i></a></td>
            				      </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
</section>
<!-- FIM TABELA - LISTA DE TAGS -->

@endsection
