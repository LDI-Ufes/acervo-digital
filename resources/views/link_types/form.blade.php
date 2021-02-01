
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

  <ul class="form-control" id="icon" name="icon">
    <li value="fa fa-address-book"> ? <i class="fa fa-address-book"></i> </li> abc
    <li value="fa fa-address-card"> <i class="fa fa-address-card"></i> </li>
    <li value="fa fa-adjust"> <i class="fa fa-adjust"></i> </li>
    <li value="fa fa-adn"> <i class="fa fa-adn"></i> </li>
    <li value="fa fa-adversal"> <i class="fa fa-adversal"></i> </li>
    <li value="fa fa-affiliatetheme"> <i class="fa fa-affiliatetheme"></i> </li>
    <li value="fa fa-air-freshener"> <i class="fa fa-air-freshener"></i> </li>
    <li value="fa fa-airbnb"> <i class="fa fa-airbnb"></i> </li>
    <li value="fa fa-algolia"> <i class="fa fa-algolia"></i> </li>
    <li value="fa fa-align-center"> <i class="fa fa-align-center"></i> </li>
    <li value="fa fa-align-justify"> <i class="fa fa-align-justify"></i> </li>
    <li value="fa fa-align-left"> <i class="fa fa-align-left"></i> </li>
    <li value="fa fa-align-right"> <i class="fa fa-align-right"></i> </li>
    <li value="fa fa-alipay"> <i class="fa fa-alipay"></i> </li>
    <li value="fa fa-allergies"> <i class="fa fa-allergies"></i> </li>
    <li value="fa fa-amazon"> <i class="fa fa-amazon"></i> </li>
    <li value="fa fa-ambulance"> <i class="fa fa-ambulance"></i> </li>
    <li value="fa fa-american-sign-language-interpreting"> <i class="fa fa-american-sign-language-interpreting"></i> </li>
    <li value="fa fa-anchor"> <i class="fa fa-anchor"></i> </li>
    <li value="fa fa-android"> <i class="fa fa-android"></i> </li>
    <li value="fa fa-angellist"> <i class="fa fa-angellist"></i> </li>
    <li value="fa fa-angle-left"> <i class="fa fa-angle-left"></i> </li>
    <li value="fa fa-angle-right"> <i class="fa fa-angle-right"></i> </li>
    <li value="fa fa-angle-up"> <i class="fa fa-angle-up"></i> </li>
    <li value="fa fa-angry"> <i class="fa fa-angry"></i> </li>
    <li value="fa fa-angry"> <i class="fa fa-angry"></i> </li>
    <li value="fa fa-angular"> <i class="fa fa-angular"></i> </li>
  </ul>

  <input class="form-control" name="icon" type="text" id="icon" value="" maxlength="80">
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
</div>

