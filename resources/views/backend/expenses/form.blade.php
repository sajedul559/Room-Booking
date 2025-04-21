

   <div class="mb-3">
    <x-common.label title="User" isRequired="true" />
    <x-common.select2 name="vendor_id">
        <option value="">Select User</option>
        @foreach ($vendors as $vendor)
        <option 
            value="{{ $vendor->id }}" 
            {{ old('vendor_id', $expense->vendor_id ?? auth()->id()) == $vendor->id ? 'selected' : '' }}>
            {{ $vendor->user->name }}
        </option>
        @endforeach
    </x-common.select2>
   </div>

    <div class="mb-3">
        <x-common.label title="Date" isRequired="true" />
        <x-common.input name="date" type="date" :value="old('date', $expense->date ?? '')" required />
    
        <x-common.label title="Property" />
        <x-common.select2 name="property_id">
            <option value="">Select Property</option>
            @foreach ($properties as $property)
                <option value="{{ $property->id }}" {{ old('property_id', $expense->property_id ?? '') == $property->id ? 'selected' : '' }}>
                    {{ $property->property_name }}
                </option>
            @endforeach
        </x-common.select2>
    </div>

    <div class="mb-3">
        <x-common.label title="Expens Type" isRequired="true" />
    
        <x-common.select2 name="expense_type" id="expense-type-select">
            <option value="">Select Expense Type</option>
            @foreach (\App\Models\Expense::getExpenseTypes() as $expense_type => $label)
                <option value="{{ $expense_type }}" {{ old('expense_type', $expense->expense_type ?? '') == $expense_type ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </x-common.select2>
        
        @error('status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
   <div class="mb-3">
        <x-common.label title="Amount" isRequired="true" />
        <x-common.input name="amount" type="number" step="0.01" :value="old('amount', $expense->amount ?? '')" required />
   </div>

   <div class="mb-3">
        <x-common.label title="Is Credit" />
        <x-common.input 
            name="is_credit" 
            value="1" 
            type="checkbox" 
            :checked="old('is_credit', isset($expense) && $expense->is_credit)" 
        />
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
