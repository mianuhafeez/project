<template>
    <div class="form-group">
        <div class="input-container">
            <input
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.checked)"
                type="checkbox"
                :name="name"
                :id="name"
                class="agree-term"/>
            <label :for="name" class="label-agree-term">
                <span><span></span></span>
                <slot/>
            </label>
        </div>
        <div v-if="error.length > 0" class="error">{{ error }}</div>
    </div>
</template>

<script setup>
defineProps({
    modelValue: {
        type: Boolean,
        default: false,
    },
    name: {
        type: String,
        required: true,
    },
    error: {
        type: Array,
        default: () => [],
    },
});
</script>

<style>
input#agree-term {
    display: none !important;
}
</style>
