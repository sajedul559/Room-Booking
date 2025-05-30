<?php $page = 'rent-details'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Rent Details
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Rent Details
        @endslot
    @endcomponent

    <!-- Detail View Section -->
    <section class="buy-detailview">
        <div class="container">

            <!-- Details -->
            <div class="row align-items-center page-head">
                <div class="col-lg-8">
                    {{-- <div class="buy-btn">
                        <span class="buy">Buy</span>
                        <span class="appartment">Appartment</span>
                    </div> --}}
                    <div class="page-title">
                        <h3>{{ $room->name }}<span><img
                                    src="{{ URL::asset('/frontend/img/icons/location-icon.svg') }}" alt="Image"></span>
                        </h3>
                        <p><i class="feather-map-pin"></i> {{ isset($room->property->location) ? $room->property->location : 'Location not available' }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="latest-update">
                        <h5>Last Updated on :  {{ $room->updated_at->format('d M Y') }}</h5>
                        <p>$ {{ $room->price }}</p>
                        {{-- <ul class="other-pages">
                            <li><a href="javascript:void(0);"><i class="feather-share-2"></i>Share</a></li>
                            <li><a href="{{ url('compare') }}"><i class="feather-git-pull-request"></i>Add to Compare</a>
                            </li>
                            <li><a href="javascript:void(0);"><i class="feather-heart"></i>Wishlist</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <!-- /Details -->

            <div class="row">
                <div class="col-lg-8">

                    <!-- Slider -->
                    <div class="buy-details-col">
                        <div class="rental-card">
                            <!-- Main Slider -->
                            <div class="slider rental-slider">
                                @if($room->images->isNotEmpty())
                                    @foreach($room->images as $image)
                                        <div class="product-img">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Room Image">
                                        </div>
                                    @endforeach
                                @else
                                    <!-- Default Placeholder Image -->
                                    <div class="product-img">
                                        <img src="{{ URL::asset('/frontend/img/rent/rent-detail-01.jpg') }}" alt="Default Image">
                                    </div>
                                @endif
                            </div>
                    
                            <!-- Thumbnail Navigation -->
                            <div class="slider slider-nav-thumbnails">
                                @if($room->images->isNotEmpty())
                                    @foreach($room->images as $image)
                                        <div>
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Room Thumbnail">
                                        </div>
                                    @endforeach
                                @else
                                    <!-- Default Thumbnails -->
                                    <div><img src="{{ URL::asset('/frontend/img/rent/rent-detail-01.jpg') }}" alt="Default Thumbnail"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- /Slider -->

                    <!-- Overview -->
                    {{-- <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#overview"
                                aria-expanded="false">Overview</a>
                        </h4>
                        <div id="overview" class="card-collapse collapse show">
                            <ul class="property-overview  collapse-view">
                                <li>
                                    <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}" alt="Image">
                                    <p>4 Beds</p>
                                </li>
                                <li>
                                    <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}" alt="Image">
                                    <p>4 Baths</p>
                                </li>
                                <li>
                                    <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}" alt="Image">
                                    <p>35000 Sqft</p>
                                </li>
                                <li>
                                    <img src="{{ URL::asset('/frontend/img/icons/garage-icon.svg') }}" alt="Image">
                                    <p>2 Garages</p>
                                </li>
                                <li>
                                    <img src="{{ URL::asset('/frontend/img/icons/calender-icon.svg') }}" alt="Image">
                                    <p>Year Built: 2005</p>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- /Overview -->

                    <!-- Overview -->
                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#about"
                                aria-expanded="false">Description</a>
                        </h4>
                        <div id="about" class="card-collapse collapse show">
                            <div class="about-agent collapse-view">
                                <p> {!! $room->description !!} <p>

                            </div>
                        </div>
                    </div>
                    <!-- /Overview -->

                    <!-- Property Address -->
                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#address" aria-expanded="false">Property
                                Address</a>
                        </h4>
                        <div id="address" class="card-collapse collapse show  collapse-view">
                            <ul class="property-address">
                                <li>Address : <span> {{ $room->property?->location }}</span></li>
                                {{-- <li>City : <span> Jersey City </span></li>
                                <li>State/County : <span> New Jersey State</span></li>
                                <li>Country : <span> United States</span></li>
                                <li>Zip : <span> 07305</span></li>
                                <li>Area : <span> Greenville</span></li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- /Property Address -->

                    <!-- Property Details -->
                    {{-- <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#details" aria-expanded="false">Property
                                Details</a>
                        </h4>
                        <div id="details" class="card-collapse collapse show  collapse-view">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="property-details">
                                        <li>Property Id : <span> 22972</span></li>
                                        <li>Price : <span> $ 860,000 </span></li>
                                        <li>Price Info: <span> $ 1,098 /sq ft</span></li>
                                        <li>Property Size : <span> 190 ft2</span></li>
                                        <li>Property Lot Size : <span> 1,200 ft2</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="property-details">
                                        <li>Rooms : <span> 10</span></li>
                                        <li>Bedrooms : <span> 5</span></li>
                                        <li>Bathrooms : <span> 6</span></li>
                                        <li>Custom Id : <span> 68</span></li>
                                        <li>Garages : <span> 2</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="property-details">
                                        <li>Year Built : <span> 2005</span></li>
                                        <li>Garage Size : <span> 2 cars </span></li>
                                        <li>Available From : <span> 2023-11-18</span></li>
                                        <li>Structure Type : <span> Brick</span></li>
                                        <li>Floors No : <span> 3</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /Property Details -->

                    <!-- Amenities -->
                    {{-- <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#amenities"
                                aria-expanded="false">Amenities</a>
                        </h4>
                        <div id="amenities" class="card-collapse collapse show  collapse-view">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="amenities-list">
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-1.svg') }}"
                                                alt="Image">Air Conditioning</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-2.svg') }}"
                                                alt="Image">Swimming Pools</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-3.svg') }}"
                                                alt="Image">Sporting Facilities</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-4.svg') }}"
                                                alt="Image">Gym</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-5.svg') }}"
                                                alt="Image">Clubhouse</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="amenities-list">
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-6.svg') }}"
                                                alt="Image">Landscaped Gardens</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-7.svg') }}"
                                                alt="Image">Wide-Open Spaces</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-8.svg') }}"
                                                alt="Image">Parks </li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-9.svg') }}"
                                                alt="Image">Package Lockers</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-10.svg') }}"
                                                alt="Image">Spa</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="amenities-list">
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-11.svg') }}"
                                                alt="Image">Surveillance Cameras</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/amenities-icon-12.svg') }}"
                                                alt="Image">Billiards Table</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /Amenities -->

                    <!-- Video -->
                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#video"
                                aria-expanded="false">Video</a>
                        </h4>

                        <div id="video" class="card-collapse collapse show collapse-view">
                            <div class="sample-video">
                                @if (!empty($room->video_image))
                                    <img src="{{ asset('storage/' . $room->video_image) }}" alt="Video Thumbnail">
                                @else
                                    <img src="{{ URL::asset('/frontend/img/video-img.jpg') }}" alt="Default Image">
                                @endif
                        
                                @if (!empty($room->video_url))
                                    <a class="play-icon" data-fancybox="" href="{{ $room->video_url }}">
                                        <i class="bx bx-play"></i>
                                    </a>
                                @else
                                    <a class="play-icon" data-fancybox="" href="https://www.youtube.com/embed/AWovHEZcpQU">
                                        <i class="bx bx-play"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    <!-- /Video -->

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

                    <!-- Reviews -->
                    <div class="collapse-card sidebar-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#review" aria-expanded="false">Reviews
                             ({{ $roomReviewCount}}) </a>
                        </h4>
                        <div id="review" class="card-collapse collapse show  collapse-view">
                            <div class="review-card">
                                <div id="review-list"> 
                                    @include('partials._review', ['reviews' => $reviews])
                                </div>
   
                                                         
                                    @auth                              
                                        @if($canReview)

                                            <div class="property-review">
                                                <h5 class="card-title">Property Reviews</h5>
                                            <form action="{{ route('room.review.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="star" id="star-rating">

                                                    <div class="row">
                                                        {{-- Name --}}
                                                        <div class="col-md-6">
                                                            <div class="review-form">
                                                                <input type="text" name="name" value="{{ auth()->user()->name }}" readonly class="form-control" placeholder="Your Name">
                                                                @error('name')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- Email --}}
                                                        <div class="col-md-6">
                                                            <div class="review-form">
                                                                <input type="email" name="email" value="{{ auth()->user()->email }}" readonly class="form-control" placeholder="Your Email">
                                                                @error('email')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- Comment --}}
                                                        <div class="col-md-12">
                                                            <div class="review-form">
                                                                <textarea rows="5" name="comment" class="form-control" placeholder="Enter Your Comments">{{ old('comment') }}</textarea>
                                                                @error('comment')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- Star Rating --}}
                                                        <div class="col-md-12 mt-3">
                                                            <div class="review-form">
                                                                <label>Rating</label>
                                                                <div class="star-rating" id="star-wrapper">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <i class="fas fa-star star" data-value="{{ $i }}"></i>
                                                                    @endfor
                                                                </div>
                                                                @error('star')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- Submit --}}
                                                        <div class="col-md-12">
                                                            <div class="review-form submit-btn">
                                                                <button type="submit" class="btn btn-primary">Submit Review</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        @else
                                        {{-- <p class="text-danger">You have already submitted reviews for all your bookings of this room.</p> --}}
                                        @endif
                                    @endauth
                               <div class="pagination-wrapper mt-3 text-center">
                                    @if ($reviews->hasMorePages())
                                        <button
                                            class="btn btn-primary"
                                            id="load-more-btn"
                                            data-page="2"
                                            data-url="{{ route('room.details', $room->slug) }}">
                                            Load More
                                        </button>
                                    @endif
                                </div>
 
                               
                                 @guest
                                    <div class="alert alert-warning mt-3">
                                        <p >Please <a href="{{ route('login', ['redirect_to' => request()->url()]) }}">login</a> to submit a review.</p>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <!-- /Reviews -->

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 theiaStickySidebar">
                    <div class="right-sidebar">
                        <a href="{{ route('booking.form',$room->slug) }}" class="btn btn-primary prop-book"><i
                                class="bx bx-calendar"></i>Book Room</a>

                        

                    </div>
                </div>
                <!-- /Sidebar -->

            </div>

            <!-- Similar Listings -->
            <div class="similar-list">
                <div class="section-heading">
                    <h2>Similar Listings</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmodtempor incididunt</p>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="feature-property-sec for-rent p-0">
                            <div class="rentfeature-slider owl-carousel">
                                <div class="product-custom">
                                    <div class="profile-widget">
                                        <div class="doc-img">
                                            <a href="{{ url('rent-details') }}" class="property-img">
                                                <img class="img-fluid" alt="Property Image"
                                                    src="{{ URL::asset('/frontend/img/product/product-6.jpg') }}">
                                            </a>
                                            <div class="product-amount">
                                                <h5><span>$2,200 </span> / Night</h5>
                                            </div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                            <div class="new-featured">
                                                <span>New</span>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
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
                                                <a href="{{ url('rent-details') }}">Beautiful Condo Room</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i> 318-S Oakley Blvd, Chicago, IL 60612, USA
                                            </p>
                                            <ul class="d-flex details">
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                        alt="bed-icon">
                                                    3 Beds
                                                </li>
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                        alt="bath-icon">
                                                    2 Baths
                                                </li>
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                        alt="building-icon">
                                                    15000 Sqft
                                                </li>
                                            </ul>
                                            <ul
                                                class="property-category d-flex justify-content-between align-items-center">
                                                <li class="user-info">
                                                    <a href="javascript:void(0);"><img
                                                            src="{{ URL::asset('/frontend/img/profiles/avatar-01.jpg') }}"
                                                            class="img-fluid avatar" alt="User"></a>
                                                    <div class="user-name">
                                                        <h6><a href="javascript:void(0);">Marc Silva</a></h6>
                                                        <p>Newyork</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="{{ url('rent-details') }}" class="btn-primary">Book Now</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-custom">
                                    <div class="profile-widget">
                                        <div class="doc-img">
                                            <a href="{{ url('rent-details') }}" class="property-img">
                                                <img class="img-fluid" alt="Property Image"
                                                    src="{{ URL::asset('/frontend/img/product/product-7.jpg') }}">
                                            </a>
                                            <div class="product-amount">
                                                <h5><span>$1,400 </span> / Night</h5>
                                            </div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
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
                                                <a href="{{ url('rent-details') }}">Grand Mahaka</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i> 470 Park Ave S, New York, NY 10016</p>
                                            <ul class="d-flex details">
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                        alt="bed-icon">
                                                    3 Beds
                                                </li>
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                        alt="bath-icon">
                                                    3 Baths
                                                </li>
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                        alt="building-icon">
                                                    30100 Sqft
                                                </li>
                                            </ul>
                                            <ul
                                                class="property-category d-flex justify-content-between align-items-center">
                                                <li class="user-info">
                                                    <a href="javascript:void(0);"><img
                                                            src="{{ URL::asset('/frontend/img/profiles/avatar-02.jpg') }}"
                                                            class="img-fluid avatar" alt="User"></a>
                                                    <div class="user-name">
                                                        <h6><a href="javasript:void(0);">Karen Maria</a></h6>
                                                        <p>South Dokata</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="{{ url('rent-details') }}" class="btn-primary">Book Now</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-custom">
                                    <div class="profile-widget">
                                        <div class="doc-img">
                                            <a href="{{ url('rent-details') }}" class="property-img">
                                                <img class="img-fluid" alt="Property Image"
                                                    src="{{ URL::asset('/frontend/img/product/product-8.jpg') }}">
                                            </a>
                                            <div class="product-amount">
                                                <h5><span>$1,500 </span> / Night</h5>
                                            </div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
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
                                                <a href="{{ url('rent-details') }}">Royal Apartment</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i> 82-25 Parsons Blvd, Jamaica, NY 11432, USA
                                            </p>
                                            <ul class="d-flex details">
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                        alt="bed-icon">
                                                    2 Beds
                                                </li>
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                        alt="bath-icon">
                                                    1 Bath
                                                </li>
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                        alt="building-icon">
                                                    2500 Sqft
                                                </li>
                                            </ul>
                                            <ul
                                                class="property-category d-flex justify-content-between align-items-center">
                                                <li class="user-info">
                                                    <a href="javascript:void(0);"><img
                                                            src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
                                                            class="img-fluid avatar" alt="User"></a>
                                                    <div class="user-name">
                                                        <h6><a href="javascript:void(0)">Scott Gwin</a></h6>
                                                        <p>Minipoliies</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="{{ url('rent-details') }}" class="btn-primary">Book Now</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-custom">
                                    <div class="profile-widget">
                                        <div class="doc-img">
                                            <a href="{{ url('rent-details') }}" class="property-img">
                                                <img class="img-fluid" alt="Property Image"
                                                    src="{{ URL::asset('/frontend/img/product/product-10.jpg') }}">
                                            </a>
                                            <div class="product-amount">
                                                <h5><span>$4,500 </span> / Night</h5>
                                            </div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
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
                                                <a href="{{ url('rent-details') }}">Grand Villa house</a>
                                            </h3>
                                            <p><i class="feather-map-pin"></i> 470 Park Ave S, New York, NY 10016</p>
                                            <ul class="d-flex details">
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                        alt="bed-icon">
                                                    4 Beds
                                                </li>
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                        alt="bath-icon">
                                                    3 Baths
                                                </li>
                                                <li>
                                                    <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                        alt="building-icon">
                                                    11000 Sqft
                                                </li>
                                            </ul>
                                            <ul
                                                class="property-category d-flex justify-content-between align-items-center">
                                                <li class="user-info">
                                                    <a href="javascript:void(0);"><img
                                                            src="{{ URL::asset('/frontend/img/profiles/avatar-05.jpg') }}"
                                                            class="img-fluid avatar" alt="User"></a>
                                                    <div class="user-name">
                                                        <h6><a href="javascript:void(0);">Kell Robinson</a></h6>
                                                        <p>USA</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="{{ url('rent-details') }}" class="btn-primary">Book Now</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    @forelse($similarListingRooms as $room)
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
                            <h4 class="text-muted">No similar listings available at the moment. Try exploring other listings.</h4>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- /Similar Listings -->

        </div>
    </section>
    <!-- /Detail View Section -->
@endsection
@push('styles')
    <style>
        .star-rating {
            direction: ltr;
            font-size: 20px;
            cursor: pointer;
        }
        .star-rating .star {
            color: #ccc;
            transition: color 0.2s ease-in-out;
        }
        .star-rating .star.hover,
        .star-rating .star.selected {
            color: #FCAF3D;
        }
    </style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('star-rating');
        let selectedRating = 0;

        stars.forEach((star, index) => {
            star.addEventListener('mouseover', () => {
                highlightStars(index);
            });

            star.addEventListener('mouseout', () => {
                highlightStars(selectedRating - 1);
            });

            star.addEventListener('click', () => {
                selectedRating = index + 1;
                ratingInput.value = selectedRating;
            });
        });

        function highlightStars(index) {
            stars.forEach((star, i) => {
                star.classList.toggle('selected', i <= index);
            });
        }
    });
</script>
<script>
    $(document).on('click', '#load-more-btn', function () {
        let button = $(this);
        let page = button.data('page');
        let url = button.data('url') + '?page=' + page;

        $.ajax({
            url: url,
            type: 'GET',
            success: function (res) {
                $('#review-list').append(res);
                button.data('page', page + 1); // increment next page

                // Check if there's more content (optional improvement)
                if ($(res).filter('.customer-review').length === 0) {
                    button.remove(); // hide button if no more data
                }
            },
            error: function () {
                alert('Could not load more reviews. Try again.');
            }
        });
    });
</script>



@endpush

