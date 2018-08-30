@extends('layouts.public')

@section('content')

	<div class="breadcrumbs">
		<div class="container">
			<small><a href="/">Acervo EAD</a> &raquo; Sobre </small>
		</div>
	</div>

	<div class="container" id="container">
		<div class="col-xs-12 col-sm-6 sobre center">
			<img src="{{asset('/sobre.png')}}"/>
		</div>
		<div class="col-xs-12 col-sm-6 sobre">
		</div>
	</div>
	
@endsection
