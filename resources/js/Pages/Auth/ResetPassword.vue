<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Redefinir senha" />

        <v-card class="auth-card" elevation="12">
            <v-card-text>
                <div class="auth-title">Defina uma nova senha</div>
                <div class="auth-subtitle">
                    Use uma senha forte para manter sua conta segura.
                </div>

                <v-form @submit.prevent="submit">
                    <v-text-field
                        v-model="form.email"
                        label="Email"
                        type="email"
                        autocomplete="username"
                        variant="outlined"
                        density="comfortable"
                        :error-messages="form.errors.email ? [form.errors.email] : []"
                        required
                        autofocus
                    />

                    <v-text-field
                        v-model="form.password"
                        label="Nova senha"
                        type="password"
                        autocomplete="new-password"
                        variant="outlined"
                        density="comfortable"
                        :error-messages="form.errors.password ? [form.errors.password] : []"
                        required
                    />

                    <v-text-field
                        v-model="form.password_confirmation"
                        label="Confirmar senha"
                        type="password"
                        autocomplete="new-password"
                        variant="outlined"
                        density="comfortable"
                        :error-messages="form.errors.password_confirmation ? [form.errors.password_confirmation] : []"
                        required
                    />

                    <v-btn variant="flat" class="auth-primary"
                        type="submit"
                        color="primary"
                        size="large"
                        block
                        :loading="form.processing"
                        :disabled="form.processing"
                    >
                        Salvar nova senha
                    </v-btn>
                </v-form>

                <div class="mt-6 auth-helper">
                    <Link :href="route('login')" class="auth-link">Voltar para o login</Link>
                </div>
            </v-card-text>
        </v-card>
    </GuestLayout>
</template>

