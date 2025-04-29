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
                    <form id="filterForm" class="row mb-3">
                        <div class="col-md-3">
                            <label for="year" class="form-label">Filter by Year</label>
                            <select name="year" id="year" class="form-select">
                                <option value="">All Years</option>
                                @foreach (range(date('Y'), 2020) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="col-md-3">
                            <label for="month" class="form-label">Filter by Month</label>
                            <select name="month" id="month" class="form-select">
                                <option value="">All Months</option>
                                @foreach (range(1, 12) as $m)
                                    <option value="{{ $m }}">{{ \Carbon\Carbon::create()->month($m)->format('F') }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="col-md-3 align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <button type="button" id="clearFilterBtn" class="btn btn-secondary">Clear</button>
                        </div>
                    </form>
                    
                    
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Property</th>
                                <th>Type</th>
                                <th>Is Creadit</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="expenseTableBody">
                            @foreach ($expenses as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->vendor ? $data->vendor->user->name ?? 'No User Assigned' : 'No Vendor Assigned' }}</td>
                                    <td>{{ $data->property ? $data->property->property_name : 'No Vendor Assigned' }}</td>
                                    <td>{{ $data->expense_type }}</td>
                                    <td>{{ $data->is_credit ? 'Yes' : 'No' }}</td>
                                    <td>{{ $data->createdBy?->name?:'' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}</td>

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
<script>
    $(document).ready(function () {
        $('#filterForm').on('submit', function (e) {
            e.preventDefault();

            let year = $('#year').val();
            let month = $('#month').val();

            $.ajax({
                url: "{{ route('data.filter') }}",
                method: "GET",
                data: {
                    year: year,
                    month: month
                },
                success: function (response) {
                    $('#expenseTableBody').html(response.html);
                },
                error: function (xhr) {
                    alert('Something went wrong while fetching data.');
                }
            });
        });
        //Clear filter
        $('#clearFilterBtn').on('click', function() {
            $('#year').val('');
            $('#month').val('');
            $('#filterForm').submit(); 
        });
    });
</script>
@endpush
