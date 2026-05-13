<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

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

const localEmailErrors = ref([]);
const localPasswordErrors = ref([]);
const localPasswordConfirmationErrors = ref([]);

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
    const errors = [];

    if (localPasswordErrors.value.length) {
        errors.push(...localPasswordErrors.value);
    }

    if (form.errors.password) {
        errors.push(form.errors.password);
    }

    return errors;
});

const passwordConfirmationErrors = computed(() => {
    const errors = [];

    if (localPasswordConfirmationErrors.value.length) {
        errors.push(...localPasswordConfirmationErrors.value);
    }

    if (form.errors.password_confirmation) {
        errors.push(form.errors.password_confirmation);
    }

    return errors;
});

const validateForm = () => {
    const emailErrors = [];
    const passwordErrors = [];
    const passwordConfirmationErrors = [];

    if (!form.email) {
        emailErrors.push('Informe o e-mail.');
    } else {
        const parts = form.email.split('@');
        if (parts.length !== 2 || !parts[0] || !parts[1]) {
            emailErrors.push('Informe um e-mail valido.');
        }
    }

    if (!form.password) {
        passwordErrors.push('Informe a nova senha.');
    } else {
        const hasLetter = /[A-Za-z]/.test(form.password);
        const hasNumber = /\d/.test(form.password);
        const hasSpecial = /[^A-Za-z0-9]/.test(form.password);

        if (!hasLetter || !hasNumber || !hasSpecial) {
            passwordErrors.push(
                'A senha deve conter letras, numeros e pelo menos 1 caractere especial.',
            );
        }
    }

    if (!form.password_confirmation) {
        passwordConfirmationErrors.push('Confirme a nova senha.');
    } else if (form.password && form.password_confirmation !== form.password) {
        passwordConfirmationErrors.push('As senhas nao conferem.');
    }

    localEmailErrors.value = emailErrors;
    localPasswordErrors.value = passwordErrors;
    localPasswordConfirmationErrors.value = passwordConfirmationErrors;

    return (
        emailErrors.length === 0 &&
        passwordErrors.length === 0 &&
        passwordConfirmationErrors.length === 0
    );
};

const clearLocalErrors = () => {
    if (localEmailErrors.value.length) {
        localEmailErrors.value = [];
    }

    if (localPasswordErrors.value.length) {
        localPasswordErrors.value = [];
    }

    if (localPasswordConfirmationErrors.value.length) {
        localPasswordConfirmationErrors.value = [];
    }

    if (Object.keys(form.errors).length) {
        form.clearErrors();
    }
};

const submit = () => {
    if (!validateForm()) {
        return;
    }

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

                <v-form autocomplete="off" @submit.prevent="submit">
                    <v-text-field
                        class="auth-input"
                        v-model="form.email"
                        label="Email"
                        type="email"
                        autocomplete="username"
                        variant="filled"
                        color="primary"
                        :error-messages="emailErrors"
                        @update:modelValue="clearLocalErrors"
                        required
                        autofocus
                    />

                    <v-text-field
                        class="auth-input"
                        v-model="form.password"
                        label="Nova senha"
                        type="password"
                        autocomplete="new-password"
                        variant="filled"
                        color="primary"
                        :error-messages="passwordErrors"
                        @update:modelValue="clearLocalErrors"
                        required
                    />

                    <v-text-field
                        class="auth-input"
                        v-model="form.password_confirmation"
                        label="Confirmar senha"
                        type="password"
                        autocomplete="new-password"
                        variant="filled"
                        color="primary"
                        :error-messages="passwordConfirmationErrors"
                        @update:modelValue="clearLocalErrors"
                        required
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
                        Salvar nova senha
                    </v-btn>
                </v-form>

                <div class="mt-6 auth-helper">
                    <Link
                        :href="route('login')"
                        class="auth-link"
                    >
                        Voltar para o login
                    </Link>
                </div>
            </v-card-text>
        </v-card>
    </GuestLayout>
</template>
