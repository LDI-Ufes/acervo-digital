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
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/dist/css/skin-ldi.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/theme/css/AdminLTE.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet"> -->

    <!-- Books CSS -->
    <link href="{{ asset('css/admin-painel.css')}}" rel="stylesheet">
    <link href="{{asset("css/shelf.css")}}" rel="stylesheet">
    <!--Remoção de scripts - to-do-->  

  </head>

  <body class="login-page">
    <div class="login-box">
      <div class="login-box-body">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}
          <img class="logo" src="/img/acervo-logo.svg" alt="Teste">
          <h1>Redefinição </br>de Senha</h1>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Seu E-mail</label>

              <input id="email" type="email" class="form-control" placeholder="seuemail@email.com" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
          </div>

          <div class="form-group email" style="margin-top:1rem;">
              <button type="submit" class="btn-s -prim">
                Solicitar alteração de senha
              </button>
          </div>

          <p class="descricao">
          Em instantes enviaremos a solicitação de redefinição de senha em sua caixa de e-mail. Verifique corretamente seu e-mail.
        </p>

        </form>

        <div style="padding:0; margin-top: 2rem;">
          <a href="/login">
            <button class="btn-s -ter">
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
