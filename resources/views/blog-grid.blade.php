<?php $page = 'blog-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Blog Grid
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Blog Grid
        @endslot
    @endcomponent
    <!-- Blog Grid-->
    <div class="section blog-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Blog -->
                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="{{ url('blog-details') }}"><img src="{{ URL::asset('/frontend/img/blog/blog-1.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Property</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="{{ url('blog-details') }}">How to achieve financial independence</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img
                                            src="{{ URL::asset('/frontend/img/profiles/avatar-01.jpg') }}"
                                            class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Rafael</a>
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
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Blog -->
                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="{{ url('blog-details') }}"><img src="{{ URL::asset('/frontend/img/blog/blog-2.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Villa</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="{{ url('blog-details') }}">The most popular cities for homebuyers</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img
                                            src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
                                            class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">John</a>
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
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Blog -->
                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="{{ url('blog-details') }}"><img src="{{ URL::asset('/frontend/img/blog/blog-3.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Godown</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="{{ url('blog-details') }}">Learn how real estate really shapes our future</a>
                                </h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img
                                            src="{{ URL::asset('/frontend/img/profiles/avatar-05.jpg') }}"
                                            class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Eric Krok</a>
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
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Blog -->
                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="{{ url('blog-details') }}"><img src="{{ URL::asset('/frontend/img/blog/blog-4.jpg') }}"
                                    alt="Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Factory</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="{{ url('blog-details') }}">30 Real Estate Blogs Every Realtor Should....</a>
                                </h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img
                                            src="{{ URL::asset('/frontend/img/profiles/avatar-07.jpg') }}"
                                            class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Anif</a>
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
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Blog -->
                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="{{ url('blog-details') }}"><img src="{{ URL::asset('/frontend/img/blog/blog-5.jpg') }}"
                                    alt="Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Guest house</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="{{ url('blog-details') }}">Here Are Easy Ways To Know How To...</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img
                                            src="{{ URL::asset('/frontend/img/profiles/avatar-08.jpg') }}"
                                            class="img-fluid avatar" alt="Image"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Ramos</a>
                                        <p>Posted on : 14 Jan 2023</p>
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
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Blog -->
                    <div class="blog-card aos" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="{{ url('blog-details') }}"><img
                                    src="{{ URL::asset('/frontend/img/blog/blog-6.jpg') }}" alt="Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>House</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="{{ url('blog-details') }}">Importance of Virtual Reality in Real Estate</a>
                                </h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img
                                            src="{{ URL::asset('/frontend/img/profiles/avatar-10.jpg') }}"
                                            class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Patrick</a>
                                        <p>Posted on : 12 Jan 2023</p>
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
    <!-- /Blog Grid-->
@endsection
