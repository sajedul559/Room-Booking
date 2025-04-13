<?php $page = 'room'; ?>
@extends('layout.mainlayout')
@section('content')
      <!-- Home Banner -->
      <section class="banner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pt-5">
                    <div class="banner-content" data-aos="fade-down">
                        <h1>Find Your Best Dream House for <span>Rental, Buy & Sell...</span></h1>
                        <p>Properties for buy / rent in your location. We have more than 3000+ listings for you to choose
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-search" data-aos="fade-down">
                        <div class="banner-tab">
                            <ul class="nav nav-tabs" id="bannerTab" role="tablist">
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="buy-property" data-bs-target="tab" href="#available-room"
                                        role="tab" aria-controls="available-room" aria-selected="true">
                                        <img src="{{ URL::asset('assets/frontend/img/icons/buy-icon.svg') }}" alt="icon"> Rent a Room
                                    </a>
                                </li> --}}
                                <div class="text-center pb-5">
                                    <a class="btn view-rooms-btn1" id="buy-property" href="#available-room"
                                       role="tab" aria-controls="available-room" aria-selected="true">
                                       VIEW AVAILABLE ROOMS
                                    </a>
                                </div>
                                
                               
                            </ul>
                        </div>
                        <div class="tab-content" id="bannerTabContent">
                            <div class="tab-pane fade show active" id="buy_property" role="tabpanel"
                                aria-labelledby="buy-property">
                                <div class="banner-tab-property">
                                    <form action="{{ route('rooms.search') }}" method="GET">

                                        <div class="banner-property-info">
                                            <div class="banner-property-grid">
                                                <input type="text" class="form-control" name="room_name" placeholder="Enter Keyword">
                                            </div>
                                    
                                            <div class="banner-property-grid">
                                                <input type="text" class="form-control" name="property_city" placeholder="Enter Address">
                                            </div>
                                    
                                            <div class="banner-property-grid">
                                                <input type="text" class="form-control" name="min_price" placeholder="Min Price">
                                            </div>
                                    
                                            <div class="banner-property-grid">
                                                <input type="text" class="form-control" name="max_price" placeholder="Max Price">
                                            </div>
                                    
                                            <div class="banner-property-grid">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class='feather-search'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="rent_property" role="tabpanel" aria-labelledby="rent-property">
                                <div class="banner-tab-property">
                                    <form action="#">
                                        <div class="banner-property-info">
                                            <div class="banner-property-grid">
                                                <input type="text" class="form-control" placeholder="Enter Keyword">
                                            </div>
                                            <div class="banner-property-grid">
                                                <select class="select">
                                                    <option value="0">Property Type</option>
                                                    <option value="1">Buy Property</option>
                                                    <option value="2">Rent Property</option>
                                                </select>
                                            </div>
                                            <div class="banner-property-grid">
                                                <input type="email" class="form-control" placeholder="Enter Address">
                                            </div>
                                            <div class="banner-property-grid">
                                                <input type="text" class="form-control" placeholder="Min Price">
                                            </div>
                                            <div class="banner-property-grid">
                                                <input type="text" class="form-control" placeholder="Max Price">
                                            </div>
                                            <div class="banner-property-grid">
                                                <a href="{{ url('rent-property-grid') }}" class="btn-primary"><span><i
                                                            class='feather-search'></i></span></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Home Banner -->
     <!-- How It Work -->
     <section class="howit-work pt-5 pb-4">
        <div class="container">
            {{-- <div class="se  text-center">
                <h2 class="text-white">How It Works</h2>
                <div  class="sec-line">
                    <span  class="sec-line1-work"></span>
                    <span  class="sec-line2-work"></span>
                </div>
                <p style="color:white">Follow these 3 steps to book your place</p>
            </div> --}}
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
                        <div class="work-card-icon">
                            <span>
                                <img src="{{ URL::asset('assets/frontend/img/icons/work-icon-1.svg') }}" alt="icon">
                            </span>
                        </div>
                        <h4>Search for Location</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">
                        <div class="work-card-icon">
                            <span>
                                <img src="{{ URL::asset('assets/frontend/img/icons/work-icon-2.svg') }}" alt="icon">
                            </span>
                        </div>
                        <h4>Select Property Type</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                        <div class="work-card-icon">
                            <span>
                                <img src="{{ URL::asset('assets/frontend/img/icons/work-icon-3.svg') }}" alt="icon">
                            </span>
                        </div>
                        <h4>Book Your Property</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                        <div class="work-card-icon">
                            <span>
                                <img src="{{ URL::asset('assets/frontend/img/icons/work-icon-3.svg') }}" alt="icon">
                            </span>
                        </div>
                        <h4>Rental Validation</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /How It Work -->
     <!-- Feature Property For Rent -->
    <section id="available-room">
        <div class="listing-section tab-content">
            <div class="container tab-pane fade show active listing-section" >
                <div class="section-heading text-center pt-2">
                    <h2><span style="color: #DA1F43">Available</span> Rooms</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    {{-- <p>Hand-picked selection of quality places</p> --}}
                </div>
    
                <div class="feature-property-sec for-rent for-rent p-0 bg-transparent">
                    <div class="row">
                        @forelse($rooms as $room)
                        <div class=" col-lg-6 col-md-6 mb-4">
                                <div class="product-custom">
                                    <div class="profile-widget">
                                        <div class="doc-img">
                                            <!-- Slider -->
                                            <div class="buy-details-col">
                                                <div class="rental-card">
                                                    <div class="slider rental-slider">
                                                        @foreach($room->images as $image)
                                                            <div class="product-img">
                                                                <img  src="{{ get_image_path($image->image_path) }}" alt="Room Image">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    
                                                    <div class="slider slider-nav-thumbnails d-none">
                                                        @foreach($room->images as $image)
                                                            <div>
                                                                <img src="{{ get_image_path($image->image_path) }}" alt="Thumbnail">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Slider -->
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
                                                <a href="{{ route('room.details',$room->slug)}}">{{ $room->name ?? 'Room Title' }}</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i> {{ $room->property->location ?? 'No address' }}</p>
                                            <div class="decription">
                                                <p>{!! $room->description !!}</p>
                                                {{-- <p class="description-p">
                                                    <b> {{ $room->description ?? 'N/A' }}</b>
                                                </p> --}}
                                            </div>
                                            <ul class="property-category d-flex justify-content-between align-items-center">
                                                <li>
                                                    <a href="{{ route('room.details',$room->slug)}}" class="btn-primary">View Rooms</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center my-5">
                                <h4 class="text-danger">We couldn't find any rooms matching your search criteria.</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- /Feature Property For Rent -->


  

@endsection
