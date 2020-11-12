
<div class="card-material">

    <span class="card-tipo"><i class="fas fa-book"></i>{{ $item->type->name }}</span>

    <div class="card-capa">
        <a href="/materiais/{{ $item->id }}"><img src="/covers/{{ $item->cover }}" alt=""></a>
    </div>

    <div class="card-conteudo">
        <div class="card-cabecalho">
        <a href="/materiais/{{ $item->id }}"><h3 class="titulo">{{ $item->title }}</h3></a>
        <p class="autor">{{ $item->author }}</p> 
        </div>

        <div class="card-tags">
        <span class="tag">{{ $item->course->pluck('name')->implode(' ') }}</span>
        <!-- <span class="tag">...</span> -->
        </div>

        <div class="card-footer">
        <a href="{{ $item->link }}" target="_blank" class="link"><i class="fas fa-file-pdf"></i>PDF</a>
        <a href="{{ $item->link }}" target="_blank" class="link"><i class="fas fa-external-link-alt"></i>Online</a>
        <a href="/materiais/{{ $item->id }}" class="btn btn-terciario">Ver<i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</div>
