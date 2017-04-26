
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

<div class="form-group {{ $errors->has('bg_color') ? 'has-error' : ''}}">
	<label for="bg_color" class="col-md-2 control-label">Cor de fundo</label>
	<div class="col-md-10">
		<input class="form-control" name="bg_color" type="text" id="bg_color" value="{{ old('bg_color', isset($course) ? $course->bg_color : null) }}" maxlength="7">
		{!! $errors->first('bg_color', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('fg_color') ? 'has-error' : ''}}">
	<label for="fg_color" class="col-md-2 control-label">Cor da fonte</label>
	<div class="col-md-10">
		<input class="form-control" name="fg_color" type="text" id="fg_color" value="{{ old('fg_color', isset($course) ? $course->fg_color : null) }}" maxlength="7">
		{!! $errors->first('fg_color', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group {{ $errors->has('acronym') ? 'has-error' : ''}}">
	<label for="acronym" class="col-md-2 control-label">Abreviação</label>
	<div class="col-md-10">
		<input class="form-control" name="acronym" type="text" id="acronym" value="{{ old('acronym', isset($course) ? $course->acronym : null) }}" maxlength="3">
		{!! $errors->first('acronym', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-offset-2 col-md-10">
		<input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
	</div>
</div>


