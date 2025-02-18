<template>
    <!-- How It Work -->
    <section class="howit-work pt-5">
        <div class="container">
            <div class="section-heading text-center">
                <h2 style="color: white">How It Works</h2>
                <div class="sec-line">
                    <span class="sec-line1-work"></span>
                    <span class="sec-line2-work"></span>
                </div>
                <p style="color:white">Follow these 3 steps to book your place</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
                        <div class="work-card-icon">
                            <span>
                                <img src="/public/assets/frontend/img/icons/work-icon-1.svg" alt="icon">

                            </span>
                        </div>
                        <h4>Search for Location</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">
                        <div class="work-card-icon">
                            <span>
                                <img src="/public/assets/frontend/img/icons/work-icon-2.svg" alt="icon">
                            </span>
                        </div>
                        <h4>Select Property Type</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                        <div class="work-card-icon">
                            <span>
                                <img src="/public/assets/frontend/img/icons/work-icon-3.svg" alt="icon">
                            </span>
                        </div>
                        <h4>Rental Validation</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                        <div class="work-card-icon">
                            <span>
                                <img src="/public/assets/frontend/img/icons/work-icon-3.svg" alt="icon">
                            </span>
                        </div>
                        <h4>Book Your Property</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin.
                            Donec non odio…</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /How It Work -->
</template>

<script>
export default {
    data() {
        return {
            Property: ["Property Type", "Buy Property", "Rent Property"]
        }
    },
}
</script>