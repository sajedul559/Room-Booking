@forelse ($roles as $role)
    <tr>

        <td class="id">{{ $loop->iteration }}</td>
        <td class="name">
            {{ $role->name }}
        </td>
        <td class="created_by">{{ $role->createdBy?->name ?? 'Not Assigned' }}</td>
        <td class="created_by">{{ $role->lastUpdatedBy?->name ?? 'Not Assigned' }}</td>
        <td class="status">
            {{ $role->is_active ? 'Active' : 'Inactive' }}
        </td>
        <td class="text-end">
            <a class="dropdown-item" href="{{ route('assign-permissions.index', $role->id) }}" data-edit-url=""
               >
                <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Assign Permission</a>
            @if($role->is_system != 1)
            <x-common.action-drop-down>
                <a class="dropdown-item edit-item-btn" href="" data-edit-url="{{ route('roles.edit', $role->id) }}"
                    data-update-url="{{ route('roles.update', $role->id) }}">
                    <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit</a>
                <a class="dropdown-item" href="#"  data-url="{{ route('roles.delete', $role->id) }}"><i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete</a>
               
            </x-common.action-drop-down>
            @endif
        </td>
    </tr>
@empty
@endforelse
