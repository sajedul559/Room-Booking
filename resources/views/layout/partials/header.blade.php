@if (
    !Route::is([
        'reset-password',
        'forgot-password',
        'login',
        'register',
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
                <a href="{{ url('index') }}" class="navbar-brand logo">
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
                        class="has-submenu  {{ Request::is('agent-grid', 'agent-list', 'agent-grid-sidebar', 'agent-list-sidebar', 'agent-details') ? 'active' : '' }}">
                        <a style="color: white" href="javascript:void(0);">Student Accommodation <i class="fas fa-chevron-down"></i></a>
                        <ul style="background-color: #DA1F43" class="submenu">
                            <li><a style="color: white" href="{{ url('agent-grid') }}"
                                    class="{{ Request::is('agent-grid') ? 'active' : '' }}">Agent Grid</a></li>
                            <li><a style="color: white" href="{{ url('agent-list') }}"
                                    class="{{ Request::is('agent-list') ? 'active' : '' }}">Agent List</a></li>
                        </ul>
                    </li>
                    <li  class="{{ Request::is('room', '/') ? 'active' : '' }}">
                        <a style="color: white" href="{{ route('room')}}">Rooming House</a>
                    </li>
                    <li><a style="color: white" href="{{ url('about-us') }}"
                        class="{{ Request::is('about-us') ? 'active' : '' }}">About</a></li>
                    <li class="login-link"><a style="color: white" href="{{ url('login') }}">Sign Up</a></li>
                    <li class="login-link"><a style="color: white" href="{{ url('register') }}">Sign In</a></li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                {{-- <li class="new-property-btn">
                    <a style="color: white" href="{{ url('add-new-property') }}"
                        class="{{ Request::is('add-new-property') ? 'active' : '' }}">
                        <i style="color: white" class="bx bxs-plus-circle"></i> Add New Property
                    </a>
                </li> --}}
                <li class="{{ Request::is('register') ? 'active' : '' }}">
                    <a href="{{ url('register') }}" class="btn btn-primary"><i class="feather-user-plus"></i>Sign
                        Up</a>
                </li>
                <li class="{{ Request::is('login') ? 'active' : '' }}">
                    <a href="{{ url('login') }}" class="btn sign-btn"><i class="feather-unlock"></i>Sign In</a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- /Header -->
@endif

@if (Route::is([
        'reset-password',
        'forgot-password',
        'login',
        'register',
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
