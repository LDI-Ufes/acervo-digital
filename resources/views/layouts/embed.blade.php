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

	@yield('content')

	@yield('scripts')

</body>
</html>
