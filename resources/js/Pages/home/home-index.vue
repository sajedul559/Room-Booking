<template>
  <loader-index></loader-index>
  
  <style-css></style-css>
  <layouts-header></layouts-header>

  <home-banner></home-banner>
  <how-work></how-work>
  <explore></explore>

  <!-- <property-type></property-type> -->

  <feature-property></feature-property>

  <!-- <index-cities-list></index-cities-list> -->

  <!-- <index-feature-rent></index-feature-rent> -->


  <testimonial></testimonial>
  <blog></blog>

  <faq-index></faq-index>

  <layouts-footer></layouts-footer>
</template>
<script>
import StyleCss from "@/layouts/style-css.vue";
import Footer from "@/layouts/layouts-footer.vue";
import Header from "@/layouts/layouts-header.vue";
import Banner from "./home-banner.vue";
import Work from "./how-work.vue";
import Explore from "./explore.vue";
import FeatureProperty from "./feature-property.vue";
import PropertyType from "./property-type.vue";
import Faq from "./faq-index.vue";
import Blog from "./blog.vue";

// import FeatureProperty from "./index-feature-property.vue";
// import Cities from "./index-cities-list.vue";
// import FeatureRent from "./index-feature-rent.vue";
// import MainProperty from "./index-main-property.vue";
import Testimonial from "./testimonial.vue";
// import Faq from "./faq-index.vue";

export default {
  components: {
    'layouts-footer': Footer,
    'layouts-header': Header,
    'home-banner': Banner,
    'how-work': Work,
    'explore': Explore,
    'feature-property': FeatureProperty,
    'property-type': PropertyType,
    'testimonial': Testimonial,
    'faq-index': Faq,
    'blog': Blog
  }
};
</script>