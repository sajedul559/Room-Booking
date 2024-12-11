
@props([
    'name',
    'multiple'=> false,
    'showError'=>true
 
 ])
 @php
     $class = $multiple ? 'form-select ' : 'form-select ';
 @endphp
 <select {{ $attributes->merge(['class'=> $class]) }} {{ $multiple ? 'multiple':'' }} id={{ $name }} name={{ $name }}>
    {{ $slot }}
</select>
@if($showError)
    @error($name)
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
@endif