<template>
    <section class="agent-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="section-heading" data-aos="fade-down" data-aos-duration="2000">
                        <h2>Become a Real Estate Agent</h2>
                        <div class="sec-line">
                            <span class="sec-line1"></span>
                            <span class="sec-line2"></span>
                        </div>
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia 
                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="register-btn" data-aos="fade-down" data-aos-duration="2000">
                        <Link :href="route('register')" class="btn-primary">Register Now</Link>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-imgs">
            <img src="/assets/frontend/img/icons/blue-circle.svg" class="bg-06" alt="icon">
            <img src="/assets/frontend/img/icons/red-circle.svg" class="bg-07" alt="icon">
        </div>
    </section>
</template>

<script>
import { Link } from '@inertiajs/vue3'; // Import Inertia Link

export default {
    components: {
        Link,
    },
};
</script>
