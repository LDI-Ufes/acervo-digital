@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<span class="pull-left"> Livro # {{ $book->id }}</span>
			
			<div class="btn-group bth-group-xs pull-right" role="group">
			<a href="{{ route('books.index') }}" class="btn btn-primary" title="Listar livros">
				<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
			</a>

			<a href="{{ route('books.create') }}" class="btn btn-primary" title="Adicionar livro">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</a>

			</div>
		</div>


		<div class="panel-body">
			@if ($errors->any())
				<ul class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif

			<form method="POST" action="{{ route('books.update', $book->id) }}" accept-charset="UTF-8" class="form-horizontal">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
				@include ('books/form', [
					'submitButtonLabel' => 'Atualizar',
					'book' => $book,				
				])
			</form>
		</div>
	</div>

@endsection
