@extends('layouts.layouts')
@section('title', 'Properties')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
                <div class="card" id="orderList">
                    <div class="card-header" >
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="header-title mb-0">Booking Lists</h4>
                            {{-- <a class="btn btn-success" href="{{ route('vendors.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New Vendor</a> --}}

                        </div>
                    </div>
                <div class="card-body">
                   
                    
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                       <thead>
                            <tr>
                                <th>User</th>
                                <th>Room</th>
                                <th>Property</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Status</th>
                                <th>Change Status</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->room->name ?? 'N/A' }}</td>
                                    <td>{{ $booking->room->property->property_name ?? 'N/A' }}</td>
                                    <td>{{ $booking->start_date }}</td>
                                    <td>{{ $booking->end_date }}</td>
                                    <td>
                                        @php
                                            $statusClass = match($booking->status) {
                                                'confirmed' => 'success',
                                                'cancelled' => 'danger',
                                                default => 'warning',
                                            };
                                        @endphp
                                        <span class="mt-2 badge bg-{{ $statusClass }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>                                    
                                    <td>
                                        <select class="form-select status-change" data-id="{{ $booking->id }}">
                                            <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
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
            let bookingId = $(this).data('id');
            let newStatus = $(this).val();

            $.ajax({
                url: "{{ route('booking.changeStatus') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    booking_id: bookingId,
                    status: newStatus
                },
                success: function (response) {
                    toastr.success(response.message);
                     // Find the parent <tr> of the select that triggered the change
                    let $row = $(`select[data-id="${bookingId}"]`).closest('tr');

                    // Determine the new badge class based on the selected status
                    let badgeClass = {
                        confirmed: 'success',
                        cancelled: 'danger',
                        pending: 'warning'
                    }[newStatus];

                    // Update the badge in the Status <td>
                    $row.find('td:eq(5)').html(`
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
