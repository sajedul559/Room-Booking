

<div class="mb-3">
    <x-common.label title="Vendor" isRequired="true" />

    <x-common.select2 name="vendor_id" id="vendor-select">
        <option value="">Select Vendor</option>
        @foreach ($vendors as $vendor)
            <option value="{{ $vendor->id }}" {{ old('vendor_id', $todo->vendor_id ?? '') == $vendor->id ? 'selected' : '' }}>
                {{ $vendor->user->name }}
            </option>
        @endforeach
    </x-common.select2>
    
    @error('vendor_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

    <x-common.label title="Name" isRequired="true" />
    <x-common.input name="name" placeholder="Enter name" label="Name" :value="old('name', $todo->name ?? '')" required />

    <div class="mb-3">
        <x-common.label title="Description" />
        <x-common.textarea 
        name="discription" 
        label="discription" 
        type="textarea" 
        :value="old('discription', $todo->discription ?? '')" 
        placeholder="Enter discription" />
    </div>
    <div class="mb-3">
        <x-common.label title="Status" isRequired="true" />
    
        <x-common.select2 name="status" id="property-type-select">
            <option value="">Select Property Type</option>
            @foreach (\App\Models\Todo::getTodoStatus() as $status => $label)
                <option value="{{ $status }}" {{ old('status', $todo->status ?? '') == $status ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </x-common.select2>
        
        @error('status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
