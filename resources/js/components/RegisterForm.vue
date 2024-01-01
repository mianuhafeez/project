<template>
    <form @submit.prevent="submitForm" method="POST" class="register-form" id="register-form">
        <h2 class="form-title">Sign up</h2>

        <div v-if="successMessage" class="alert alert-success" role="alert">
            {{ successMessage }}
        </div>

        <form-field v-model="form.name" label="Your Name" name="name" :error="errors.name" icon="zmdi-account"/>
        <form-field v-model="form.email" label="Your Email" name="email" :error="errors.email" icon="zmdi-email"/>
        <form-field v-model="form.password" label="Password" name="password" type="password" :error="errors.password"
                    icon="zmdi-lock"/>
        <form-field
            v-model="form.password_confirmation"
            label="Repeat your password"
            name="password_confirmation"
            type="password"
            :error="errors.password_confirmation"
            icon="zmdi-lock-outline"
        />
        <form-field-checkbox v-model="form.agree" name="agree-term" :error="errors.agree">I agree all statements in <a
            href="#" class="term-service">Terms of service</a>
        </form-field-checkbox>
        <div class="form-group form-button">
            <button type="submit" name="signup" id="signup" class="form-submit">Register</button>
        </div>
    </form>
</template>

<script>
import {ref} from 'vue';
import axios from 'axios';
import FormField from '@/components/common/FormField.vue';
import FormFieldCheckbox from '@/components/common/FormFieldCheckbox.vue';

export default {
    components: {
        FormField,
        FormFieldCheckbox
    },
    setup() {
        const form = ref({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            agree: false,
        });

        const errors = ref({});
        const successMessage = ref('');

        const resetForm = () => {
            form.value = Object.fromEntries(
                Object.entries(form.value).map(([key, value]) => [key, typeof value === 'boolean' ? false : ''])
            );
        };

        const submitForm = async () => {
            try {
                successMessage.value = '';
                errors.value = {};
                const response = await axios.post('/register', form.value);
                successMessage.value = response.data.message;
                resetForm();
            } catch (error) {
                handleApiError(error);
            }
        };

        const handleApiError = (error) => {
            if (error.response) {
                if (error.response.status === 422 && error.response.data.errors) {
                    errors.value = error.response.data.errors;
                } else {
                    console.error('Registration failed:', error.response.data.message);
                }
            } else if (error.request) {
                // The request was made, but no response was received
                console.error('No response received from the server.');
            } else {
                // Something happened in setting up the request that triggered an Error
                console.error('Error setting up the request:', error.message);
            }
        };
        return {form, errors, successMessage, submitForm};
    },
};
</script>
