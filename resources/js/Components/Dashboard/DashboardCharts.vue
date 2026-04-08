<script setup>
import { onBeforeUnmount, onMounted, ref } from 'vue';
import * as am5 from '@amcharts/amcharts5';
import * as am5xy from '@amcharts/amcharts5/xy';
import * as am5percent from '@amcharts/amcharts5/percent';
import am5themes_Animated from '@amcharts/amcharts5/themes/Animated';

const props = defineProps({
    pie: {
        type: Object,
        required: true,
    },
    bars: {
        type: Object,
        required: true,
    },
    line: {
        type: Object,
        required: true,
    },
    progress: {
        type: Object,
        required: true,
    },
});

const pieRef = ref(null);
const barRef = ref(null);
const lineRef = ref(null);
const progressRef = ref(null);

const chartRoots = [];

const readThemeColor = (name) => {
    const rootValue = getComputedStyle(document.documentElement).getPropertyValue(name).trim();
    if (rootValue) {
        return rootValue;
    }
    const bodyValue = getComputedStyle(document.body).getPropertyValue(name).trim();
    return bodyValue;
};

const rgbToHex = (rgb) => {
    const match = rgb.match(/(\d+)\s*,\s*(\d+)\s*,\s*(\d+)/);
    if (!match) return null;
    const r = parseInt(match[1], 10);
    const g = parseInt(match[2], 10);
    const b = parseInt(match[3], 10);
    return (r << 16) + (g << 8) + b;
};

const toAm5Color = (cssVar) => {
    const color = readThemeColor(cssVar);
    if (!color) {
        console.warn(`Variavel de tema nao encontrada: ${cssVar}`);
        return null;
    }
    const hex = rgbToHex(color);
    if (hex === null) {
        console.warn(`Formato de cor invalido para ${cssVar}: ${color}`);
        return null;
    }
    return am5.color(hex);
};

const setupTheme = (root) => {
    root.setThemes([am5themes_Animated.new(root)]);
};

const createPieChart = () => {
    if (!pieRef.value) return;
    const root = am5.Root.new(pieRef.value);
    setupTheme(root);
    chartRoots.push(root);

    const chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            layout: root.verticalLayout,
        })
    );

    const series = chart.series.push(
        am5percent.PieSeries.new(root, {
            valueField: 'value',
            categoryField: 'label',
            innerRadius: am5.percent(55),
        })
    );

    const primary = toAm5Color('--v-theme-primary');
    const primaryLight = toAm5Color('--v-theme-primary-light');
    const primaryDark = toAm5Color('--v-theme-primary-dark');
    const colors = [primary, primaryLight, primaryDark].filter(Boolean);
    if (colors.length) {
        series.get('colors').set('colors', colors);
    }

    series.data.setAll(props.pie.segments);
    series.labels.template.setAll({ forceHidden: true });
    series.ticks.template.setAll({ forceHidden: true });

    const legend = chart.children.push(
        am5.Legend.new(root, {
            centerX: am5.percent(50),
            x: am5.percent(50),
            marginTop: 10,
        })
    );
    legend.data.setAll(series.dataItems);
};

const createBarChart = () => {
    if (!barRef.value) return;
    const root = am5.Root.new(barRef.value);
    setupTheme(root);
    chartRoots.push(root);

    const chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: 'none',
            wheelY: 'none',
        })
    );

    chart.set(
        'cursor',
        am5xy.XYCursor.new(root, {
            behavior: 'none',
        })
    );

    const xAxis = chart.xAxes.push(
        am5xy.CategoryAxis.new(root, {
            categoryField: 'label',
            renderer: am5xy.AxisRendererX.new(root, {
                minGridDistance: 30,
            }),
        })
    );

    const yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            min: 0,
            max: 100,
            strictMinMax: true,
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );

    const series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
            xAxis,
            yAxis,
            valueYField: 'value',
            categoryXField: 'label',
            tooltip: am5.Tooltip.new(root, {}),
        })
    );

    series.columns.template.setAll({
        cornerRadiusTL: 12,
        cornerRadiusTR: 12,
        strokeOpacity: 0,
        tooltipText: '{categoryX}: {valueY}%',
    });

    const barFill = toAm5Color('--v-theme-primary');

    if (barFill) {
        series.columns.template.set('fill', barFill);
    }

    xAxis.data.setAll(
        props.bars.labels.map((label, index) => ({
            label,
            value: props.bars.values[index] ?? 0,
        }))
    );
    series.data.setAll(
        props.bars.labels.map((label, index) => ({
            label,
            value: props.bars.values[index] ?? 0,
        }))
    );

    const legend = chart.children.push(
        am5.Legend.new(root, {
            centerX: am5.percent(50),
            x: am5.percent(50),
            marginTop: 10,
        })
    );
    legend.data.setAll([
        {
            name: props.bars.subtitle || props.bars.title,
            fill: series.get('fill'),
            stroke: series.get('stroke'),
        },
    ]);
};

const createLineChart = () => {
    if (!lineRef.value) return;
    const root = am5.Root.new(lineRef.value);
    setupTheme(root);
    chartRoots.push(root);

    const chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: 'none',
            wheelY: 'none',
        })
    );

    chart.set(
        'cursor',
        am5xy.XYCursor.new(root, {
            behavior: 'none',
        })
    );

    const xAxis = chart.xAxes.push(
        am5xy.CategoryAxis.new(root, {
            categoryField: 'label',
            renderer: am5xy.AxisRendererX.new(root, {
                minGridDistance: 30,
            }),
        })
    );

    const yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            min: 0,
            max: 100,
            strictMinMax: true,
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );

    const series = chart.series.push(
        am5xy.LineSeries.new(root, {
            xAxis,
            yAxis,
            valueYField: 'value',
            categoryXField: 'label',
            tooltip: am5.Tooltip.new(root, {
                labelText: '{categoryX}: {valueY}%',
            }),
        })
    );

    const lineStroke = toAm5Color('--v-theme-primary');
    const lineFill = toAm5Color('--v-theme-primary-light');

    if (lineStroke) {
        series.bullets.push(() =>
            am5.Bullet.new(root, {
                sprite: am5.Circle.new(root, {
                    radius: 4,
                    fill: lineStroke,
                    stroke: am5.color(0xffffff),
                    strokeWidth: 2,
                }),
            })
        );
    }

    series.strokes.template.setAll({
        strokeWidth: 3,
        ...(lineStroke ? { stroke: lineStroke } : {}),
    });

    series.fills.template.setAll({
        visible: true,
        fillOpacity: 0.15,
        ...(lineFill ? { fill: lineFill } : {}),
    });

    const data = props.line.labels.map((label, index) => ({
        label,
        value: props.line.values?.[index] ?? 0,
    }));

    xAxis.data.setAll(data);
    series.data.setAll(data);

    const legend = chart.children.push(
        am5.Legend.new(root, {
            centerX: am5.percent(50),
            x: am5.percent(50),
            marginTop: 10,
        })
    );
    legend.data.setAll([
        {
            name: props.line.subtitle || props.line.title,
            fill: series.get('fill'),
            stroke: series.get('stroke'),
        },
    ]);
};

const createProgressChart = () => {
    if (!progressRef.value) return;
    const root = am5.Root.new(progressRef.value);
    setupTheme(root);
    chartRoots.push(root);

    const chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: 'none',
            wheelY: 'none',
        })
    );

    chart.set(
        'cursor',
        am5xy.XYCursor.new(root, {
            behavior: 'none',
        })
    );

    const yAxis = chart.yAxes.push(
        am5xy.CategoryAxis.new(root, {
            categoryField: 'label',
            renderer: am5xy.AxisRendererY.new(root, {
                inversed: true,
                minGridDistance: 20,
            }),
        })
    );

    const xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            min: 0,
            max: 100,
            strictMinMax: true,
            renderer: am5xy.AxisRendererX.new(root, {}),
        })
    );

    const series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
            xAxis,
            yAxis,
            valueXField: 'value',
            categoryYField: 'label',
            tooltip: am5.Tooltip.new(root, {}),
        })
    );

    const progressFill = toAm5Color('--v-theme-primary');

    series.columns.template.setAll({
        cornerRadiusTR: 10,
        cornerRadiusBR: 10,
        strokeOpacity: 0,
        tooltipText: '{categoryY}: {valueX}%',
    });

    if (progressFill) {
        series.columns.template.set('fill', progressFill);
    }

    const data = props.progress.labels.map((label, index) => ({
        label,
        value: props.progress.values?.[index] ?? 0,
    }));

    yAxis.data.setAll(data);
    series.data.setAll(data);

    const legend = chart.children.push(
        am5.Legend.new(root, {
            centerX: am5.percent(50),
            x: am5.percent(50),
            marginTop: 10,
        })
    );
    legend.data.setAll([
        {
            name: props.progress.subtitle || props.progress.title,
            fill: series.get('fill'),
            stroke: series.get('stroke'),
        },
    ]);
};

onMounted(() => {
    createPieChart();
    createBarChart();
    createLineChart();
    createProgressChart();
});

onBeforeUnmount(() => {
    chartRoots.forEach((root) => root.dispose());
});
</script>

<template>
    <div class="chart-grid">
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-title">{{ pie.title }}</div>
                    <div class="chart-subtitle">{{ pie.subtitle }}</div>
                </div>
                <span class="chip">{{ pie.badge }}</span>
            </div>
            <div class="chart-canvas" ref="pieRef"></div>
        </div>

        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-title">{{ bars.title }}</div>
                    <div class="chart-subtitle">{{ bars.subtitle }}</div>
                </div>
                <span class="chip">{{ bars.badge }}</span>
            </div>
            <div class="chart-canvas" ref="barRef"></div>
        </div>

        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-title">{{ line.title }}</div>
                    <div class="chart-subtitle">{{ line.subtitle }}</div>
                </div>
                <span class="chip">{{ line.badge }}</span>
            </div>
            <div class="chart-canvas" ref="lineRef"></div>
        </div>

        <div class="chart-card">
            <div class="chart-header">
                <div>
            <div class="chart-title">{{ progress.title }}</div>
            <div class="chart-subtitle">{{ progress.subtitle }}</div>
        </div>
        <span class="chip">{{ progress.badge }}</span>
    </div>
    <div class="chart-canvas" ref="progressRef"></div>
        </div>
    </div>
</template>

<style scoped>
.chart-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    margin-bottom: 24px;
}

.chart-card {
    background: #ffffff;
    border-radius: 22px;
    padding: 20px;
    box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
    display: flex;
    flex-direction: column;
    gap: 16px;
    position: relative;
    overflow: hidden;
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chart-title {
    font-weight: 600;
    color: #0f172a;
}

.chart-subtitle {
    font-size: 12px;
    color: #94a3b8;
}

.chip {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    padding: 6px 10px;
    border-radius: 999px;
    background: #f1f5f9;
    color: #475569;
}

.chart-canvas {
    width: 100%;
    height: 220px;
}

.chart-card:nth-child(3) .chart-canvas,
.chart-card:nth-child(4) .chart-canvas {
    height: 240px;
}

@media (min-width: 1024px) {
    .chart-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
</style>
