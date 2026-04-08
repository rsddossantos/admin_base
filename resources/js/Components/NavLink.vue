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
        ? 'nav-link nav-link--active inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out'
        : 'nav-link nav-link--inactive inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out',
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<style scoped>
.nav-link--active {
    border-color: rgb(var(--v-theme-primary));
    color: rgb(var(--v-theme-primary));
}

.nav-link--active:focus {
    border-color: rgba(var(--v-theme-primary), 0.9);
}

.nav-link--inactive {
    color: #6b7280;
}

.nav-link--inactive:hover,
.nav-link--inactive:focus {
    color: #374151;
    border-color: #d1d5db;
}
</style>
