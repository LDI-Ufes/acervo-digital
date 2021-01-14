
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
	<label for="name" class="control-label">{{ isset($editLabel) ? $editLabel : "Cadastrar Tipo de Curso" }}<span> *</span></label>
		<input class="form-control" name="name" type="text" id="name" value="" maxlength="80">
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
		<input class="btn-s -prim" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
</div>


