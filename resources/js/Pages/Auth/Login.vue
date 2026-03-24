<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
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

                <v-alert
                    v-if="status"
                    type="success"
                    variant="tonal"
                    class="mb-4"
                >
                    {{ status }}
                </v-alert>

                <v-form @submit.prevent="submit">
                    <v-text-field
                        ref="email"
                        class="auth-input"
                        v-model="form.email"
                        label="Email"
                        type="email"
                        variant="solo"
                        autocomplete="off"
                        :error-messages="form.errors.email ? [form.errors.email] : []"
                        required
                        autofocus
                    />

                    <v-text-field
                        ref="password"
                        class="auth-input"
                        v-model="form.password"
                        label="Senha"
                        type="password"
                        variant="solo"
                        autocomplete="new-password"
                        :error-messages="form.errors.password ? [form.errors.password] : []"
                        required
                    />

                    <div class="d-flex align-center">
                        <v-checkbox
                            v-model="form.remember"
                            label="Manter-me conectado"
                            color="primary"
                            class="auth-checkbox"
                        />
                    </div>

                    <v-btn
                        type="submit"
                        color="primary"
                        variant="flat"
                        size="large"
                        block
                        class="auth-primary"
                        :loading="form.processing"
                        :disabled="form.processing"
                    >
                        Entrar
                    </v-btn>
                </v-form>

                <div v-if="canResetPassword" class="mt-6 auth-helper">
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

<style>



</style>
