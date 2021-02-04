@extends('layouts.app')
@section('content')

<section class="content">

<div class="breadcrumb">
    Você está em: Tipos de Link<span class="greather-than">></span>{{ $link_type->name }}<span class="greather-than"> > </span> Editar
    </div>

      <div class="box box-ldi">
        <div class="box-body">
          @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('link_types.update', $link_type->id) }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('link_types/form', [
            'editLabel' => 'Editar Tipo de Link',
            'submitButtonLabel' => 'Atualizar',
            'link_type' => $link_type,				
            ])
          </form>

        </div>
  </div>
</section>

@endsection
