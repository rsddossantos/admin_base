<script setup>
import BaseButton from './BaseButton.vue'
</script>

<template>
    <BaseButton class="btn-error" v-bind="$attrs">
        <slot />
    </BaseButton>
</template>

<style>
.btn-error {
    background-color: rgb(var(--v-theme-error));
    color: #fff;
}

.btn-error:hover,
.btn-error:focus {
    filter: brightness(0.9);
}

.btn-error:active {
    filter: brightness(0.8);
}

.btn-error:focus {
    box-shadow: 0 0 0 2px rgb(var(--v-theme-error));
}
</style>
