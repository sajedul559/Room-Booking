@extends('layouts.layouts')
@section('title', 'Properties')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
                <div class="card" id="orderList">
                    <div class="card-header" >
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            
                            <div class="col-md-6" style="margin-left:-5px;">
                               
                                <select id="selected_property" class="form-control">
                                    <option value="all">All Properties</option>
                                    @foreach ($properties as $property)
                                        <option value="{{ $property->id }}" {{ request('property_id') == $property->id ? 'selected' : '' }}>
                                            {{ $property->property_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <a class="btn btn-success" href="{{ route('rooms.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New Room</a>
                        </div>
                    </div>
                <div class="card-body">
                    <table id="datatable-room" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="d-none">Property ID</th> <!-- Hidden column -->
                                <th>Property</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Weekly Rent</th>
                                <th>Available Date</th>
                                <th>Internet Available</th>
                                <th>Included Rent</th>
                                <th>Min Length Of Stay</th>
                                <th>Max Length Of Stay</th>
                                <th>Smoking Allowed</th>
                                <th>Pet Allowed</th>
                                <th>Welfare Allowed</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td class="d-none">{{ $data->property_id }}</td> <!-- Hidden data -->
                                <td>{{ $data->property ? $data->property->property_name : ' ' }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->weekly_rent }}</td>
                                <td>{{ $data->available_date }}</td>
                                <td>
                                    <span class="badge {{ $data->internet ? 'bg-success' : 'bg-danger' }}">
                                        {{ $data->internet ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <!-- Badge for Included Rent -->
                                <td>
                                    <span class="badge {{ $data->is_bill_included_rent ? 'bg-success' : 'bg-danger' }}">
                                        {{ $data->is_bill_included_rent ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                
                                <td>{{ $data->min_length_of_stay }}</td>
                                <td>{{ $data->max_length_of_stay }}</td>
                
                                <!-- Badge for Smoking Allowed -->
                                <td>
                                    <span class="badge {{ $data->is_smoking_allowed ? 'bg-success' : 'bg-danger' }}">
                                        {{ $data->is_smoking_allowed ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                
                                <!-- Badge for Pet Allowed -->
                                <td>
                                    <span class="badge {{ $data->is_pet_allowed ? 'bg-success' : 'bg-danger' }}">
                                        {{ $data->is_pet_allowed ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                
                                <!-- Badge for Welfare Allowed -->
                                <td>
                                    <span class="badge {{ $data->on_welfare_allowed ? 'bg-success' : 'bg-danger' }}">
                                        {{ $data->on_welfare_allowed ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                
                                <td class="text-start">
                                    <x-common.action-drop-down>
                                        <!-- show Button -->
                                        <a class="dropdown-item show-item-btn" href="{{ route('rooms.show', $data->id) }}">
                                            <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Show
                                        </a>
                                         <!-- Edit Button -->
                                        <a class="dropdown-item edit-item-btn" href="{{ route('rooms.edit', $data->id) }}">
                                            <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                        </a>
                                        <!-- Delete Button -->
                                        <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $data->id }}">
                                            <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                        </button>
                                    </x-common.action-drop-down>
                                    <form id="delete-form-{{ $data->id }}" action="{{ route('rooms.destroy', $data->id) }}" method="POST" style="display: none;">
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
    var table = $("#datatable-room").DataTable({
        lengthChange: !1,
        buttons: [
            { extend: "copy", className: "btn-light" },
            { extend: "print", className: "btn-light" },
            { extend: "pdf", className: "btn-light" },
            { extend: "excel", className: "btn-light" },
        ],
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });

    $('#selected_property').on('change', function () {
        let selectedProperty = $(this).val();

        if (selectedProperty === 'all') {
            table.column(1).search('').draw(); // Clear filter
        } else {
            let selectedPropertyName = $("#selected_property option:selected").val();
            table.column(1).search(selectedPropertyName).draw(); // Filter by property name column
        }
    });
</script>

@endpush
