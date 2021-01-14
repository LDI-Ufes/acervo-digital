@extends('layouts.public')

@section('content')


<main class="pagina-material container">

  <section class="breadcrumb">
    Você está em: 
    <!-- Tentar reconhecer por onde o usuário -->
    <!-- <a href="#">Filosofia e Psicanálise</a><i class="fas fa-greater-than"></i> -->
    <span>{{ $learning_object->title  }}</span>
  </section>

  <div class="conteudo-material">

    <span class="tipo"> {{ $learning_object->type->name  }} </span>

    <h1 class="titulo"> {{ $learning_object->title }} </h1>
    <p class="autor"> {{ $learning_object->author }} </p>
    <p class="edicao"> {{ $learning_object->year }} </p>

    <!-- <p><strong>Resumo</strong><br>{{ $learning_object->summary }}</p> -->

    <div class="acesso">
      <a class="btn-primario" href="{{ $learning_object->link }}" target="_blank"><i class="fa fa-file-pdf"></i>PDF Interativo</a>
    </div>

    <blockquote class="caixa-info">
      <h2><i class="fa fa-info-circle"></i>Instruções de acesso</h2>
      <p>Para melhor visualização do PDF Interativo use o programa Adobe Acrobat (<a href="#">clique aqui para baixar</a>).</p>
      <p>Acesse diretamente do navegador, com mais opções de interação e leia confortavelmente em qualquer dispositivo.</p>
    </blockquote>
    

    <div class="tags">
        <div class="tags-curso">
            <h2>Cursos associados</h3>
            <!-- Criar Loop junto c/ auxílio do BD gerando a opção de múltiplos cursos -->
            <span class="tag">{{ $learning_object->course->pluck('name')->implode(' ') }}</span>
        </div>
        <div class="tags-tipo">
            <h2>Tags</h3>
            <!-- Criar Loop junto c/ auxílio do BD gerando a opção de múltiplas tags -->
            <span class="tag">{{ $learning_object->tags->pluck('name')->implode(' ') }}</span>
        </div>
    </div>
  

      <div class="creditos-licenca">
          <h2>Licença CC-BY-NC-SA</h2>
          <img src="img/cc.png" alt="">
          <p><strong>Atribuição-NãoComercial-CompartilhaIgual</strong></p>
          <p>Esta licença permite que outros remixem, adaptem e criem a partir do seu trabalho para fins não comerciais, desde que atribuam o devido crédito e que licenciem as novas criações sob termos idênticos.</p>
      </div>

  </div>

  <img src="/covers/{{ $learning_object->cover }}" alt="" class="capa-material">

</main>

@endsection


