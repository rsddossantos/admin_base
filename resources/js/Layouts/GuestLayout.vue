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
                        <v-col cols="12" md="6" lg="5" class="guest-brand">
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

                        <v-col cols="12" md="6" lg="5" class="auth-column">
                            <div class="auth-shell">
                                <slot />
                            </div>
                        </v-col>
                    </v-row>

                    <div class="auth-footer">
                        <Link href="/" class="auth-home">AdminBase</Link>
                        <span class="auth-footer-text">
                            Plataforma administrativa SaaS
                        </span>
                    </div>
                </v-container>
            </div>
        </v-main>
    </v-app>
</template>

<style scoped>
.guest-app {
    font-family: 'Manrope', 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
}

.guest-main {
    background: #0f172a;
}

.guest-bg {
    min-height: 100vh;
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, #0f172a 0%, #1e293b 45%, #0f766e 100%);
    color: rgb(var(--v-theme-on-primary));
}

.guest-bg::before {
    content: '';
    position: absolute;
    inset: -20% 35% auto -30%;
    height: 140%;
    background: radial-gradient(circle, rgba(94, 234, 212, 0.35), transparent 60%);
    opacity: 0.6;
}

.guest-bg::after {
    content: '';
    position: absolute;
    inset: auto -10% -35% 20%;
    height: 120%;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.25), transparent 65%);
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
    align-items: flex-start;
}

.guest-brand {
    display: none;
}

@media (min-width: 960px) {
    .guest-brand {
        display: block;
    }
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
    background: rgba(15, 118, 110, 0.35);
    border: 1px solid rgba(94, 234, 212, 0.5);
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
    color: rgba(248, 250, 252, 0.75);
}

.brand-metrics {
    display: grid;
    gap: 12px;
}

.metric-item {
    padding: 12px 16px;
    border-radius: 16px;
    background: rgba(15, 23, 42, 0.45);
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
    color: rgb(var(--v-theme-on-primary));
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

.auth-footer {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    color: rgba(248, 250, 252, 0.7);
    font-size: 13px;
    text-align: center;
}

.auth-home {
    color: rgb(var(--v-theme-on-primary));
    text-decoration: none;
    font-weight: 600;
}

.auth-footer-text {
    opacity: 0.8;
}

:deep(.auth-card) {
    border-radius: 24px;
    background: #f8fafc;
    box-shadow: 0 25px 60px rgba(15, 23, 42, 0.35);
    backdrop-filter: blur(12px);
}

:deep(.auth-title) {
    font-size: 26px;
    font-weight: 600;
    color: #0f172a;
    margin-bottom: 4px;
}

:deep(.auth-subtitle) {
    font-size: 14px;
    color: rgba(15, 23, 42, 0.65);
    margin-bottom: 20px;
}

:deep(.auth-helper) {
    font-size: 13px;
    color: rgba(15, 23, 42, 0.6);
}

:deep(.auth-link) {
    color: var(--brand-color);
    text-decoration: none;
    font-weight: 500;
}

:deep(.v-field) {
    background: #f8fafc;
    border-radius: 12px;
}

:deep(.v-field__input) {
    color: #0f172a;
}

:deep(.v-field__input input) {
    color: #0f172a;
}

:deep(.v-field__input input::placeholder) {
    color: rgba(15, 23, 42, 0.6);
}

:deep(.v-label) {
    color: rgba(15, 23, 42, 0.78);
}

:deep(.v-field--variant-outlined .v-label.v-field-label--floating) {
    transform: translateY(-18px) scale(0.85);
    background: #f8fafc;
    color: rgba(15, 23, 42, 0.85);
}

:deep(.v-checkbox .v-label) {
    color: rgba(15, 23, 42, 0.8);
}

:deep(.v-selection-control__input) {
    color: #0f172a;
}

:deep(.v-selection-control__input .v-icon) {
    color: #0f172a;
}

:deep(.auth-checkbox .v-selection-control__input) {
    opacity: 1;
}

:deep(.auth-checkbox .v-selection-control__input .v-icon) {
    color: var(--brand-color);
}

:deep(.v-btn.auth-primary) {
    background-color: var(--brand-color);
    color: rgb(var(--v-theme-on-primary));
}
</style>
