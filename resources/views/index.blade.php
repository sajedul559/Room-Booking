<?php $page = 'index'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Home Banner -->
    <section class="banner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
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
                                    <a class="nav-link active" id="buy-property" data-bs-toggle="tab" href="#buy_property"
                                        role="tab" aria-controls="buy_property" aria-selected="true">
                                        VIEW AVAILABLE ROOMS
                                    </a>
                                </li> --}}
                                <div class="text-center">
                                    <a class="btn view-rooms-btn1" id="buy-property" href="#available-room"
                                       role="tab" aria-controls="available-room" aria-selected="true">
                                       VIEW AVAILABLE ROOMS
                                    </a>
                                </div>
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="rent-property" data-bs-toggle="tab" href="#rent_property"
                                        role="tab" aria-controls="rent_property" aria-selected="false">
                                        <img src="{{ URL::asset('assets/frontend/img/icons/rent-icon.svg') }}" alt="icon"> Rent
                                        a Property
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="tab-content" id="bannerTabContent">
                            <div class="tab-pane fade show active" id="buy_property" role="tabpanel"
                                aria-labelledby="buy-property">
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
                                                <a href="{{ url('buy-property-grid') }}" class="btn-primary"><span><i
                                                            class='feather-search'></i></span></a>
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
    <section class="howit-work pt-5">
        <div class="container">
            <div class="section-heading text-center">
                <h2 style="color: white">How It Works</h2>
                <div class="sec-line">
                    <span class="sec-line1-work"></span>
                    <span class="sec-line2-work"></span>
                </div>
                <p style="color:white">Follow these 3 steps to book your place</p>
            </div>
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
                        <h4>Rental Validation</h4>
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
                        <h4>03. Book Your Property</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /How It Work -->
    <!-- Property Type -->
    <section class="property-type-sec">
        <div class="section-shape-imgs">
            <img src="{{ URL::asset('assets/frontend/img/shapes/property-sec-bg-1.png') }}" class="rectangle-left"
                alt="icon">
            <img src="{{ URL::asset('assets/frontend/img/shapes/property-sec-bg-2.png') }}" class="rectangle-right"
                alt="icon">
            <img src="{{ URL::asset('assets/frontend/img/icons/red-circle.svg') }}" class="bg-09" alt="Image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="section-heading" data-aos="fade-down" data-aos-duration="1000">
                        <h2>Explore by Property Type</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed </p>
                    </div>
                    <div class="owl-navigation">
                        <div class="owl-nav mynav1 nav-control"></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="property-type-slider owl-carousel">
                        <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                            <div class="property-img">
                                <img src="{{ URL::asset('assets/frontend/img/icons/property-icon-1.svg') }}" alt="icon">
                            </div>
                            <div class="property-name">
                                <h4>Houses</h4>
                                <p>30 Properties</p>
                            </div>
                        </div>
                        {{-- <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                            <div class="property-img">
                                <img src="{{ URL::asset('assets/frontend/img/icons/property-icon-2.svg') }}" alt="icon">
                            </div>
                            <div class="property-name">
                                <h4>Offices</h4>
                                <p>25 Properties</p>
                            </div>
                        </div> --}}
                        <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                            <div class="property-img">
                                <img src="{{ URL::asset('assets/frontend/img/icons/property-icon-3.svg') }}" alt="icon">
                            </div>
                            <div class="property-name">
                                <h4>Villas</h4>
                                <p>40 Properties</p>
                            </div>
                        </div>
                        <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                            <div class="property-img">
                                <img src="{{ URL::asset('assets/frontend/img/icons/property-icon-4.svg') }}" alt="icon">
                            </div>
                            <div class="property-name">
                                <h4>Apartment</h4>
                                <p>35 Properties</p>
                            </div>
                        </div>
                        <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                            <div class="property-img">
                                <img src="{{ URL::asset('assets/frontend/img/icons/property-icon-3.svg') }}" alt="icon">
                            </div>
                            <div class="property-name">
                                <h4>Villas</h4>
                                <p>40 Properties</p>
                            </div>
                        </div>
                        <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                            <div class="property-img">
                                <img src="{{ URL::asset('assets/frontend/img/icons/property-icon-1.svg') }}" alt="icon">
                            </div>
                            <div class="property-name">
                                <h4>Houses</h4>
                                <p>30 Properties</p>
                            </div>
                        </div>
                        <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                            <div class="property-img">
                                <img src="{{ URL::asset('assets/frontend/img/icons/property-icon-4.svg') }}" alt="icon">
                            </div>
                            <div class="property-name">
                                <h4>Apartment</h4>
                                <p>35 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Property Type -->


    <!-- Feature Property For Rent -->
    <section class="feature-property-sec for-rent" id="available-room">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Featured Properties for Rent</h2>
                <div class="sec-line">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
                <p>Hand-picked selection of quality places</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if ($properties->count() > 0)
                        <div class="feature-slider owl-carousel">
                            @foreach ($properties as $data)
                                <div class="slider-col">
                                    <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                                        <div class="profile-widget">
                                            <div class="doc-img">
                                                <a href="{{ url('rent-details') }}" class="property-img">
                                                    <img class="img-fluid" alt="Property Image"
                                                    src="{{ get_image_path($data->image_path) }}">
                                                   
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
                                                <p><i class="feather-map-pin"></i> {{ isset($data->location) ? $data->location : 'Location not available' }}</p>

                                                {{-- <ul class="d-flex details">
                                                    <li>
                                                        <img src="{{ URL::asset('assets/frontend/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                                        Min Stay: {{ $data->min_length_of_stay }} 
                                                    </li>
                                                    <li>
                                                        <img src="{{ URL::asset('assets/frontend/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                                        Max Stay:  {{ $data->max_length_of_stay }} 
                                                    
                                                </ul> --}}
                                                <ul class="property-category d-flex justify-content-between align-items-center">
                                                    <li>
                                                        <a href="{{ route('rooms.location', ['location' => $data->city]) }}" class="btn-primary">View Rooms</a>
                                                        
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h4>Item Not Available</h4>
                    @endif
                
                    <div class="view-property-btn d-flex justify-content-center" data-aos="fade-down" data-aos-duration="2000">
                        <a href="{{ route('all.property')}}" class="btn-primary">View All Properties</a>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="bg-imgs">
            <img src="{{ URL::asset('assets/frontend/img/bg/price-bg.png') }}" class="bg-04" alt="Image">
        </div>
    </section>
    
    <!-- /Feature Property For Rent -->


    <!-- Testimonial -->
    <section class="testimonial-sec py-5">
        <div class="container">
            <div class="section-heading">
                <h2>Testimonials</h2>
                <div class="sec-line">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
                <p>What our happy client says</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider owl-carousel">
                        <div class="testimonial-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="user-icon">
                                <a href="javascript:void(0);"><img
                                        src="{{ URL::asset('assets/frontend/img/profiles/user1.jpg') }}"
                                        alt="User"></a>
                            </div>
                            <p>Omnis velit quia. Perspiciatis et cupiditate. Voluptatum beatae asperiores dolor magnam fuga.
                                Sed fuga est harum quo nesciunt sint. Optio veniam...Omnis velit quia. Perspiciatis et
                                cupiditate. Voluptatum beatae asperiores dolor magnam fuga. Sed fuga est harum quo nesciunt
                                sint. Optio veniam...</p>
                            <h4><a href="javascript:void(0);">Horace Cole</a></h4>
                            <div class="rating">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                            </div>
                        </div>
                        <div class="testimonial-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="user-icon">
                                <a href="javascript:void(0);"><img
                                        src="{{ URL::asset('assets/frontend/img/profiles/user2.jpg') }}"
                                        alt="User"></a>
                            </div>
                            <p>Omnis velit quia. Perspiciatis et cupiditate. Voluptatum beatae asperiores dolor magnam fuga.
                                Sed fuga est harum quo nesciunt sint. Optio veniam...Omnis velit quia. Perspiciatis et
                                cupiditate. Voluptatum beatae asperiores dolor magnam fuga. Sed fuga est harum quo nesciunt
                                sint. Optio veniam...</p>
                            <h4><a href="javascript:void(0);">Karen Maria</a></h4>
                            <div class="rating">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                            </div>
                        </div>
                        <div class="testimonial-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="user-icon">
                                <a href="javascript:void(0);"><img
                                        src="{{ URL::asset('assets/frontend/img/profiles/user3.jpg') }}"
                                        alt="User"></a>
                            </div>
                            <p>Omnis velit quia. Perspiciatis et cupiditate. Voluptatum beatae asperiores dolor magnam fuga.
                                Sed fuga est harum quo nesciunt sint. Optio veniam...Omnis velit quia. Perspiciatis et
                                cupiditate. Voluptatum beatae asperiores dolor magnam fuga. Sed fuga est harum quo nesciunt
                                sint. Optio veniam...</p>
                            <h4><a href="javascript:void(0);">Jack Nitzsche</a></h4>
                            <div class="rating">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                            </div>
                        </div>
                        <div class="testimonial-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="user-icon">
                                <a href="javascript:void(0);"><img
                                        src="{{ URL::asset('assets/frontend/img/profiles/user2.jpg') }}"
                                        alt="User"></a>
                            </div>
                            <p>Omnis velit quia. Perspiciatis et cupiditate. Voluptatum beatae asperiores dolor magnam fuga.
                                Sed fuga est harum quo nesciunt sint. Optio veniam...Omnis velit quia. Perspiciatis et
                                cupiditate. Voluptatum beatae asperiores dolor magnam fuga. Sed fuga est harum quo nesciunt
                                sint. Optio veniam...</p>
                            <h4><a href="javascript:void(0);">Sofia Retz</a></h4>
                            <div class="rating">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                            </div>
                        </div>
                        <div class="testimonial-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="user-icon">
                                <a href="javascript:void(0);"><img
                                        src="{{ URL::asset('assets/frontend/img/profiles/user1.jpg') }}"
                                        alt="User"></a>
                            </div>
                            <p>Omnis velit quia. Perspiciatis et cupiditate. Voluptatum beatae asperiores dolor magnam fuga.
                                Sed fuga est harum quo nesciunt sint. Optio veniam...Omnis velit quia. Perspiciatis et
                                cupiditate. Voluptatum beatae asperiores dolor magnam fuga. Sed fuga est harum quo nesciunt
                                sint. Optio veniam...</p>
                            <h4><a href="javascript:void(0);">John Doe</a></h4>
                            <div class="rating">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Testimonial -->

    <!-- Pricing -->
     <!-- Note remove this section for unwanted error handle -->
    <section class="price-section d-none">
        <div class="container">        
          <div class="tab-content" id="pills-tabContent">

                <!-- Monthly Price -->
                <div  id="monthly-price">
                    <div class="row justify-content-center">

                        <!-- Price Item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="price-card aos" >
                               
                            </div>
                        </div>
                        <!-- /Price Item -->
                    </div>
                </div>             
            </div>
        </div>
       
    </section>
    <!-- /Pricing -->

    <!-- Faq -->
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="faq-img">
                        <img src="{{ URL::asset('assets/frontend/img/faq-img.jpg') }}" alt="icon">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="section-heading" data-aos="fade-down" data-aos-duration="2000">
                        <h2>Frequently Asked Questions</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                            magni dolores eos qui ratione voluptatem sequi nesciunt</p>
                    </div>
                    <div class="faq-card" data-aos="fade-down" data-aos-duration="2000">
                        <h4 class="faq-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#faqone" aria-expanded="false">1.
                                What are the costs to buy a house?</a>
                        </h4>
                        <div id="faqone" class="card-collapse collapse">
                            <div class="faq-info">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card" data-aos="fade-down" data-aos-duration="2000">
                        <h4 class="faq-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#faqtwo" aria-expanded="false">2.
                                What are the steps to sell a house?</a>
                        </h4>
                        <div id="faqtwo" class="card-collapse collapse">
                            <div class="faq-info">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card" data-aos="fade-down" data-aos-duration="2000">
                        <h4 class="faq-title">
                            <a class="" data-bs-toggle="collapse" href="#faqthree" aria-expanded="false">3. Do
                                you have loan consultants?</a>
                        </h4>
                        <div id="faqthree" class="card-collapse collapse show">
                            <div class="faq-info">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card" data-aos="fade-down" data-aos-duration="2000">
                        <h4 class="faq-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#faqfour" aria-expanded="false">4.
                                When will the project be completed?</a>
                        </h4>
                        <div id="faqfour" class="card-collapse collapse">
                            <div class="faq-info">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card" data-aos="fade-down" data-aos-duration="2000">
                        <h4 class="faq-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#faqfive"
                                aria-expanded="false">5.What are the steps to rent a house?</a>
                        </h4>
                        <div id="faqfive" class="card-collapse collapse">
                            <div class="faq-info">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Faq -->

    <!-- Agent Register -->
    <section class="agent-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="section-heading" data-aos="fade-down" data-aos-duration="2000">
                        <h2>Become a Real Estate Agent</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                            magni dolores eos qui ratione voluptatem sequi nesciunt</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="register-btn" data-aos="fade-down" data-aos-duration="2000">
                        <a href="{{ url('register') }}" class="btn-primary">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-imgs">
            <img src="{{ URL::asset('assets/frontend/img/icons/blue-circle.svg') }}" class="bg-06" alt="icon">
            <img src="{{ URL::asset('assets/frontend/img/icons/red-circle.svg') }}" class="bg-07" alt="icon">
        </div>
    </section>
    <!-- /Agent Register -->

    <!-- Latest Blog -->
    <section class="latest-blog-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="section-heading text-center">
                        <h2>Latest Blog</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmodtempor incididunt</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-slider owl-carousel">

                        <!-- Blog -->
                        <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img
                                        src="{{ URL::asset('assets/frontend/img/blog/blog1.jpg') }}" alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Property</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="{{ url('blog-details') }}">How to achieve financial independence</a>
                                    </h3>
                                    <p>There are many variations of passages of lorem ipsum available.</p>
                                </div>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('assets/frontend/img/profiles/user1.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">Doe John</a></h6>
                                            <p>Posted on : 15 Jan 2023</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('blog-details') }}"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Blog -->

                        <!-- Blog -->
                        <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img
                                        src="{{ URL::asset('assets/frontend/img/blog/blog2.jpg') }}" alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Advantages</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="{{ url('blog-details') }}">The most popular cities for homebuyers</a>
                                    </h3>
                                    <p>There are many variations of passages of lorem ipsum available.</p>
                                </div>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('assets/frontend/img/profiles/user3.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">John</a></h6>
                                            <p>Posted on : 15 Jan 2023</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('blog-details') }}"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Blog -->

                        <!-- Blog -->
                        <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img
                                        src="{{ URL::asset('assets/frontend/img/blog/blog1.jpg') }}" alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Finanace</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="{{ url('blog-details') }}">Learn how real estate really shapes our
                                            future</a>
                                    </h3>
                                    <p>There are many variations of passages of lorem ipsum available.</p>
                                </div>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('assets/frontend/img/profiles/user1.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">Eric Krok</a></h6>
                                            <p>Posted on : 15 Jan 2023</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('blog-details') }}"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Blog -->

                        <!-- Blog -->
                        <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img
                                        src="{{ URL::asset('assets/frontend/img/blog/blog2.jpg') }}" alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Property</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="{{ url('blog-details') }}">The most popular cities for homebuyers</a>
                                    </h3>
                                    <p>There are many variations of passages of lorem ipsum available.</p>
                                </div>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('assets/frontend/img/profiles/user2.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">Francis</a></h6>
                                            <p>Posted on : 12 May 2023</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('blog-details') }}"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Blog -->

                        <!-- Blog -->
                        <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img
                                        src="{{ URL::asset('assets/frontend/img/blog/blog1.jpg') }}" alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Property</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="{{ url('blog-details') }}">How to achieve financial independence</a>
                                    </h3>
                                    <p>There are many variations of passages of lorem ipsum available.</p>
                                </div>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('assets/frontend/img/profiles/user3.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">Rafael</a></h6>
                                            <p>Posted on : 13 Jan 2023</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('blog-details') }}"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Blog -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Latest Blog -->

    <!-- News Letter -->
    <section class="news-letter-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="news-heading" data-aos="fade-down" data-aos-duration="2000">
                        <h2>Sign Up for Our Newsletter</h2>
                        <p>Lorem ipsum dolor sit amet, consecte tur cing elit. Suspe ndisse suscipit sagittis</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="email-form" data-aos="fade-down" data-aos-duration="2000">
                        <form action="#">
                            <input type="email" class="form-control" placeholder="Enter Email Address">
                            <button class="btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News Letter -->
@endsection
