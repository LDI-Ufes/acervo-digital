@extends('layouts.public')

@section('content')

<div id="carrossel">
  <ul>
    <button class="seta-prev">
      <svg class="seta" width="45" height="74" viewBox="0 0 45 74" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: scale(-1, 1);">
        <path d="M9.27663 -2.30649e-07C8.76804 -2.08418e-07 8.19587 0.264535 7.81443 0.661323L4.63573 3.96794C4.25429 4.36473 4 4.95992 4 5.48898C4 6.01803 4.25429 6.61323 4.63573 7.01002L29.6203 33L4.63574 58.99C4.2543 59.3868 4 59.982 4 60.511C4 61.1062 4.2543 61.6353 4.63574 62.0321L7.81443 65.3387C8.19588 65.7355 8.76804 66 9.27663 66C9.78523 66 10.3574 65.7355 10.7388 65.3387L40.3643 34.521C40.7457 34.1242 41 33.5291 41 33C41 32.4709 40.7457 31.8758 40.3643 31.479L10.7388 0.661323C10.3574 0.264535 9.78522 -2.5288e-07 9.27663 -2.30649e-07Z" fill="#f6f6f6" filter="url(#dropshadowPrev)" />
        <defs>
          <filter xmlns="http://www.w3.org/2000/svg" id="dropshadowPrev">
            <feGaussianBlur in="SourceAlpha" stdDeviation="3"/> 
            <feOffset dx="0" dy="2" result="offsetblur"/>
            <feMerge> 
              <feMergeNode/>
              <feMergeNode in="SourceGraphic"/> 
            </feMerge>
          </filter>
        </defs>
      </svg>     

      Anterior
    </button>

    <li class="item container ativo">
      <div class="destaque">
        <img class="destaque-fundo" alt="" src="{{asset('/img/destaque-1.png')}}">
        <div class="destaque-bloco">
          <div class="label label-default">
            <div class="icone-objeto">
              <img alt="" src="{{asset('/icons-local/3.svg')}}">
            </div>
            Livro
          </div>
        </div>
        <div class="destaque-bloco">
          <a href="https://acervodigital.eadufes.org/arquivos/historia-da-fisica.pdf" target="_blank" title="Abrir História da Física em nova aba">
            <div class="destaque-titulo">
              <h1>Física</h1>
              <h2>História da Física</h2>
            </div>
          </a>
        </div>        
      </div>
    </li>
    <li class="item container">
      <div class="destaque">
        <img class="destaque-fundo" alt="" src="{{asset('/img/destaque-2.png')}}">
        <div class="destaque-bloco">
          <div class="label label-default">
            <div class="icone-objeto">
              <img alt="" src="{{asset('/icons-local/3.svg')}}">
            </div>
            Livro
          </div>
        </div>
        <div class="destaque-bloco">
          <a href="https://acervodigital.eadufes.org/arquivos/oficina-danca.pdf" target="_blank" title="Abrir Oficina de Docência em Dança em nova aba">
          <div class="destaque-titulo">
            <h1>Educação Física</h1>
            <h2>Oficina de Docência em Dança</h2>
          </div>
          </a>
        </div>        
      </div>
    </li>
    <li class="item container">
      <div class="destaque">
        <img class="destaque-fundo" alt="" src="{{asset('/img/destaque-3.png')}}">
        <div class="destaque-bloco">
          <div class="label label-default">
            <div class="icone-objeto">
              <img alt="" src="{{asset('/icons-local/5.svg')}}">
            </div>
            Vídeo
          </div>
        </div>
        <div class="destaque-bloco">
          <a href="https://www.youtube.com/watch?v=cgSoIlmOC2w" target="_blank" title="Abrir Cartografia em nova aba">
            <div class="destaque-titulo">
              <h1>Artes Visuais</h1>
              <h2>Cartografia</h2>
            </div>
          </a>
        </div>
      </div>
    </li>    
    <li class="item container">
      <div class="destaque">
        <img class="destaque-fundo" alt="" src="{{asset('/img/destaque-4.png')}}">
        <div class="destaque-bloco">
          <div class="label label-default">
            <div class="icone-objeto">
              <img alt="" src="{{asset('/icons-local/2.svg')}}">
            </div>
            Objeto Interativo
          </div>
        </div>
        <div class="destaque-bloco">
          <a href="https://filosofia.eadufes.org/linhadotempo/" target="_blank" title="Abrir Linha do Tempo da Sociologia em nova aba">
            <div class="destaque-titulo">
              <h1>Filosofia</h1>
              <h2>Linha do Tempo da Sociologia</h2>
            </div>
          </a>
        </div>        
      </div>
    </li>

    <button class="seta-next">
      <svg class="seta" width="45" height="74" viewBox="0 0 45 74" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.27663 -2.30649e-07C8.76804 -2.08418e-07 8.19587 0.264535 7.81443 0.661323L4.63573 3.96794C4.25429 4.36473 4 4.95992 4 5.48898C4 6.01803 4.25429 6.61323 4.63573 7.01002L29.6203 33L4.63574 58.99C4.2543 59.3868 4 59.982 4 60.511C4 61.1062 4.2543 61.6353 4.63574 62.0321L7.81443 65.3387C8.19588 65.7355 8.76804 66 9.27663 66C9.78523 66 10.3574 65.7355 10.7388 65.3387L40.3643 34.521C40.7457 34.1242 41 33.5291 41 33C41 32.4709 40.7457 31.8758 40.3643 31.479L10.7388 0.661323C10.3574 0.264535 9.78522 -2.5288e-07 9.27663 -2.30649e-07Z" fill="#f6f6f6" filter="url(#dropshadowNext)" />
        <defs>
          <filter xmlns="http://www.w3.org/2000/svg" id="dropshadowNext">
            <feGaussianBlur in="SourceAlpha" stdDeviation="3"/> 
            <feOffset dx="0" dy="2" result="offsetblur"/>
            <feMerge> 
              <feMergeNode/>
              <feMergeNode in="SourceGraphic"/> 
            </feMerge>
          </filter>
        </defs>
      </svg>

      Próximo
    </button>

    <div class="dots">
      <ul aria-hidden="true">
        <li class="dot ativo"></li>
        <li class="dot"></li>
        <li class="dot"></li>
        <li class="dot"></li>
      </ul>
    </div>
  </ul>
</div>            

	<div class="container" id="container">

		@forelse($courses as $group)
			<div class="page-header">
				{{$group->first()->type->name}}
			</div>

			<ul class="row">
				@foreach($group as $course)
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						{{-- <a href="/shelf/course/{{$course->id}}/module/0/type/0"> --}}
						{{-- <a href="/shelf/course/{{$course->id}}/type/0/year/0">   --}}
						<a href="/curso/{{ $course->slug }}">
							<div class="panel panel-default" style=" border-left: 7px solid {{ $course->bg_color }}; color: {{ $course->fg_color }}">
								<div class="panel-body">
									<p>{{$course->name}}</p>
									{{--@if (Auth::check())
										<a href="/courses/{{$course->id}}/edit">[editar]</a> --}}
								</div>
							</div>
						</a>
					</li>	
				@endforeach
			</ul>
		@empty
			<div class="curso-vazio">Não há cursos cadastrados.</div>
		@endforelse


		{{-- <a href="/shelf/course/0/module/0/type/0">Todos os Cursos</a> --}}

<!-- 		@if (! $inactive_courses->isEmpty() )
			<button class="page-header" tabindex="0" id="inativos-mostra">
				Cursos Inativos 
				<i id="seta" class="fa fa-caret-down" aria-hidden="true"></i> 
			</button>

			<div id="inativos"> 
				<ul class="row"> 
					@foreach($inactive_courses as $course)
						<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							{{-- <a href="/shelf/course/{{$course->id}}/module/0/type/0"> --}}
							{{-- <a href="/shelf/course/{{$course->id}}/type/0/year/0">   --}}
							<a href="/curso/{{ $course->slug }}">
								<div class="panel panel-default" style=" border-left: 7px solid #656565; color: #656565">
									<div class="panel-body">
										<p>{{$course->name}}</p>
										{{--@if (Auth::check())
											<a href="/courses/{{$course->id}}/edit">[editar]</a> --}}
									</div>
								</div>
							</a>
						</li>	
					@endforeach 
				</ul> 
			</div>
		@endif -->

    <section id="materiais-recentes">
      <div class="container">
        <h2>Materiais Recentes (exemplo, vindo do db)</h2>

        <div>

        @forelse($last_objects as $item)
        <ul>
          <li><b>Curso: </b> {{ $item->course->pluck('short')->implode(' ') }}</li>
          <li><b>Título:</b> {{ $item->title }}</li>
          <li><b>Autor:</b> {{ $item->author }}</li>
          <li><b>Ano:</b> {{ $item->year }}</li>
          <li><b>Endereço</b> {{ $item->link }}</li>
          <li><img src="/covers/{{ $item->cover }}" style="width:15%;heigth:15%"></li>
        </ul>

        @empty
        <div>Não há materiais cadastrados ainda.</div>
        @endforelse
        
          
        </div>
      </div>
    </section>


	</div>

@endsection

@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

  $( "#inativos-mostra").click(
  	function() {
  		$( "#inativos" ).toggle();
  		$('#seta').toggleClass('fa-caret-down');
  	  $('#seta').toggleClass('fa-caret-up');
  	}
  );


  // Administração dos cliques do carrossel

  $('.seta-next').click(function(){
    $('.item.ativo').next().addClass('ativo');
    $('.item.ativo').prev().removeClass('ativo');
    $('.dot.ativo').next().addClass('ativo');
    $('.dot.ativo').prev().removeClass('ativo');
    $('.item.ativo .destaque .destaque-bloco a .destaque-titulo h1').focus();

    $('.seta-prev').css('display', 'block');
    $('.seta-next').css('display', 'block');
    $('.item:nth-of-type(4).ativo').siblings('.seta-next').css('display', 'none').siblings('.seta-prev').css('display', 'block');
  });

  $('.seta-prev').click(function(){
    $('.item.ativo').prev().addClass('ativo');
    $('.item.ativo').next().removeClass('ativo');
    $('.dot.ativo').prev().addClass('ativo');
    $('.dot.ativo').next().removeClass('ativo');
    $('.item.ativo .destaque .destaque-bloco a .destaque-titulo h1').focus();

    $('.seta-prev').css('display', 'block');
    $('.seta-next').css('display', 'block');
    $('.item:nth-of-type(1).ativo').siblings('.seta-prev').css('display', 'none').siblings('.seta-next').css('display', 'block');
  });


  // Comportamento hover das setas do carrossel

  $('.seta').hover(
    function() {
      $(this).children('path').attr('fill', '#ffffff');
      $(this).find('defs filter feGaussianBlur').attr('stdDeviation', '4');
      $(this).find('defs filter feOffset').attr('dy', '3');
    }, function() {
      $(this).children('path').attr('fill', '#f6f6f6');
      $(this).find('defs filter feGaussianBlur').attr('stdDeviation', '3');
      $(this).find('defs filter feOffset').attr('dy', '2');
    }
  );

</script>

@endsection
