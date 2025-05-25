<div class="mb-3">
    <x-common.label title="Name" isRequired="true" />
    <x-common.input 
        name="name" 
        placeholder="Enter category name" 
        label="Name" 
        :value="old('name', $blogCategory->name ?? '')" 
        required 
    />
</div>

<div class="mb-3">
    <x-common.label title="Status" isRequired="true" />
    <x-common.select2 name="status">
        <option value="">Select Status</option>
        <option value="1" {{ old('status', $blogCategory->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $blogCategory->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
    </x-common.select2>
</div>

<button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
