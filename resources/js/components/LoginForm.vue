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
import axios from 'axios';
import FormField from '@/components/common/FormField.vue';

export default {
    components: {
        FormField,
    },
    setup() {
        const form = ref({
            email: '',
            password: '',
        });

        const errors = ref({});
        const errorMessage = ref('');

        const submitForm = async () => {
            try {
                errorMessage.value = '';
                errors.value = {};
                const response = await axios.post('/login', form.value);
                if (response.status === 200) {
                    localStorage.setItem('token', response.data.token);
                    window.location.href = '/';
                } else {
                    // Unexpected response status
                    console.error('Unexpected response status:', response.status);
                }
            } catch (error) {
                handleApiError(error);
            }
        };

        const handleApiError = (error) => {
            if (error.response) {
                if (error.response.status === 422 && error.response.data.errors) {
                    errors.value = error.response.data.errors;
                } else {
                    console.error('Login failed:', error.response.data.message);
                    errorMessage.value = 'Invalid credentials';
                }
            } else if (error.request) {
                // The request was made, but no response was received
                console.error('No response received from the server.');
            } else {
                // Something happened in setting up the request that triggered an Error
                console.error('Error setting up the request:', error.message);
            }
        };
        return {form, errors, errorMessage, submitForm};
    },
};
</script>
