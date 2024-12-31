<?php $page = 'blog-details'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Blog Details
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Blog Details
        @endslot
    @endcomponent
    <!-- Blog Grid-->
    <div class="section blog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-banner">
                        <div class="blog-banner-img">
                            <img src="{{ URL::asset('/frontend/img/blog/blog-banner.jpg') }}" alt="img">
                        </div>
                        <div class="blog-banner-content">
                            <div class="blog-banner-contenthead">
                                <h6>Property</h6>
                                <h5>Why community living is important for elderly people</h5>
                            </div>
                            <div class="blog-detailset">
                                <div class="post-author">
                                    <div class="post-author-img">
                                        <img src="{{ URL::asset('/frontend/img/profiles/avatar-01.jpg') }}" alt="author">
                                    </div>
                                    <a href="javascript:void(0)"> <span> Francis</span></a>
                                </div>
                                <i class="fa-solid fa-calendar-days"></i> <span class="ms-2">Feb 6, 2023</span>
                            </div>
                        </div>

                    </div>
                    <div class="blog-para-content">
                        <p>If you are living alone in your home or mostly living by yourself and are looking for ways to
                            make your life better, then you should try community living. Elderly people need to live in a
                            community with other people. This means that you are close to your friends and family, but not
                            so much that you lose your privacy. Living in a community can help you feel more comfortable and
                            safe.Let’s further check out why community living is important for elderly people:</p>
                        <h4>There’s no place like home:</h4>
                        <img src="{{ URL::asset('/frontend/img/blog/blog-banner1.jpg') }}" alt="img">
                        <p>Home is where the heart is. It’s where you make memories, laugh with friends and family, and feel
                            safe. Where you can relax and enjoy life and be yourself. Home is where you can sleep peacefully
                            at night, knowing that someone is there to watch over you when you need them most.
                            There’s no place like home. This is true for everyone, but it is especially important for the
                            elderly because they have more responsibilities than young people do. The elderly need support
                            at home, and the same support and care are only possible in community settings.
                            It’s not just the physical aspect of community living that’s important, but also the social
                            side. There are several benefits to having a group of friends and family members who can help
                            you out in your time of need.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Blog Grid-->

    <!-- Latest Blog -->
    <section class="feature-property-sec blog-details-sec">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Related Posts</h2>
                <div class="sec-line mb-0">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider testimonialnext-prev owl-carousel">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="javascript:void(0);"><img src="{{ URL::asset('/frontend/img/blog/blog-1.jpg') }}"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Property</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="javascript:void(0);">How to achieve financial independence</a></h3>
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
                                        <a href="javascript:void(0);"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="javascript:void(0);"><img src="{{ URL::asset('/frontend/img/blog/blog-2.jpg') }}"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Condos</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="javascript:void(0);">The most popular cities for homebuyers</a></h3>
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
                                        <a href="javascript:void(0);"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="javascript:void(0);"><img src="{{ URL::asset('/frontend/img/blog/blog-3.jpg') }}"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Flat</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="javascript:void(0);">Learn how real estate really shapes our future</a>
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
                                        <a href="javascript:void(0);"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="javascript:void(0);"><img src="{{ URL::asset('/frontend/img/blog/blog-2.jpg') }}"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Villa</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="javascript:void(0);">The most popular cities for homebuyers</a></h3>
                                    <p>There are many variations of passages of lorem ipsum available.</p>
                                </div>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-07.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <a href="javascript:void(0);">Francis</a>
                                            <p>Posted on : 15 Jan 2023</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="javascript:void(0);"><img src="{{ URL::asset('/frontend/img/blog/blog-1.jpg') }}"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>Godown</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="javascript:void(0);">How to achieve financial independence</a></h3>
                                    <p>There are many variations of passages of lorem ipsum available.</p>
                                </div>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/frontend/img/profiles/avatar-03.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a>
                                        <div class="user-name">
                                            <a href="javascript:void(0);">Rafael</a>
                                            <p>Posted on : 15 Jan 2023</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Latest Blog -->
@endsection
