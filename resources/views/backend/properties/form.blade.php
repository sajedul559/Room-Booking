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

<div class="mb-3">
    <x-common.label title="Total bedrooms" isRequired="true" />
    <x-common.input name="total_bedroom" type="number" placeholder="Ex: 1 "
                    min="1" 
                    value="{{ old('total_bedroom', $property->total_bedroom ?? '') }}" required />
    @error('TotalBedRooms')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Total bathrooms" isRequired="true" />
    <x-common.input name="total_bathroom" type="number" placeholder="Ex: 1 "
                    min="1" 
                    value="{{ old('total_bathroom', $property->total_bathroom ?? '') }}" required />
    @error('Totalbathrooms')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="How many people will live in your home?" isRequired="true" />
    <x-common.input name="total_people_live" type="number" placeholder="Ex: 1 "
                    min="1" 
                    value="{{ old('total_people_live', $property->total_people_live ?? '') }}" required />
    @error('Totalpeople')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Parking</label>
    <select name="parking" class="form-control">
        <option value="0">No parking</option>
        <option value="1">Off-street parking</option>
        <option value="2">On-street parking</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Internet</label>
    <select name="internet" class="form-control">
        <option value="0">No internet</option>
        <option value="1">Available but not inc in rent</option>
        <option value="2">Included in rent</option>
        <option value="3">Unlimited included in rent</option>
    </select>
</div>

<div class="mb-3">
    <x-common.label title="Select accessibility features"/>

    <x-common.select2 name="accessibility[]" id="accessibility-features-select" multiple="multiple" placeholder="Select">
        <option value="" disabled>Select Accessibility Features</option>
        
        @foreach (\App\Models\Property::getAccessibilityFeatures() as $type => $label)
            <option value="{{ $type }}" {{ in_array($label, old('accessibility', $property->accessibility ?? [])) ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </x-common.select2>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Property Image (416 W and 293 H)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
    </div>
     <div class="col-md-3">
        {{-- Show image preview if exists --}}
        @if (!empty($property->image_path))
            <p class="text-sm text-gray-600 m-0">Current Image:</p>
            <a href="{{ asset('storage/' . $property->image_path) }}" target="_blank">
                <img src="{{ asset('storage/' . $property->image_path) }}"
                    alt="Current Image"
                    class="w-16 h-16 rounded border border-gray-300"
                    style="height:50px; width:150px"/>
            </a>

        @endif
     </div>
     <div class="col-md-3"></div>
</div>

<div class="mb-3">
    <x-common.label title="Publish" />
    <x-common.checkbox name="is_publish" value="1" 
                       :checked="old('is_publish', $property->is_publish ?? false)" />
</div>

