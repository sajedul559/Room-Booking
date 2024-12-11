@props(['id' => '', 'name' =>'', 'checked' => false])

<div class="form-check form-switch">
    <input 
        type="checkbox" 
        class="form-check-input" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        {{ $checked ? 'checked' : '' }}
    />
    <label class="form-check-label" for="{{ $id }}">Toggle Status</label>
</div>
