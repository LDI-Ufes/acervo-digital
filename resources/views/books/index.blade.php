@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-default">
		                <div class="panel-heading">Listagem de Cursos</div>

				<div class="panel-body">
					<ul>
						@foreach( $all_books as $book)
							<li> {{ $book->title }} [{{$book->course->name }}] <a href="{{ route('books.show', $book->id) }}">[ver]</a> <a href="{{ route('books.edit', $book->id) }}">[editar]</a> </li>
						@endforeach
					</ul>
				</div>

			    </div>
			</div>
		</div<>
	</div>
@endsection
