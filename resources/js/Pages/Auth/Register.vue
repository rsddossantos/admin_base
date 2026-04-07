<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Criar conta" />

        <v-card class="auth-card" elevation="12">
            <v-card-text>
                <div class="auth-title">Criar nova conta</div>
                <div class="auth-subtitle">
                    Preencha seus dados para iniciar no AdminBase.
                </div>

                <v-form @submit.prevent="submit">
                    <v-text-field
                        class="auth-input"
                        v-model="form.name"
                        label="Nome"
                        type="text"
                        variant="filled"
                        color="primary"
                        autocomplete="name"
                        :error-messages="form.errors.name ? [form.errors.name] : []"
                        required
                        autofocus
                    />

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

                    <v-text-field
                        class="auth-input"
                        v-model="form.password_confirmation"
                        label="Confirmar senha"
                        type="password"
                        variant="filled"
                        autocomplete="new-password"
                        color="primary"
                        :error-messages="form.errors.password_confirmation ? [form.errors.password_confirmation] : []"
                        required
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
                        Criar conta
                    </v-btn>
                </v-form>

                <div class="mt-6 auth-helper">
                    Ja tem uma conta?
                    <Link :href="route('login')" class="auth-link">Fazer login</Link>
                </div>
            </v-card-text>
        </v-card>
    </GuestLayout>
</template>

