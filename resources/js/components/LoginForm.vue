<template>
    <form @submit.prevent="submitForm" method="POST" class="login-form" id="login-form">
        <h2 class="form-title">Sign in</h2>
        <form-field v-model="form.email" label="Your Email" name="email" :error="errors.email" icon="zmdi-email"/>
        <form-field
            v-model="form.password" label="Password" name="password" type="password" :error="errors.password"
            icon="zmdi-lock"/>
        <div class="form-group form-button">
            <button type="submit" name="login" id="login" class="form-submit">Login</button>
        </div>
    </form>
</template>
<script>
import {ref} from 'vue';
import FormField from '@/components/common/FormField.vue';
import { useForm } from  '@inertiajs/vue3'

export default {
    components: {
        FormField,
    },
    setup() {
        const form = useForm({
            email: '',
            password: '',
        });

        const resetForm = () => {
            form.reset();
            errors.value = {};
        };

        const errors = ref({});
        const errorMessage = ref('');

        const submitForm = () => {
            form.post('/login', {
                onSuccess: () => {
                    resetForm();
                    window.location.href = '/';
                },
                onError: (error) => {
                    errors.value = form.errors;
                }
            });
        };
        return {form, errors, errorMessage, submitForm};
    },
};
</script>
