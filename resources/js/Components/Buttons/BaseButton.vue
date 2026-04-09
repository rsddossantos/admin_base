<template>
    <button class="btn" v-bind="$attrs">
        <slot />
    </button>
</template>

<style>
.btn {
    display: inline-flex;
    align-items: center;
    border-radius: 0.375rem;
    border: 1px solid transparent;
    padding: 0.5rem 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: 150ms ease-in-out;
    outline: none;
}
</style>
