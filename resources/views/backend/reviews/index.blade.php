@extends('layouts.layouts')
@section('title', 'Reviews')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
                <div class="card" id="orderList">
                    <div class="card-header" >
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="header-title mb-0">Review List</h4>
                            {{-- <a class="btn btn-success" href="{{ route('rooms.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New Room</a> --}}

                        </div>
                    </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                {{-- <th>comment</th> --}}
                                <th>Star</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    {{-- <td>{{ $data->comment }}</td> --}}
                                    <td>{{ $data->star }}</td>
                                   <td>
                                        @php
                                            $statusClass = match($data->status) {
                                                'confirmed' => 'success',
                                                'rejected' => 'danger',
                                                default => 'warning',
                                            };
                                        @endphp
                                        <span class="mt-2 badge bg-{{ $statusClass }}">
                                            {{ ucfirst($data->status) }}
                                        </span>
                                    </td>                                    
                                    <td>
                                        <select class="form-select status-change" data-id="{{ $data->id }}">
                                            <option value="pending" {{ $data->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $data->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="rejected" {{ $data->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </td>
                                   
                    
                                  <td class="text-start">
                                        <x-common.action-drop-down>
                                            <!-- Edit Button -->
                                            <a class="dropdown-item edit-item-btn" href="{{ route('reviews.show', $data->id) }}">
                                                <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Show
                                            </a>
                                            <!-- Delete Button -->
                                            <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $data->id }}">
                                                <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                            </button>
                                        </x-common.action-drop-down>
                                        <form id="delete-form-{{ $data->id }}" action="{{ route('reviews.destroy', $data->id) }}" method="POST" style="display: none;">
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
            let reviewId = $(this).data('id');
            let newStatus = $(this).val();

            $.ajax({
                url: "{{ route('review.changeStatus') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    review_id: reviewId,
                    status: newStatus
                },
                success: function (response) {
                    toastr.success(response.message);

                    let $row = $(`select[data-id="${reviewId}"]`).closest('tr');

                    let badgeClass = {
                        confirmed: 'success',
                        rejected: 'danger',
                        pending: 'warning'
                    }[newStatus];

                    $row.find('td:eq(4) span')
                        .removeClass()
                        .addClass(`mt-2 badge bg-${badgeClass}`)
                        .text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));
                },

                error: function (xhr) {
                    toastr.error('Status update failed.');
                }
            });
        });
    });
</script>

@endpush
