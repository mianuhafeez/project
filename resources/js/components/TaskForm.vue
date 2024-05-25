<template>
    <div>
        <form @submit.prevent="submitForm" method="POST" class="register-form" id="task-form">
            <div class="">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-4">Add Todo</h2>
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
                        class="mb-4"
                        placeholder="Enter Due Date"
                        format="Y-m-d"
                        wrapper-class="w-full"
                    />
                    <form-field-textarea
                        v-model="form.description"
                        label="Description"
                        name="description"
                        :error="errors.description"
                        icon="zmdi-comment-text"
                    />
                    <div class="flex justify-end mt-6">
                        <button type="submit" name="submit" id="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Submit</button>
                        <button type="button" name="cancel" id="cancel" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" @click="resetForm">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from  '@inertiajs/vue3'
import FormField from '@/components/common/FormField.vue';
import FormFieldSelect from '@/components/common/FormFieldSelect.vue';
import FormFieldTextarea from '@/components/common/FormFieldTextarea.vue';

const form = useForm({
    name: '',
    priority: '',
    team: '',
    description: '',
    due_date: '',
});

const errors = ref({});

const resetForm = () => {
    form.reset();
    errors.value = {};
};

const submitForm = () => {
    form.post('/tasks', {
        onSuccess: () => {
            resetForm();
            window.location.href = '/';
        },
        onError: (error) => {
            console.log( form.errors);
            errors.value = form.errors;
        }
    });
};
</script>

<style>

</style>
