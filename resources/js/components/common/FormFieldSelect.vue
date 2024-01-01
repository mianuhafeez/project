<template>
    <div class="form-group">
        <div class="input-container">
            <label :for="name"><i :class="iconClass"></i></label>
            <select :name="name" :id="name" class="form-control show-tick todo-input"
                    :value="modelValue" @change="handleInput($event, $emit)">
                <option value="" disabled> {{ label }}</option>
                <option v-for="(option, index) in options" :key="index" :value="option">{{ option }}</option>
            </select>
        </div>
        <div v-if="error.length > 0" class="error">{{ error[0] }}</div>
    </div>
</template>

<script setup>
import {defineProps, computed} from 'vue';

const props = defineProps({
    modelValue: {
        type: String,
        default: '',
    },
    name: {
        type: String,
        required: true,
    },
    options: {
        type: Array,
        default: () => [],
    },
    error: {
        type: Array,
        default: () => [],
    },
    icon: {
        type: String,
        default: 'zmdi-account',
    },
    label: {
        type: String,
        required: true,
    },
});

const iconClass = computed(() => `zmdi ${props.icon}`);

const handleInput = (event, emit) => {
    emit('update:modelValue', event.target.value);
    // Emit the custom event to update the modelValue in the parent component

};
</script>
