<?php $page = 'about-us'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            About Us
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            About Us
        @endslot
    @endcomponent
    <!-- About Us -->
    <section class="aboutus-section">
        <div class="container">
            <!-- About Content -->
            <div class="about-content">
                <h6>About DreamsEstate</h6>
                <h1>We connect building with people</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate
                    porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>

                <p class="mb-0">congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum tortor
                    eget condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Donec et libero ligula.
                    Vivamus semper at orci at placerat.Placeat Lorem ipsum dolor sit amet.</p>
            </div>
            <!-- /About Content -->
        </div>
    </section>
    <!-- /About Us -->

    <!-- About Counter -->
    <section class="about-counter-sec">
        <div class="container">
            <!-- About Images listing -->
            <div class="about-listing-img">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                        <div class="about-listing">
                            <img src="{{ URL::asset('/frontend/img/about-us/about-us-01.jpg') }}" alt="aboutus-01">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                        <div class="about-listing">
                            <img src="{{ URL::asset('/frontend/img/about-us/about-us-02.jpg') }}" alt="aboutus-02">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                        <div class="about-listing">
                            <img src="{{ URL::asset('/frontend/img/about-us/about-us-03.jpg') }}" alt="aboutus-03">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /About Images listing -->

            <!-- About Count -->
            <div class="counter-sec">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="counter-box flex-fill">
                            <div class="counter-icon">
                                <img src="{{ URL::asset('/frontend/img/icons/counter-icon-1.svg') }}" alt="icon">
                            </div>
                            <div class="counter-value">
                                <h3 class="dash-count"><span class="counter-up">50</span>K</h3>
                                <h5>Listings Added </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="counter-box flex-fill">
                            <div class="counter-icon">
                                <img src="{{ URL::asset('/frontend/img/icons/counter-icon-2.svg') }}" alt="icon">
                            </div>
                            <div class="counter-value">
                                <h3 class="dash-count"><span class="counter-up">3000</span>+</h3>
                                <h5>Agents Listed </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="counter-box active flex-fill">
                            <div class="counter-icon">
                                <img src="{{ URL::asset('/frontend/img/icons/counter-icon-3.svg') }}" alt="icon">
                            </div>
                            <div class="counter-value">
                                <h3 class="dash-count"><span class="counter-up">2000</span>+</h3>
                                <h5>Sales Completed </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="counter-box flex-fill">
                            <div class="counter-icon">
                                <img src="{{ URL::asset('/frontend/img/icons/counter-icon-4.svg') }}" alt="icon">
                            </div>
                            <div class="counter-value">
                                <h3 class="dash-count"><span class="counter-up">5000</span>+</h3>
                                <h5>Users</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /About Count -->
        </div>
    </section>
    <!-- /About Counter -->

    <!-- Book Place -->
    <div class="section book-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="book-listing">
                        <h2>Ready to Book a Place?</h2>
                        <img src="{{ URL::asset('/frontend/img/about-us/about-us-04.jpg') }}" alt="aboutus-03">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="book-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate
                            porttitor sed feugiat nunc. <span>Mauris ac consectetur ante,</span></p>

                        <p>congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum tortor eget
                            condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Donec et libero ligula.
                            Vivamus semper at orci at placerat.Placeat Lorem ipsum dolor sit amet. congue, sed luctus lectus
                            congue. Integer convallis condimentum sem. Duis elementum tortor eget condimentum tempor.
                            Praesent sollicitudin lectus ut pharetra pulvinar. Done congue, sed luctus lectus congue.
                            Integer convallis condimentum sem. Duis elementum tortor eget condimentum tempor. Praesent
                            sollicitudin lectus ut pharetra pulvinar. Done Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Quisque quis ligula eu lectus vulputate porttitor sed feugiat nunc.
                            <span>Mauris ac consectetur ante,</span>
                        </p>

                        <p class="mb-0">congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis
                            elementum tortor eget condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar.
                            Donec et libero ligula. Vivamus semper at orci at placerat.Placeat Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Book Place -->

    <!-- Partners -->
    <section class="section partners-sec">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Hundreds of Partners Around the World</h2>
                <div class="sec-line">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
                <p> Every day, we build trust through communication, transparency, and results.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="partners-slider owl-carousel">
                        <div class="partner-icon">
                            <img src="{{ URL::asset('/frontend/img/icons/partner-icon-1.svg') }}" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="{{ URL::asset('/frontend/img/icons/partner-icon-2.svg') }}" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="{{ URL::asset('/frontend/img/icons/partner-icon-3.svg') }}" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="{{ URL::asset('/frontend/img/icons/partner-icon-4.svg') }}" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="{{ URL::asset('/frontend/img/icons/partner-icon-5.svg') }}" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="{{ URL::asset('/frontend/img/icons/partner-icon-6.svg') }}" alt="Partners">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Partners -->
     <!-- Testimonial -->
     <section class="testimonial-sec">
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
                                        src="{{ URL::asset('/frontend/img/profiles/avatar-01.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/profiles/avatar-02.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/profiles/avatar-04.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/profiles/avatar-05.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/blog/blog-1.jpg') }}" alt="Blog Image"></a>
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
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-01.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/blog/blog-2.jpg') }}" alt="Blog Image"></a>
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
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/blog/blog-3.jpg') }}" alt="Blog Image"></a>
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
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-05.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/blog/blog-2.jpg') }}" alt="Blog Image"></a>
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
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-07.jpg') }}"
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
                                        src="{{ URL::asset('/frontend/img/blog/blog-1.jpg') }}" alt="Blog Image"></a>
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
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
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
@endsection
