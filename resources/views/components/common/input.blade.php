@props([
    'type' => 'text',
    'name',
    'placeholder'   => '',
    'value'         => '',
    'showError'     => true,
    "id"            => '',
    "isChecked"     => false,
])
<input 
id="{{ $id }}"
type="{{ $type }}"
name="{{ $name }}"
value="{{ old($name, $value) }}"
placeholder="{{ $placeholder }}"
aria-label="{{ $placeholder }}"
@if($isChecked) checked @endif
{{ $attributes->class(['form-control mb-2' => ($type != 'checkbox' && $type != 'radio'), 'is-invalid' =>  $errors->has($name)]) }}

>
@if($showError)
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
@endif