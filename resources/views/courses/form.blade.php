
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
	<label for="name" class="col-md-2 control-label">Nome</label>
	<div class="col-md-10">
		<input class="form-control" name="name" type="text" id="name" value="{{ old('name', isset($course) ? $course->name : null) }}" maxlength="80">
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('type_id') ? 'has-error' : ''}}">
	<label for="type_id" class="col-md-2 control-label">Tipo de Curso</label>
	<div class="col-md-10">

		<select class="form-control" name="type_id" id="type_id">
			@foreach($all_course_types  as $course_type)
				@if (isset($course) and ($course->type_id == $course_type->id))
					<option value="{{$course_type->id}}" selected>{{$course_type->name}}</option>
				@else
					<option value="{{$course_type->id}}">{{$course_type->name}}</option>
				@endif
			@endforeach
		</select>

		{!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<!--<div class="form-group {{ $errors->has('modules') ? 'has-error' : ''}}">
	<label for="modules" class="col-md-2 control-label">Módulos</label>
	<div class="col-md-10">
		<input class="form-control" name="modules" type="text" id="modules" value="{{ old('modules', isset($course) ? $course->modules : null) }}" maxlength="80">
		{!! $errors->first('modules', '<p class="help-block">:message</p>') !!}
	</div>
</div>-->

<div class="form-group {{ $errors->has('bg_color') ? 'has-error' : ''}}">
	<label for="bg_color" class="col-md-2 control-label">Cor de fundo</label>
	<div class="col-md-10">
		<input class="form-control" name="bg_color" type="text" id="bg_color" value="{{ old('bg_color', isset($course) ? $course->bg_color : '#2E2E2E') }}" maxlength="7">
		{!! $errors->first('bg_color', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('fg_color') ? 'has-error' : ''}}">
	<label for="fg_color" class="col-md-2 control-label">Cor da fonte</label>
	<div class="col-md-10">
		<input class="form-control" name="fg_color" type="text" id="fg_color" value="{{ old('fg_color', isset($course) ? $course->fg_color : '#333333') }}" maxlength="7">
		{!! $errors->first('fg_color', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('aux_color') ? 'has-error' : ''}}">
	<label for="aux_color" class="col-md-2 control-label">Cor auxiliar</label>
	<div class="col-md-10">
		<input class="form-control" name="aux_color" type="text" id="aux_color" value="{{ old('aux_color', isset($course) ? $course->aux_color : '#415F72') }}" maxlength="7">
		{!! $errors->first('aux_color', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('short') ? 'has-error' : ''}}">
	<label for="short" class="col-md-2 control-label">Abreviação</label>
	<div class="col-md-10">
		<input class="form-control" name="short" type="text" id="short" value="{{ old('short', isset($course) ? $course->short : null) }}" maxlength="3">
		{!! $errors->first('short', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
	<label for="active" class="col-md-2 control-label">Ativo</label>
	<div class="col-md-2">
		@if (isset($course) and $course->active)
			<input name="active" type="checkbox" id="active" checked>
		@else	
			<input name="active" type="checkbox" id="active">
		@endif
		{!! $errors->first('active', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-offset-2 col-md-10">
		<input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
	</div>
</div>


