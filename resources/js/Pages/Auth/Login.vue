<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const form = useForm({
    email: '',
    password: '',
    remember: true,
});

const localEmailErrors = ref([]);
const localPasswordErrors = ref([]);

const emailErrors = computed(() => {
    const errors = [];

    if (localEmailErrors.value.length) {
        errors.push(...localEmailErrors.value);
    }

    if (form.errors.email) {
        errors.push(form.errors.email);
    }

    if (form.errors.password) {
        errors.push(form.errors.password);
    }

    return errors;
});

const passwordErrors = computed(() => {
    return localPasswordErrors.value.length ? [...localPasswordErrors.value] : [];
});

const validateForm = () => {
    const emailErrors = [];
    const passwordErrors = [];

    if (!form.email) {
        emailErrors.push('Informe o e-mail.');
    } else {
        const parts = form.email.split('@');
        if (parts.length !== 2 || !parts[0] || !parts[1]) {
            emailErrors.push('Informe um e-mail válido.');
        }
    }

    if (!form.password) {
        passwordErrors.push('Informe a senha.');
    }

    localEmailErrors.value = emailErrors;
    localPasswordErrors.value = passwordErrors;

    return emailErrors.length === 0 && passwordErrors.length === 0;
};

const clearLocalErrors = () => {
    if (localEmailErrors.value.length) {
        localEmailErrors.value = [];
    }

    if (localPasswordErrors.value.length) {
        localPasswordErrors.value = [];
    }

    if (Object.keys(form.errors).length) {
        form.clearErrors();
    }
};

const submit = () => {
    if (!validateForm()) {
        return;
    }

    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Entrar" />

        <v-card class="auth-card" elevation="12">
            <v-card-text>
                <div class="auth-title">Acesse sua conta</div>
                <div class="auth-subtitle">
                    Use seus dados para entrar no sistema.
                </div>

                <v-form autocomplete="off" @submit.prevent="submit">
                    <v-text-field
                        class="auth-input"
                        v-model="form.email"
                        label="Email"
                        type="email"
                        variant="filled"
                        color="primary"
                        autocomplete="email"
                        :error-messages="emailErrors"
                        @update:modelValue="clearLocalErrors"
                        required
                        autofocus
                    />

                    <v-text-field
                        class="auth-input"
                        v-model="form.password"
                        label="Senha"
                        type="password"
                        variant="filled"
                        autocomplete="current-password"
                        color="primary"
                        :error-messages="passwordErrors"
                        @update:modelValue="clearLocalErrors"
                        required
                    />

                    <v-checkbox
                        v-model="form.remember"
                        label="Manter-me conectado"
                        class="auth-checkbox"
                    />

                    <v-btn
                        class="auth-primary"
                        type="submit"
                        size="large"
                        variant="flat"
                        block
                        :loading="form.processing"
                        :disabled="form.processing"
                    >
                        Entrar
                    </v-btn>
                </v-form>

                <div class="mt-6 auth-helper">
                    <Link
                        :href="route('password.request')"
                        class="auth-link"
                    >
                        Esqueci minha senha
                    </Link>
                </div>
            </v-card-text>
        </v-card>
    </GuestLayout>
</template>
