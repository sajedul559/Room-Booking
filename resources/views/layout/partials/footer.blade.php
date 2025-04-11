<!-- Footer -->
<footer class="footer pt-5">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="footer-border-img">
            <img src="{{ URL::asset('/frontend/img/bg/line-bg.png') }}" alt="image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="footer-widget footer-about">
                        <div class="footer-app-content">
                            <div class="footer-content-heading">
                                {{-- <h4>Get Our App </h4> --}}
                                {{-- <p>Download the app and book your property</p> --}}
                            </div>
                            {{-- <div class="download-app">
                                <a href="javascript:void(0);"><img src="{{ URL::asset('/frontend/img/google-pay.png') }}"
                                        alt="google play"></a>
                                <a href="javascript:void(0);"><img src="{{ URL::asset('/frontend/img/app-store.png') }}"
                                        alt="app store"></a>
                            </div> --}}
                            <div class="social-links">
                                <h4>Get Our App</h4>
                                <ul>
                                    <li><a href="javascript:void(0);"><i
                                                class="fa-brands fa-facebook-f hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-instagram hi-icon"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-behance hi-icon"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-twitter hi-icon"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i
                                                class="fa-brands fa-pinterest-p hi-icon"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-brands fa-linkedin hi-icon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 ">
                    <h4 class="text-white">Contact Us</h4>
                    <ul class="contact-info text-white">
                        <li>
                            <i class="fa-solid fa-envelope"></i> 
                            <span>Email: info@roomingkos.com</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-location-dot"></i> 
                            <span>Address: 44 Batesford Rd, Malvern East VIC 3144</span>
                        </li>
                    </ul>
                </div>
                
              
               
               
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Pages</h4>
                        </div>
                        <ul>
                            <li style="color: white">Student Accommodation</li>
                            <li ><a style="padding-left: 20px;" href="{{ route('rooming.houses') }}">RoomingKos Dudley</a></li>
                            <li><a style="padding-left: 20px;" href="{{ route('rooming.houses')}}">RoomingKos Swanston</a></li>
                            <div style="padding-right:20px;"><li><a href="{{ route('rooming.houses')}}">Rooming Houses</a></li></div>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Other</h4>
                        </div>
                        <ul>
                            <li><a href="{{ url('about-us') }}">About</a></li>
                            <li><a href="{{ url('blog-list') }}">Blog</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact</a></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="footer-bottom-content">
                <div class="copyright">
                    <p>Copyright <script>
                        document.write(new Date().getFullYear())
                  
                        </script> - All right reserved DreamsEstate</p>
                </div>
                <div>
                    <a>Privacy Policy</a>
                </div>
               
            </div> --}}
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>
                        Copyright <script>
                            document.write(new Date().getFullYear());
                        </script> - All rights reserved Rooming
                    </p>
                </div>
                <div class="pb-5">
                    <a href="https://dreamstechnologies.com/" target="_blank">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- /Footer Bottom -->

</footer>
<!-- /Footer -->

<!-- Search -->
<div class="search-popup js-search-popup ">
    <a href="javascript:void(0);" class="close-button" id="search-close" aria-label="Close search">
        <i class="fa fa-close"></i>
    </a>
    <div class="popup-inner">
        <div class="inner-container">
            <form class="search-form" id="search-form" action="rent-property-grid">
                <h3>What Are You Looking for?</h3>
                <div class="search-form-box flex">
                    <input type="text" class="search-input" placeholder="Type a  Keyword...." id="search-input"
                        aria-label="Type to search" role="searchbox" autocomplete="off">
                    <button type="submit" class="search-icon"><i class="bx bx-search"></i></button>
                </div>
                <h5>Popular Properties</h5>
                <ul>
                    <li><a href="{{ url('rent-property-grid') }}">Beautiful Condo Room</a></li>
                    <li><a href="{{ url('rent-property-grid') }}">Royal Apartment</a></li>
                    <li><a href="{{ url('rent-property-grid') }}">Grand Villa House</a></li>
                    <li><a href="{{ url('rent-property-grid') }}">Grand Mahaka</a></li>
                    <li><a href="{{ url('rent-property-grid') }}">Lunaria Residence</a></li>
                    <li><a href="{{ url('rent-property-grid') }}">Stephen Alexander Homes</a></li>
                </ul>
            </form>
        </div>
    </div>
</div>
<!-- /Search -->
