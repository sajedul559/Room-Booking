<template>
    <section class="testimonial-sec py-5">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Testimonials</h2>
                <p>What our happy client says</p>
            </div>
            <div class="testimonial-container">
                <Carousel 
                    :items-to-show="3" 
                    :breakpoints="breakpoints" 
                    wrap-around
                >
                    <Slide v-for="(testimonial, index) in testimonials" :key="index">
                        <div class="testimonial-card" data-aos="fade-down" data-aos-duration="2000">
                            <div class="user-icon">
                                <img :src="testimonial.image" alt="User">
                            </div>
                            <p>{{ testimonial.text }}</p>
                            <h4>{{ testimonial.name }}</h4>
                            <div class="rating">
                                <span v-for="star in 5" :key="star">
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </div>
                        </div>
                    </Slide>
                    <!-- Navigation & Pagination -->
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </div>
        </div>
    </section>
</template>

<script>
import { Carousel, Navigation, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";

export default {
    components: { Carousel, Slide, Navigation },
    data() {
        return {
            testimonials: [
                {
                    name: "Jack Nitzsche",
                    image: "/assets/frontend/img/profiles/user1.jpg",
                    text: "Omnis velit quia. Perspiciatis et cupiditate...",
                },
                {
                    name: "Sofia Retz",
                    image: "/assets/frontend/img/profiles/user2.jpg",
                    text: "Omnis velit quia. Perspiciatis et cupiditate...",
                },
                {
                    name: "John Doe",
                    image: "/assets/frontend/img/profiles/user3.jpg",
                    text: "Omnis velit quia. Perspiciatis et cupiditate...",
                }
            ],
            breakpoints: {
                575: { itemsToShow: 1 },
                767: { itemsToShow: 2 },
                1024: { itemsToShow: 3 }
            }
        };
    }
}
</script>


