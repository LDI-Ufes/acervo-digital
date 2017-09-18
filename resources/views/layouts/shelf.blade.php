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
 

    <!-- Books CSS -->
    <link href="{{asset("css/shelf.css")}}" rel="stylesheet">

   <!-- Font Awesome -->
   {{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}"> --}}
   <link href="{{ asset('assets/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

   <!-- Bootstrap Select -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

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
							<i class="fa fa-bars" aria-hidden="true" alt="Menu expansível"></i>
						</button>
					</div>-->
					
					<!--<div class="collapse navbar-collapse" id="menu-topo">-->
						<ul>
						  <li class="navbar-text"><a href="/">
							<i class="fa fa-home" alt="Ícone de Casa"></i> Início</a>
						  </li>
						  <li class="navbar-text"><a href="/sobre">
							<i class="fa fa-info-circle" alt="Ícone de Informação"></i> Sobre o Acervo</a>
						  </li>
						  <li class="navbar-text externo"><a href="http://www.eadufes.org/" target="_blank">
							<i class="fa fa-info-circle" alt="Ícone de Informação"></i> EAD na Ufes</a>
						  </li>
						  <li class="navbar-text externo"><a href="https://aluno.ufes.br/" target="_blank">
							<i class="fa fa-graduation-cap" alt="Ícone de Cap de Formatura"></i> Portal do Aluno</a>
						  </li>
						  <li class="navbar-text externo"><a href="http://www.bc.ufes.br/" target="_blank">
							<i class="fa fa-book" alt="Ícone de Livro"></i> Biblioteca Ufes</a>
						  </li>
						<!--  <p class="navbar-text externo"><a href="http://www.especializacao.aperfeicoamento.ufes.br/"> 
							<i class="fa fa-desktop" alt="Ícone de Monitor"></i> 
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
							<a href="/"><img alt="Logo UFES" src="{{ asset('/icons/ufes-preto.svg') }}"></a>
				@else
							<a href="/"><img alt="Logo UFES" src="{{ asset('/icons/ufes-branco.svg') }}"></a>
				@endif
			  
			</div>
			
			<div class="rotulo">
			  <h1>Acervo Digital</h1>
			  <h2>{{ $current->course }}</h2>
			</div>
		  </div>  
		</div>  
	  </div>

	<div class="breadcrumbs">
		<div class="container">
		<small> <a href="/">Acervo EAD</a> &raquo; {{  str_limit($current->course, 20) }}

		
		</small>

		</div>
	</div>

	</header>
	
	@yield('content')

	<footer id="footer">
	  <div class="footer-main">
	    <div class="container-fluid">
	      <div class="logos-group">
	        <a href="http://ufes.br/" target="_blank" title="Ir para site da Ufes"><img src="{{asset('/icons/logo-ufes.svg')}}" alt="Logo Ufes"></a>
	        <a href="http://sead.ufes.br/" target="_blank" title="Ir para site da Sead"><img src="{{asset('/icons/logo-sead.svg')}}" alt="Logo Sead"></a>
	        <a href="http://uab.capes.gov.br" target="_blank" title="Ir para página da UAB"><img src="{{asset('/icons/logo-uab.svg')}}" alt="Logo UAB"></a>
	        <a href="http://capes.gov.br/" target="_blank" title="Ir para site da Capes"><img src="{{asset('/icons/logo-capes.svg')}}" alt="Logo Capes"></a>
	      </div>
	    </div>
	  </div>
	</footer>

	    @yield('scripts')

  </body>
</html>
