@extends('layout.mainlayout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-8">
            <h2 class="mb-4 text-center">My Booking List</h2>

            @if($bookings->count())
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Room</th>
                                <th>Booking Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $key => $booking)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $booking->room->name ?? 'N/A' }}</td>
                                    <td>{{ $booking->created_at->format('d M, Y') }}</td>
                                    <td>{{ ucfirst($booking->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $bookings->links() }}
                </div>
            @else
                <p class="text-muted text-center">No bookings found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
