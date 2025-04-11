<div class="mb-3">
    <x-common.label title="Property Name" isRequired="true" />
    <x-common.input name="property_name" placeholder="Enter property name" 
                    value="{{ old('property_name', $property->property_name ?? '') }}" required />
    @error('property_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Full Address" isRequired="true" />
    <x-common.input name="location" placeholder="Ex: 123 Main Street, Springfield NSW 2000, Sydney" 
                    value="{{ old('location', $property->location ?? '') }}" required />
    @error('location')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <x-common.label title="City" isRequired="true" />
    <x-common.input name="city" placeholder="Ex: Springfield" 
                    value="{{ old('city', $property->city ?? '') }}" required />
    @error('city')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <x-common.label title="State" isRequired="true" />
    <x-common.input name="state" placeholder="Ex: NSW " 
                    value="{{ old('state', $property->state ?? '') }}" required />
    @error('state')
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

<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">Property Image (416 W and 293 H)</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
</div>


 

<div class="mb-3">
    <x-common.label title="Publish" />
    <x-common.checkbox name="is_publish" value="1" 
                       :checked="old('is_publish', $property->is_publish ?? false)" />
</div>
