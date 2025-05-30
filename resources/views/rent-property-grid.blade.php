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
            Property
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
                                    <a href="{{ route('room.location', ['location' => isset($data) && $data->city ? $data->city : 'no location']) }}" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="{{ get_image_path($data->image_path) }}"> 
                                    </a>
                                      @if ($data->is_new)
                                            <div class="featured">
                                                <span>New</span>
                                            </div>
                                    @endif
                                </div>
                                <div class="pro-content">
                                    {{-- @if(!$data->is_new)
                                     <div class="rating">
                                        @php
                                            $avgRating = $data->averageRating();
                                            $fullStars = floor($avgRating);
                                            $hasHalfStar = ($avgRating - $fullStars) >= 0.5;
                                        @endphp

                                        <span class="rating-count">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $fullStars)
                                                    <i class="fa-solid fa-star checked"></i>
                                                @elseif ($i == $fullStars + 1 && $hasHalfStar)
                                                    
                                                    <i class="fa-solid fa-star-half-stroke checked"></i>
                                                @else
                                                    <i class="fa-solid fa-star"></i>
                                                @endif
                                            @endfor
                                        </span>

                                        <span class="rating-review">
                                            {{ $avgRating > 4.5 ? 'Excellent' : ($avgRating > 3.5 ? 'Very Good' : ($avgRating > 2.5 ? 'Average' : 'Poor')) }}
                                            ({{ $avgRating }}/5)
                                        </span>
                                     </div>
                                     @else
                                       <div class="rating">
                                           <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">New Listing</span>

                                        </div>
                                     @endif --}}
                                    <h3 class="title">
                                        <a href="{{ route('room.location', ['location' => isset($data) && $data->city ? $data->city : 'no location']) }}">{{ $data->property_name }}</a>
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
                                            <a href="{{ route('room.location', ['location' => $data->city]) }}" class="btn-primary">View Rooms</a>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Rent grid -->
                    @endforeach
                   
                    <div class="d-flex justify-content-center mt-4">
                        {{ $properties->links() }}
                    </div>
                    
                </div> <!-- Close row here -->
            </div>       

        </div>
    </div>
@endsection
