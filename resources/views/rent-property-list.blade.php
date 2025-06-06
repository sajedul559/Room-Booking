<?php $page = 'rent-property-list'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Rent Property List
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Rent property List
        @endslot
    @endcomponent

    <!-- Feature Property For Rent -->
    <section class="feature-property-sec for-rent bg-white listing-section">
        <div class="container">

            @component('components.rent-sortresult')
            @endcomponent

            <div class="row">

                <!-- Rent List -->
                <div class="col-lg-12">
                    <div class="product-custom">
                        <div class="profile-widget rent-list-view">
                            <div class="doc-img">
                                <a href="{{ url('rent-details') }}" class="property-img">
                                    <img class="img-fluid" alt="Property Image"
                                        src="{{ URL::asset('/frontend/img/rent/rent-list-01.jpg') }}">
                                </a>
                                <div class="featured">
                                    <span>Featured</span>
                                </div>
                                <div class="new-featured">
                                    <span>New</span>
                                </div>
                                <div class="product-amount">
                                    <h5><span>$4,500 </span> / Night</h5>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="favourite">
                                        <span><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="list-head">
                                    <div class="rating">
                                        <span class="rating-count  d-inline-flex">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="javascript:void(0)" tabindex="-1">Beautiful Condo Room</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>470 Park Ave S, New York, NY 10016</p>
                                </div>
                                <ul class="d-flex details">
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                        4 Beds
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                        4 Baths
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                            alt="building-icon">
                                        35000 Sqft
                                    </li>
                                </ul>
                                <ul class="property-category d-flex justify-content-between align-items-center">
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
                                        <a href="{{ url('rental-order') }}" class="btn-primary">Book Now</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Rent List -->

                <!-- Rent List -->
                <div class="col-lg-12">
                    <div class="product-custom">
                        <div class="profile-widget rent-list-view">
                            <div class="doc-img">
                                <a href="{{ url('rent-details') }}" class="property-img">
                                    <img class="img-fluid" alt="Property Image"
                                        src="{{ URL::asset('/frontend/img/rent/rent-list-06.jpg') }}">
                                </a>
                                <div class="product-amount">
                                    <h5><span>$8,500 </span> / Night</h5>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="favourite selected">
                                        <span><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="list-head">
                                    <div class="rating">
                                        <span class="rating-count  d-inline-flex">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="javascript:void(0)" tabindex="-1">Royal Apartment</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>Jl. Bandung Permai, No.6, Bandung</p>
                                </div>
                                <ul class="d-flex details">
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                        2 Beds
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                        1 Baths
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                            alt="building-icon">
                                        12000 Sqft
                                    </li>
                                </ul>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-02.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">Scott Gwin</a></h6>
                                            <p>Minneapolis</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('rental-order') }}" class="btn-primary">Book Now</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Rent List -->

                <!-- Rent List -->
                <div class="col-lg-12">
                    <div class="product-custom">
                        <div class="profile-widget rent-list-view">
                            <div class="doc-img">
                                <a href="{{ url('rent-details') }}" class="property-img">
                                    <img class="img-fluid" alt="Property Image"
                                        src="{{ URL::asset('/frontend/img/rent/rent-list-05.jpg') }}">
                                </a>
                                <div class="featured">
                                    <span>Featured</span>
                                </div>
                                <div class="product-amount">
                                    <h5><span>$2,200 </span> / Night</h5>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="favourite">
                                        <span><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="list-head">
                                    <div class="rating">
                                        <span class="rating-count  d-inline-flex">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ url('rent-details') }}" tabindex="-1">Lunaria Residence</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>Grand Villa house</p>
                                </div>
                                <ul class="d-flex details">
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                        3 Beds
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                        2 Baths
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                            alt="building-icon">
                                        45000 Sqft
                                    </li>
                                </ul>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">Kell Robinson</a></h6>
                                            <p>USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('rental-order') }}" class="btn-primary">Book Now</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Rent List -->

                <!-- Rent List -->
                <div class="col-lg-12">
                    <div class="product-custom">
                        <div class="profile-widget rent-list-view">
                            <div class="doc-img">
                                <a href="{{ url('rent-details') }}" class="property-img">
                                    <img class="img-fluid" alt="Property Image"
                                        src="{{ URL::asset('/frontend/img/rent/rent-list-02.jpg') }}">
                                </a>
                                <div class="featured">
                                    <span>Featured</span>
                                </div>
                                <div class="product-amount">
                                    <h5><span>$2,200 </span> / Night</h5>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="favourite selected">
                                        <span><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="list-head">
                                    <div class="rating">
                                        <span class="rating-count  d-inline-flex">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ url('rent-details') }}" tabindex="-1">Grand Mahaka</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>Jl. Bandung Permai, No.6, Bandung</p>
                                </div>
                                <ul class="d-flex details">
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                        3 Beds
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                        2 Baths
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                            alt="building-icon">
                                        45000 Sqft
                                    </li>
                                </ul>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-04.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">Jeny Caps</a></h6>
                                            <p>Newyork</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('rental-order') }}" class="btn-primary">Book Now</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Rent List -->

                <!-- Rent List -->
                <div class="col-lg-12">
                    <div class="product-custom">
                        <div class="profile-widget rent-list-view">
                            <div class="doc-img">
                                <a href="{{ url('rent-details') }}" class="property-img">
                                    <img class="img-fluid" alt="Property Image"
                                        src="{{ URL::asset('/frontend/img/rent/rent-list-03.jpg') }}">
                                </a>
                                <div class="featured">
                                    <span>Featured</span>
                                </div>
                                <div class="new-featured">
                                    <span>New</span>
                                </div>
                                <div class="product-amount">
                                    <h5><span>$5,500 </span> / Night</h5>
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="favourite">
                                        <span><i class="fa-regular fa-heart"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="list-head">
                                    <div class="rating">
                                        <span class="rating-count  d-inline-flex">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ url('rent-details') }}" tabindex="-1">Lunaria Residence</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>470 Park Ave S, New York, NY 10016</p>
                                </div>
                                <ul class="d-flex details">
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                        7 Beds
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                        5 Baths
                                    </li>
                                    <li>
                                        <img src="{{ URL::asset('/frontend/img/icons/building-icon.svg') }}"
                                            alt="building-icon">
                                        35000 Sqft
                                    </li>
                                </ul>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-05.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <h6><a href="javascript:void(0);">Ronald Richards</a></h6>
                                            <p>South Dokata</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('rental-order') }}" class="btn-primary">Book Now</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Rent List -->

            </div>
        </div>
    </section>
    <!-- /Feature Property For Rent -->
@endsection
