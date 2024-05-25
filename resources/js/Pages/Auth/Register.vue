<template>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <register-form></register-form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../../../images/signup-image.jpg" alt="sing up image"></figure>
                        <inertia-link href="/login" class="signup-image-link">I am already member</inertia-link>
                        <div class="social-login">
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import RegisterForm from "../../Components/registerForm.vue";
import { Link as InertiaLink } from  '@inertiajs/vue3'

export default {
    components: {
        RegisterForm,
        InertiaLink
    }
}
</script>
