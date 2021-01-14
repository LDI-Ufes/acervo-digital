@extends('layouts.app')
@section('content')

<!-- ADICIONAR USUÁRIO -->
<section class="content">
<div class="breadcrumb">
    Você está em: Tags <span class="greather-than">></span>Cadastrar
</div>
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('tags.store') }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            @include ('tags/form')
          </form>

        </div>
      </div>
    </section>
  </div>
</section>

@endsection

