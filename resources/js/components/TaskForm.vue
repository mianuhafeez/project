<template>
    <div>
        <form @submit.prevent="submitForm" method="POST" class="register-form" id="task-form">
            <div class="card">
                <div class="card-body p-4">
                    <h2 class="form-title mb-2">Add Todo</h2>
                    <form-field
                        v-model="form.name"
                        label="Todo Name"
                        name="todo-name"
                        :error="errors.name"
                        icon="zmdi-assignment"
                    />
                    <form-field-select
                        v-model="form.priority"
                        label="Select Priority"
                        name="priority"
                        :options="['HIGH', 'MED', 'LOW']"
                        :error="errors.priority"
                        icon="zmdi-alert-triangle"
                    />
                    <form-field-select
                        v-model="form.team"
                        label="Select Team"
                        name="select-team"
                        :options="['John Smith', 'Claire Peters', 'Allen Collins', 'Cory Carter', 'Rochelle Barton']"
                        :error="errors.team"
                        icon="zmdi-accounts"
                    />
                    <VueDatePicker
                        v-model="form.due_date"
                        class="mb-3"
                        placeholder="Enter Due Date"
                        format="Y-m-d"/>
                    <form-field-textarea
                        v-model="form.description"
                        label="Description"
                        name="description"
                        :error="errors.description"
                        icon="zmdi-comment-text"
                    />
                    <div class="form-group form-button d-flex justify-content-end">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary form-button-primary"
                                style="margin-right: 10px;">Submit
                        </button>
                        <button type="button" name="cancel" id="cancel" class="btn btn-outline-secondary"
                                @click="resetForm">Cancel
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import axios from 'axios';
import FormField from '@/components/common/FormField.vue';
import FormFieldSelect from '@/components/common/FormFieldSelect.vue';
import FormFieldTextarea from '@/components/common/FormFieldTextarea.vue';

const form = ref({
    name: '',
    priority: '',
    team: '',
    description: '',
    due_date: '',
});

const errors = ref({});
const successMessage = ref('');

const resetForm = () => {
    form.value = Object.fromEntries(
        Object.entries(form.value).map(([key, value]) => [key, ''])
    );
    errors.value = {};
    successMessage.value = '';
};

const submitForm = async () => {
    try {
        errors.value = {};
        await axios.post('/api/tasks', form.value);
        window.location.href = '/';
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
            console.error('Task creation failed:', error.response.data.message);
        }
    } else if (error.request) {
        console.error('No response received from the server.');
    } else {
        console.error('Error setting up the request:', error.message);
    }
};
</script>

<style>


</style>
