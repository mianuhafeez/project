<template>
    <div class="form-group">
        <div class="input-container">
            <label :for="name"><i :class="iconClass"></i></label>
            <input
                class="todo-input form-control w-full"
                :type="type"
                :name="name"
                :id="name"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                v-bind="$attrs"
                :placeholder="label"
            />
        </div>
        <div v-if="error.length > 0" class="error">{{ error }}</div>
    </div>
</template>

<script setup>
import {computed} from "vue";

const props = defineProps({
    modelValue: {
        type: String,
        default: ''
    },
    label: {
        type: String,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text',
    },
    error: {
        type: Array,
        default: () => [],
    },
    icon: {
        type: String,
        default: 'zmdi-account',
    },
});
const iconClass = computed(() => `zmdi ${props.icon}`);
</script>


