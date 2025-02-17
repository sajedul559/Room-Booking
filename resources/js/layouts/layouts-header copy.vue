<template>
  <header v-if="!isAuthRoute" class="header header-fix">
    <nav class="navbar navbar-expand-lg header-nav">
      <div class="navbar-header">
        <Link href="/" class="navbar-brand logo">
          <img class="img-fluid" src="/public/frontend/img/logo.svg" alt="Logo" />
        </Link>
      </div>
      <div :class="['main-menu-wrapper', { active: menuOpen }]">
        <ul class="main-nav">
          <li :class="{ active: isActive('room') }">
            <Link href="/room">Rooming House</Link>
          </li>
          <li :class="{ active: isActive('about-us') }">
            <Link href="/about-us">About</Link>
          </li>
          <template v-if="isAuthenticated">
            <li v-if="userType === 'user'" class="new-property-btn">
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
          <template v-else>
            <li :class="{ active: isActive('register') }">
              <Link href="/register" class="btn btn-primary">
                <i class="feather-user-plus"></i>Sign Up
              </Link>
            </li>
            <li :class="{ active: isActive('login') }">
              <Link href="/login" class="btn sign-btn">
                <i class="feather-unlock"></i>Sign In
              </Link>
            </li>
          </template>
        </ul>
      </div>
    </nav>
  </header>
  <header v-else class="log-header">
    <Link href="/">
      <img class="img-fluid logo-dark"  src="/public/frontend/img/logo.svg" alt="Logo" />
    </Link>
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
  background-color: #DA1F43;
}
.main-nav a {
  color: white;
}
.new-property-btn a {
  color: white;
}
</style>
