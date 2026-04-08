<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'responsive-link responsive-link--active block w-full ps-3 pe-4 py-2 border-l-4 text-start text-base font-medium focus:outline-none transition duration-150 ease-in-out'
        : 'responsive-link responsive-link--inactive block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium focus:outline-none transition duration-150 ease-in-out',
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<style scoped>
.responsive-link--active {
    border-color: rgb(var(--v-theme-primary));
    color: rgb(var(--v-theme-primary));
    background-color: rgba(var(--v-theme-primary), 0.12);
}

.responsive-link--active:focus {
    border-color: rgba(var(--v-theme-primary), 0.9);
    background-color: rgba(var(--v-theme-primary), 0.18);
}

.responsive-link--inactive {
    color: #4b5563;
}

.responsive-link--inactive:hover,
.responsive-link--inactive:focus {
    color: #1f2937;
    background-color: #f9fafb;
    border-color: #d1d5db;
}
</style>
