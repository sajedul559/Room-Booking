<x-common.label title="Task Name" isRequired="true" />
<x-common.input 
    name="name" 
    label="Task Name" 
    :value="old('name', $houseChore->name ?? '')" 
    placeholder="Enter task name" 
    required />

{{-- <x-common.label title="Property ID" isRequired="true" />
<x-common.input 
    name="property_id" 
    label="Property ID" 
    type="number" 
    :value="old('property_id', $houseChore->property_id ?? '')" 
    placeholder="Enter property ID" 
    required /> --}}
<div class="mb-3">
    <x-common.label title="Property" />
    <x-common.select2 name="property_id">
        <option value="">Select Property</option>
        @foreach ($properties as $property)
            <option value="{{ $property->id }}" {{ old('property_id', $houseChore->property_id ?? '') == $property->id ? 'selected' : '' }}>
                {{ $property->property_name }}
            </option>
        @endforeach
    </x-common.select2>
</div>
<div class="mb-3">
<x-common.label title="Expected Completion Date" />
<x-common.input 
    name="expected_date_to_complete" 
    label="Expected Completion Date" 
    type="date" 
    :value="old('expected_date_to_complete', $houseChore->expected_date_to_complete ?? '')" />
</div>
<div class="mb-3">
<x-common.label title="Description" />
<x-common.input 
    name="description" 
    label="Description" 
    type="textarea" 
    :value="old('description', $houseChore->description ?? '')" 
    placeholder="Enter task description" />
</div>
<div class="mb-3">
<x-common.label title="Task Type" />
<x-common.input 
    name="task_type" 
    label="Task Type" 
    :value="old('task_type', $houseChore->task_type ?? '')" 
    placeholder="Enter task type" />
</div>
<div class="mb-3">
<x-common.label title="Comments" />
<x-common.textarea 
    name="comments" 
    label="Comments" 
    type="textarea" 
    :value="old('comments', $houseChore->comments ?? '')" 
    placeholder="Enter comments" />
</div>
<div class="mb-3">
    <x-common.label title="Cleaner Booked" />
    <x-common.checkbox 
        name="cleaner_booked" 
        value="1" 
        :checked="old('cleaner_booked', $houseChore->cleaner_booked ?? false) == 1" 
    />
</div>
<div class="mb-3">
    <x-common.label title="Status" isRequired="true" />
    <x-common.select2 name="status" id="status-select">
        <option value="">Select Status</option>
        @foreach (\App\Models\HouseChore::statusList() as $status => $label)
        <option value="{{ $status }}" {{ old('status', $houseChore->status ?? '') == $status ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
    </x-common.select2>
    @error('status')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mt-3">
    <button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
    <a href="{{ route('house_chores.index') }}" class="btn btn-secondary">Cancel</a>
</div>
