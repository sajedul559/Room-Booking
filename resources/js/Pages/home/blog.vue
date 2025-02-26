<template>
    <section class="latest-blog-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="section-heading text-center">
                        <h2>Latest Blog</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Vue 3 Carousel -->
                    <Carousel 
                         ref="carousel" 
                        :items-to-show="3" 
                       
                        :transition="500"
                        class="custom-carousel "
                    >
                        <Slide v-for="(blog, index) in blogs" :key="index">
                            <div class="blog-card"  data-aos="fade-down" data-aos-duration="2000">
                                <div class="blog-img">
                                    <a :href="blog.url"><img :src="blog.image" alt="Blog Image"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-property">
                                        <span class="category-badge">{{ blog.category }}</span>
                                    </div>
                                    <div class="blog-title">
                                        <h3><a :href="blog.url">{{ blog.title }}</a></h3>
                                        <p>{{ blog.description }}</p>
                                    </div>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="javascript:void(0);">
                                                <img :src="blog.authorImage" class="img-fluid avatar" alt="User">
                                            </a>
                                            <div class="user-name">
                                                <h6><a href="javascript:void(0);">{{ blog.author }}</a></h6>
                                                <p>Posted on : {{ blog.date }}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a :href="blog.url">
                                                <span class="arrow-icon"><i class='fa-solid fa-arrow-right'></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </Slide>
                        <template #addons>
                            <div class="custom-pagination">
                                <button @click="$refs.carousel.prev()" class="prev-dot"></button>
                                <button @click="$refs.carousel.next()" class="next-dot"></button>
                            </div>
                        </template>
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

const blogs = ref([
    {
        title: "How to achieve financial independence",
        description: "There are many variations of passages of lorem ipsum available.",
        image: "/assets/frontend/img/blog/blog1.jpg",
        category: "Property",
        author: "Doe John",
        authorImage: "/assets/frontend/img/profiles/user1.jpg",
        date: "15 Jan 2023",
        url: "/blog-details",
    },
    {
        title: "The most popular cities for homebuyers",
        description: "There are many variations of passages of lorem ipsum available.",
        image: "/assets/frontend/img/blog/blog2.jpg",
        category: "Advantages",
        author: "John",
        authorImage: "/assets/frontend/img/profiles/user3.jpg",
        date: "15 Jan 2023",
        url: "/blog-details",
    },
    {
        title: "Learn how real estate really shapes",
        description: "There are many variations of passages of lorem ipsum available.",
        image: "/assets/frontend/img/blog/blog1.jpg",
        category: "Finance",
        author: "Eric Krok",
        authorImage: "/assets/frontend/img/profiles/user2.jpg",
        date: "15 Jan 2023",
        url: "/blog-details",
    },
    {
        title: "Learn how real estate really shapes",
        description: "There are many variations of passages of lorem ipsum available.",
        image: "/assets/frontend/img/blog/blog1.jpg",
        category: "Finance",
        author: "Eric Krok",
        authorImage: "/assets/frontend/img/profiles/user2.jpg",
        date: "15 Jan 2023",
        url: "/blog-details",
    },
    {
        title: "How to achieve financial independence",
        description: "There are many variations of passages of lorem ipsum available.",
        image: "/assets/frontend/img/blog/blog1.jpg",
        category: "Property",
        author: "Doe John",
        authorImage: "/assets/frontend/img/profiles/user1.jpg",
        date: "15 Jan 2023",
        url: "/blog-details",
    },
]);
</script>

<style scoped>
.latest-blog-sec{
    background-color: #f6f6f9;
}
.blog-card  {
   margin-right:20px;
}
.blog-card .blog-img img {
    display: block;
    width: 100%;
}
/* Blog Card */
.blog-card .blog-img img{
  margin-right: 20px;
}
.blog-card .blog-content .blog-title {
    margin: 0 0 20px;
    padding: 0 0 20px;
    border-bottom: 1px solid #E3E3E3;
}
.blog-card .blog-content .blog-title p {
  text-align: left;
}
.blog-card .blog-content .blog-property {
    margin-bottom: 20px;
    text-align: left;
}
.property-category .user-info .user-name {
    flex-direction: column;
    overflow: hidden;
    text-align: left;
}

/* Carousel Spacing */
.custom-carousel .carousel__viewport {
    display: flex;
    gap: 20px;
}

/* Custom Pagination */
.custom-pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
.carousel__slide{
    display:unset !important;
}

.prev-dot,
.next-dot {
    width: 15px;
    height: 15px;
    background: #d71c37;
    border-radius: 50%;
    border: none;
    cursor: pointer;
    margin: 0 10px;
    transition: background 0.3s;
}

.prev-dot:hover,
.next-dot:hover {
    background: #a50e22;
}
</style>
