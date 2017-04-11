
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
	<label for="name" class="col-md-2 control-label">Nome</label>
	<div class="col-md-10">
		<input class="form-control" name="name" type="text" id="name" value="{{ old('name', isset($course) ? $course->name : null) }}" maxlength="80">
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('modules') ? 'has-error' : ''}}">
	<label for="modules" class="col-md-2 control-label">Módulos</label>
	<div class="col-md-10">
		<input class="form-control" name="modules" type="text" id="modules" value="{{ old('modules', isset($course) ? $course->modules : null) }}" maxlength="80">
		{!! $errors->first('modules', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group">
	<div class="col-md-offset-2 col-md-10">
		<input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
	</div>
</div>


