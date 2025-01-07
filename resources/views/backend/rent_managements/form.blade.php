<div class="mb-3">
    <x-common.label title="Vendor" isRequired="true" />
    <x-common.select2 name="vendor_id">
        <option value="">Select Vendor</option>
        @foreach ($data['vendors'] as $vendor)
            <option value="{{ $vendor->id }}" {{ old('vendor_id', $rent->vendor_id ?? '') == $vendor->id ? 'selected' : '' }}>
                {{ $vendor->user->name }}
            </option>
        @endforeach
    </x-common.select2>
</div>

<div class="mb-3">
    <x-common.label title="Property" isRequired="true" />
    <x-common.select2 name="property_id">
        <option value="">Select Property</option>
        @foreach ($data['properties'] as $property)
            <option value="{{ $property->id }}" {{ old('property_id', $rent->property_id ?? '') == $property->id ? 'selected' : '' }}>
                {{ $property->property_name }}
            </option>
        @endforeach
    </x-common.select2>
</div>

<div class="mb-3">
    <x-common.label title="Room" isRequired="true" />
    <x-common.select2 name="room_id">
        <option value="">Select Room</option>
        @foreach ($data['rooms'] as $room)
            <option value="{{ $room->id }}" {{ old('room_id', $rent->room_id ?? '') == $room->id ? 'selected' : '' }}>
                {{ $room->name }}
            </option>
        @endforeach
    </x-common.select2>
</div>

<div class="mb-3">
    <x-common.label title="Amount" isRequired="true" />
    <x-common.input name="amount" type="number" step="0.01" :value="old('amount', $rent->amount ?? '')" required />
</div>

<div class="mb-3">
    <x-common.label title="Date" isRequired="true" />
    <x-common.input name="date" type="date" :value="old('date', $rent->date ?? '')" required />
</div>

<div class="mb-3">
    <x-common.label title="Tenant" isRequired="true" />
    <x-common.select2 name="user_id">
        <option value="">Select Tenant</option>
        @foreach ($data['tenants'] as $tenant)
            <option value="{{ $tenant->id }}" {{ old('user_id', $rent->user_id ?? '') == $tenant->id ? 'selected' : '' }}>
                {{ $tenant->name }}
            </option>
        @endforeach
    </x-common.select2>
</div>

<div class="mb-3">
    <x-common.label title="Payment Type" isRequired="true" />
    <x-common.select2 name="payment_type">
        <option value="">Select Payment Type</option>
        <option value="Cash" {{ old('payment_type', $rent->payment_type ?? '') == 'Cash' ? 'selected' : '' }}>Cash</option>
        <option value="Card" {{ old('payment_type', $rent->payment_type ?? '') == 'Card' ? 'selected' : '' }}>Card</option>
    </x-common.select2>
</div>

<div class="mb-3">
    <x-common.label title="Payment Collection Type" isRequired="true" />
    <x-common.select2 name="payment_collection_type">
        <option value="">Select Collection Type</option>
        <option value="Online" {{ old('payment_collection_type', $rent->payment_collection_type ?? '') == 'Online' ? 'selected' : '' }}>Online</option>
        <option value="Offline" {{ old('payment_collection_type', $rent->payment_collection_type ?? '') == 'Offline' ? 'selected' : '' }}>Offline</option>
    </x-common.select2>
</div>


<div class="mb-3">
    <x-common.label title="Notes" />
    <x-common.textarea name="notes">{{ old('notes', $rent->notes ?? '') }}</x-common.textarea>
</div>

<div class="form-group mt-3">
    <button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
    <a href="{{ route('rent_managements.index') }}" class="btn btn-secondary">Cancel</a>
</div>
