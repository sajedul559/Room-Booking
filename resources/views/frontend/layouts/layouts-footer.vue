<template>
    <!-- Footer -->
    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="footer-border-img">
                <img src="@/assets/img/bg/line-bg.png" alt="image">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-widget footer-about">
                            <div class="footer-app-content">
                                <div class="footer-content-heading">
                                    <h4>Get Our App </h4>
                                    <p>Download the app and book your property</p>
                                </div>
                                <div class="download-app">
                                    <a href="javascript:void(0);"><img src="@/assets/img/google-pay.png"
                                            alt="google play"></a>
                                    <a href="javascript:void(0);"><img src="@/assets/img/app-store.png"
                                            alt="app store"></a>
                                </div>
                                <div class="social-links">
                                    <h4>Connect with us</h4>
                                    <ul>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa-brands fa-facebook-f hi-icon"></i></a></li>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa-brands fa-instagram hi-icon"></i></a></li>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa-brands fa-behance hi-icon"></i></a></li>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa-brands fa-twitter hi-icon"></i></a></li>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa-brands fa-pinterest-p hi-icon"></i></a></li>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa-brands fa-linkedin hi-icon"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer-widget-list">
                            <div class="footer-content-heading">
                                <h4>Explore</h4>
                            </div>
                            <ul>
                                <li><router-link to="/rent/rent-property-list">Listings</router-link></li>
                                <li><router-link to="/register">Register</router-link></li>
                                <li><router-link to="/">Login</router-link></li>
                                <li><router-link to="/blogs/blog-grid">Blogs</router-link></li>
                                <li><router-link to="/agency/agency-grid">Agency</router-link></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer-widget-list">
                            <div class="footer-content-heading">
                                <h4>Categories</h4>
                            </div>
                            <ul>
                                <li><a href="javascript:void(0);">Apartments</a></li>
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">Office</a></li>
                                <li><a href="javascript:void(0);">Villas</a></li>
                                <li><a href="javascript:void(0);">Flat</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="footer-widget-list">
                            <div class="footer-content-heading">
                                <h4>Locations</h4>
                            </div>
                            <ul>
                                <li><a href="javascript:void(0);">United States</a></li>
                                <li><a href="javascript:void(0);">Canada</a></li>
                                <li><a href="javascript:void(0);">India</a></li>
                                <li><a href="javascript:void(0);">UK</a></li>
                                <li><a href="javascript:void(0);">Australia</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="footer-widget-list">
                            <div class="footer-content-heading">
                                <h4>Quick Links</h4>
                            </div>
                            <ul>
                                <li><router-link to="/pages/about-us">About</router-link></li>
                                <li><router-link to="/pages/faq">Faq</router-link></li>
                                <li><router-link to="/pages/terms-condition">Terms & Conditions</router-link></li>
                                <li><router-link to="/pages/privacy-policy">Privacy Policy</router-link></li>
                                <li><router-link to="/pages/gallery">Gallery</router-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <div class="copyright">
                        <p>Copyright 2024 - All right reserved DreamsEstate</p>
                    </div>
                    <div class="company-logo">
                        <p>a product of</p>
                        <a href="https://dreamguystech.com/" target="_blank"><img src="@/assets/img/company-logo.png"
                                alt="Logo"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
</template>