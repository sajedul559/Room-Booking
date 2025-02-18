<template>
  <header class="header header-fix">
    <nav class="navbar navbar-expand-lg header-nav">
      <div class="navbar-header">
        <a @click="toggleMobileMenu" href="javascript:void(0);">
          <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </a>
        <Link href="/" class="navbar-brand logo">
          <img src="/public/frontend/img/logo.svg" class="img-fluid" alt="Logo">
        </Link>
      </div>

      <div class="main-menu-wrapper">
        <div class="menu-header">
          <Link href="/" class="menu-logo">
            <img src="/public/frontend/img/logo.svg" class="img-fluid" alt="Logo">
          </Link>
          <a @click="toggleMobileMenu" class="menu-close" href="javascript:void(0);">
            <i class="fas fa-times"></i>
          </a>
        </div>

        <ul class="main-nav">
          <li class="has-submenu" :class="{ active: isActive('room') }">
            <a :style="{ color: '#fff' }" href="javascript:void(0);">Student Accommodation <i class="fas fa-chevron-down"></i></a>
            <ul :style="{ backgroundColor: '#DA1F43' }" class="submenu">
              <li>
                <Link   href="/room" :class="{ active: isActive('room') }">RoomingKos Dudley</Link>
              </li>
              <li>
                <Link  href="/room" :class="{ active: isActive('room') }">RoomingKos Swanston</Link>
              </li>
            </ul>
          </li>
          <li :class="{ active: isActive('room') }">
            <Link :style="{ color: '#fff' }" href="/room">Rooming House</Link>
          </li>
          <li :class="{ active: isActive('about-us') }">
            <Link :style="{ color: '#fff' }" href="/about-us">About</Link>
          </li>

          <!-- Authenticated User Links -->
          <!-- <template v-if="isAuthenticated">
            <li v-if="userType == 'user'" class="new-property-btn">
              <Link href="/tenant-reports/create">
                <i class="bx bxs-plus-circle"></i> Create Report
              </Link>
            </li>
            <li class="new-property-btn">
              <a @click="logout">
                <i class="bx bx-log-out"></i> Logout
              </a>
            </li>
          </template> -->

          <!-- Guest Links -->
          <!-- <template v-else>
            <li :class="{ active: isActive('register') }">
              <Link href="/register" class="btn btn-primary">
                <i class="feather-user-plus"></i> Sign Up
              </Link>
            </li>
            <li :class="{ active: isActive('login') }">
              <Link href="/login" class="btn sign-btn">
                <i class="feather-unlock"></i> Sign In
              </Link>
            </li>
          </template> -->
        </ul>
      </div>
      <ul class="nav header-navbar-rht">
               
                <!-- Authenticated User Links -->
          <template v-if="isAuthenticated">
            <li v-if="userType == 'user'" class="new-property-btn">
              <Link href="/tenant-reports/create">
                <i class="bx bxs-plus-circle"></i> Create Report
              </Link>
            </li>
            <li class="new-property-btn">
              <a @click="logout">
                <i class="bx bx-log-out"></i> Logout
              </a>
            </li>
          </template>

          <!-- Guest Links -->
          <template v-else>
            <li :class="{ active: isActive('register') }">
              <Link href="/register" class="btn btn-primary">
                <i class="feather-user-plus"></i> Sign Up
              </Link>
            </li>
            <li :class="{ active: isActive('login') }">
              <Link href="/login" class="btn sign-btn">
                <i class="feather-unlock"></i> Sign In
              </Link>
            </li>
          </template>
               
      </ul>
    </nav>
  </header>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage, Link } from '@inertiajs/vue3';

const logoUrl = '/frontend/img/logo.svg';
const page = usePage();
const menuOpen = ref(false);
const userType = computed(() => page.props.auth?.user?.type || null);
const isAuthenticated = computed(() => !!page.props.auth?.user);
const isAuthRoute = computed(() => ['reset-password', 'forgot-password', 'login', 'register', 'coming-soon', 'error-404', 'error-500', 'maintenance'].includes(page.component));

const toggleMenu = () => {
  menuOpen.value = !menuOpen.value;
};

const isActive = (route) => page.url.startsWith(`/${route}`);

const logout = () => {
  Inertia.post('/logout');
};
</script>


<style>
.header {
  background-color: #da1f43;
}

.main-nav a {
  color: white;
}

.new-property-btn a {
  color: white;
}
</style>
