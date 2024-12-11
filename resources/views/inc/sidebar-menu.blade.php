<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        @include('inc.user-box')

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-desktop"></i>
                        <span> Dashboard </span>
                    </a>

                </li>
                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="fas fa-lock"></i>
                        <span> Role-Permission </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li><a href="{{ route('permissions.index') }}">Permission</a></li>
                          
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarUser" data-bs-toggle="collapse">
                        <i class="fas fa-users"></i>
                        <span>Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarUser">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('admins.index') }}">Users</a></li>
                            <li><a href="{{ route('admins.create') }}">Users create</a></li>
                          
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarProperty" data-bs-toggle="collapse">
                        <i class="fas fa-landmark"></i>
                        <span>Properties </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProperty">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('properties.index') }}">Lists</a></li>
                            <li><a href="{{ route('properties.create') }}">Create</a></li>
                          
                        </ul>
                    </div>
                </li>
                <li class="menu-title mt-2">Settings</li>
                <li>
                    <a href="#sidebarSetup" data-bs-toggle="collapse">
                        <i class="fas fa-globe"></i>
                        <span>Setup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSetup">
                        <ul class="nav-second-level">
                            <li><a href="#">Settings</a></li>
                           
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
