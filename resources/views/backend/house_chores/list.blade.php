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
                            <a class="btn btn-success" href="{{ route('house_chores.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New House Chore</a>

                        </div>
                    </div>
                <div class="card-body">
                   
                    
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Property</th>
                                <th>Date</th>
                                <th>Expected Complete Date</th>
                                <th>Task Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chores as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->vendor ? $data->vendor->user->name ?? 'No User Assigned' : 'No Vendor Assigned' }}</td>
                                <td>{{ $data->property ? $data->property->property_name : 'No Vendor Assigned' }}</td>

                                <td>{{ $data->date }}</td>
                                <td>{{ $data->expected_date_to_complete }}</td>
                                <td>{{ $data->task_type }}</td>
                                @php
                                $badgeColors = [
                                    'complete' => 'bg-success',     // Green
                                    'cancel' => 'bg-danger',        // Red
                                    'in-progress' => 'bg-warning',  // Yellow
                                    'pending' => 'orange-badge',    // Custom class for orange
                                ];
                                
                                $statusKey = strtolower($data->status);
                                $badgeClass = $badgeColors[$statusKey] ?? 'bg-secondary';  // Default to secondary if no match
                                @endphp
                                <td>
                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                
                                                    
                                <td class="text-start">
                                    <x-common.action-drop-down>
                                        <!-- Edit Button -->
                                        <a class="dropdown-item edit-item-btn" href="{{ route('house_chores.edit', $data->id) }}">
                                            <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                        </a>
                                        <!-- Delete Button -->
                                        <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $data->id }}">
                                            <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                        </button>
                                    </x-common.action-drop-down>
                                    <form id="delete-form-{{ $data->id }}" action="{{ route('house_chores.destroy', $data->id) }}" method="POST" style="display: none;">
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
    .badge.orange-badge {
        background-color: orange;
        color: white;
    }

    /* Bootstrap already provides bg-success, bg-danger, bg-warning, so you don't need these */
    .badge.bg-success {
        background-color: rgb(34, 169, 10) !important;
        color: white !important;
    }

    .badge.bg-danger {
        background-color: #dc3545; /* Red */
    }

    .badge.bg-warning {
        background-color: rgb(255, 193, 7); /* Yellow */
    }
</style>


@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
