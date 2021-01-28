@extends('layouts.app')
@section('content')

<section class="content">

  <div class="breadcrumb">
      Você está em: Tipos de Link<span class="greather-than">&gt;</span>Cadastrar
  </div>

  <h1 class="">Cadastrar Tipo de Link<span>*</span></h1>
  
      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('link_types.store') }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            @include ('link_types/form')
          </form>

        </div>
      </div>
    </section>
  </div>
</section>

@endsection
