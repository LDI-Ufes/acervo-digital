
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  <label for="name" class="control-label">
    {{ isset($editLabel) ? $editLabel : "Cadastrar Tipo de Link" }}<span> *</span>
  </label>

  <input 
    class="form-control" 
    name="name" 
    type="text" 
    id="name" 
    value="{{ old('name', isset($link_type) ? $link_type->name : null) }}" 
    maxlength="80">
  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('call_to_action') ? 'has-error' : ''}}">
  <label for="call_to_action" class="control-label">
    {{ isset($editLabel) ? $editLabel : "Cadastrar Texto do Botão (CTA)" }}<span> *</span>
  </label>
  
  <input 
    class="form-control" 
    name="call_to_action"
    type="text" id="call_to_action" 
    value="{{ old('call_to_action', isset($link_type) ? $link_type->call_to_action : null) }}" 
    maxlength="80">
    {!! $errors->first('call_to_action', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
  <label for="icon" class="control-label">
    {{ isset($editLabel) ? $editLabel : "Escolher Ícone" }}<span> *</span>
  </label>

  <input class="form-control" name="icon" type="text" id="icon" value="" maxlength="80">
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}

  <ul id="icon-select" style="display:block">

    <li style="display:inline-block"> <i class="fa fa-glass"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-music"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-search"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-heart"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-star"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-user"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-film"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-th"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-check"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-remove"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-close"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-times"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-signal"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-gear"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-cog"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-home"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-road"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-download"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-inbox"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-repeat"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-refresh"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-lock"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-flag"></i> </li>
    <li style="display:inline-block"> <i class="fa fa-headphones"></i> </li>

  </ul>

</div>

<div class="form-group">
    <input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
</div>

<script>
/* preenche caixa de texto "icon" com a classe do ícone escolhido */
document
  .querySelector('#icon-select')
  .addEventListener('click', event => {
    const iconInput = document.getElementById('icon')   
    const { target } = event

    if(target.tagName == 'I')
      iconInput.value = target.className 
  })  

</script>
