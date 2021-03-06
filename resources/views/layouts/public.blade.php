<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://cdn.eadufes.org/icone/sead.png">
    <link rel="icon" type="image/svg+xml" href="https://cdn.eadufes.org/icone/sead.svg">

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
    <link href="{{ asset('assets/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    @yield('styles')

    <style>
      .header-top, .footer{
        background-color: #193e70;
      }

      .header-top a:hover, .header-top a:focus{
        background-color: #0e64ac;
      }

      .header-main, .footer-main{
        background-color: #0e64ac;
      }

      footer{
        background: #193e70;
      }
    </style>

    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
      ]) !!}
      ;
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
            <li class="navbar-text">
              <a href="/" title="Ir para Início">
                <span class="fa fa-home" aria-hidden="true"></span> Início
              </a>
            </li>
            <li class="navbar-text externo">
              <a href="http://www.eadufes.org/" title="Abrir sítio da Sead em nova aba" target="_blank">
                <span class="fa fa-info-circle" aria-hidden="true"></span> EAD na Ufes
              </a>
            </li>
            <li class="navbar-text externo">
              <a href="https://aluno.ufes.br/" title="Abrir Portal do Aluno em nova aba" target="_blank">
                <span class="fa fa-graduation-cap" aria-hidden="true"></span> Portal do Aluno
              </a>
            </li>
            <li class="navbar-text externo">
              <a href="http://www.bc.ufes.br/" title="Abrir Biblioteca Ufes em nova aba" target="_blank">
                <span class="fa fa-book" aria-hidden="true"></span> Biblioteca Ufes
              </a>
            </li>
            <li class="navbar-text externo">
              <a href="https://www.youtube.com/user/ufesinstrucional" title="Abrir canal da Sead no YouTube em nova aba" target="_blank">
                <span class="fa fa-youtube-play" aria-hidden="true"></span> Videoaulas Sead
              </a>
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
              <img alt="Sead Ufes" src="{{asset('/icons-local/sead-ufes.svg')}}">
              @else
              <a href="/" title="Ir para Início">  <!-- link para home  -->
                <img alt="Sead Ufes" src="{{asset('/icons-local/sead-ufes.svg')}}">
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
            <a href="http://ufes.br/" target="_blank" title="Abrir sítio da Ufes em nova aba"><img src="{{asset('/icons-local/logo-ufes.svg')}}" alt="Logo da Ufes"></a>
            <a href="http://sead.ufes.br/" target="_blank" title="Abrir sítio da Sead em nova aba"><img src="{{asset('/icons-local/logo-sead.svg')}}" alt="Logo da Sead"></a>
            <a href="http://uab.capes.gov.br" target="_blank" title="Abrir página da UAB em nova aba"><img src="{{asset('/icons-local/logo-uab.png')}}" alt="Logo da UAB" style="max-width: 60px;"></a>
            <a href="http://capes.gov.br/" target="_blank" title="Abrir sítio da Capes em nova aba"><img src="{{asset('/icons-local/logo-capes.svg')}}" alt="Logo da CAPES"></a>
          </div>
          
        </div>
      </div>
      <div class="creditos">
        <a href="https://ldi.eadufes.org/" target="_blank" title="Abrir sítio do LDI em nova aba">Desenvolvido pelo Laboratório de Design Instrucional</a>
      </div>
    </footer>

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/theme/js/app.min.js') }}"></script>

    <!-- Personalizado -->
    <script src="{{ asset('assets/dist/js/ldi.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-82472266-10"></script>
    <script>
window.dataLayer = window.dataLayer || [];
function gtag() {
dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'UA-82472266-10');
    </script>

    @yield('scripts')

  </body>
</html>
