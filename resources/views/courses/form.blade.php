
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
	<label for="name" class="col-md-2 control-label">Nome</label>
	<div class="col-md-10">
		<input class="form-control" name="name" type="text" id="name" value="{{ old('name', isset($course) ? $course->name : null) }}" maxlength="80">
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('cover') ? 'has-error' : '' }}">
  <label for="cover" class="col-xs-12 col-md-2 contro-label">Escolha uma Capa</label>
  
  <div class="col-xs-10">
    <input class="btn btn-default btn-file" name="cover" type="file" id="cover" value="{{ old('cover', isset($course) ? $course->cover : null) }}">
    {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
  </div>

  @if (isset($course->cover))
  <div class="cols-xs-2 col-md-1 imagem-existente">
    <img src="/covers/{{ $course->cover }}">
  </div>
  @endif
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


