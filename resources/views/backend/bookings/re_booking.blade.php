@extends('layouts.layouts')

@section('content')
    {{-- <x-common.bread-crum /> --}}

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-success ">
                    <h5 class="mb-0">Update Booking Dates</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('bookings.updateDates') }}" method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" readonly name="start_date" class="form-control" value="{{ $booking->start_date }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" value="{{ $booking->end_date }}" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Update Dates</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
