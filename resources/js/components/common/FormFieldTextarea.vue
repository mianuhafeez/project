<template>
    <div class="form-group">
        <div class="input-container">
            <label class="description-label" :for="name"><i :class="iconClass"></i></label>
            <textarea :name="name" :id="name" class="form-control show-tick todo-input w-full " :value="modelValue"
                      @input="$emit('update:modelValue', $event.target.value)"
                      v-bind="$attrs"
                      :placeholder="label">
            </textarea>
        </div>
        <div v-if="error.length > 0" class="error">{{ error }}</div>
    </div>
</template>

<script setup>
import { defineProps, computed } from 'vue';

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
        default: 'zmdi-comment-text',
    },
    label: {
        type: String,
        required: true,
    },
});

const iconClass = computed(() => `zmdi ${props.icon}`);
</script>
