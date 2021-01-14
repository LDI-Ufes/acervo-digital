<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://sead.ufes.br/wp-content/themes/sead-v2.1/favicon/sead.png">
    <link rel="icon" type="image/svg+xml" href="https://sead.ufes.br/wp-content/themes/sead-v2.1/favicon/sead.svg">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Estante Virtual') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/theme/css/AdminLTE.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('assets/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/dist/css/skin-ldi.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet"> -->

    <!-- Books CSS -->
    <link href="{{asset('css/admin-painel.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body class="skin-ldi open">
    <div id="app">
      <!-- WRAPPER -->
      <div class="wrapper">
        <!-- HEADER -->
        <header class="cabecalho-principal">
          <!-- LOGO -->
          <a href="/admin" class="logo">
            <img src="{{asset('img/acervo-logo-admin.svg')}}">
          </a>
          <!-- NAVEGAÇÃO -->
          <nav class="navbar" role="navigation">
            <!-- BOTÃO DE NAVEGAÇÃO (ESQUERDA)-->
            <a href="#" class="sidebar-toggle open" data-toggle="offcanvas" role="button">
              <span class="somente-leitura">Toggle navigation</span>
            </a>
            <!-- INFORMAÇÕES DO USUÁRIO (DIREITA) -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- MENU DO USUÁRIO -->
                <li class="dropdown user user-menu">
                  <!-- BOTÃO -->
                  <a href="#" class="dropdown" data-toggle="dropdown">
                    <!-- NOME -->
                    {{ Auth::user()->name }}
                  </a>
                  <!-- DROPDOWN -->
                  <ul class="dropdown-menu">
                    <!-- AVATAR, NOME E ATUAÇÃO -->
                    <li class="user-header" style="height:auto;">
                      <p>
                        <!-- <a href="">{{ Auth::user()->name }}</a> <br> -->
                        {{ Auth::user()->email }}
                      </p>
                    </li>
                    <!-- ALTERAR DADOS E SAIR -->
                    <li class="user-footer" style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;">
                        <!-- <a href="" class="btn btn-success btn-flat"> <i class="fa fa-fw fa-gear"></i> Alterar senha</a> -->
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
        <aside class="menu-lateral">
          <section class="lateral">

            <!-- Sidebar Menu -->
        <ul class="menu">
              
          <li class="header">
          <div class="item-dropdown">
              <span><i class="fa fa-folder"></i>Cursos</span>
              <span class="chevron"><i class="fa fa-chevron-down"></i></span>
            </div>
            <!-- <div class="item-dropdown">
              <span><i class="fa fa-folder"></i>Tipos de Cursos</span>
              <span class="chevron"><i class="fa fa-chevron-down"></i></span>
            </div> -->
            <ul>
              <li><a href="{{ action('CourseTypeController@index') }}"><i class="fa fa-tag"></i>Tipos de Curso</a></li>
              <li><a href="{{ action('CourseController@index') }}"><i class="fa fa-list-ul"></i>Listagem de Cursos</a></li>
              <li><a href="{{ action('CourseController@create') }}"><i class="fa fa-plus-circle"></i>Cadastrar Curso</a></li>
            </ul>
        </li>
	      <li class="header">
          <div class="item-dropdown">
            <span><i class="fa fa-file"></i>Materiais Didáticos</span>
            <span class="chevron"><i class="fa fa-chevron-down"></i></span>
          </div>
            <ul>
              <li><a href="{{ action('ObjectTypeController@index') }}"><i class="fa fa-tag"></i> Tipo de Materiais</a></li>
              <li><a href="{{ action('LearningObjectController@index') }}"><i class="fa fa-list-ul"></i> Listagem de Materiais</a></li>
              <li><a href="{{ action('LearningObjectController@create') }}"><i class="fa fa-plus-circle"></i> Cadastrar Objetos</a></li>
            </ul>
        </li>

	      <li class="header">
          <div class="item-dropdown">
            <span><i class="fa fa-tags"></i>Tags</span>
            <span class="chevron"><i class="fa fa-chevron-down"></i></span>
          </div>
          
            <ul>
              <li><a href="{{ action('TagController@index') }}"><i class="fa fa-list-ul"></i> Listagem de Tags</a></li>
              <li><a href="{{ action('TagController@create') }}"><i class="fa fa-plus-circle"></i> Cadastrar Tags</a></li>
            </ul>
        </li>

	      <!-- <li class="header">
          <div class="item-dropdown">
            <span><i class="fa fa-file"></i>Obj. de Aprendizagem</span>
            <span class="chevron"><i class="fa fa-chevron-down"></i></span>
          </div>
          
          <ul>
              <li><a href="{{ action('LearningObjectController@index') }}"><i class="fa fa-list-ul"></i> Listagem de Objetos</a></li>
              <li><a href="{{ action('LearningObjectController@create') }}"><i class="fa fa-plus-circle"></i> Cadastrar Objetos</a></li>
          </ul>
        </li> -->
     
            </ul><!-- /.sidebar-menu -->


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

    <script src="{{asset('/js/admin.js')}}" type="text/javascript">

    <!-- AdminLTE App -->
    <script src="{{ asset('assets/theme/js/app.min.js') }}" type="text/javascript"></script>

    <!-- Personalizado -->
    <script src="{{ asset('assets/dist/js/ldi.js') }}" type="text/javascript"></script> <!-- NOVO -->


    @yield('scripts')


  </body>
</html>
