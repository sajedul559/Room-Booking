<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const routeName = computed(() => page.url);

const loadOwlCarousel = computed(() => [
    'index',
    'rent-property-grid-sidebar',
    'rent-property-list-sidebar',
    'rent-details',
    'buy-details',
    'agency-details',
    'about-us'
].includes(routeName.value));

const loadAOS = computed(() => [
    'index',
    'blog-grid',
    'pricing',
    'faq',
    'gallery',
    'our-team',
    'testimonial',
    'terms-condition',
    'privacy-policy'
].includes(routeName.value));

const loadSliderRange = computed(() => [
    'rent-property-grid-sidebar',
    'rent-property-list-sidebar',
    'buy-property-grid-sidebar',
    'buy-property-list-sidebar'
].includes(routeName.value));

const loadFancybox = computed(() => [
    'rent-details',
    'buy-details',
    'gallery'
].includes(routeName.value));

const loadDatetimepicker = computed(() => routeName.value === 'rental-order-step3');
</script>

<template>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/frontend/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/frontend/plugins/fontawesome/css/all.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="/frontend/css/feather.css">

    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="/frontend/plugins/boxicons/css/boxicons.min.css">

    <!-- Owl Carousel CSS -->
    <link v-if="loadOwlCarousel" rel="stylesheet" href="/frontend/css/owl.carousel.min.css">

    <!-- AOS Animation CSS -->
    <link v-if="loadAOS" rel="stylesheet" href="/frontend/css/aos.css">

    <!-- Slider Range CSS -->
    <link v-if="loadSliderRange" rel="stylesheet" href="/frontend/plugins/range-slider/slider-range.css">

    <!-- Fancybox CSS -->
    <link v-if="loadFancybox" rel="stylesheet" href="/frontend/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Bootstrap Datetimepicker CSS -->
    <link v-if="loadDatetimepicker" rel="stylesheet" href="/frontend/css/bootstrap-datetimepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="/frontend/plugins/select2/css/select2.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/frontend/css/style.css">
    <link rel="stylesheet" href="/assets/frontend/css/custome.css">
</template>
