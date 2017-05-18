
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
	<label for="name" class="col-md-2 control-label">Tipo</label>
	<div class="col-md-10">
		<input class="form-control" name="name" type="text" id="name" value="{{ old('name', isset($object_type) ? $object_type->name : null) }}" maxlength="80">
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-offset-2 col-md-10">
		<input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
	</div>
</div>


