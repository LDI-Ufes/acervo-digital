<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Estante Virtual') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/theme/css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/skin-ldi.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body class="skin-ldi">
    <div id="app">
      <!-- WRAPPER -->
      <div class="wrapper">
        <!-- HEADER -->
        <header class="main-header">
          <!-- LOGO -->
          <a href="" class="logo">Estante Virtual</a>
          <!-- NAVEGAÇÃO -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- BOTÃO DE NAVEGAÇÃO (ESQUERDA)-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- INFORMAÇÕES DO USUÁRIO (DIREITA) -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- MENU DO USUÁRIO -->
                <li class="dropdown user user-menu">
                  <!-- BOTÃO -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- NOME -->
                    {{ Auth::user()->name }}
                  </a>
                  <!-- DROPDOWN -->
                  <ul class="dropdown-menu" style="width:auto;right:0;">
                    <!-- AVATAR, NOME E ATUAÇÃO -->
                    <li class="user-header" style="height:auto;">
                      <p>
                        <a href="">rdelpupo</a> <br> renatodelpupo@designinstrucional.org
                      </p>
                    </li>
                    <!-- ALTERAR DADOS E SAIR -->
                    <li class="user-footer" style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;">
                      <div class="pull-left">
                        <a href="" class="btn btn-success btn-flat"> <i class="fa fa-fw fa-gear"></i> Alterar senha</a>
                      </div>
                      <div class="pull-right">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat"> <i class="fa fa-fw fa-sign-out"></i> Sair</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                        </form>
                      </div>
                    </li><!-- FIM ALTERAR DADOS E SAIR -->
                  </ul><!-- FIM DROPDOWN -->
                </li><!-- FIM MENU DO URSUÁRIO -->
              </ul>
            </div>
          </nav><!-- FIM NAVEGAÇÃO -->
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <section class="sidebar">

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
              <li class="header">LIVROS</li>
              <li><a href="{!! url('/books') !!}"><i class="fa fa-book"></i> Listagem de livros</a></li>
              <li><a href="{!! url('/books/create') !!}"><i class="fa fa-plus-circle"></i> Cadastrar livro</a></li>
              <li class="header">CURSOS</li>
              <li><a href="{!! url('/courses') !!}"><i class="fa fa-university"></i> Listagem de cursos</a></li>
              <li><a href="{!! url('/courses/create') !!}"><i class="fa fa-plus-circle"></i> Cadastrar curso</a></li>
            </ul><!-- /.sidebar-menu -->

            <!-- Horarios -->
            <div class="small-box bg-ldi" style="margin-top:50px;color:white;">
              <div class="small-box" style="text-align:left;">
                <div class="inner">
                  <p style="margin:0;">Desenvolvido por</p>
                  <h3 style="margin:0;">LDI</h3>
                </div>
                <div class="small-box-footer" style="text-align:left; padding:3px 15px;">
                  <a href="http://ldi.eadufes.org" target="_blank">ldi.eadufes.org</a>
                </div>
              </div>
            </div>

          </section>
          <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Scripts original-->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/theme/js/app.min.js') }}" type="text/javascript"></script>

    <!-- Personalizado -->
    <script src="{{ asset('assets/dist/js/ldi.js') }}" type="text/javascript"></script> <!-- NOVO -->
  </body>
</html>
