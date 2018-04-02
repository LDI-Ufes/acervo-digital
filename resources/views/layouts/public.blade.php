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

	<style>
		.header-top{
			background-color: #193e70;
		}

		.header-top a:hover, .header-top a:focus{
			background-color: #0e64ac;
		}

		.header-main{
			background-color: #0e64ac;
		}

		footer{
			background: #193e70;
			border-top: 5px solid #036bb2;
		}
	</style>

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
						</div>
						
						<div class="collapse navbar-collapse" id="menu-topo">-->
						<ul>
						  <li class="navbar-text"><a href="/" title="Ir para Início">
							<span class="fa fa-home" aria-hidden="true"></span> Início</a>
						  </li>
						  <li class="navbar-text"><a href="/sobre" title="Ir para Sobre">
							<span class="fa fa-info-circle" aria-hidden="true"></span> Sobre o Acervo</a>
						  </li>
						  <li class="navbar-text externo"><a href="http://www.eadufes.org/" title="Abrir site da SEAD em nova aba" target="_blank">
							<span class="fa fa-info-circle" aria-hidden="true"></span> EAD na Ufes</a>
						  </li>
						  <li class="navbar-text externo"><a href="https://aluno.ufes.br/" title="Abrir Portal do Aluno em nova aba" target="_blank">
							<span class="fa fa-graduation-cap" aria-hidden="true"></span> Portal do Aluno</a>
						  </li>
						  <li class="navbar-text externo"><a href="http://www.bc.ufes.br/" title="Abrir Biblioteca UFES em nova aba" target="_blank">
							<span class="fa fa-book" aria-hidden="true"></span> Biblioteca Ufes</a>
						  </li>
						    <!--  <p class="navbar-text externo"><a href="http://www.especializacao.aperfeicoamento.ufes.br/"> 
						        <span class="fa fa-desktop"></span> 
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

			@if (Request::url() === 'http://acervodigital.eadufes.org')
		    	<img alt="Logo da UFES" src="{{asset('/icons/marca-ufes-cor.svg')}}">
		  	@else
				<a href="/" title="Ir para Início">  <!-- link para home  -->
					<img alt="Logo da UFES" src="{{asset('/icons/marca-ufes-cor.svg')}}">	
				</a>
		  	@endif

		</div>
		<div class="rotulo">
		  <h1 class="titulo-public">Acervo Digital</h1>
		</div>
	      </div>  
	    </div>  
	  </div>


	</header>

	@yield('content')

	<footer id="footer">
	  <div class="footer-main">
	    <div class="container-fluid">
	      <div class="logos-group">
	        <a href="http://ufes.br/" target="_blank" title="Abrir site da Ufes em nova aba"><img src="{{asset('/icons/logo-ufes.svg')}}" alt="Logo da UFES"></a>
	        <a href="http://sead.ufes.br/" target="_blank" title="Abrir site da Sead em nova aba"><img src="{{asset('/icons/logo-sead.svg')}}" alt="Logo da SEAD"></a>
	        <a href="http://uab.capes.gov.br" target="_blank" title="Abrir página da UAB em nova aba"><img src="{{asset('/icons/logo-uab.png')}}" alt="Logo da UAB" style="max-width: 60px;"></a>
	        <a href="http://capes.gov.br/" target="_blank" title="Abrir site da Capes em nova aba"><img src="{{asset('/icons/logo-capes.svg')}}" alt="Logo da CAPES"></a>
	      </div>
	    </div>
	  </div>
	</footer>

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/theme/js/app.min.js') }}"></script>

    <!-- Personalizado -->
    <script src="{{ asset('assets/dist/js/ldi.js') }}"></script> <!-- NOVO -->



	@yield('scripts')



	<!-- O FOOTER VAI ENTRAR AQUI -->

</body>
</html>
