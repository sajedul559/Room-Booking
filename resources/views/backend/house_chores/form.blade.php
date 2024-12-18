<x-common.label title="Task Name" isRequired="true" />
<x-common.input 
    name="name" 
    label="Task Name" 
    :value="old('name', $houseChore->name ?? '')" 
    placeholder="Enter task name" 
    required />

<x-common.label title="Vendor ID" isRequired="true" />
<x-common.input 
    name="vendor_id" 
    label="Vendor ID" 
    type="number" 
    :value="old('vendor_id', $houseChore->vendor_id ?? '')" 
    placeholder="Enter vendor ID" 
    required />

<x-common.label title="Property ID" isRequired="true" />
<x-common.input 
    name="property_id" 
    label="Property ID" 
    type="number" 
    :value="old('property_id', $houseChore->property_id ?? '')" 
    placeholder="Enter property ID" 
    required />

<x-common.label title="Date" isRequired="true" />
<x-common.input 
    name="date" 
    label="Date" 
    type="date" 
    :value="old('date', $houseChore->date ?? '')" 
    required />

<x-common.label title="Expected Completion Date" />
<x-common.input 
    name="expected_date_to_complete" 
    label="Expected Completion Date" 
    type="date" 
    :value="old('expected_date_to_complete', $houseChore->expected_date_to_complete ?? '')" />

<x-common.label title="Description" />
<x-common.input 
    name="description" 
    label="Description" 
    type="textarea" 
    :value="old('description', $houseChore->description ?? '')" 
    placeholder="Enter task description" />

<x-common.label title="Task Type" />
<x-common.input 
    name="task_type" 
    label="Task Type" 
    :value="old('task_type', $houseChore->task_type ?? '')" 
    placeholder="Enter task type" />

<x-common.label title="Comments" />
<x-common.textarea 
    name="comments" 
    label="Comments" 
    type="textarea" 
    :value="old('comments', $houseChore->comments ?? '')" 
    placeholder="Enter comments" />

<x-common.label title="Cleaner Booked" />
<x-common.input 
    name="cleaner_booked" 
    label="Cleaner Booked" 
    :value="old('cleaner_booked', $houseChore->cleaner_booked ?? '')" 
    placeholder="Enter cleaner name" />

<x-common.label title="Status" isRequired="true" />
<x-common.input 
    name="status" 
    label="Status" 
    :value="old('status', $houseChore->status ?? '')" 
    placeholder="Enter status" 
    required />

<div class="form-group mt-3">
    <button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
    <a href="{{ route('house_chores.index') }}" class="btn btn-secondary">Cancel</a>
</div>
