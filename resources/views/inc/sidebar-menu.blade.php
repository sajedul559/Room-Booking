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
                {{-- @can('All Roles') --}}
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
                {{-- @endcan --}}
            
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
                        <i class="fas fa-toolbox"></i>
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
                @can('Properties')
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
                @endcan
             @can('Partners')

             <li>
                    <a href="#sidebarPartner" data-bs-toggle="collapse">
                        <i class="fas  fa-parachute-box"></i>
                        <span>Partners </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPartner">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('partners.index') }}">Lists</a></li>
                            <li><a href="{{ route('partners.create') }}">Create</a></li>
                        </ul>
                    </div>
                </li>
             @endcan

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
                 @can('Rooms')
                <li>
                    <a href="#sidebarRoom" data-bs-toggle="collapse">
                        <i class="fas fa-landmark"></i>
                        <span>Room </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarRoom">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('rooms.index') }}">Lists</a></li>
                            <li><a href="{{ route('rooms.create') }}">Create</a></li>
                        </ul>
                    </div>
                </li>
                @endcan
                  <!-- Rent Management Section -->
                  @can('RentManagements')
                  <li>
                      <a href="#sidebarRent" data-bs-toggle="collapse">
                          <i class="fas fa-landmark"></i>
                          <span>Rent Management </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarRent">
                          <ul class="nav-second-level">
                              <li><a href="{{ route('rent_managements.index') }}">Lists</a></li>
                              <li><a href="{{ route('rent_managements.create') }}">Create</a></li>
                              <li><a href="{{ route('rent.calender') }}">Rent Calender</a></li>

                          </ul>
                      </div>
                  </li>
                    @endcan
                     <!-- Rent Management Section -->
                  @can('Bookings')
                   <li>
                      <a href="#sidebarBooking" data-bs-toggle="collapse">
                          <i class="fas fa-landmark"></i>
                          <span>Bookings  </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarBooking">
                          <ul class="nav-second-level">
                              <li><a href="{{ route('bookings.index') }}">Lists</a></li>
                          </ul>
                      </div>
                   </li>
                 @endcan
                 
                  @can('Bookings')
                   <li>
                      <a href="#sidebarBlogCategory" data-bs-toggle="collapse">
                          <i class="fas fa-landmark"></i>
                          <span>Blog Category  </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarBlogCategory">
                          <ul class="nav-second-level">
                              <li><a href="{{ route('blog-categories.index') }}">Lists</a></li>
                          </ul>
                      </div>
                   </li>
                 @endcan
                  @can('Bookings')
                   <li>
                      <a href="#sidebarBlo" data-bs-toggle="collapse">
                          <i class="fas fa-landmark"></i>
                          <span>Blog  </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarBlo">
                          <ul class="nav-second-level">
                              <li><a href="{{ route('blogs.index') }}">Lists</a></li>
                          </ul>
                      </div>
                   </li>
                 @endcan
                  {{-- @can('Reviews') --}}
                  <li>
                      <a href="#sidebarReview" data-bs-toggle="collapse">
                          <i class="fas fa-landmark"></i>
                          <span>Reviews  </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarReview">
                          <ul class="nav-second-level">
                              <li><a href="{{ route('reviews.index') }}">Lists</a></li>
                          </ul>
                      </div>
                  </li>
                    {{-- @endcan --}}
                  <li>
                    <a href="{{ route('tenant-reports.index') }}">
                        <i class="fas fa-desktop"></i>
                        <span> Report List </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contacts.index') }}">
                        <i class="fas fa-desktop"></i>
                        <span> Contact List </span>
                    </a>
                </li>
                  {{-- @endcan --}}
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
                            <li><a href="{{ route('settings.general') }}">General Settings</a></li>

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
