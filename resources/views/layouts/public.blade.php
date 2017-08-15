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
    <link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
    

    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
 

    <!-- Books CSS -->
    <link href="{{asset("css/shelf.css")}}" rel="stylesheet">

   <!-- Font Awesome -->
   {{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}"> --}}
   <link href="{{ asset('assets/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

   <!-- Bootstrap Select -->
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

	@yield('styles')

	<style>
		.header-top{
			background-color: #193e70;
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
	    <div class='container'>
	      <p class="navbar-text"><a href="/">
		<i class="fa fa-home" alt="Ícone de Casa"></i>  
	      Início</a></p>
	      <p class="navbar-text"><a href="/shelf/about" target="_blank">
	    <i class="fa fa-info-circle" alt="Ícone de Informação"></i>  
	      Sobre o Acervo</a></p>
	      <p class="navbar-text"><a href="http://www.eadufes.org/" target="_blank">
		<i class="fa fa-info-circle"></i>  
	      EAD na Ufes</a></p>
	      <p class="navbar-text"><a href="https://aluno.ufes.br/" target="_blank">
		<i class="fa fa-graduation-cap" alt="Ícone de Cap de Formatura"></i>  
	      Portal do Aluno</a></p>
	      <p class="navbar-text"><a href="http://www.bc.ufes.br/" target="_blank">
		<i class="fa fa-book" alt="Ícone de Livro"></i>  
	      Biblioteca Ufes</a></p>
	      <p class="navbar-text"><a href="http://www.especializacao.aperfeicoamento.ufes.br/">
		<i class="fa fa-desktop" alt="Ícone de Monitor"></i>  
	      Moodle</a></p>
	    </div>  
	  </div>

	  <div class="header-main">
	    <div class='container'>
	      <div class="tamanho">
		<div id="logo">
		  <a href="">  <!-- link para home  -->
		    <img alt="Logo UFES" src="{{asset('/icons/marca-ufes-cor.svg')}}">
		  </a>
		</div>
		<div class="rotulo">
		  <h1>Acervo Digital</h1>
		</div>
	      </div>  
	    </div>  
	  </div>

	<div class="breadcrumbs">
		<div class="container">
			<small>Acervo EAD</small>
		</div>
	</div>

	</header>

	@yield('content')

	<footer id="footer">
	  <div class="footer-main">
	    <div class="container-fluid">
	      <div class="logos-group">
	        <a href="http://ufes.br/" target="_blank" title="Ir para site da Ufes"><img src="http://www.especializacao.aperfeicoamento.ufes.br/theme/klass/pix/home/logo-ufes.svg" alt="Logo Ufes"></a>
	        <a href="http://sead.ufes.br/" target="_blank" title="Ir para site da Sead"><img src="http://www.especializacao.aperfeicoamento.ufes.br/theme/klass/pix/home/logo-sead.svg" alt="Logo Sead"></a>
	        <a href="http://uab.capes.gov.br" target="_blank" title="Ir para página da UAB"><img src="http://www.especializacao.aperfeicoamento.ufes.br/theme/klass/pix/home/logo-uab.svg" alt="Logo UAB"></a>
	        <a href="http://capes.gov.br/" target="_blank" title="Ir para site da Capes"><img src="http://www.especializacao.aperfeicoamento.ufes.br/theme/klass/pix/home/logo-capes.svg" alt="Logo Capes"></a>
	      </div>
	    </div>
	  </div>
	</footer>


    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/theme/js/app.min.js') }}" type="text/javascript"></script>

    <!-- Personalizado -->
    <script src="{{ asset('assets/dist/js/ldi.js') }}" type="text/javascript"></script> <!-- NOVO -->



	@yield('scripts')



	<!-- O FOOTER VAI ENTRAR AQUI -->

</body>
</html>
