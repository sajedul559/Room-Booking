<template>
    <!-- <loader-index></loader-index> -->
    
    <layouts-header></layouts-header>

    <home-banner></home-banner>

    <index-property-type></index-property-type>

    <index-feature-property></index-feature-property>

    <index-cities-list></index-cities-list>

    <index-feature-rent></index-feature-rent>

    <index-main-property></index-main-property>

    <testimonial-index></testimonial-index>

    <faq-index></faq-index>

    <layouts-footer></layouts-footer>
</template>

<script>
import Footer from "@/layouts/layouts-footer.vue";
import Header from "@/layouts/layouts-header.vue";
import Banner from "./home-banner.vue";
import PropertyType from "./property-type.vue";
// import FeatureProperty from "./index-feature-property.vue";
// import Cities from "./index-cities-list.vue";
// import FeatureRent from "./index-feature-rent.vue";
// import MainProperty from "./index-main-property.vue";
// import Testimonial from "./testimonial-index.vue";
// import Faq from "./faq-index.vue";

export default {
  components: {
    'layouts-footer': Footer,
    'layouts-header': Header,
    'home-banner': Banner,
    'property-type': PropertyType
  }
};
</script>