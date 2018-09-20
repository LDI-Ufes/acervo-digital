<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Estante Virtual') }}</title>

	<!-- Font PT Sans -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">

	<link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet"> 

	<!-- Font Awesome -->
	{{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}"> --}}
	<link href="{{ asset('assets/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

	<!-- Bootstrap Select -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

	<!-- Books CSS -->
	<link href="{{asset("css/shelf.css")}}" rel="stylesheet">

	@yield('styles')


	<!-- Scripts -->
	<script>
		window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),
			]) !!};
		</script>
	</head>
	<body>

		<header>
			<div class="header-top">
				<!--<nav class="navbar">-->
					<div class="container">
					<!--<div class="navbar-header">

						<button type="button" class="navbar-toggle collapsed navbar-text" data-toggle="collapse" data-target="#menu-topo" aria-expanded="false">
							<span class="fa fa-bars" aria-hidden="true" alt="Menu expansível"></span>
						</button>
					</div>-->
					
					<!--<div class="collapse navbar-collapse" id="menu-topo">-->
						<ul>
							<li class="navbar-text"><a href="/" title="Ir para Início">
								<span class="fa fa-home" aria-hidden="true"></span> Início</a>
							</li>
							<li class="navbar-text"><a href="/sobre" title="Ir para Sobre">
								<span class="fa fa-info-circle" aria-hidden="true"></span> Sobre o Acervo</a>
							</li>
							<li class="navbar-text externo"><a href="http://www.eadufes.org/" title="Abrir sítio da Sead em nova aba" target="_blank">
								<span class="fa fa-info-circle" aria-hidden="true"></span> EAD na Ufes</a>
							</li>
							<li class="navbar-text externo"><a href="https://aluno.ufes.br/" title="Abrir Portal do Aluno em nova aba" target="_blank">
								<span class="fa fa-graduation-cap" aria-hidden="true"></span> Portal do Aluno</a>
							</li>
							<li class="navbar-text externo"><a href="http://www.bc.ufes.br/" title="Abrir Biblioteca Ufes em nova aba" target="_blank">
								<span class="fa fa-book" aria-hidden="true"></span> Biblioteca Ufes</a>
							</li>
						<!--  <p class="navbar-text externo"><a href="http://www.especializacao.aperfeicoamento.ufes.br/"> 
							<span class="fa fa-desktop" alt="Ícone de Monitor"></span> 
						Moodle</a></p>  -->
					</ul>
				</div>
				<!--</div>	      
				</nav>  -->
			</div>

			<div class="header-main">
				<div class='container'>
					<div class="tamanho">

						<div id="logo">							
							@if ($current->course == 'Biologia')
							<a href="/" title="Ir para Início"><img alt="Logo da Ufes" src="{{ asset('/icons/ufes-preto.svg') }}"></a>
							@else
							<a href="/" title="Ir para Início"><img alt="Logo da Ufes" src="{{ asset('/icons/ufes-branco.svg') }}"></a>
							@endif
						</div>

						<div class="rotulo">
							<a href="/" title="Ir para Início"><h1>Acervo Digital</h1></a>
							<h2>{{ $current->course }}</h2>
						</div>
					</div>  
				</div>  
			</div>

			<div class="breadcrumbs">
				<div class="container">
					<small> 
						<a href="/">Acervo EAD</a> &raquo; {{  str_limit($current->course, 20) }}		
					</small>
				</div>
			</div>

		</header>

		@yield('content')

		<footer id="footer">
			<div class="footer-main">
				<div class="container-fluid">
					<div class="logos-group">
						<a href="http://ufes.br/" target="_blank" title="Abrir sítio da Ufes em nova aba"><img src="{{asset('/icons/logo-ufes.svg')}}" alt="Logo da Ufes"></a>
						<a href="http://sead.ufes.br/" target="_blank" title="Abrir sítio da Sead em nova aba"><img src="{{asset('/icons/logo-sead.svg')}}" alt="Logo da Sead"></a>
						<a href="http://uab.capes.gov.br" target="_blank" title="Abrir página da UAB em nova aba"><img src="{{asset('/icons/logo-uab.png')}}" style="max-width: 60px;" alt="Logo da UAB"></a>
						<a href="http://capes.gov.br/" target="_blank" title="Abrir sítio da Capes em nova aba"><img src="{{asset('/icons/logo-capes.svg')}}" alt="Logo da CAPES"></a>
					</div>
				</div>
			</div>
		</footer>

		@yield('scripts')

	</body>
	</html>
