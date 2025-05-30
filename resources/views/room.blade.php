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
                                            {{-- <div class="rating">
                                                    <span class="rating-count">
                                                        <i class="fa-solid fa-star checked"></i>
                                                        <i class="fa-solid fa-star checked"></i>
                                                        <i class="fa-solid fa-star checked"></i>
                                                        <i class="fa-solid fa-star checked"></i>
                                                        <i class="fa-solid fa-star checked"></i>
                                                    </span>
                                                    <span class="rating-review">Excellent</span>
                                                </div> --}}
                                                <div class="rating">
                                                    @php
                                                        $avgRating = $room->averageRating();
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
                                            <h3 class="title">
                                                <a href="{{ route('room.details',$room->slug)}}">{{ $room->name ?? 'Room Title' }}</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i> {{ $room->property->location ?? 'No address' }}</p>
                                            <div class="decription">
                                                {{-- <p>{!! $room->description !!}</p> --}}
                                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($room->description), 150) }}</p>

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


  <!-- Map -->
  <section class="map">
    <div class="container">
        <div class="section-heading text-center">
            <h2><span style="color: #DA1F43">The</span> Location</h2>
            <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
            {{-- <p>Hand-picked selection of quality places</p> --}}
        </div>
        <div class="row">
            <div class="col-lg-5">
                {{-- <div class="faq-img">
                    <img src="{{ URL::asset('assets/frontend/img/faq-img.jpg') }}" alt="icon">
                </div> --}}
                <div class="location-info">
                    <ul>
                        <li>
                            <span class="place">Monash University Caulfield Campus</span>
                            <span class="distance">350 m</span>
                        </li>
                        <li>
                            <span class="place">Caulfield Station</span>
                            <span class="distance">700 m</span>
                        </li>
                        <li>
                            <span class="place">Caulfield Plaza</span>
                            <span class="distance">750 m</span>
                        </li>
                        <li>
                            <span class="place">Coles Caulfield Village</span>
                            <span class="distance">1.1 km</span>
                        </li>
                    </ul>
                </div>
                
            </div>
            <div class="col-lg-6">
                <!-- Map -->
                <div class="collapse-card">
                    <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#map" aria-expanded="false">Map</a>
                    </h4>
                    <div id="map" class="card-collapse collapse show  collapse-view">
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509170.989457427!2d-12380081967108484!3d37.192957227641294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v166911581381!5m2!1sen!2sin"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="contact-map"></iframe>
                        </div>
                    </div>
                </div>
                <!-- /Map -->
            </div>
            
        </div>
    </div>
</section>
<!-- /Map -->
 <!-- Latest Blog -->
 <section class="room-blog">
    <div class="container">
        <div class="section-heading text-center pt-5">
            <h2><span style="color: #fdfdfd"> Rooming  {{ $location ?? "Rooming Houses" }}</span> </h2>
            {{-- <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div> --}}
            {{-- <p>Hand-picked selection of quality places</p> --}}
        </div>
        <div class="row ">

            <div class="col-lg-4 col-md-4">
                <div class="blog-card-room" data-aos="fade-down" data-aos-duration="2000">
                    <div class="blog-img-room">
                            <img src="{{ URL::asset('assets/frontend/img/blog/blog2.jpg') }}" alt="Blog Image">
                    </div>
                    <div class="blog-content-room">
                        <h3 class="blog-title-room">
                            <a href="{{ url('blog-details') }}">The Rooms</a>
                        </h3>
                        <p class="blog-description-room">
                            There are many variations of passages of lorem ipsum available.
                            <span class="collapse" id="collapseDescription1"> 
                                This is the extended description that is hidden by default.
                            </span>
                        </p>
                        <button style="color: white" class="btn btn-link read-more-btn" data-bs-toggle="collapse" data-bs-target="#collapseDescription1" aria-expanded="false" aria-controls="collapseDescription1">
                            Read More
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="blog-card-room" data-aos="fade-down" data-aos-duration="2000">
                    <div class="blog-img-room">
                            <img src="{{ URL::asset('assets/frontend/img/blog/blog1.jpg') }}" alt="Blog Image">
                    </div>
                    <div class="blog-content-room">
                        <h3 class="blog-title-room">
                            <a href="{{ url('blog-details') }}">The Facilities</a>
                        </h3>
                        <p class="blog-description-room">
                            There are many variations of passages of lorem ipsum available.
                            <span class="collapse" id="collapseDescription2"> 
                                This is the extended description that is hidden by default.
                            </span>
                        </p>
                        <button style="color: white" class="btn btn-link read-more-btn" data-bs-toggle="collapse" data-bs-target="#collapseDescription2" aria-expanded="false" aria-controls="collapseDescription1">
                            Read More
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="blog-card-room" data-aos="fade-down" data-aos-duration="2000">
                    <div class="blog-img-room">
                            <img src="{{ URL::asset('assets/frontend/img/blog/blog1.jpg') }}" alt="Blog Image">
                    </div>
                    <div class="blog-content-room">
                        <h3 class="blog-title-room">
                            <a href="{{ url('blog-details') }}">The Location</a>
                        </h3>
                        <p class="blog-description-room">
                            There are many variations of passages of lorem ipsum available.
                            <span class="collapse" id="collapseDescription3"> 
                                This is the extended description that is hidden by default.
                            </span>
                        </p>
                        <button style="color: white" class="btn btn-link read-more-btn" data-bs-toggle="collapse" data-bs-target="#collapseDescription3" aria-expanded="false" aria-controls="collapseDescription1">
                            Read More
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center">
            <a class="btn view-rooms-btn" id="buy-property" href="#available-room"
               role="tab" aria-controls="available-room" aria-selected="true">
               VIEW AVAILABLE ROOMS
            </a>
        </div>
        

        
    </div>
</section>
<!-- Faq -->
<section class="youtube-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="collapse-card collapse-card-room">
                    {{-- <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#video"
                            aria-expanded="false">Video</a>
                    </h4> --}}
                    <div id="video" class="card-collapse   collapse-view">
                        <div class="sample-video">
                            <img src="{{ URL::asset('assets/frontend/img/blog/blog2-details.jpg') }}" alt="Image">
                            <a class="play-icon" data-fancybox="" href="https://www.youtube.com/embed/AWovHEZcpQU"><i
                                    class="bx bx-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="collapse-card">
                    {{-- <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#video"
                            aria-expanded="false">Video</a>
                    </h4> --}}
                    <div id="video" class="card-collapse   collapse-view">
                        <div class="sample-video">
                            <img src="{{ URL::asset('assets/frontend/img/blog/blog1-details.jpg') }}" alt="Image">
                            <a class="play-icon" data-fancybox="" href="https://www.youtube.com/embed/AWovHEZcpQU"><i
                                    class="bx bx-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <!-- Testimonial -->
 <section class="testimonial-sec pt-3 pb-5">
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
<!-- /Latest Blog -->
  <!-- Faq -->
  <section class="faq-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="faq-img">
                    <img src="{{ asset('assets/frontend/img/faq-home.jpg') }}" alt="icon">
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
  

@endsection
