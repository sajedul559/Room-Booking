<?php $page = 'pricing'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Pricing Plan
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Pricing Plan
        @endslot
    @endcomponent

    <!-- Pricing -->
    <section class="price-section section">
        <div class="container">
            <div class="pricing-tab align-items-center justify-content-center">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Monthly</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false" tabindex="-1">Yearly</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="price-card aos" data-aos="flip-right" data-aos-easing="ease-out-cubic">
                                <div class="price-title">
                                    <h3>Standard</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                        ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                                <div class="price-features bg-white">
                                    <h5>Key Features</h5>
                                    <ul>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>10 Listing Per Login</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry On Listing</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>24 Hrs Support</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Transaction Tracking</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                    </ul>
                                </div>
                                <div class="price-btn">
                                    <a href="javascript:void(0);" class="btn-primary">Get Quote</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="price-card" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                                data-aos-duration="1000">
                                <div class="price-sticker">
                                    <img src="{{ URL::asset('/frontend/img/icons/pricing-icon.svg') }}" alt="price-sticker">
                                </div>
                                <div class="price-title">
                                    <h3>Professional</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                        ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                                <div class="price-features professional bg-white">
                                    <h5>Key Features</h5>
                                    <ul>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>10 Listing Per Login</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry On Listing</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>24 Hrs Support</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Transaction Tracking</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                    </ul>
                                </div>
                                <div class="price-btn">
                                    <a href="javascript:void(0);" class="btn-primary">Get Quote</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="price-card" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000">
                                <div class="price-title">
                                    <h3>Enterprise</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                        ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                                <div class="price-features bg-white enterprise">
                                    <h5>Key Features</h5>
                                    <ul>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>10 Listing Per Login</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry On Listing</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>24 Hrs Support</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Transaction Tracking</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                    </ul>
                                </div>
                                <div class="price-btn">
                                    <a href="javascript:void(0);" class="btn-primary">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="price-card">
                                <div class="price-title">
                                    <h3>Standard</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                        ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                                <div class="price-features">
                                    <h5>Key Features</h5>
                                    <ul>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>80 Listing per login
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry on listing</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>24 hrs Support</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Transaction tracking
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                    </ul>
                                </div>
                                <div class="price-btn">
                                    <a href="javascript:void(0);" class="btn-primary">Get Quote</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="price-card">
                                <div class="price-title">
                                    <h3>Professional</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                        ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                                <div class="price-features professional">
                                    <h5>Key Features</h5>
                                    <ul>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>50 Listing per login
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry on listing</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>24 hrs Support</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Transaction tracking
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                    </ul>
                                </div>
                                <div class="price-btn">
                                    <a href="javascript:void(0);" class="btn-primary">Get Quote</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="price-card">
                                <div class="price-title">
                                    <h3>Enterprise</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                        ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                                <div class="price-features enterprise">
                                    <h5>Key Features</h5>
                                    <ul>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>70 Listing per login
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry on listing</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>24 hrs Support</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Transaction tracking
                                        </li>
                                        <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                    </ul>
                                </div>
                                <div class="price-btn">
                                    <a href="javascript:void(0);" class="btn-primary">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Pricing -->
@endsection
