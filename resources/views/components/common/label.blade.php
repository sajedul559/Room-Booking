@props([
    'for'        => '',
    'class'      => '',
    'isRequired' => false,
    'title'      => ''
])
<label for="{{ $for }}" {{ $attributes->merge(['class'=> 'form-label']) }}>{{ $title }} 
    @if($isRequired == 'true')
        <x-common.required />
    @endif
    {{ $slot }}
</label>