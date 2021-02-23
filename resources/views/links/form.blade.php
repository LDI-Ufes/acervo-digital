
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}"
  style="border: 1px solid red">

	<label for="link" class="col-md-2">Adicionar novo link ou arquivo</label>
	<div class="col-md-10">
		<!--<input class="form-control" name="link" type="text" id="link" value="{{ old('link', isset($learning_object) ? $learning_object->link : null) }}" maxlength="160">
		{!! $errors->first('link', '<p class="help-block">:message</p>') !!}
		<hr>
		-->
		<div>
			<input type="radio" class="opcao-link col-xs-1" name="file_or_link" value="usar_link" checked="checked"> 
			<p class="col-xs-5">Fornecer link para o material.</p>
			
			<input type="radio" class="opcao-link col-xs-1" name="file_or_link" value="usar_arquivo"> 
			<p class="col-xs-5">Fazer upload de arquivo.</p> 
		</div>

		<br/><br/>
		<div class="col-sm-6 selecao-arquivo">
			Insira o link do arquivo <br/><input type="text" class="form-control" id="link_input" name="link_input" {{ isset($link) ? 'value=' . $link->url : "" }}>
		</div>
		<div class="col-sm-6 selecao-arquivo">
			Selecione arquivo para upload <br/><input type="file" id="upload_input" name="upload_input" disabled>
		</div>
		<hr>
	</div>


  <select class="form-control" name="link_type_id">
    @forelse( \App\LinkType::all() as $linkType)
      <option value="{{ $linkType->id }}">{{$linkType->name}}</option>
    @empty
      <option> Não há tipos de link cadastrados. </option>
    @endforelse
  </select>

  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <input class="btn btn-success" type="submit" value="{{ isset($submitButtonLabel) ? $submitButtonLabel : "Adicionar" }}">
    </div>
  </div>

  <script> 
    document.addEventListener('DOMContentLoaded', function() {
      $('.opcao-link').change(function() {
        if(this.value == 'usar_link') {
          $('#link_input').removeAttr('disabled')
          $('#upload_input').attr('disabled', 'disabled')
          $('#upload_input').val('')
        } else {
          $('#upload_input').removeAttr('disabled')
          $('#link_input').attr('disabled', 'disabled')
          $('#link_input').val('')
        }
      })
    })
  </script>

</div>
