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
            
                    @foreach ($properties as $data)
                    <!-- Rent grid -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{ url('rent-details') }}" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="{{ get_image_path($data->image_path) }}"> 
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
                                        <a href="{{ route('room.details',$data->slug)}}">{{ $data->property_name }}</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 
                                        {{ isset($data->location) ? $data->location : 'Location not available' }}
                                    </p>
            
                                    {{-- <ul class="d-flex details">
                                        <li>
                                            <img src="{{ URL::asset('assets/frontend/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                            Min Stay: {{ $data->min_length_of_stay }} 
                                        </li>
                                        <li>
                                            <img src="{{ URL::asset('assets/frontend/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                            Max Stay:  {{ $data->max_length_of_stay }} 
                                        </li>
                                    </ul> --}}
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li>
                                            <a href="{{ route('room.details',$data->slug)}}" class="btn-primary">View Rooms</a>
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
