@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<span class="pull-left">Livro  #{{ $book->id }}</span>

			<div class="btn-group btn-group-xs pull-right" role="group">
				<a href="{{ route('books.index') }}" class="btn btn-primary" title="Ver todos">
					<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
				</a>
				<a href="{{ route('books.edit', $book->id ) }}" class="btn btn-primary" title="Editar">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<form method="POST" action="{!! route('books.destroy', $book->id) !!}" accept-charset="UTF-8" style="display: inline;" novalidate="novalidate">
					<input name="_method" value="DELETE" type="hidden">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger btn-xs" title="Deletar" onclick="return confirm(&quot;Tem certeza que quer apagar?&quot;)" id="sometest">
					<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Apagar Livro"></span>
					</button>
				</form>
			</div>
		
		</div>
	</div>

	<div class="panel-body">
		<dl class="dl-horizontal">
			<dt>Título</dt>
			<dd>{{ $book->title }}</dd>
			<dt>Autor(s)</dt>
			<dd>{{ $book->author }}</dd>
			<dt>Resumo</dt>
			<dd>{{ $book->summary }}</dd>
			<dt>Capa</dt>
			<dd>{{ $book->cover }}</dd>
			<dt>Link do pdf</dt>
			<dd>{{ $book->pdf }}</dd>
			<dt>Curso</dt>
			<dd>{{ $book->course->name }}</dd>
			<dd>Módulo</dd>
			<dt>{{ $book->module }}</dt>
		</dl>


@endsection
