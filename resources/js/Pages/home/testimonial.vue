<template>
    <section class="testimonial-sec py-5">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Testimonials</h2>
                <p>What our happy clients say</p>
            </div>

            <div class="testimonial-container">
                <Carousel  :items-to-show="3" 
                    :breakpoints="breakpoints"
                    wrap-around
                    autoplay="3000"  
                    pause-autoplay-on-hover
                    transition="500">
                    <Slide v-for="(testimonial, index) in testimonials" :key="index">
                        <div class="testimonial-card">
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

                    <!-- Add Navigation -->
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
                { name: "Jack Nitzsche", image: "/img/user1.jpg", text: "Greatfsdfsdfsd fsfsdfsdfsdf fsfsdfsdfsd ggfsfsdfsdfsdfsd  fsfsdfsdfsdf sdfsdfsdf fsfsfsd fsfsfsf fsfsfggsfgsgsdgsdfgsdfsdfdfsdf bg ggsdfgsfsdgsdgsdgsdgsdgsdgsgsdg gsdgsgsgs service!" },
                { name: "Sofia Retz", image: "/img/user2.jpg", text: "Greatfsdfsdfsd fsfsdfsdfsdf fsfsdfsdfsd ggfsfsdfsdfsdfsd  fsfsdfsdfsdf sdfsdfsdf fsfsfsd fsfsfsf fsfsfggsfgsgsdgsdfgsdfsdfdfsdf bg ggsdfgsfsdgsdgsdgsdgsdgsdgsgsdg gsdgsgsgs service!" },
                { name: "John Doe", image: "/img/user3.jpg", text: "Greatfsdfsdfsd fsfsdfsdfsdf fsfsdfsdfsd ggfsfsdfsdfsdfsd  fsfsdfsdfsdf sdfsdfsdf fsfsfsd fsfsfsf fsfsfggsfgsgsdgsdfgsdfsdfdfsdf bg ggsdfgsfsdgsdgsdgsdgsdgsdgsgsdg gsdgsgsgs service!" }
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

<style scoped>


.carousel__prev:hover, .carousel__next:hover {
    background: #ff5a5f !important;
    color: #fff !important;
}

.carousel__prev {
    left: 55%;
}

.carousel__next {
    right: 55%;
}
.testimonial-card{
    width: 90%;
}
</style>
