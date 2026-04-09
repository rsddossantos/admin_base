<script setup>
import BaseButton from './BaseButton.vue'
</script>

<template>
    <BaseButton class="btn-primary" v-bind="$attrs">
        <slot />
    </BaseButton>
</template>

<style>
.btn-primary {
    background-color: rgb(var(--v-theme-primary));
    color: #fff;
}

.btn-primary:hover,
.btn-primary:focus {
    filter: brightness(0.9);
}

.btn-primary:active {
    filter: brightness(0.8);
}

.btn-primary:focus {
    box-shadow: 0 0 0 2px rgb(var(--v-theme-primary));
}
</style>
