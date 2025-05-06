@if (
    !Route::is([
        'reset-password',
        'forgot-password',
        'coming-soon',
        'error-404',
        'error-500',
        'maintenance',
    ]))
    <!-- Header -->
    <header class="header header-fix">
        {{-- @if (Route::is(['index']))
            <div class="header-top">
                <div class="template-ad">
                    <img src="{{ URL::asset('/frontend/img/icons/badge-icon.svg') }}" alt="icon">
                    <h5>No 1, Realestate Website to Buy / Sell Your Place <span>First Listing Free!!!</span></h5>
                </div>
            </div>
        @endif --}}
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('index') }}" class="navbar-brand logo">
                    <img src="{{ URL::asset('/frontend/img/logo.svg') }}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ url('index') }}" class="menu-logo">
                        <img src="{{ URL::asset('/frontend/img/logo.svg') }}" class="img-fluid" alt="Logo">
                    </a>

                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">                  
                    <li
                        class="has-submenu {{ in_array(Route::currentRouteName(), ['agent-grid', 'agent-list', 'agent-grid-sidebar', 'agent-list-sidebar', 'agent-details']) ? 'active' : '' }}">
                        <a  href="javascript:void(0);">Student Accommodation <i class="fas fa-chevron-down"></i></a>
                        <ul style="background-color: #DA1F43" class="submenu">
                            <li><a  href="{{ route('rooms.location', ['location' => 'Dudley']) }}"
                                    class="{{ Request::is('agent-grid') ? 'active' : '' }}">RoomingKos Dudley</a></li>
                            <li><a  href="{{ route('rooms.location', ['location' => 'Swanston']) }}"
                                    class="{{ Request::is('agent-list') ? 'active' : '' }}">RoomingKos Swanston</a></li>
                            <li>
                                <a href="{{ route('rooms.location', ['location' => 'springfield']) }}"
                                    class="{{ Request::is('springfield') ? 'active' : '' }}">
                                    RoomingKos Springfield
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li  class="{{ Route::currentRouteName() == 'room' ? 'active' : '' }}">
                        <a  href="{{ route('rooming.houses')}}">Rooming House</a>
                    </li>
                    
                    <li class=" {{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}"><a href="{{ route('about-us') }}"
                        >About</a></li>
                    <li class="login-link"><a  href="{{ url('login') }}">Sign Up</a></li>
                    <li class="login-link"><a  href="{{ url('register') }}">Sign In</a></li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                @auth
                    @if(auth()->user()->type == "user")
                        <li class="nav-item dropdown new-property-btn">
                            <a style="color:white" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i style="color:white"  class="bx bxs-user"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('tenant-reports.create') }}">Create Report</a></li>
                                {{-- <li><a class="dropdown-item" href="{{ route('index') }}">Profile</a></li> --}}
                                {{-- <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li> --}}

                                <li><a class="dropdown-item" href="{{ route('user.bookingList') }}">Booking List</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}">Change Password</a></li>
                                <li>
                                    <a class="dropdown-item text-danger logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
            
                        <!-- Hidden Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                @endauth
            
                @guest
                    <li class="{{ Request::is('register') ? 'active' : '' }}">
                        <a href="{{ url('register-vendor') }}" class="btn btn-primary">
                            <i class="feather-user-plus"></i> Sign Up For Vendor
                        </a>
                    </li>
                    <li class="{{ Request::is('register') ? 'active' : '' }}">
                        <a href="{{ url('register') }}" class="btn btn-primary">
                            <i class="feather-user-plus"></i> Sign Up
                        </a>
                    </li>
                    <li class="{{ Request::is('login') ? 'active' : '' }}">
                        <a href="{{ url('login') }}" class="btn sign-btn">
                            <i class="feather-unlock"></i> Sign In
                        </a>
                    </li>
                @endguest
            </ul>
            
        </nav>
    </header>
    <!-- /Header -->
@endif

@if (Route::is([
        'reset-password',
        'forgot-password',
        'coming-soon',
        'error-404',
        'error-500',
        'maintenance',
    ]))
    <!-- Header -->
    <header class="log-header">
        <a href="{{ url('index') }}"><img class="img-fluid logo-dark"
                src="{{ URL::asset('/frontend/img/logo.svg') }}" alt="Logo"></a>
    </header>
    <!-- /Header -->
@endif
