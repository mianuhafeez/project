<template xmlns="http://www.w3.org/1999/html">
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../../../images/signin.jpg" alt="sing up image"/></figure>
                        <inertia-link href="/register" class="signup-image-link">Create an account</inertia-link>
                    </div>
                    <div class="signin-form">
                        <login-form></login-form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import LoginForm from "../../Components/LoginForm.vue";
import { Link as InertiaLink } from  '@inertiajs/vue3'

export default {
    components: {
        LoginForm,
        InertiaLink
    }
}
</script>
