@props([
    'name',
    'isRequired' => false,
    'placeholder' => 'Type something here...',
    'value' => '',
])

<textarea 
    class="form-control" 
    id="{{ $name }}" 
    name="{{ $name }}" 
    placeholder="{{ $placeholder }}" 
    {{ $isRequired ? 'required' : '' }}
>{{ old($name, $value) }}</textarea>
