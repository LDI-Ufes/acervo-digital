<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Acesso - Estante Virtual</title>

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

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <h1 style="color:white;">Estante Virtual</h1>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div id="app">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="margin-bottom:0;">
              <label for="email" class="col-md-12 control-label">E-mail</label>
              <div class="col-md-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback" style="right:15px;"></span>

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-12 control-label">Senha</label>
              <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback" style="right:15px;"></span>

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Continuar conectado
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-bottom:0;">
              <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-block btn-flat">
                  Entrar
                </button>
              </div>
              <div class="col-md-12" style="text-align:center;">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  Esqueceu sua senha?
                </a>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
