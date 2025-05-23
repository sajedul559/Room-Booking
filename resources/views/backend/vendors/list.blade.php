@extends('layouts.layouts')
@section('title', 'Properties')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
                <div class="card" id="orderList">
                    <div class="card-header" >
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="header-title mb-0">Property List</h4>
                            <a class="btn btn-success" href="{{ route('vendors.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New Vendor</a>

                        </div>
                    </div>
                <div class="card-body">
                   
                    
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Verification Id</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendors as $vendor)
                            <tr>
                                <td>{{ $vendor->id }}</td>
                                <td>{{ $vendor->user->name }}</td>
                                <td>{{ $vendor->address }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td>{{ $vendor->phone }}</td>
                                <td>
                                    @if(isset($vendor) && $vendor->id_verification)
                                        <a href="{{ asset('storage/'.$vendor->id_verification) }}" target="_blank">
                                            <img id="preview" 
                                                  src="{{ get_image_path($vendor->id_verification) }}"
                                                 alt="ID Verification" 
                                                 style="max-width: 50px;">
                                        </a>
                                    @else
                                        <img id="preview" 
                                             src="" 
                                             alt="ID Verification" 
                                             style="max-width: 50px; display: none;">
                                    @endif
                                </td>
                                 <td>
                                        @php
                                            $statusClass = match($vendor->status) {
                                                'approve' => 'success',
                                                'rejected' => 'danger',
                                                default => 'warning',
                                            };
                                        @endphp
                                        <span class="mt-2 badge bg-{{ $statusClass }}">
                                            {{ ucfirst($vendor->status) }}
                                        </span>
                                </td>  
                                <td>
                                    <select class="form-select status-change" data-id="{{ $vendor->id }}">
                                        <option value="pending" {{ $vendor->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approve" {{ $vendor->status === 'approve' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $vendor->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </td>
                              
                                <td class="text-start">
                                    <x-common.action-drop-down>
                                        <!-- Show Button -->
                                        <a class="dropdown-item show-item-btn" href="{{ route('vendors.show', $vendor->id) }}">
                                            <i class="mdi mdi-eye me-2 text-muted vertical-middle"></i>Show
                                        </a>
                                        <!-- Edit Button -->
                                        <a class="dropdown-item edit-item-btn" href="{{ route('vendors.edit', $vendor->id) }}">
                                            <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                        </a>
                                        <!-- Delete Button -->
                                        <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $vendor->id }}">
                                            <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                        </button>
                                    </x-common.action-drop-down>
                                    <form id="delete-form-{{ $vendor->id }}" action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')

<style>
    .dt-buttons{
        display:none;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
      $('.status-change').change(function () {
    let vendorId = $(this).data('id');
    let newStatus = $(this).val();

    $.ajax({
        url: "{{ route('vendor.changeStatus') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            vendor_id: vendorId,
            status: newStatus
        },
        success: function (response) {
            toastr.success(response.message);

            let $row = $(`select[data-id="${vendorId}"]`).closest('tr');

            let badgeClass = {
                approve: 'success',
                rejected: 'danger',
                pending: 'warning'
            }[newStatus];

            $row.find('td:eq(6)').html(`
                <span class="badge bg-${badgeClass}">
                    ${newStatus.charAt(0).toUpperCase() + newStatus.slice(1)}
                </span>
            `);
        },
        error: function (xhr) {
            toastr.error('Status update failed.');
        }
    });
});

    });
</script>


@endpush
