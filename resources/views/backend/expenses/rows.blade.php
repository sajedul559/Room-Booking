@forelse ($expenses as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->vendor?->user->name ?? 'No User Assigned' }}</td>
        <td>{{ $data->property?->property_name ?? 'No Vendor Assigned' }}</td>
        <td>{{ $data->expense_type }}</td>
        <td>{{ $data->is_credit ? 'Yes' : 'No' }}</td>
        <td>{{ $data->createdBy?->name ?? '' }}</td>
        <td>{{ $data->created_at }}</td>

        <td class="text-start">
            <x-common.action-drop-down>
                <a class="dropdown-item edit-item-btn" href="{{ route('expenses.edit', $data->id) }}">
                    <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                </a>
                @if ($data->created_by)
                    <a class="dropdown-item" href="{{ route('expense.details', $data->created_by) }}">
                        <i class="mdi mdi-eye me-2 text-muted vertical-middle"></i>View Details
                    </a>
                @else
                    <span class="dropdown-item text-muted">
                        <i class="mdi mdi-eye-off me-2 text-muted vertical-middle"></i>No Details
                    </span>
                @endif
                <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $data->id }}">
                    <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                </button>
            </x-common.action-drop-down>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="text-center text-muted">No expenses found for the selected filter.</td>
    </tr>
@endforelse
