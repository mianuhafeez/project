<template>
    <form @submit.prevent="submitForm" method="POST" class="register-form" id="register-form">
        <h2 class="form-title">Sign up</h2>

        <!-- Display success message if registration was successful -->
        <div v-if="successMessage" class="alert alert-success" role="alert">
            {{ successMessage }}
        </div>

        <!-- Form fields using custom components -->
        <form-field v-model="form.name" label="Your Name" name="name" :error="errors.name" icon="zmdi-account" />
        <form-field v-model="form.email" label="Your Email" name="email" :error="errors.email" icon="zmdi-email" />
        <form-field v-model="form.password" label="Password" name="password" type="password" :error="errors.password" icon="zmdi-lock" />
        <form-field v-model="form.password_confirmation" label="Repeat your password" name="password_confirmation" type="password" :error="errors.password_confirmation" icon="zmdi-lock-outline" />
        <form-field-checkbox v-model="form.agree" name="agree-term" :error="errors.agree">I agree all statements in <a href="#" class="term-service">Terms of service</a></form-field-checkbox>

        <div class="form-group form-button">
            <button type="submit" name="signup" id="signup" class="form-submit">Register</button>
        </div>
    </form>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from  '@inertiajs/vue3'
import FormField from '@/components/common/FormField.vue';
import FormFieldCheckbox from '@/components/common/FormFieldCheckbox.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    agree: false,
});

const errors = ref({});
const successMessage = ref('');

const resetForm = () => {
    form.reset();
    errors.value = {};
};

const submitForm = () => {
    form.post('/register', {
        onSuccess: () => {
            resetForm();
            window.location.href = '/';
        },
        onError: (error) => {
            errors.value = form.errors;
        }
    });
};

// Registering components globally
const components = {
    FormField,
    FormFieldCheckbox
};
</script>
