<template>
    <section class="property-type-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="section-heading">
                        <h2>Explore by Property Type</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed</p>
                    </div>
                    <div class="carousel-controls">
                        <button @click="prev" class="nav-btn">&#10094;</button>
                        <button @click="next" class="nav-btn">&#10095;</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <Carousel 
                        ref="carousel"
                        :items-to-show="4"
                        :snapAlign="'start'"
                        :wrap-around="false"
                        class="custom-carousel"
                    >
                        <Slide v-for="(property, index) in propertyTypes" :key="index">
                            <div class="property-card">
                                <div class="property-img">
                                    <img :src="property.image" :alt="property.name">
                                </div>
                                <div class="property-name">
                                    <h4>{{ property.name }}</h4>
                                    <p>{{ property.count }} Properties</p>
                                </div>
                            </div>
                        </Slide>
                    </Carousel>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import { Carousel, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";

const carousel = ref(null);

const propertyTypes = ref([
    { name: "Villas", count: 40, image: "/assets/frontend/img/icons/property-icon-1.svg" },
    { name: "Houses", count: 30, image: "/assets/frontend/img/icons/property-icon-2.svg" },
    { name: "Apartment", count: 35, image: "/assets/frontend/img/icons/property-icon-3.svg" },
    { name: "Houses", count: 30, image: "/assets/frontend/img/icons/property-icon-4.svg" },
    { name: "Villas", count: 40, image: "/assets/frontend/img/icons/property-icon-1.svg" },
    { name: "Apartment", count: 40, image: "/assets/frontend/img/icons/property-icon-2.svg" },
]);

const prev = () => {
    carousel.value.prev();
};

const next = () => {
    carousel.value.next();
};
</script>

<style scoped>
.property-type-sec {
    padding: 50px 0;
    background: #d71c37;
    position: relative;
}

.section-heading {
    color: white;
}

.carousel-controls {
    margin-top: 20px;
}

.nav-btn {
    background: white;
    color: #d71c37;
    border: none;
    padding: 4px 14px;
    font-size: 20px;
    cursor: pointer;
    margin-right: 10px;
    border-radius: 50%;
}

.property-card {
    background: white;
    border-radius: 10px;
    text-align: center;
    width: 196px;
    padding: 40px 20px;
    transition: 3.20s;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.property-img img {
    width: 90px;
    height: 90px;
    margin-bottom: 10px;
}

.property-name h4 {
    font-size: 18px;
    margin-bottom: 5px;
}

.property-name p {
    font-size: 14px;
    color: gray;
}
</style>
