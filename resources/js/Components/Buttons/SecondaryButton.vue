<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="btn-secondary">
        <slot />
    </button>
</template>

<style>
.btn-secondary {
    display: inline-flex;
    align-items: center;
    border-radius: 0.375rem;
    border: 1px solid #d1d5db;
    background-color: #fff;
    padding: 0.5rem 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: rgb(var(--v-theme-secondary));
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    transition: 150ms ease-in-out;
}

.btn-secondary:hover {
    background-color: #f9fafb;
}

.btn-secondary:focus {
    outline: none;
    box-shadow: 0 0 0 1px rgb(var(--v-theme-secondary));
}

.btn-secondary:disabled {
    opacity: 0.25;
}
</style>
