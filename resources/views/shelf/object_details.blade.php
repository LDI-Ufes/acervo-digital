@extends('layouts.public')

@section('content')

  <div>
                  <ul>
                <li><b>Curso:</b> {{ $learning_object->course->pluck('short')->implode(' ') }}</li>
                <!--<li><b>Módulo:</b> {{ $learning_object->module }}</li>-->
                <li><b>Título:</b> {{ $learning_object->title }}</li>
                <li><b>Autor:</b> {{ $learning_object->author }}</li>
		            <li><b>Ano:</b> {{ $learning_object->year }}</li>
                <li><b>Endereço:</b> {{ $learning_object->link }}</li>
                <li>
                  <b>Resumo</b> <br>
                  {{ $learning_object->summary }}
                </li>
              </ul>


  </div>

@endsection


