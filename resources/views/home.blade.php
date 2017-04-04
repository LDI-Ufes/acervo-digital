@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>

                <div class="panel-body">
			<a href="{{ route('courses.create') }}" role="button" class="btn btn-primary">Adicionar</a>
			<a href="{{ route('courses.index') }}" role="button" class="btn btn-primary">Listar</a>		
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Livros</div>

                <div class="panel-body">
			<a href="#" role="button" class="btn btn-primary">Adicionar</a>
			<a href="#" role="button" class="btn btn-primary">Listar</a> 
                </div>
            </div>
       </div>

    </div>
</div>
@endsection
