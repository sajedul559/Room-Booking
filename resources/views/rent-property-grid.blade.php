<?php $page = 'rent-property-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            All 
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Rooms
        @endslot
    @endcomponent

    <!-- Feature Property For Rent -->
    <div class="listing-section">
        <div class="container">

            {{-- @component('components.rent-sortresult')
            @endcomponent --}}
            <div class="feature-property-sec for-rent for-rent p-0 bg-transparent">
                <div class="row pt-5"> <!-- Keep row outside the loop -->
            
                    @foreach ($rooms as $room)
                    <!-- Rent grid -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{ url('rent-details') }}" class="property-img">
                                        <img class="img-fluid" alt="Property Image"
                                            src="{{ $room->images->isNotEmpty() ? asset('storage/' . $room->room_image) : URL::asset('assets/frontend/img/product/default.jpg') }}">
                                    </a>
                                    <div class="featured">
                                        <span>Featured</span>
                                    </div>
                                    <div class="new-featured">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="pro-content">
                                    <div class="rating">
                                        <span class="rating-count">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ route('room.details',$room->slug)}}">{{ $room->name }}</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 
                                        {{ isset($room->property->location) ? $room->property->location : 'Location not available' }}
                                    </p>
            
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="{{ URL::asset('assets/frontend/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                            Min Stay: {{ $room->min_length_of_stay }} 
                                        </li>
                                        <li>
                                            <img src="{{ URL::asset('assets/frontend/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                            Max Stay:  {{ $room->max_length_of_stay }} 
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li>
                                            <a href="{{ route('room.details',$room->slug)}}" class="btn-primary">View Rooms</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Rent grid -->
                    @endforeach
            
                </div> <!-- Close row here -->
            </div>
            

        </div>
    </div>
    <!-- /Feature Property For Rent -->
@endsection
