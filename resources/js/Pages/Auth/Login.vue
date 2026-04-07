<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

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

                <v-form @submit.prevent="submit">
                    <v-text-field
                        class="auth-input"
                        v-model="form.email"
                        label="Email"
                        type="email"
                        variant="filled"
                        color="primary"
                        autocomplete="email"
                        :error-messages="form.errors.email ? [form.errors.email] : []"
                        required
                        autofocus
                    />

                    <v-text-field
                        class="auth-input"
                        v-model="form.password"
                        label="Senha"
                        type="password"
                        variant="filled"
                        autocomplete="new-password"
                        color="primary"
                        :error-messages="form.errors.password ? [form.errors.password] : []"
                        required
                    />

                    <v-checkbox
                        v-model="form.remember"
                        label="Manter-me conectado"
                        color="primary"
                        class="auth-checkbox"
                    />

                    <v-btn
                        class="auth-primary"
                        type="submit"
                        color="primary"
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
