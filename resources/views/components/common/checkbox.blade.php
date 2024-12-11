<input type="checkbox" 
       name="{{ $name }}" 
       id="{{ $id ?? $name }}" 
       class="form-check-input {{ $class ?? '' }}" 
       value="{{ $value ?? 1 }}" 
       {{ $checked ? 'checked' : '' }}
       {{ $attributes }}>
