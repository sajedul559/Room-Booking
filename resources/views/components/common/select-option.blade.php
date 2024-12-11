<select name="{{ $name }}" id="{{ $id ?? $name }}" 
        class="form-control {{ $class ?? '' }}" 
        {{ $required ? 'required' : '' }}
        {{ $attributes }}>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" 
                {{ $value == $selected ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
