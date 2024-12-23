<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        @include('inc.user-box')

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <!-- Dashboard -->
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-desktop"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
            
                <!-- Role-Permission Section -->
                @can('All Roles')
                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="fas fa-lock"></i>
                        <span> Role-Permission </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            {{-- <li><a href="{{ route('permissions.index') }}">Permission</a></li> --}}
                        </ul>
                    </div>
                </li>
                @endcan
            
                <!-- Users Section -->
                @can('All Users')
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
                @endcan
            
                <!-- Todo Section -->
                @can('Todos')
                <li>
                    <a href="#sidebarTodo" data-bs-toggle="collapse">
                        <i class="fas  fa-parachute-box"></i>
                        <span>Todo </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTodo">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('todos.index') }}">Lists</a></li>
                            <li><a href="{{ route('todos.create') }}">Create</a></li>
                        </ul>
                    </div>
                </li>
                @endcan
            
                <!-- Expense Section -->
                @can('Expenses')
                <li>
                    <a href="#sidebarExpense" data-bs-toggle="collapse">
                        <i class="fas  fa-parachute-box"></i>
                        <span>Expense </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpense">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('expenses.index') }}">Lists</a></li>
                            <li><a href="{{ route('expenses.create') }}">Create</a></li>
                        </ul>
                    </div>
                </li>
                @endcan
            
                <!-- Properties Section -->
                {{-- @can('Properties') --}}
                <li>
                    <a href="#sidebarProperty" data-bs-toggle="collapse">
                        <i class="fas  fa-parachute-box"></i>
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
                {{-- @endcan --}}
            
                <!-- Vendor Section -->
                @can('Vendors')
                <li>
                    <a href="#sidebarVendor" data-bs-toggle="collapse">
                        <i class="fas fa-user"></i>
                        <span>Vendor </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarVendor">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('vendors.index') }}">Lists</a></li>
                            <li><a href="{{ route('vendors.create') }}">Create</a></li>
                        </ul>
                    </div>
                </li>
                @endcan
            
                <!-- House Chores Section -->
                @can('House Chores')
                <li>
                    <a href="#sidebarHomeChore" data-bs-toggle="collapse">
                        <i class="fas fa-landmark"></i>
                        <span>House Chores </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarHomeChore">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('house_chores.index') }}">Lists</a></li>
                            <li><a href="{{ route('house_chores.create') }}">Create</a></li>
                        </ul>
                    </div>
                </li>
                @endcan
            
                <!-- Settings Section -->
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
