<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DashboardCharts from '@/Components/Dashboard/DashboardCharts.vue';
import DashboardStats from '@/Components/Dashboard/DashboardStats.vue';
import { Head } from '@inertiajs/vue3';

const stats = [
    {
        label: 'Receita mensal',
        delta: '+12,4%',
        trend: 'up',
        value: 'R$ 182.430',
        meta: 'Meta atingida 91%',
        progress: 91,
        barClass: '',
    },
    {
        label: 'Clientes ativos',
        delta: '+8,1%',
        trend: 'up',
        value: '2.384',
        meta: 'Churn 2,1%',
        progress: 78,
        barClass: 'accent',
    },
    {
        label: 'NPS operacional',
        delta: '+4,6%',
        trend: 'up',
        value: '74',
        meta: 'Zona de excelencia',
        progress: 74,
        barClass: 'mellow',
    },
    {
        label: 'Tickets hoje',
        delta: '-6,2%',
        trend: 'down',
        value: '148',
        meta: 'Tempo medio 22 min',
        progress: 62,
        barClass: 'danger',
    },
];

const pieChart = {
    title: 'Receita por canal',
    subtitle: 'Ultimos 30 dias',
    badge: 'Pizza',
    centerValue: 'R$ 82k',
    centerLabel: 'Online',
    segments: [
        { label: 'Market', value: 42, color: '#38bdf8' },
        { label: 'Direto', value: 33, color: '#6366f1' },
        { label: 'Parceiros', value: 25, color: '#f97316' },
    ],
};

const barChart = {
    title: 'Fluxo diario',
    subtitle: 'Pedidos processados',
    badge: 'Barras',
    labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
    values: [64, 82, 52, 90, 76, 58, 68],
};

const lineChart = {
    title: 'Engajamento',
    subtitle: 'Sessao por usuario',
    badge: 'Linha',
    labels: ['01', '05', '10', '15', '20', '25', '30'],
    values: [62, 74, 69, 88, 72, 94, 78],
};

const progressChart = {
    title: 'Saude da operacao',
    subtitle: 'Indicadores combinados',
    badge: 'Barras',
    labels: ['Velocidade', 'Qualidade', 'Entrega', 'Retencao', 'Suporte'],
    values: [72, 84, 68, 76, 63],
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <DashboardStats :stats="stats" />
                <DashboardCharts
                    :pie="pieChart"
                    :bars="barChart"
                    :line="lineChart"
                    :progress="progressChart"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
