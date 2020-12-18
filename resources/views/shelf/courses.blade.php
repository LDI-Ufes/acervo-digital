@extends('layouts.public')

@section('content')
          
<main id="index">
  <section id="hero">
    <div class="container">
      <h1>Bem-vindo ao Acervo Digital da EaD na UFES</h1>
      <p>Busque por materiais, autores e cursos</p>

      <form class="form-pesquisa" action="/catalogo" method="GET">
        <input type="search" name="pesquisa" placeholder="Pesquisar no Acervo..." id="search-bar">

        <div id="filtro-busca">
          <button id="dropdown-filtro-busca">Geral<i class="fas fa-angle-down"></i></button>        

          <!-- <ul id="itens-filtro-busca">
              <li><a title="Listar cursos de graduação" class="ativo">Geral</a></li>
              <li><a title="Pesquisar por título do material">Título</a></li>
              <li><a title="Pesquisar por autor">Autor</a></li>
              <li><a title="Pesquisar por curso">Curso</a></li>
          </ul> -->

        </div>

        <button type="submit" class="btn-primario"><i class="fas fa-search"></i></button>
      </form>

    </div>
  </section>

  <section id="materiais-recentes">
    <div class="container">
      <h2>Materiais Recentes</h2>

      <div class="cards-recentes slider">

        @forelse($last_objects as $item)

          @include('shelf/card')

        @empty
        <div>Não há materiais cadastrados ainda.</div>
        @endforelse

      </div>

      <a href="/catalogo" class="btn-primario">Listar todos os materiais</a>

    </div>
 </section>

 <section id="navegar-tipos">
    <div class="container">
      <h2>Navegar por tipo</h1>

      <div class="tipos">

        <a href="page-tipo.php"><div class="tipo">
          <img src="img/livros.svg" alt="">
          <span>Livros</span>
        </div></a>

        <a href="page-tipo.php"><div class="tipo">
          <img src="img/videoaulas.svg" alt="">
          <span>Videoaulas</span>
        </div></a>

        <a href="page-tipo.php"><div class="tipo">
          <img src="img/objetos.svg" alt="">
          <span>Objetos de Aprendizagem</span>
        </div></a>
          
      </div>
    </div>
  </section>

  <section id="navegar-cursos">
    <div class="container">
      <h2>Navegar por Cursos</h2>

      <div id="abas">
        <button id="dropdown-menu">
          Graduação
          <i class="fas fa-angle-down"></i>
        </button>

        <ul id="itens-abas">
          <li><a title="Listar cursos de graduação" class="ativo" href="#graduacao">Graduação</a></li>
          <li><a title="Listar cursos de especialização" href="#especializacao">Especialização</a></li>
          <li><a title="Listar cursos de aperfeiçoamento" href="#aperfeicoamento">Aperfeiçoamento</a></li>
        </ul>

        <!-- Para cada tipo de curso puxar -->
        @forelse($courses as $group) 
          <ul class="lista-cursos" id="{{$group->first()->type->name}}">
          
          @foreach($group as $course)
              <li>
                <a class="card-curso" title="Ir para a página do curso" href="/curso/{{ $course->slug }}">
                  <div class="card-capa"><div class="card-capa"><img src="img/{{ $course->slug }}.jpg"></div></div>
                  <h3 class="titulo">
                    {{$course->name}}
                    <!-- Cadastrar e puxar isso? -->
                    <span class="nivel">Licenciatura</span>
                  </h3>
                </a>
              </li>
            @endforeach
          </ul>
          @empty
          <div class="curso-vazio">Não há cursos cadastrados.</div>
          @endforelse
        

      </div>
        
    </div>
  </section>

</main>

@endsection

@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


@endsection
