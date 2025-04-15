<?php $page = 'rental-order-step2'; ?>
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
                        <span><i class="bx bx-check-circle me-1"></i>{{ $booking?->room?->name }}</span>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                    <div class="details-div">
                        <div class="details-div-content">
                            <h5>Details</h5>
                            <p>{{ $booking?->room?->description }}</p>
                            <h5>Location </h5>
                            <p class="mb-0">{{ $bookingInformation->address }}</p>
                        </div>
                        <div class="details-div-price">
                            <h5>Booking Amount</h5>
                            <h6>$300 <span>/ Day</span></h6>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="booking-details">
                        <h4>Property Booking Details</h4>
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
                <div class="col-lg-12">
                    <div class="booking-details">
                        <h4>Information</h4>
                        <ul class="information-details">
                            <li>
                                <h5>Name</h5>
                                <p>{{ $bookingInformation->name }}</p>
                            </li>
                            <li>
                                <h5>Email</h5>
                                <p>{{ $bookingInformation->email }}</p>
                            </li>
                            <li>
                                <h5>Phone Number </h5>
                                <p>{{ $bookingInformation->phone }}</p>
                            </li>
                        </ul>
                        <ul class="information-details">
                            <li>
                                <h5>Address</h5>
                                <p>{{ $bookingInformation->address }}</p>
                            </li>
                        </ul>
                        <ul class="information-details mb-0">
                            <li class="me-0">
                                <h5>Comments</h5>
                                <p>{{ $bookingInformation->comments }}</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="booking-details-btn">
                        <a href="{{ route('user.bookingList') }}" class="btn btn-lightred me-2">Booking Lists</a>
                        <a href="{{ route('checkout')}}" class="btn btn-primary">Go to Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Detail View Section -->
@endsection
