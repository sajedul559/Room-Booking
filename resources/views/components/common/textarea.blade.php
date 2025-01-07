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
>{{ $slot->isEmpty() ? old($name, $value) : $slot }}</textarea>
