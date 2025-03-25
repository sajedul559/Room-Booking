@forelse ($colors as $color)
<tr>
                                    
    <td class="id">1</td>
    <td class="name">
        {{ $color->name }}
    </td>
    <td class="created_by">Admin</td>
    <td class="created_by">{{ dateFormat($color->created_at) }}</td>
    <td class="status"><span class="badge badge-soft-warning text-uppercase">Pending</span>
    </td>
    <td class="text-end">
        <x.common-action-drop-down>
            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                <a href="apps-ecommerce-order-details.html" class="text-primary d-inline-block">
                    <i class="ri-eye-fill fs-16"></i>
                </a>
            </li>
            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                    <i class="ri-pencil-fill fs-16"></i>
                </a>
            </li>
            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                <a class="text-danger d-inline-block remove-item-btn cursor-pointer" data-bs-toggle="modal" href="#deleteOrder">
                    <i class="ri-delete-bin-5-fill fs-16"></i>
                </a>
            </li>
        </x.common-action-drop-down>
    </td>
</tr>
@empty
    
@endforelse
