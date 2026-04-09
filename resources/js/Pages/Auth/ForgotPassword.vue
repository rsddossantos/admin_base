<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Recuperar senha" />

        <v-card class="auth-card" elevation="12">
            <v-card-text>
                <div class="auth-title">Recuperar acesso</div>
                <div class="auth-subtitle">
                    Informe seu email para receber um link de redefinicao de senha.
                </div>

                <v-form @submit.prevent="submit">
                    <v-text-field
                        class="auth-input"
                        v-model="form.email"
                        label="Email"
                        type="email"
                        variant="filled"
                        autocomplete="off"
                        color="primary"
                        :error-messages="form.errors.email ? [form.errors.email] : []"
                        required
                        autofocus
                    />

                    <v-btn variant="flat" class="auth-primary"
                        type="submit"
                        size="large"
                        block
                        :loading="form.processing"
                        :disabled="form.processing"
                    >
                        Enviar link de recuperacao
                    </v-btn>
                </v-form>

                <div class="mt-6 auth-helper">
                    Lembrou sua senha?
                    <Link :href="route('login')" class="auth-link">Voltar para o login</Link>
                </div>
            </v-card-text>
        </v-card>
    </GuestLayout>
</template>

