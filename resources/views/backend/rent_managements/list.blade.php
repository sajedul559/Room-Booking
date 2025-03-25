@extends('layouts.layouts')
@section('title', 'Properties')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
                <div class="card" id="orderList">
                    <div class="card-header" >
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="header-title mb-0">Rent Management List</h4>
                            <a class="btn btn-success" href="{{ route('rent_managements.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New Rent Management</a>

                        </div>
                    </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vendor Name</th>
                                <th>Property</th>
                                <th>User</th>
                                <th>Room</th>
                                <th>Amount</th>
                                <th> Type</th>
                                <th> CollectionType</th>
                                <th> CollectedBy</th>
                                <th>Date</th>
                                <th>CreatedBy</th>
                                {{-- <th>UpdatedBy</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentManagements as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->vendor ? $data->vendor->user->name ?? 'No User Assigned' : 'No Vendor Assigned' }}</td>
                                    <td>{{ $data->property ? $data->property->property_name : 'No Vendor Assigned' }}</td>
                                    <td>{{ $data->user ? $data->user->name : 'No User Assigned' }}</td>
                                    <td>Will Add</td>
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
