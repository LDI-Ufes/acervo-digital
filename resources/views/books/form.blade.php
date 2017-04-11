
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
	<label for="title" class="col-md-2 control-label">Título</label>
	<div class="col-md-10">
		<input class="form-control" name="title" type="text" id="title" value="{{ old('title', isset($book) ? $book->title : null) }}" maxlength="160">
		{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('author') ? 'has-error' : ''}}">
	<label for="author" class="col-md-2 control-label">Autor(a)</label>
	<div class="col-md-10">
		<input class="form-control" name="author" type="text" id="author" value="{{ old('author', isset($book) ? $book->author : null) }}" maxlength="160">
		{!! $errors->first('author', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
	<label for="summary" class="col-md-2 control-label">Resumo</label>
	<div class="col-md-10">
		<textarea class="form-control" name="summary" id="summary" maxlength="2000"rows="3">{{ old('summary', isset($book) ? $book->summary : null) }}</textarea>
		{!! $errors->first('summary', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('cover') ? 'has-error' : ''}}">
 	<label for="cover" class="col-md-2 control-label">Escolha Capa</label>
	<div class="col-md-10">
		<input class="btn btn-default btn-file" name="cover" type="file" id="cover">
		{!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('pdf') ? 'has-error' : ''}}">
	<label for="pdf" class="col-md-2 control-label">Link do Livro</label>
	<div class="col-md-10">
		<input class="form-control" name="pdf" type="text" id="pdf" value="{{ old('pdf', isset($book) ? $book->pdf : null) }}" maxlength="160">
		{!! $errors->first('pdf', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
	<label for="course_id" class="col-md-2 control-label">Curso</label>
	<div class="col-md-10">

		<select class="form-control" name="course_id" id="course_id">
			@foreach($courses  as $course)
				<option value="{{$course->id}}">{{$course->name}}</option>
			@endforeach
		</select>

		{!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('module') ? 'has-error' : ''}}">
	<label for="module" class="col-md-2 control-label">Módulo</label>
	<div class="col-md-10">

		<select class="form-control" name="module" id="module">
			@for ($i = 1; $i <= $courses->max('modules'); $i++)
	          		<option value="{{ $i }}">{{ $i }}</option>
		      	@endfor 
		</select>

		{!! $errors->first('module', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-offset-2 col-md-10">
		<input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
	</div>
</div>


