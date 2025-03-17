<?php $page = 'rental-order'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Rental Booking
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Rental Booking
        @endslot
    @endcomponent
    <!-- Detail View Section -->
    <section class="content inner-content bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="success-div">
                        <span><i class="bx bx-check-circle me-1"></i>{{ $room->name }} is available for
                            rental</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="details-div">
                        <div class="details-div-content">
                            <h5>Details</h5>
                            <p>Modern Apartment in the city centre</p>
                            <h5>Location </h5>
                            <p class="mb-0">{{ $room->property?->location }}</p>
                        </div>
                        <div class="details-div-price">
                            <h5>Booking Amount</h5>
                            <h6>$300 <span>/ Day</span></h6>
                        </div>
                    </div>
                </div>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" name="amount" value="315"> <!-- Set dynamically -->
                    
                    <div class="col-lg-12">
                        <div class="details-time">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="arrival-div">
                                        <h5>Arrival Time</h5>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="arrival-div arrival-dept">
                                        <h5>Departure Time</h5>
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    {{-- <div class="col-lg-12">
                        <div class="booking-details-btn">
                            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                        </div>
                    </div> --}}
                    <div class="col-lg-12">
                        <div class="booking-details-price">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul>
                                        <li>
                                            <h5>Booking Price </h5>
                                            <h6>$300</h6>
                                        </li>
                                        <li>
                                            <h5>Service Charge</h5>
                                            <h6>$10</h6>
                                        </li>
                                        <li>
                                            <h5>Tax</h5>
                                            <h6>$5</h6>
                                        </li>
                                    </ul>
                                    <ul class="booking-details-total">
                                        <li>
                                            <h5>Grand Total</h5>
                                            <h6>$315</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="booking-details-btn">
                            {{-- <a href="javascript:void(0);" class="btn btn-lightred me-2">Previous</a> --}}
                            {{-- <a href="{{ url('rental-order-step1') }}" class="btn btn-primary">Go to Details</a> --}}
                            <button type="submit" class="btn btn-primary">Go to Details</button>

                        </div>
                    </div>
                </form>
                
               
            </div>
        </div>
    </section>
    <!-- /Detail View Section -->
@endsection
