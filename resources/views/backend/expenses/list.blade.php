@extends('layouts.layouts')
@section('title', 'Properties')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
                <div class="card" id="orderList">
                    <div class="card-header" >
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="header-title mb-0">Expense List</h4>
                            <a class="btn btn-success" href="{{ route('expenses.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New Expense</a>

                        </div>
                    </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Property</th>
                                <th>Type</th>
                                <th>Is Creadit</th>
                                <th>Created By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->vendor ? $data->vendor->user->name ?? 'No User Assigned' : 'No Vendor Assigned' }}</td>
                                    <td>{{ $data->property ? $data->property->property_name : 'No Vendor Assigned' }}</td>
                                    <td>{{ $data->expense_type }}</td>
                                    <td>{{ $data->is_credit ? 'Yes' : 'No' }}</td>
                                    <td>{{ $data->createdBy?->name?:'' }}</td>

                                    <td class="text-start">
                                        <x-common.action-drop-down>
                                            <!-- Edit Button -->
                                            <a class="dropdown-item edit-item-btn" href="{{ route('expenses.edit', $data->id) }}">
                                                <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                            </a>
                                            <!-- View Details Button -->
                                            @if ($data->created_by)
                                                <a class="dropdown-item" href="{{ route('expense.details', $data->created_by) }}">
                                                    <i class="mdi mdi-eye me-2 text-muted vertical-middle"></i>View Details
                                                </a>
                                            @else
                                                <span class="dropdown-item text-muted">
                                                    <i class="mdi mdi-eye-off me-2 text-muted vertical-middle"></i>No Details
                                                </span>
                                            @endif
                                        
                                                                                        <!-- Delete Button -->
                                            <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $data->id }}">
                                                <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                            </button>
                                        </x-common.action-drop-down>
                                        <form id="delete-form-{{ $data->id }}" action="{{ route('expenses.destroy', $data->id) }}" method="POST" style="display: none;">
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
@endpush
