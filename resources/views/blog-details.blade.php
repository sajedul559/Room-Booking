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
                            {{-- <img src="{{ URL::asset('assets/frontend/img/blog/blog2-details.jpg') }}" alt="img"> --}}
                            <img src="{{ get_image_path($blog->details_image) }}" alt="img">

                        </div>
                        <div class="blog-banner-content">
                            <div class="blog-banner-contenthead">
                                <h6>{{ $blog->category?->name }}</h6>
                                <h5>{{ $blog->title }}</h5>
                            </div>
                            <div class="blog-detailset">
                                <div class="post-author">
                                    <div class="post-author-img">
                                    <img 
                                                src="{{ asset('storage/' . $blog->createdBy?->photo) }}" 
                                                onerror="this.onerror=null;this.src='{{ asset('assets/images/users/avatar.jpg') }}';"
                                                alt="author">
                                    </div>
                                     
                                    <a href="javascript:void(0)"> <span> {{ $blog->createdBy?->name }}</span></a>
                                </div>
                                <i class="fa-solid fa-calendar-days"></i> <span class="ms-2">{{ $blog->created_at->format('M j, Y') }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="blog-para-content">
                      <p>{{ $blog->description }}</p>
                      {!! $blog->content !!}
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
                        @foreach ($relatedBlogs as $data)
                              <div class="blog-card">
                            <div class="blog-img">
                                <a href="{{ route('blog-details',$data->slug)}}"><img src="{{ get_image_path($data->image) }}"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-property">
                                    <span>{{ $data->category?->name }}</span>
                                </div>
                                <div class="blog-title">
                                    <h3><a href="{{ route('blog-details',$data->slug)}}">{{ $data->title }}</a></h3>
                                    <p>{{ $data->description }}</p>
                                </div>
                                <ul class="property-category d-flex justify-content-between align-items-center">
                                    <li class="user-info">
                                        {{-- <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('assets/frontend/img/profiles/user1.jpg') }}"
                                                class="img-fluid avatar" alt="User"></a> --}}
                                        <a href="javascript:void(0);">
                                            <img 
                                                src="{{ asset('storage/' . $data->createdBy?->photo) }}" 
                                                onerror="this.onerror=null;this.src='{{ asset('assets/images/users/avatar.jpg') }}';"
                                                class="img-fluid avatar" 
                                                alt="User">
                                        </a>
                                                
                                        <div class="user-name">
                                            <a >{{ $data->createdBy?->name }}</a>
                                            <p>{{ $data->created_at->format('M j, Y') }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><span><i
                                                    class='fa-solid fa-arrow-right'></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Latest Blog -->
@endsection
