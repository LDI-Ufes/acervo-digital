<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alterar senha - Estante Virtual</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/skin-ldi.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/theme/css/AdminLTE.css') }}" rel="stylesheet">

    <!--Remoção de scripts - to-do-->  

  </head>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <h1 style="color:white;">Estante Virtual</h1>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-12 control-label">E-mail</label>

            <div class="col-md-12">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group" style="margin-bottom:0;">
            <div class="col-md-12">
              <button type="submit" class="btn btn-warning btn-block btn-flat">
                Solicitar alteração de senha
              </button>
            </div>
          </div>
        </form>

        <hr>

        <div class="col-md-12" style="padding:0;">
          <a href="/login">
            <button class="btn btn-primary btn-block btn-flat">
              « Retornar a tela de Acesso
            </button>
          </a>
        </div>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
