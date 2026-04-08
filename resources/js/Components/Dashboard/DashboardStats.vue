<script setup>
const props = defineProps({
    stats: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <div class="stat-grid">
        <div v-for="stat in stats" :key="stat.label" class="stat-card">
            <div class="stat-top">
                <span>{{ stat.label }}</span>
                <span :class="['stat-trend', stat.trend]">{{ stat.delta }}</span>
            </div>
            <div class="stat-value">{{ stat.value }}</div>
            <div class="stat-meta">{{ stat.meta }}</div>
            <div class="stat-bar">
                <div
                    class="stat-bar-fill"
                    :class="stat.barClass"
                    :style="{ width: `${stat.progress}%` }"
                ></div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.stat-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 18px;
    margin-bottom: 28px;
}

.stat-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
    display: flex;
    flex-direction: column;
    gap: 12px;
    animation: float-in 0.9s ease forwards;
    opacity: 0;
    transform: translateY(12px);
}

.stat-card:nth-child(1) {
    animation-delay: 0.05s;
}
.stat-card:nth-child(2) {
    animation-delay: 0.12s;
}
.stat-card:nth-child(3) {
    animation-delay: 0.19s;
}
.stat-card:nth-child(4) {
    animation-delay: 0.26s;
}

.stat-top {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: #64748b;
}

.stat-trend {
    font-weight: 600;
}

.stat-trend.up {
    color: #22c55e;
}

.stat-trend.down {
    color: #f97316;
}

.stat-value {
    font-size: 24px;
    font-weight: 600;
    color: #0f172a;
}

.stat-meta {
    color: #94a3b8;
    font-size: 13px;
}

.stat-bar {
    height: 8px;
    border-radius: 999px;
    background: #e2e8f0;
    overflow: hidden;
}

.stat-bar-fill {
    height: 100%;
    border-radius: 999px;
    background: linear-gradient(90deg, #38bdf8, #0ea5e9);
    animation: grow 1.4s ease forwards;
}

.stat-bar-fill.accent {
    background: linear-gradient(90deg, #6366f1, #4338ca);
}

.stat-bar-fill.mellow {
    background: linear-gradient(90deg, #22c55e, #16a34a);
}

.stat-bar-fill.danger {
    background: linear-gradient(90deg, #fb7185, #f97316);
}

@keyframes float-in {
    to { opacity: 1; transform: translateY(0); }
}

@keyframes grow {
    from { width: 0; }
}
</style>
