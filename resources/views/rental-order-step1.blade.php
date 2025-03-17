<?php $page = 'rental-order-step1'; ?>
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
                        <span><i class="bx bx-check-circle me-1"></i> {{ $room->name }} is available for
                            rental</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="details-div">
                        <div class="details-div-content">
                            {{-- <h5>Details</h5>
                            <p>Modern Apartment in the city centre</p> --}}
                            <h5>Location </h5>
                            <p class="mb-0">{{ $room->property?->location }}</p>
                        </div>
                        <div class="details-div-price">
                            <h5>Booking Amount</h5>
                            <h6>${{ $room->price }} <span>/ Day</span></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="booking-details">
                        <h4> Booking Details</h4>
                        <ul>
                            <li>
                                <h5>Arrival Time</h5>
                                <p>{{ $booking->start_date }}</p>
                            </li>
                            <li>
                                <h5>Departure Time</h5>
                                <p>{{ $booking->end_date }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                    <div class="booking-details">
                        <h4>Booking Details</h4>
                        <ul>
                            <li>
                                <h5>Arrival Time</h5>
                                <p>318-330 S Oakley Blvd, Chicago, IL 60612, USA</p>
                            </li>
                            <li>
                                <h5>Departure Time</h5>
                                <p>318-330 S Oakley Blvd, Chicago, IL 60612, USA</p>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="booking-details mb-0">
                        <h4>Fill out this quick form</h4>
                        <div class="row">
                            <form action="{{ route('booking.information.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            
                                <label>Name<span class="manitory">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                            
                                <label>Phone Number <span class="manitory">*</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                            
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Email">
                            
                                <label>Full Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address">
                            
                                <label>Special Requests / Questions / Comments</label>
                                <textarea rows="5" class="form-control" name="comments" placeholder="Enter Comments"></textarea>
                            
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                            
                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="booking-details-btn">
                        <a href="{{ url('rental-order-step1') }}" class="btn btn-lightred me-2">Back to Booking Details</a>
                        <a href="{{ url('rental-order-step2') }}" class="btn btn-primary">Go to Order Confirmation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Detail View Section -->
@endsection
