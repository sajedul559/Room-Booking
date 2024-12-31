<?php $page = 'buy-detail-view'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Buy Details - Single Schedule A Visit
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Buy Details - Single Schedule A Visit
        @endslot
    @endcomponent

    <!-- Detail View Section -->
    <section class="buy-detailview">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <!-- Slider -->
                    <div class="buy-details-col">
                        <div class="rental-card">
                            <div class="slider rental-slider">
                                <div class="product-img">
                                    <img src="{{ URL::asset('/frontend/img/rent/rent-detail-01.jpg') }}" alt="Slider">
                                </div>
                                <div class="product-img">
                                    <img src="{{ URL::asset('/frontend/img/rent/rent-detail-02.jpg') }}" alt="Slider">
                                </div>
                                <div class="product-img">
                                    <img src="{{ URL::asset('/frontend/img/rent/rent-detail-03.jpg') }}" alt="Slider">
                                </div>
                                <div class="product-img">
                                    <img src="{{ URL::asset('/frontend/img/rent/rent-detail-04.jpg') }}" alt="Slider">
                                </div>
                                <div class="product-img">
                                    <img src="{{ URL::asset('/frontend/img/rent/rent-detail-05.jpg') }}" alt="Slider">
                                </div>
                            </div>
                            <div class="slider slider-nav-thumbnails">
                                <div><img src="{{ URL::asset('/frontend/img/rent/rent-detail-01.jpg') }}" alt="product image">
                                </div>
                                <div><img src="{{ URL::asset('/frontend/img/rent/rent-detail-02.jpg') }}" alt="product image">
                                </div>
                                <div><img src="{{ URL::asset('/frontend/img/rent/rent-detail-03.jpg') }}" alt="product image">
                                </div>
                                <div><img src="{{ URL::asset('/frontend/img/rent/rent-detail-04.jpg') }}" alt="product image">
                                </div>
                                <div><img src="{{ URL::asset('/frontend/img/rent/rent-detail-05.jpg') }}" alt="product image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider -->

                    <!-- Overview -->
                    <div class="collapse-card">
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
                    </div>
                    <!-- /Overview -->

                    <!-- Description -->
                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#about"
                                aria-expanded="false">Description</a>
                        </h4>
                        <div id="about" class="card-collapse collapse show">
                            <div class="about-agent collapse-view">
                                <p> Good road frontage on a paved county road with utilities make it an amazing setting for
                                    your dream country getaway! If you like views, you must see this property!, </p>
                                <p>This property is mostly wooded and sits high on a hilltop overlooking the Mohawk River
                                    Valley. Located right in the heart of Upstate NYs Amish farm Country, this land is
                                    certified organic making it extremely rare! Good road frontage on a paved county road
                                    with utilities make it an amazing setting for your dream country getaway! If you like
                                    views, you must see this property!This property is mostly wooded and sits high on a
                                    hilltop overlooking the Mohawk River Valley. Located right in the heart of Upstate NYs
                                    Amish farm Country, this land is certified organic making it extremely rare! Good road
                                    frontage on a paved county road with utilities make it an amazing setting for your dream
                                    country getaway! If you like views, you must see this property!</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Description -->

                    <!-- Property Address -->
                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#address" aria-expanded="false">Property
                                Address</a>
                        </h4>
                        <div id="address" class="card-collapse collapse show  collapse-view">
                            <ul class="property-address">
                                <li>Address : <span> Ferris Park</span></li>
                                <li>City : <span> Jersey City </span></li>
                                <li>State/County : <span> New Jersey State</span></li>
                                <li>Country : <span> United States</span></li>
                                <li>Zip : <span> 07305</span></li>
                                <li>Area : <span> Greenville</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Property Address -->

                    <!-- Property Details -->
                    <div class="collapse-card">
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
                                        <li> Rooms : <span> 10</span></li>
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
                                        <li>Available From : <span> 18-11-2023</span></li>
                                        <li>Structure Type : <span> Brick</span></li>
                                        <li>Floors No : <span> 3</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Property Details -->

                    <!-- Amenities -->
                    <div class="collapse-card">
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
                    </div>
                    <!-- /Amenities -->

                    <!-- Documents -->
                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#Documents"
                                aria-expanded="false">Documents</a>
                        </h4>
                        <div id="Documents" class="card-collapse collapse show  collapse-view">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="amenities-list document">
                                        <li><img src="{{ URL::asset('/frontend/img/icons/pdf-icon.svg') }}"
                                                alt="Image">Ferris Park.jpg</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/pdf-icon.svg') }}"
                                                alt="Image">Energetic-Certificate-PDF6</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Documents -->

                    <!-- Video -->
                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#video"
                                aria-expanded="false">Video</a>
                        </h4>
                        <div id="video" class="card-collapse collapse show  collapse-view">
                            <div class="sample-video">
                                <img src="{{ URL::asset('/frontend/img/video-img.jpg') }}" alt="Image">
                                <a class="play-icon" data-fancybox="" href="https://www.youtube.com/embed/AWovHEZcpQU"><i
                                        class="bx bx-play"></i></a>
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
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509170.989457427!2d-123.80081967108484!3d37.192957227641294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v1669181581381!5m2!1sen!2sin"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade" class="contact-map"></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- /Map -->

                    <!-- Floor Plan -->
                    <div class="collapse-card sidebar-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#FloorPlan" aria-expanded="false">Floor
                                Plan</a>
                        </h4>
                        <div id="FloorPlan" class="card-collapse collapse show  collapse-view">
                            <div class="inside-collapse-card mt-0">
                                <h5 class="card-title p-0">
                                    <a data-bs-toggle="collapse" href="#floorplane1" aria-expanded="false">Floor Plan
                                        1</a>
                                </h5>
                                <div id="floorplane1" class="card-collapse collapse show">
                                    <ul>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                alt="Image">4 Beds</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                alt="Image">4 Baths</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                alt="Image">35000 Sqft</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/money-icon.svg') }}"
                                                alt="Image">$35,000</li>
                                    </ul>
                                    <div class="floor-map">
                                        <img src="{{ URL::asset('/frontend/img/floor-map.png') }}" alt="Image">
                                    </div>
                                    <div class="map-info">
                                        <p>This property is mostly wooded and sits high on a hilltop overlooking the Mohawk
                                            River Valley. Located right in the heart
                                            of Upstate NYs Amish farm Country, this land is certified organic making it
                                            extremely rare! Good road frontage on a paved county road with utilities make it
                                            an amazing setting for your dream country getaway! If you like views, you must
                                            see this property!, </p>
                                    </div>
                                </div>
                            </div>
                            <div class="inside-collapse-card">
                                <h5 class="card-title p-0">
                                    <a class="collapsed" data-bs-toggle="collapse" href="#floorplane2"
                                        aria-expanded="false">Floor Plan 2</a>
                                </h5>
                                <div id="floorplane2" class="card-collapse collapse">
                                    <ul>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                alt="Image">4 Beds</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                alt="Image">4 Baths</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                alt="Image">35000 Sqft</li>
                                        <li><img src="{{ URL::asset('/frontend/img/icons/money-icon.svg') }}"
                                                alt="Image">$35,000</li>
                                    </ul>
                                    <div class="floor-map">
                                        <img src="{{ URL::asset('/frontend/img/floor-map.png') }}" alt="Image">
                                    </div>
                                    <div class="map-info">
                                        <p>This property is mostly wooded and sits high on a hilltop overlooking the Mohawk
                                            River Valley. Located right in the heart
                                            of Upstate NYs Amish farm Country, this land is certified organic making it
                                            extremely rare! Good road frontage on a paved county road with utilities make it
                                            an amazing setting for your dream country getaway! If you like views, you must
                                            see this property!, </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Floor Plan -->

                    <!-- Reviews -->
                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#review" aria-expanded="false">Reviews
                                (25)</a>
                        </h4>
                        <div id="review" class="card-collapse collapse show  collapse-view">
                            <div class="review-card">
                                <div class="customer-review">
                                    <div class="customer-info">
                                        <div class="customer-name">
                                            <a href="javascript:void(0);"><img
                                                    src="{{ URL::asset('/frontend/img/profiles/avatar-01.jpg') }}"
                                                    alt="User"></a>
                                            <div>
                                                <h5><a href="javascript:void(0);">Johnson</a></h5>
                                                <p>02 Jan 2023</p>
                                            </div>
                                        </div>
                                        <div class="rating">
                                            <span class="rating-count">
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                            </span>
                                            <p class="rating-review"><span>5.0</span>(20 Reviews)</p>
                                        </div>
                                    </div>
                                    <div class="review-para">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing software like
                                            Aldus PageMaker including versions of Lorem Ipsum.It was popularised in the
                                            1960s </p>
                                    </div>
                                </div>
                                <div class="customer-review">
                                    <div class="customer-info">
                                        <div class="customer-name">
                                            <a href="javascript:void(0);"><img
                                                    src="{{ URL::asset('/frontend/img/profiles/avatar-02.jpg') }}"
                                                    alt="User"></a>
                                            <div>
                                                <h5><a href="javascript:void(0);">Casandra</a></h5>
                                                <p>01 Jan 2023</p>
                                            </div>
                                        </div>
                                        <div class="rating">
                                            <span class="rating-count">
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                            </span>
                                            <p class="rating-review"><span>5.0</span>(20 Reviews)</p>
                                        </div>
                                    </div>
                                    <div class="review-para">
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing software like
                                            Aldus PageMaker including versions of Lorem Ipsum.It was popularised in the
                                            1960s with the elease of Letraset sheets containing Lorem Ipsum passages, and
                                            more recently with desktop publishing software like Aldus Page Maker including
                                            versions.</p>
                                    </div>
                                </div>
                                <div class="property-review">
                                    <h5 class="card-title">Property Reviews</h5>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="review-form">
                                                    <input type="text" class="form-control" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-form">
                                                    <input type="email" class="form-control" placeholder="Your Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="review-form">
                                                    <textarea rows="5" placeholder="Enter Your Comments"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="review-form submit-btn">
                                                    <button type="submit" class="btn-primary">Submit Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Reviews -->

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 theiaStickySidebar">
                    <div class="right-sidebar">

                        <!-- Schedule a Visit -->
                        <div class="sidebar-card">
                            <div class="contact-btn contact-btn-new">
                                <a href="{{ url('buy-details') }}"><i class="feather-info"></i>Request Info</a>
                                <a href="{{ url('buy-detail-view') }}" class="active"><i
                                        class="feather-video"></i>Schedule a Visit</a>
                            </div>
                            <div class="calender mb-0">
                                <h6 class="user-info">Select Day</h6>
                            </div>
                            <div class="arrival-div">
                                <ul>
                                    <li>
                                        <input type="radio" id="radio1" name="Arrival">
                                        <label for="radio1">Tue<span>21</span>Feb</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio2" name="Arrival" checked="">
                                        <label for="radio2">Wed<span>22</span>Feb</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio3" name="Arrival">
                                        <label for="radio3">Thur<span>23</span>Feb</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio4" name="Arrival">
                                        <label for="radio4">Feb<span>24</span>Feb</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio5" name="Arrival">
                                        <label for="radio5">Sat<span>25</span>Feb</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="review-form">
                                <select class="select">
                                    <option value="0">Select Time</option>
                                    <option value="1">10 AM - 12 PM</option>
                                    <option value="2">12 PM - 2 PM</option>
                                    <option value="2">02 PM - 04 PM</option>
                                </select>
                            </div>
                            <h6 class="user-info">Your Information</h6>
                            <div class="review-form">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="review-form">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" placeholder="Your Phone Number">
                            </div>
                            <div class="review-form">
                                <textarea rows="5" placeholder="Yes, I'm Interested"></textarea>
                            </div>
                            <div class="review-form submit-btn">
                                <button type="submit" class="btn-primary">Send Email</button>
                            </div>
                            <ul class="connect-us">
                                <li><a href="javascript:void(0);"><i class="feather-phone"></i>Call Us</a></li>
                                <li><a href="javascript:void(0);"><i class="fa-brands fa-whatsapp"></i>Whatsapp</a></li>
                            </ul>
                        </div>
                        <!-- /Request Info -->

                        <!-- Listing Owner Details -->
                        <div class="sidebar-card">
                            <div class="sidebar-card-title">
                                <h5>Listing Owner Details</h5>
                            </div>
                            <div class="user-active bg-white p-0">
                                <div class="user-img">
                                    <a href="javascript:void(0);"><img class="avatar"
                                            src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
                                            alt="Image"></a>
                                </div>
                                <div class="user-name">
                                    <h4><a>John Collins</a></h4>
                                    <div class="rating">
                                        <span class="rating-count d-inline-flex">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <span class="rating-review">5.0 (20 Reviews)</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-details">
                                <li>No of Listings <span>05</span></li>
                                <li>No of Bookings<span>225</span></li>
                                <li>Memeber on<span>15 Jan 2023</span></li>
                                <li>Verification<span>Verified</span></li>
                            </ul>
                        </div>
                        <!-- /Listing Owner Details -->

                        <!-- Share Property -->
                        <div class="sidebar-card">
                            <div class="sidebar-card-title">
                                <h5>Share Property</h5>
                            </div>
                            <div class="social-links">
                                <ul class="sidebar-social-links">
                                    <li><a href="javascript:void(0);" class="fb-icon"><i
                                                class="fa-brands fa-facebook-f hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);" class="ins-icon"><i
                                                class="fa-brands fa-instagram hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-behance hi-icon"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);" class="twitter-icon"><i
                                                class="fa-brands fa-twitter hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);" class="ins-icon"><i
                                                class="fa-brands fa-pinterest-p hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-linkedin hi-icon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Share Property -->

                        <!-- Mortarage Calculator -->
                        <div class="sidebar-card">
                            <div class="sidebar-card-title">
                                <h5>Mortarage Calculator</h5>
                            </div>
                            <div class="review-form">
                                <label>Total Amount ($)</label>
                                <input type="text" class="form-control" placeholder="150000000">
                            </div>
                            <div class="review-form">
                                <label>Down Payment ($)</label>
                                <input type="text" class="form-control" placeholder="1000000">
                            </div>
                            <div class="review-form">
                                <label>Loan Terms (Years)</label>
                                <input type="text" class="form-control" placeholder="2">
                            </div>
                            <div class="review-form">
                                <label>Interest Rate (%)</label>
                                <input type="text" class="form-control" placeholder="15">
                            </div>
                            <div class="review-form submit-btn">
                                <button type="submit" class="btn-primary">Send Email</button>
                            </div>
                            <div class="reset-btn">
                                <a href="javascript:void(0);">Reset Form</a>
                            </div>
                        </div>
                        <!-- /Mortarage Calculator -->

                        <!-- Slider -->
                        <div class="sidebar-img-slider owl-carousel">
                            <div class="slide-img-card">
                                <div class="slide-img">
                                    <img src="{{ URL::asset('/frontend/img/sidebar-slide.jpg') }}" alt="Image">
                                </div>
                                <div class="property-name">
                                    <h3>High-Rise Townhouse</h3>
                                    <span><i class="feather-map-pin"></i>Chicago</span>
                                    <div class="star-rate">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-img-card">
                                <div class="slide-img">
                                    <img src="{{ URL::asset('/frontend/img/sidebar-slide.jpg') }}" alt="Image">
                                </div>
                                <div class="property-name">
                                    <h3>High-Rise Townhouse</h3>
                                    <span><i class="feather-map-pin"></i>Chicago</span>
                                    <div class="star-rate">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-img-card">
                                <div class="slide-img">
                                    <img src="{{ URL::asset('/frontend/img/sidebar-slide.jpg') }}" alt="Image">
                                </div>
                                <div class="property-name">
                                    <h3>High-Rise Townhouse</h3>
                                    <span><i class="feather-map-pin"></i>Chicago</span>
                                    <div class="star-rate">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Slider -->

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
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-slider owl-carousel">

                            <!-- List -->
                            <div class="product-custom">
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="{{ url('buy-detail-view') }}" class="property-img">
                                            <img class="img-fluid" alt="Property Image"
                                                src="{{ URL::asset('/frontend/img/product/product-1.jpg') }}">
                                        </a>
                                        <div class="product-amount">
                                            <span>$41,000</span>
                                        </div>
                                        <div class="feature-rating">
                                            <div>
                                                <div class="featured">
                                                    <span>Featured</span>
                                                </div>
                                                <div class="new-featured">
                                                    <span>New</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user-avatar">
                                            <img src="{{ URL::asset('/frontend/img/profiles/avatar-01.jpg') }}"
                                                alt="User">
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
                                            <p class="rating-review"><span>5.0</span>(20 Reviews)</p>
                                        </div>
                                        <h3 class="title">
                                            <a href="{{ url('buy-detail-view') }}">Place perfect for nature</a>
                                        </h3>
                                        <p><i class="feather-map-pin"></i> 318-S Oakley Blvd, Chicago, IL 60612, USA</p>
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
                                                15000 Sqft
                                            </li>
                                        </ul>

                                        <ul class="property-category d-flex justify-content-between">
                                            <li>
                                                <span class="list">Listed on : </span>
                                                <span class="date">16 Jan 2023</span>
                                            </li>
                                            <li>
                                                <span class="category list">Category : </span>
                                                <span class="category-value date">Apartment</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /List -->

                            <!-- List -->
                            <div class="product-custom">
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="{{ url('buy-detail-view') }}" class="property-img">
                                            <img class="img-fluid" alt="Property Image"
                                                src="{{ URL::asset('/frontend/img/product/product-2.jpg') }}">
                                        </a>
                                        <div class="product-amount">
                                            <span>$78,000</span>
                                        </div>
                                        <div class="feature-rating">
                                            <div>
                                                <div class="featured">
                                                    <span>Featured</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user-avatar">
                                            <img src="{{ URL::asset('/frontend/img/profiles/avatar-02.jpg') }}"
                                                alt="User">
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
                                            <p class="rating-review"><span>5.0</span>(25 Reviews)</p>
                                        </div>
                                        <h3 class="title">
                                            <a href="{{ url('buy-detail-view') }}">Beautiful Condo Room</a>
                                        </h3>
                                        <p><i class="feather-map-pin"></i> 470 Park Ave S, New York, NY 10016</p>
                                        <ul class="d-flex details">
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                    alt="bed-icon">
                                                2 Beds
                                            </li>
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                    alt="bath-icon">
                                                2 Baths
                                            </li>
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                    alt="building-icon">
                                                3000 Sqft
                                            </li>
                                        </ul>
                                        <ul class="property-category d-flex justify-content-between">
                                            <li>
                                                <span class="list">Listed on : </span>
                                                <span class="date">17 Jan 2023</span>
                                            </li>
                                            <li>
                                                <span class="category list">Category : </span>
                                                <span class="category-value date">Condos</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /List -->

                            <!-- List -->
                            <div class="product-custom">
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="{{ url('buy-detail-view') }}" class="property-img">
                                            <img class="img-fluid" alt="Property Image"
                                                src="{{ URL::asset('/frontend/img/product/product-3.jpg') }}">
                                        </a>
                                        <div class="product-amount">
                                            <span>$63,000</span>
                                        </div>
                                        <div class="feature-rating">
                                            <div>
                                                <div class="featured">
                                                    <span>Featured</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user-avatar">
                                            <img src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
                                                alt="User">
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
                                            <p class="rating-review"><span>5.0</span>(10 Reviews)</p>
                                        </div>
                                        <h3 class="title">
                                            <a href="{{ url('buy-detail-view') }}">Summer house</a>
                                        </h3>
                                        <p><i class="feather-map-pin"></i> 82-25 Parsons Blvd, Jamaica, NY 11432, USA</p>
                                        <ul class="d-flex details">
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                    alt="bed-icon">
                                                3 Beds
                                            </li>
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                    alt="bath-icon">
                                                4 Baths
                                            </li>
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                    alt="building-icon">
                                                35000 Sqft
                                            </li>
                                        </ul>

                                        <ul class="property-category d-flex justify-content-between">
                                            <li>
                                                <span class="list">Listed on : </span>
                                                <span class="date">13 Jan 2023</span>
                                            </li>
                                            <li>
                                                <span class="category list">Category : </span>
                                                <span class="category-value date">House</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /List -->

                            <!-- List -->
                            <div class="product-custom">
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="{{ url('buy-detail-view') }}" class="property-img">
                                            <img class="img-fluid" alt="Property Image"
                                                src="{{ URL::asset('/frontend/img/product/product-4.jpg') }}">
                                        </a>
                                        <div class="product-amount">
                                            <span>$51,000</span>
                                        </div>
                                        <div class="feature-rating">
                                            <div>
                                                <div class="featured">
                                                    <span>Featured</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user-avatar">
                                            <img src="{{ URL::asset('/frontend/img/profiles/avatar-04.jpg') }}"
                                                alt="User">
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
                                            <p class="rating-review"><span>5.0</span>(5 Reviews)</p>
                                        </div>
                                        <h3 class="title">
                                            <a href="{{ url('buy-detail-view') }}">Minimalist and bright flat</a>
                                        </h3>
                                        <p><i class="feather-map-pin"></i> 518-520 8th Ave, New York, NY 10018, USA</p>
                                        <ul class="d-flex details">
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}"
                                                    alt="bed-icon">
                                                4 Beds
                                            </li>
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}"
                                                    alt="bath-icon">
                                                1 Bath
                                            </li>
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                    alt="building-icon">
                                                5000 Sqft
                                            </li>
                                        </ul>
                                        <ul class="property-category d-flex justify-content-between">
                                            <li>
                                                <span class="list">Listed on : </span>
                                                <span class="date">18 Jan 2023</span>
                                            </li>
                                            <li>
                                                <span class="category list">Category : </span>
                                                <span class="category-value date">Flats</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /List -->

                            <!-- List -->
                            <div class="product-custom">
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="{{ url('buy-detail-view') }}" class="property-img">
                                            <img class="img-fluid" alt="Property Image"
                                                src="{{ URL::asset('/frontend/img/product/product-5.jpg') }}">
                                        </a>
                                        <div class="product-amount">
                                            <span>$29,000</span>
                                        </div>
                                        <div class="feature-rating">
                                            <div>
                                                <div class="featured">
                                                    <span>Featured</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite">
                                                    <span><i class="fa-regular fa-heart"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user-avatar">
                                            <img src="{{ URL::asset('/frontend/img/profiles/avatar-05.jpg') }}"
                                                alt="User">
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
                                            <p class="rating-review"><span>5.0</span>(20 Reviews)</p>
                                        </div>
                                        <h3 class="title">
                                            <a href="{{ url('buy-detail-view') }}">Two storey modern flat</a>
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
                                                4 Baths
                                            </li>
                                            <li>
                                                <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                                    alt="building-icon">
                                                35000 Sqft
                                            </li>
                                        </ul>
                                        <ul class="property-category d-flex justify-content-between">
                                            <li>
                                                <span class="list">Listed on : </span>
                                                <span class="date">19 Jan 2023</span>
                                            </li>
                                            <li>
                                                <span class="category list">Category : </span>
                                                <span class="category-value date">Flat</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /List -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- /Similar Listings -->
        </div>
    </section>
    <!-- /Detail View Section -->
@endsection
