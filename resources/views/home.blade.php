@extends('layouts.app')

@section('content')
<section class="content-header"></section>

<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-ldi instrucoes-iniciais">
        <div class="box-header">
          <h3 class="box-title">Instruções</h3>
          <hr style="margin-bottom:0;">
        </div>

        <div class="box-body">
  	       <p>Para excluir um objeto selecione a opção visualizar na lista de objetos cadastrados.</p>
           <p>Na hora de cadastrar um novo objeto é necessário:</p>
            <ul>
              <li>Inserir uma imagem para capa de tamanho 735 x 396px;</li>
              <li>Informar o link do arquivo;</li>
              <li>Fornecer um resumo do material.</li>
           </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
