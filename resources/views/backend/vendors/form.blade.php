
<div class="mb-3">
    <x-common.label title="User" isRequired="true" />
    <x-common.select2 name="user_id">
        <option value="">Select User</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', $expense->user_id ?? '') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </x-common.select2>
   </div>

<div class="mb-3">
    <x-common.label title="Address" isRequired="true" />
    <x-common.input name="address" placeholder="Enter Address" 
                    value="{{ old('address', $vendor->address ?? '') }}" required />
    @error('address')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="City" isRequired="true" />
    <x-common.input name="city" placeholder="Enter City" 
                    value="{{ old('city', $vendor->city ?? '') }}" required />
    @error('city')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="State" isRequired="true" />
    <x-common.input name="state" placeholder="Enter State" 
                    value="{{ old('state', $vendor->state ?? '') }}" required />
    @error('state')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Country" isRequired="true" />
    <x-common.input name="country" placeholder="Enter Country" 
                    value="{{ old('country', $vendor->country ?? '') }}" required />
    @error('country')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Postcode" isRequired="true" />
    <x-common.input name="postcode" placeholder="Enter Postcode" 
                    value="{{ old('postcode', $vendor->postcode ?? '') }}" required />
    @error('postcode')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Phone" isRequired="true" />
    <x-common.input name="phone" placeholder="Enter Phone Number" 
                    value="{{ old('phone', $vendor->phone ?? '') }}" required />
    @error('phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Email" isRequired="true" />
    <x-common.input name="email" type="email" placeholder="Enter Email" 
                    value="{{ old('email', $vendor->email ?? '') }}" required />
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Status" isRequired="true" />
    <x-common.select2 name="status" id="status-select">
        <option value="">Select Status</option>
        @foreach (\App\Models\Vendor::getVendorStatus() as $type => $label)
        <option value="{{ $type }}" {{ old('property_type', $vendor->status ?? '') == $type ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
    </x-common.select2>
    @error('status')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
{{-- <div class="mb-3">
    <x-common.label title="Property Type" isRequired="true" />

    <x-common.select2 name="property_type" id="property-type-select">
        <option value="">Select Property Type</option>
        @foreach (\App\Models\Vendor::getPropertyTypes() as $type => $label)
            <option value="{{ $type }}" {{ old('property_type', $property->property_type ?? '') == $type ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </x-common.select2>
    
    @error('property_type')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div> --}}

{{-- <div class="mb-3">
    <x-common.label title="Publish" />
    <x-common.checkbox name="is_publish" value="1" 
                       :checked="old('is_publish', $vendor->is_publish ?? false)" />
</div> --}}

<div class="mb-3">
    <button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
    <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Cancel</a>

</div>
