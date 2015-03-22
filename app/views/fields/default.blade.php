<div class="form-group">
	{{ Form::label($name, $label) }}
	{{ $control }}
	@if($error)
		<p class="help-block">{{ $error }}</p>
	@endif
</div>
