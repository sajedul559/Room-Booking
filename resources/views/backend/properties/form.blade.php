<div class="mb-3">
    <x-common.label title="Property Name" isRequired="true" />
    <x-common.input name="property_name" placeholder="Enter property name" 
                    value="{{ old('property_name', $property->property_name ?? '') }}" required />
    @error('property_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Location" isRequired="true" />
    <x-common.input name="location" placeholder="Enter location" 
                    value="{{ old('location', $property->location ?? '') }}" required />
    @error('location')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Property Type" isRequired="true" />

    <x-common.select2 name="property_type" id="property-type-select">
        <option value="">Select Property Type</option>
        @foreach (\App\Models\Property::getPropertyTypes() as $type => $label)
            <option value="{{ $type }}" {{ old('property_type', $property->property_type ?? '') == $type ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </x-common.select2>
    
    @error('property_type')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


 

<div class="mb-3">
    <x-common.label title="Publish" />
    <x-common.checkbox name="is_publish" value="1" 
                       :checked="old('is_publish', $property->is_publish ?? false)" />
</div>
