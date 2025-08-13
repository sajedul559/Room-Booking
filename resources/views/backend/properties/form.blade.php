<div class="row">
    <div class="col-md-6 mb-3">
        <x-common.label title="Property Name" isRequired="true" />
        <x-common.input name="property_name" placeholder="Enter property name" 
                        value="{{ old('property_name', $property->property_name ?? '') }}" required />
        @error('property_name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="Full Address" isRequired="true" />
        <x-common.input name="location" placeholder="Ex: 123 Main Street" 
                        value="{{ old('location', $property->location ?? '') }}" required />
        @error('location') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="City" isRequired="true" />
        <x-common.input name="city" placeholder="Ex: Springfield" 
                        value="{{ old('city', $property->city ?? '') }}" required />
        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="State" isRequired="true" />
        <x-common.input name="state" placeholder="Ex: NSW" 
                        value="{{ old('state', $property->state ?? '') }}" required />
        @error('state') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="Property Type" isRequired="true" />
        <x-common.select2 name="property_type" id="property-type-select">
            <option value="">Select Property Type</option>
            @foreach (\App\Models\Property::getPropertyTypes() as $type => $label)
                <option value="{{ $type }}" {{ old('property_type', $property->property_type ?? '') == $type ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </x-common.select2>
        @error('property_type') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="Total Bedrooms" isRequired="true" />
        <x-common.input name="total_bedroom" type="number" min="1" placeholder="Ex: 1" 
                        value="{{ old('total_bedroom', $property->total_bedroom ?? '') }}" required />
        @error('total_bedroom') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="Total Bathrooms" isRequired="true" />
        <x-common.input name="total_bathroom" type="number" min="1" placeholder="Ex: 1" 
                        value="{{ old('total_bathroom', $property->total_bathroom ?? '') }}" required />
        @error('total_bathroom') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="How many people will live?" isRequired="true" />
        <x-common.input name="total_people_live" type="number" min="1" placeholder="Ex: 1" 
                        value="{{ old('total_people_live', $property->total_people_live ?? '') }}" required />
        @error('total_people_live') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="Parking" />
        <select name="parking" class="form-control">
            <option value="0" {{ old('parking', $property->parking ?? '') == 0 ? 'selected' : '' }}>No parking</option>
            <option value="1" {{ old('parking', $property->parking ?? '') == 1 ? 'selected' : '' }}>Off-street parking</option>
            <option value="2" {{ old('parking', $property->parking ?? '') == 2 ? 'selected' : '' }}>On-street parking</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="Internet" />
        <select name="internet" class="form-control">
            <option value="0" {{ old('internet', $property->internet ?? '') == 0 ? 'selected' : '' }}>No internet</option>
            <option value="1" {{ old('internet', $property->internet ?? '') == 1 ? 'selected' : '' }}>Available but not inc in rent</option>
            <option value="2" {{ old('internet', $property->internet ?? '') == 2 ? 'selected' : '' }}>Included in rent</option>
            <option value="3" {{ old('internet', $property->internet ?? '') == 3 ? 'selected' : '' }}>Unlimited included in rent</option>
        </select>
    </div>

    <div class="col-md-12 mb-3">
        <x-common.label title="Accessibility Features" />
        <x-common.select2 name="accessibility[]" id="accessibility-features-select" multiple placeholder="Select">
            <option value="" disabled>Select Accessibility Features</option>
            @foreach (\App\Models\Property::getAccessibilityFeatures() as $label)
                <option value="{{ $label }}" {{ in_array($label, old('accessibility', $property->accessibility ?? [])) ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </x-common.select2>
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="Background Color" />
        <x-common.input name="background_color" type="color" 
                        value="{{ old('background_color', $property->background_color ?? '#ffffff') }}" />
    </div>

    <div class="col-md-6 mb-3">
        <x-common.label title="Font Color" />
        <x-common.input name="font_color" type="color" 
                        value="{{ old('font_color', $property->font_color ?? '#000000') }}" />
    </div>
</div>


@php
    $places = old('nearby_places', $property->nearby_places ?? [['name' => '', 'distance' => '']]);
@endphp

<label class="form-label">Nearby Locations</label>
<div id="nearby-wrapper">
    @foreach ($places as $index => $place)
    <div class="mb-3">
        <div>
            <div class="nearby-item mb-2 d-flex gap-2">
                <input type="text"  name="nearby_places[{{ $index }}][name]" value="{{ $place['name'] }}" placeholder="Location Name" class="form-control">
                <input type="text" name="nearby_places[{{ $index }}][distance]" value="{{ $place['distance'] }}" placeholder="Distance (e.g. 100 m)" class="form-control">
                
                @if ($index == 0)
                    <button type="button" class="btn btn-primary" id="add-nearby">+</button>
                @endif
                @if ($index > 0)
                    <button type="button" class="btn btn-danger remove-item">×</button>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>


<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Property Image (416 W and 293 H)</label>
            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
             @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
       
    </div>

    <div class="col-md-3">
        {{-- Show current image preview if exists --}}
        @if (!empty($property->image_path))
            <p class="text-sm text-gray-600 m-0">Current Image:</p>
            <a href="{{ asset('storage/' . $property->image_path) }}" target="_blank">
                <img src="{{ asset('storage/' . $property->image_path) }}"
                     alt="Current Image"
                     class="w-16 h-16 rounded border border-gray-300"
                     style="height:50px; width:150px"/>
            </a>
        @endif

        {{-- New image preview --}}
        <div id="new-image-preview" class="mt-2" style="display:none;">
            <p class="text-sm text-primary m-0">New Image Preview:</p>
            <img id="preview-img" src="#" alt="Preview Image"
                 class="w-16 h-16 rounded border border-primary"
                 style="height:70px; width:100px;"/>
        </div>
    </div>

    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-2 mb-3">
        <x-common.label title="Is Publish?" />
        <x-common.checkbox name="is_publish" value="1" :checked="old('is_publish', $property->is_publish ?? false)" />
    </div>

    <div class="col-md-2 mb-3">
        <x-common.label title="Is New?" />
        <x-common.checkbox name="is_new" value="1" :checked="old('is_new', $property->is_new ?? false)" />
    </div>
</div>

@push('scripts')
<script>
    let nearbyIndex = $('#nearby-wrapper .nearby-item').length;

    $('#add-nearby').on('click', function () {
        $('#nearby-wrapper').append(`
            <div class="nearby-item mb-2 d-flex gap-2">
                <input type="text" name="nearby_places[${nearbyIndex}][name]" placeholder="Location Name" class="form-control">
                <input type="text" name="nearby_places[${nearbyIndex}][distance]" placeholder="Distance (e.g. 100 m)" class="form-control">
                <button type="button" class="btn btn-danger remove-item">×</button>
            </div>
        `);
        nearbyIndex++;
    });

    $(document).on('click', '.remove-item', function () {
        $(this).closest('.nearby-item').remove();
    });
</script>
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-img');
        const previewWrapper = document.getElementById('new-image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewWrapper.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
    

