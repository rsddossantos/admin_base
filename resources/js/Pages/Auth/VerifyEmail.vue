<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <GuestLayout>
        <Head title="Verificar email" />

        <v-card class="auth-card" elevation="12">
            <v-card-text>
                <div class="auth-title">Confirme seu email</div>
                <div class="auth-subtitle">
                    Enviamos um link de verificacao. Clique nele para ativar sua conta.
                </div>

                <v-alert
                    v-if="verificationLinkSent"
                    type="success"
                    variant="tonal"
                    class="mb-4"
                >
                    Um novo link de verificacao foi enviado para o seu email.
                </v-alert>

                <v-form @submit.prevent="submit">
                    <v-btn
                        type="submit"
                        color="primary"
                        size="large"
                        block
                        :loading="form.processing"
                        :disabled="form.processing"
                        class="mb-4"
                    >
                        Reenviar link de verificacao
                    </v-btn>
                </v-form>

                <div class="auth-helper d-flex align-center justify-space-between">
                    <span>Precisa sair da conta?</span>
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="auth-link"
                    >
                        Sair
                    </Link>
                </div>
            </v-card-text>
        </v-card>
    </GuestLayout>
</template>
