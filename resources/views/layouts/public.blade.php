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
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Books CSS -->
    <link href="{{asset("css/shelf.css")}}" rel="stylesheet">
    <link href="{{asset("css/slick.css")}}" rel="stylesheet">
    <link href="{{asset("css/slick-theme.css")}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    @yield('styles')

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

    <div class="ufes-navbar">
      <div class="container">
        <a href="http://www.ufes.br" class="nav-logo" title="Abrir Portal Ufes em nova aba">
          <img src="img/marca-ufes.svg" alt="">
          <span>Universidade Federal do Espírito Santo</span>
        </a>
        <button class="btn-menu btn-drop">Endereços úteis <i class="fas fa-chevron-down"></i></button>
        <nav class="nav-menu" role="navigation">
          <ul class="menu-lista">
            <li><a href="http://www.sead.ufes.br/" target="_blank" title="Abrir Portal SEAD em nova aba">Portal SEAD <i class="fas fa-external-link-alt"></i></a></li>
            <li><a href="http://www.ufes.br" target="_blank" title="Abrir Portal Ufes em nova aba">Portal Ufes <i class="fas fa-external-link-alt"></i></a></li>
            <li class="tem-submenu">
              <span class="btn-drop">AVA Moodle <i class="fas fa-chevron-down"></i></span>
              <ul class="dropdown">
                <li><a href="http://www.ead.ufes.br" target="_blank" title="Abrir o AVA Moodle de Graduação em nova aba"><span class="somente-leitura">AVA Moodle de</span> Graduação <i class="fas fa-external-link-alt"></i></a></li>
                <li><a href="http://www.especializacao.aperfeicoamento.ufes.br" target="_blank" title="Abrir o AVA Moodle de Especialização e Aperfeiçamento em nova aba"><span class="somente-leitura">AVA Moodle de</span> Especialização e Aperfeiçoamento <i class="fas fa-external-link-alt"></i></a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="acervo-navbar">
      <div class="container">
        <div class="nav-titulo">
          <a href="/">Acervo Digital</a>
          <p>Materiais didáticos EaD</p>
        </div>
        <div class="nav-logo">
          <a href="http://sead.ufes.br" target="_blank" title="Abrir site da Sead em nova aba">
            <span>Sead</span>
            <img src="svg/sead-ufes.svg" alt="">
          </a>
        </div>
      </div>
    </div>
    
  </header>

    @yield('content')

  <footer>
    <a title="Voltar ao topo" id="voltar-ao-topo" aria-hidden="true" style="display: inline;">
    <i class="fas fa-arrow-up"></i>
    </a>
    <div class="container">
      <div>
        <h4>Ambiente EaD Ufes</h4>
        <ul>
          <li><a href="http://sead.ufes.br" target="_blank">Portal Sead</a></li>
          <li><a href="http://www.ead.ufes.br/" target="_blank">AVA Graduação</a></li>
          <li><a href="http://www.especializacao.aperfeicoamento.ufes.br/" target="_blank">AVA Especialização e Aperfeiçoamento</a></li>
          <li><a href="https://www.youtube.com/user/ufesinstrucional" target="_blank">Canal no YouTube</a></li>
          <li><a href="https://calendar.google.com/calendar/embed?src=webconf.ufes%40gmail.com&ctz=America/Sao_Paulo" target="_blank">Agenda de Webconferências</a></li>
        </ul>
      </div>

      <div>
        <h4>Fale conosco</h4>
        <p>Telefone: (27) 4009-2208</p>
        <p>E-mail: diretoria.sead@ufes.br</p>
        <p>Av. Fernando Ferrari, 514, Vitória - ES <br/> Térreo do Teatro Universitário - Ufes Campus Goiabeiras</p>
        <ul class="enderecoLink">
          <li>
            <img src="svg/google-maps.svg" alt="">
            <a href="https://goo.gl/maps/fLngzGoNbzq" target="_blank" title="Abrir endereço no Google Maps em nova aba"><span>Abrir endereço no Google Maps</span></a>
          </li>
          <li>
            <img src="svg/moovit.svg" alt="">
            <a href="https://moovit.com/?to=Teatro%20Universitário&tll=-20.27756_-40.301771&metroId=4794&lang=pt-br" target="_blank" title="Ver rotas de ônibus no Moovit em nova aba"><span>Ver rotas de ônibus no Moovit</span></a>
          </li>
        </ul>
      </div>
    </div>

    <div id="copyright">
      <p>© 2020 Sead Ufes. Todos os direitos reservados | <a href="http://ldi.ufes.br" target="_blank" title="Visitar site do Laboratório">Desenvolvido por LDI</p> 
    </div>
  </footer>

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/theme/js/app.min.js') }}"></script>

    <!-- Personalizado -->
    <script src="{{ asset('assets/dist/js/main.js') }}"></script>
    <script src="{{ asset('assets/dist/js/slick.min.js') }}"></script>

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
