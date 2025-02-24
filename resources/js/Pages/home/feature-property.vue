<template>
    <section class="feature-property-sec for-rent" id="available-room">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Featured Properties for Rent</h2>
          <div class="sec-line">
            <span class="sec-line1"></span>
            <span class="sec-line2"></span>
          </div>
          <p>Hand-picked selection of quality places</p>
        </div>
  
        <!-- Property Cards Grid -->
        <div class="row justify-content-center">
          <div v-for="(property, index) in properties" :key="index" class="col-md-4 mb-4">
            <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
              <div class="profile-widget">
                <div class="doc-img">
                  <a href="{{ url('rent-details') }}" class="property-img">
                    <img class="img-fluid" :src="property.image" alt="Property Image">
                  </a>
                  <div class="featured" v-if="property.featured">
                    <span>Featured</span>
                  </div>
                  <div class="new-featured" v-if="property.new">
                    <span>New</span>
                  </div>
                </div>
                <div class="pro-content">
                  <div class="rating">
                    <span class="rating-count">
                      <i class="fa-solid fa-star checked"></i>
                      <i class="fa-solid fa-star checked"></i>
                      <i class="fa-solid fa-star checked"></i>
                      <i class="fa-solid fa-star checked"></i>
                      <i class="fa-solid fa-star checked"></i>
                    </span>
                    <span class="rating-review">Excellent</span>
                  </div>
                  <h3 class="title">
                    <a href="{{ url('rent-details') }}">{{ property.title }}</a>
                  </h3>
                  <p><i class="feather-map-pin"></i> {{ property.location }}</p>
                  <ul class="d-flex details">
                    <li>
                      <img src="/public/assets/frontend/img/icons/bed-icon.svg" alt="bed-icon">
                      {{ property.beds }} Beds
                    </li>
                    <li>
                      <img src="/public/assets/frontend/img/icons/bath-icon.svg" alt="bath-icon">
                      {{ property.baths }} Baths
                    </li>
                    <li>
                      <img src="/public/assets/frontend/img/icons/building-icon.svg" alt="building-icon">
                      {{ property.size }} Sqft
                    </li>
                  </ul>
                  <ul class="property-category d-flex justify-content-between align-items-center">
                    <li>
                      <a href="{{ url('rent-details') }}" class="btn-primary">View Rooms</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <!-- View All Properties Button -->
        <div class="view-property-btn d-flex justify-content-center" data-aos="fade-down" data-aos-duration="2000">
          <a href="{{ url('rent-property-grid') }}" class="btn-primary">View All Properties</a>
        </div>
      </div>
    </section>
  </template>
  
  <script>
  export default {
    data() {
      return {
        properties: [
          {
            image: "/assets/frontend/img/product/room1.jpg",
 
            title: "Beautiful Condo Room",
            location: "318-S Oakley Blvd, Chicago, IL 60612, USA",
            beds: 4,
            baths: 4,
            size: "35000",
            featured: true,
            new: true,
          },
          {
            image: "/assets/frontend/img/product/room5.jpg",
            title: "Luxury Villa",
            location: "456 Elm Street, LA, USA",
            beds: 5,
            baths: 3,
            size: "50000",
            featured: true,
            new: false,
          },
          {
            image: "/assets/frontend/img/product/room6.jpg",
            title: "Modern Apartment",
            location: "789 Maple Ave, NYC, USA",
            beds: 3,
            baths: 2,
            size: "25000",
            featured: false,
            new: false,
          },
        ],
      };
    },
  };
  </script>
  
  