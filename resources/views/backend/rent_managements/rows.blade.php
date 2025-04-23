@forelse ($rentManagements as $data)
<tr>
    <td>{{ $data->id }}</td>
    <td>{{ $data->vendor ? $data->vendor->user->name ?? 'No User Assigned' : 'No Vendor Assigned' }}</td>
    <td>{{ $data->property ? $data->property->property_name : 'No Vendor Assigned' }}</td>
    <td>{{ $data->user ? $data->user->name : 'No User Assigned' }}</td>
    <td>{{ $data->room?->name ?? '' }}</td>
    <td>{{ $data->amount }}</td>
    <td>{{ $data->payment_type }}</td>
    <td>{{ $data->payment_collection_type }}</td>
    <td>{{ $data->paymentCollecteddBy? $data->paymentCollecteddBy->name:'No Assigned' }}</td>
    <td>{{ $data->date }}</td>
    <td>{{ $data->createdBy->name }}</td>
    {{-- <td>{{ $data->updatedBy->name }}</td> --}}
    <td class="text-start">
        <x-common.action-drop-down>
            <!-- Edit Button -->
            <a class="dropdown-item edit-item-btn" href="{{ route('rent_managements.edit', $data->id) }}">
                <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
            </a>
            <!-- Delete Button -->
            <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $data->id }}">
                <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
            </button>
        </x-common.action-drop-down>
        <form id="delete-form-{{ $data->id }}" action="{{ route('rent_managements.destroy', $data->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </td>
</tr>
@empty
    <tr>
        <td colspan="10" class="text-center text-muted">No data found for the selected filter.</td>
    </tr>
@endforelse
