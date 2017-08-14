
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
	<label for="title" class="col-md-2 control-label">Título</label>
	<div class="col-md-10">
		<input class="form-control" name="title" type="text" id="title" value="{{ old('title', isset($learning_object) ? $learning_object->title : null) }}" maxlength="160">
		{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('author') ? 'has-error' : ''}}">
	<label for="author" class="col-md-2 control-label">Autor(a)</label>
	<div class="col-md-10">
		<input class="form-control" name="author" type="text" id="author" value="{{ old('author', isset($learning_object) ? $learning_object->author : null) }}" maxlength="160">
		{!! $errors->first('author', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
	<label for="year" class="col-md-2 control-label">Ano</label>
	<div class="col-md-10">
		<input class="form-control" name="year" type="text" id="year" value="{{ old('year', isset($learning_object) ? $learning_object->year : null) }}" maxlength="4">
		{!! $errors->first('year', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
	<label for="summary" class="col-md-2 control-label">Resumo</label>
	<div class="col-md-10">
		<textarea class="form-control" name="summary" id="summary" maxlength="300" rows="3">{{ old('summary', isset($learning_object) ? $learning_object->summary : null) }}</textarea>
		{!! $errors->first('summary', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('cover') ? 'has-error' : ''}}">
 	<label for="cover" class="col-md-2 control-label">Escolha Capa</label>
	<div class="col-md-10">
		<input class="btn btn-default btn-file" name="cover" type="file" id="cover" value="{{ old('cover', isset($learning_object) ? $learning_object->cover : null) }}">
		{!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
	<label for="link" class="col-md-2 control-label">Link do Objeto</label>
	<div class="col-md-10">
		<input class="form-control" name="link" type="text" id="link" value="{{ old('link', isset($learning_object) ? $learning_object->link : null) }}" maxlength="160">
		{!! $errors->first('link', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
	<label for="course_id" class="col-md-2 control-label">Curso</label>
	<div class="col-md-10">

		<select class="form-control" name="course_id" id="course_id">
			@foreach($courses  as $course)
				@if (isset($learning_object) and ($learning_object->course_id == $course->id))
					<option value="{{$course->id}}" data-module-number="{{$course->modules}}" selected>{{$course->name}}</option>
				@else
					<option value="{{$course->id}}"  data-module-number="{{$course->modules}}">{{$course->name}}</option>
				@endif
			@endforeach
		</select>

		{!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('module') ? 'has-error' : ''}}">
	<label for="module" class="col-md-2 control-label">Módulo</label>
	<div class="col-md-10">

		<select class="form-control" name="module" id="module">
			@if (isset($learning_object) and ($learning_object->module == 0))
				<option value="0" selected>Sem módulo</option>
			@else 
				<option value="0">Sem módulo</option>
			@endif

			@for ($i = 1; $i <= $courses->max('modules'); $i++)
				@if(isset($learning_object) and ($learning_object->module == $i))
		          		<option value="{{ $i }}" selected>{{ $i }}</option>
				@else
		          		<option value="{{ $i }}">{{ $i }}</option>
				@endif
		      	@endfor 
		</select>

		{!! $errors->first('module', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('type_id') ? 'has-error' : ''}}">
	<label for="type" class="col-md-2 control-label">Tipo de Objeto de Aprendizagem</label>
	<div class="col-md-10">

		<select class="form-control" name="type_id" id="type_id">
			@foreach ($all_types as $type)
				@if(isset($learning_object) and ($learning_object->type_id == $type->id))
					<option value="{{ $type->id }}" selected>{{ $type->name }}</option>
				@else
					<option value="{{ $type->id }}">{{ $type->name }}</option>
				@endif
		      	@endforeach 
		</select>

		{!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group">
	<div class="col-md-offset-2 col-md-10">
		<input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
	</div>
</div>


