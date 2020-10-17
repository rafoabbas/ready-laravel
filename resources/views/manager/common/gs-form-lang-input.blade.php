<input type="{{ $type }}" class="form-control @error($language['short_from'].'.'.$name) is-invalid @enderror" id="inp-{{ $name }}" name="{{ $language['short_from'].'['.$name.']' }}" value="{{ old($language['short_from'].'.'.$name, general_setting($name, $key)) }}">
@error($language['short_from'].'.'.$name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
