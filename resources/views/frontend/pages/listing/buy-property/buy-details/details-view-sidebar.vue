<template>
  <div class="col-lg-4 theiaStickySidebar">
    <div class="stickysidebar">
      <div class="right-sidebar">
        <!-- Schedule a Visit -->
        <div class="sidebar-card">
          <div class="contact-btn contact-btn-new">
            <router-link to="/buy/buy-details"><i class="feather-info"></i>Request Info</router-link>
            <router-link to="/buy/buy-detail-view" class="active"><i class="feather-video"></i>Schedule a
              Visit</router-link>
          </div>
          <div class="calender mb-0">
            <h6 class="user-info">Select Day</h6>
          </div>
          <div class="arrival-div">
            <ul>
              <li>
                <input type="radio" id="radio1" name="Arrival" />
                <label for="radio1">Tue<span>21</span>Feb</label>
              </li>
              <li>
                <input type="radio" id="radio2" name="Arrival" checked="" />
                <label for="radio2">Wed<span>22</span>Feb</label>
              </li>
              <li>
                <input type="radio" id="radio3" name="Arrival" />
                <label for="radio3">Thur<span>23</span>Feb</label>
              </li>
              <li>
                <input type="radio" id="radio4" name="Arrival" />
                <label for="radio4">Feb<span>24</span>Feb</label>
              </li>
              <li>
                <input type="radio" id="radio5" name="Arrival" />
                <label for="radio5">Sat<span>25</span>Feb</label>
              </li>
            </ul>
          </div>
          <div class="review-form">
            <select class="select">
              <option value="0">Select Time</option>
              <option value="1">10 AM - 12 PM</option>
              <option value="2">12 PM - 2 PM</option>
              <option value="2">02 PM - 04 PM</option>
            </select>
          </div>
          <h6 class="user-info">Your Information</h6>
          <div class="review-form">
            <input type="text" class="form-control" placeholder="Your Name" />
          </div>
          <div class="review-form">
            <input type="email" class="form-control" placeholder="Your Email" />
          </div>
          <div class="review-form">
            <input type="text" class="form-control" placeholder="Your Phone Number" />
          </div>
          <div class="review-form">
            <textarea rows="5" placeholder="Yes, I'm Interested"></textarea>
          </div>
          <div class="review-form submit-btn">
            <button type="submit" class="btn-primary">Send Email</button>
          </div>
          <ul class="connect-us">
            <li>
              <a href="javascript:void(0);"><i class="feather-phone"></i>Call Us</a>
            </li>
            <li>
              <a href="javascript:void(0);"><i class="fa-brands fa-whatsapp"></i>Whatsapp</a>
            </li>
          </ul>
        </div>
        <!-- /Request Info -->

        <!-- Listing Owner Details -->
        <div class="sidebar-card">
          <div class="sidebar-card-title">
            <h5>Listing Owner Details</h5>
          </div>
          <div class="user-active bg-white p-0">
            <div class="user-img">
              <a href="javascript:void(0);"><img class="avatar" src="@/assets/img/profiles/avatar-03.jpg"
                  alt="Image" /></a>
            </div>
            <div class="user-name">
              <h4><a>John Collins</a></h4>
              <div class="rating">
                <span class="rating-count d-inline-flex">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                </span>
                <span class="rating-review">5.0 (20 Reviews)</span>
              </div>
            </div>
          </div>
          <ul class="list-details">
            <li>No of Listings <span>05</span></li>
            <li>No of Bookings<span>225</span></li>
            <li>Memeber on<span>15 Jan 2024</span></li>
            <li>Verification<span>Verified</span></li>
          </ul>
        </div>
        <!-- /Listing Owner Details -->

        <!-- Share Property -->
        <div class="sidebar-card">
          <div class="sidebar-card-title">
            <h5>Share Property</h5>
          </div>
          <div class="social-links">
            <ul class="sidebar-social-links">
              <li>
                <a href="javascript:void(0);" class="fb-icon"><i class="fa-brands fa-facebook-f hi-icon"></i></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="ins-icon"><i class="fa-brands fa-instagram hi-icon"></i></a>
              </li>
              <li>
                <a href="javascript:void(0);"><i class="fa-brands fa-behance hi-icon"></i></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="twitter-icon"><i class="fa-brands fa-twitter hi-icon"></i></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="ins-icon"><i class="fa-brands fa-pinterest-p hi-icon"></i></a>
              </li>
              <li>
                <a href="javascript:void(0);"><i class="fa-brands fa-linkedin hi-icon"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /Share Property -->

        <!-- Mortarage Calculator -->
        <div class="sidebar-card">
          <div class="sidebar-card-title">
            <h5>Mortarage Calculator</h5>
          </div>
          <div class="review-form">
            <label>Total Amount ($)</label>
            <input type="text" class="form-control" placeholder="150000000" />
          </div>
          <div class="review-form">
            <label>Down Payment ($)</label>
            <input type="text" class="form-control" placeholder="1000000" />
          </div>
          <div class="review-form">
            <label>Loan Terms (Years)</label>
            <input type="text" class="form-control" placeholder="2" />
          </div>
          <div class="review-form">
            <label>Interest Rate (%)</label>
            <input type="text" class="form-control" placeholder="15" />
          </div>
          <div class="review-form submit-btn">
            <button type="submit" class="btn-primary">Send Email</button>
          </div>
          <div class="reset-btn">
            <a href="javascript:void(0);">Reset Form</a>
          </div>
        </div>
        <!-- /Mortarage Calculator -->

        <!-- Slider -->
        <div class="sidebar-img-slider owl-carousel">
          <Carousel :wrap-around="true" :settings="settings" :breakpoints="breakpoints">
            <Slide v-for="record in Details_Sidebar" :key="record.id">
              <div class="slide-img-card">
                <div class="slide-img">
                  <img :src="require(`@/assets/img/${record.Image}`)" alt="Image" />
                </div>
                <div class="property-name">
                  <h3>{{ record.Name }}</h3>
                  <span><i class="feather-map-pin"></i>{{ record.Location }}</span>
                  <div class="star-rate">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </Slide>
            <template #addons>
              <Navigation />
            </template>
          </Carousel>
        </div>
        <!-- /Slider -->
      </div>
    </div>
  </div>
</template>
<script>
import { Carousel, Navigation, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";
import Details_Sidebar from "@/assets/json/details-sidebar.json";
export default {
  data() {
    return {
      Details_Sidebar: Details_Sidebar,
      settings: {
        itemsToShow: 1,
        snapAlign: "center",
      },
      breakpoints: {
        575: {
          itemsToShow: 1,
          snapAlign: "center",
        },
        767: {
          itemsToShow: 1,
          snapAlign: "center",
        },
        991: {
          itemsToShow: 2,
          snapAlign: "center",
        },
        1024: {
          itemsToShow: 1,
          snapAlign: "start",
        },
      },
    };
  },
  components: {
    Carousel,
    Slide,
    Navigation,
  },
};
</script>
