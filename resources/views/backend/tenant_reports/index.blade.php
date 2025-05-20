@extends('layouts.layouts')
@section('title', 'Tenant Report')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
                <div class="card" id="orderList">
                    <div class="card-header" >
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="header-title mb-0">Tenant Report List</h4>
                            {{-- <a class="btn btn-success" href="{{ route('rooms.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New Room</a> --}}

                        </div>
                    </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Property </th>
                                <th>Report</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $data)
                                <tr>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>{{ $data->property->property_name }}</td>
                                    <td>{{ $data->report_details }}</td>
                                   
                    
                                    <td class="text-start">
                                        <x-common.action-drop-down>
                                            <!-- Edit Button -->
                                            {{-- <a class="dropdown-item edit-item-btn" href="{{ route('contacts.edit', $data->id) }}">
                                                <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                            </a> --}}
                                            <!-- Delete Button -->
                                            <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $data->id }}">
                                                <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                            </button>
                                        </x-common.action-drop-down>
                                        <form id="delete-form-{{ $data->id }}" action="{{ route('tenant-reports.destroy', $data->id) }}" method="POST" style="display: none;">
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
