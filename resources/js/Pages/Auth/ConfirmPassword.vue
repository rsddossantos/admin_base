<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Confirmar senha" />

        <v-card class="auth-card" elevation="12">
            <v-card-text>
                <div class="auth-title">Confirmar senha</div>
                <div class="auth-subtitle">
                    Esta e uma area segura. Confirme sua senha para continuar.
                </div>

                <v-form @submit.prevent="submit">
                    <v-text-field
                        v-model="form.password"
                        label="Senha"
                        type="password"
                        autocomplete="current-password"
                        variant="outlined"
                        density="comfortable"
                        :error-messages="form.errors.password ? [form.errors.password] : []"
                        required
                        autofocus
                    />

                    <v-btn
                        type="submit"
                        color="primary"
                        size="large"
                        block
                        :loading="form.processing"
                        :disabled="form.processing"
                    >
                        Confirmar
                    </v-btn>
                </v-form>
            </v-card-text>
        </v-card>
    </GuestLayout>
</template>
