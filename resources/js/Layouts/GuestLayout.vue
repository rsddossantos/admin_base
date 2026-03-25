<script setup>
import { Link } from '@inertiajs/vue3';
const appName = import.meta.env.VITE_APP_NAME;
</script>

<template>
    <v-app class="guest-app" theme="adminBase">
        <v-main class="guest-main">
            <div class="guest-bg">
                <v-container class="guest-container">
                    <v-row class="guest-row" align="start" justify="center">
                        <v-col cols="12" md="6" lg="6" class="guest-brand">
                            <div class="brand-panel">
                                <div class="brand-chip">{{ appName }}</div>
                                <h1 class="brand-title">
                                    Administre sua empresa com controle total
                                </h1>
                                <p class="brand-subtitle">
                                    Uma base SaaS pronta para crescer com segurança,
                                    desempenho e uma experiencia moderna.
                                </p>
                                <div class="brand-metrics">
                                    <div class="metric-item">
                                        <span class="metric-label">Segurança</span>
                                        <span class="metric-value">Camadas ativas</span>
                                    </div>
                                    <div class="metric-item">
                                        <span class="metric-label">Multicompany</span>
                                        <span class="metric-value">Contexto isolado</span>
                                    </div>
                                    <div class="metric-item">
                                        <span class="metric-label">UX</span>
                                        <span class="metric-value">Foco em produtividade</span>
                                    </div>
                                </div>
                            </div>
                        </v-col>

                        <v-col cols="12" md="6" lg="6" class="auth-column">
                            <div class="auth-shell">
                                <slot />
                            </div>
                        </v-col>
                    </v-row>

                    <div class="auth-footer">
                        <span class="auth-home">AdminBase</span>
                        <span class="auth-footer-text">
                            Plataforma administrativa SaaS
                        </span>
                    </div>
                </v-container>
            </div>
        </v-main>
    </v-app>
</template>

<style>
.guest-app {
    font-family: 'Manrope', 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
}

.guest-main {
    background: rgb(var(--v-theme-background))
}

.guest-bg {
    min-height: 100vh;
    position: relative;
    overflow: hidden;
    background: linear-gradient(
        120deg,
        rgb(var(--v-theme-secondary)) 0%,
        rgb(var(--v-theme-primary-dark)) 45%,
        rgb(var(--v-theme-primary)) 100%
    );
    color: rgb(var(--v-theme-surface));
}

.guest-bg::before {
    content: '';
    position: absolute;
    inset: -20% 35% auto -30%;
    height: 140%;
    background: radial-gradient(
        circle,
        rgba(var(--v-theme-primary-light), 0.35),
        transparent 60%
    );
    opacity: 0.6;
}

.guest-bg::after {
    content: '';
    position: absolute;
    inset: auto -10% -35% 20%;
    height: 120%;
    background: radial-gradient(
        circle,
        rgba(var(--v-theme-primary), 0.25),
        transparent 65%
    );
    opacity: 0.7;
}

.guest-container {
    position: relative;
    z-index: 1;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-top: 48px;
    padding-bottom: 48px;
    gap: 32px;
}

.guest-row {
    width: 100%;
    align-items: flex-end;
}

.guest-brand {
    display: none;
}

.brand-panel {
    max-width: 420px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.brand-chip {
    align-self: flex-start;
    padding: 6px 16px;
    border-radius: 999px;
    background: rgba(var(--v-theme-primary), 0.35);
    border: 1px solid rgba(var(--v-theme-primary-light), 0.5);
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    font-size: 12px;
}

.brand-title {
    font-size: 36px;
    line-height: 1.2;
    margin: 0;
}

.brand-subtitle {
    font-size: 16px;
    line-height: 1.7;
    margin: 0;
    color: rgba(var(--v-theme-background-light), 0.75);
}

.brand-metrics {
    display: grid;
    gap: 12px;
}

.metric-item {
    padding: 12px 16px;
    border-radius: 16px;
    background: rgba(var(--v-theme-background-dark), 0.45);
    border: 1px solid rgba(148, 163, 184, 0.2);
    backdrop-filter: blur(8px);
}

.metric-label {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(226, 232, 240, 0.7);
}

.metric-value {
    display: block;
    font-size: 16px;
    font-weight: 600;
    color: rgb(var(--v-theme-surface));
}

.auth-home {
    color: rgb(var(--v-theme-surface));
    text-decoration: none;
    font-weight: 600;
}

.auth-column {
    display: flex;
    align-items: flex-start;
    justify-content: center;
}

.auth-shell {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.auth-checkbox {
    color: rgb(var(--v-theme-primary));
}

.auth-footer {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    color: rgba(var(--v-theme-background-light), 0.7);
    font-size: 13px;
    text-align: center;
}

.auth-footer-text {
    opacity: 0.8;
}

.auth-card {
    border-radius: 24px;
    box-shadow: 0 25px 60px rgba(var(--v-theme-secondary), 0.35);
    backdrop-filter: blur(12px);
}

.auth-title {
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 5px;
}

.auth-subtitle {
    margin-bottom: 15px;
}

.auth-link {
    color: rgb(var(--v-theme-primary));
    text-decoration: none;
    font-weight: 500;
    transition: filter 0.2s ease;
}

.auth-link:hover {
    filter: brightness(0.7);
}

.v-btn.auth-primary {
    background-color: rgb(var(--v-theme-primary));
    color: rgb(var(--v-theme-surface));
}

.v-label.v-field-label--floating {
    top: 2px !important;
}

.auth-input .v-field__input:focus {
    border-radius: 4px;
    outline: none;
    border: none !important;
    box-shadow: 0 0 0 1px rgb(var(--v-theme-primary));
}
.auth-input .v-field__field,
.auth-input .v-field__input {
    border-radius: 4px;
    width: 100% !important;
    box-sizing: border-box;
}


@media (min-width: 960px) {
    .guest-brand {
        display: block;
    }
}
</style>
