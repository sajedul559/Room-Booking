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
                                <th>Status</th>
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
                                <td>{{ ucfirst($vendor->status) }}</td>
                                {{-- <td>
                                    <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> --}}
                                <td class="text-start">
                                    <x-common.action-drop-down>
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
  

</script>

<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>

@endpush
