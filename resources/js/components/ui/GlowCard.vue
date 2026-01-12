<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed } from 'vue';
import { cn } from '@/lib/utils';

interface Props {
    className?: string;
    glowColor?: 'blue' | 'purple' | 'green' | 'red' | 'orange';
    size?: 'sm' | 'md' | 'lg';
    width?: string | number;
    height?: string | number;
    customSize?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    className: '',
    glowColor: 'blue',
    size: 'md',
    customSize: false
});

const cardRef = ref<HTMLDivElement | null>(null);

const glowColorMap = {
    blue: { base: 220, spread: 200 },
    purple: { base: 280, spread: 300 },
    green: { base: 120, spread: 200 },
    red: { base: 0, spread: 200 },
    orange: { base: 30, spread: 200 }
};

const sizeMap = {
    sm: 'w-48 h-64',
    md: 'w-64 h-80',
    lg: 'w-80 h-96'
};

const syncPointer = (e: PointerEvent) => {
    if (cardRef.value) {
        const { clientX: x, clientY: y } = e;
        cardRef.value.style.setProperty('--x', x.toFixed(2));
        cardRef.value.style.setProperty('--xp', (x / window.innerWidth).toFixed(2));
        cardRef.value.style.setProperty('--y', y.toFixed(2));
        cardRef.value.style.setProperty('--yp', (y / window.innerHeight).toFixed(2));
    }
};

onMounted(() => {
    document.addEventListener('pointermove', syncPointer);
});

onUnmounted(() => {
    document.removeEventListener('pointermove', syncPointer);
});

const inlineStyles = computed(() => {
    const { base, spread } = glowColorMap[props.glowColor];
    const styles: Record<string, string | number> = {
        '--base': base,
        '--spread': spread,
        '--radius': '14',
        '--border': '3',
        '--backdrop': 'hsl(0 0% 60% / 0.12)',
        '--backup-border': 'var(--backdrop)',
        '--size': '200',
        '--outer': '1',
        '--border-size': 'calc(var(--border, 2) * 1px)',
        '--spotlight-size': 'calc(var(--size, 150) * 1px)',
        '--hue': 'calc(var(--base) + (var(--xp, 0) * var(--spread, 0)))',
        backgroundImage: `radial-gradient(
        var(--spotlight-size) var(--spotlight-size) at
        calc(var(--x, 0) * 1px)
        calc(var(--y, 0) * 1px),
        hsl(var(--hue, 210) calc(var(--saturation, 100) * 1%) calc(var(--lightness, 70) * 1%) / var(--bg-spot-opacity, 0.1)), transparent
      )`,
        backgroundColor: 'var(--backdrop, transparent)',
        backgroundSize: 'calc(100% + (2 * var(--border-size))) calc(100% + (2 * var(--border-size)))',
        backgroundPosition: '50% 50%',
        backgroundAttachment: 'fixed',
        border: 'var(--border-size) solid var(--backup-border)',
        position: 'relative',
        touchAction: 'none',
    };

    if (props.width !== undefined) {
        styles.width = typeof props.width === 'number' ? `${props.width}px` : String(props.width);
    }
    if (props.height !== undefined) {
        styles.height = typeof props.height === 'number' ? `${props.height}px` : String(props.height);
    }

    return styles;
});

const sizeClasses = computed(() => {
    if (props.customSize) return '';
    return sizeMap[props.size];
});
</script>

<template>
    <div
        ref="cardRef"
        data-glow
        :style="inlineStyles"
        :class="cn(
            sizeClasses,
            !customSize && 'aspect-[3/4]',
            'rounded-2xl relative grid grid-rows-[1fr_auto] shadow-[0_1rem_2rem_-1rem_black] p-4 gap-4 backdrop-blur-[5px]',
            props.className
        )"
    >
        <div data-glow></div>
        <slot></slot>
    </div>
</template>

<style scoped>
/* Scoped styles are great, but pseudo-elements on data-glow need to be handled carefully.
   Since data-glow is on the root element, we can use :deep() or just rely on the attribute selector
   within a non-scoped block if needed, but scoped should work if we target the element.
*/

div[data-glow]::before,
div[data-glow]::after {
    pointer-events: none;
    content: "";
    position: absolute;
    inset: calc(var(--border-size) * -1);
    border: var(--border-size) solid transparent;
    border-radius: calc(var(--radius) * 1px);
    background-attachment: fixed;
    background-size: calc(100% + (2 * var(--border-size))) calc(100% + (2 * var(--border-size)));
    background-repeat: no-repeat;
    background-position: 50% 50%;
    mask: linear-gradient(transparent, transparent), linear-gradient(white, white);
    mask-clip: padding-box, border-box;
    mask-composite: intersect; /* This might need prefixing */
    -webkit-mask-composite: source-in; /* Webkit fallback roughly equivalent for this purpose? destination-in? source-in is standard-ish for intersect behavior in composite context often helpful */
     /* actually standard syntax is mask-composite: intersect; webkit is -webkit-mask-composite: source-in (or similar depending on context) */
    -webkit-mask-composite: source-in; 
    -webkit-mask-clip: padding-box, border-box;
}

div[data-glow]::before {
    background-image: radial-gradient(
        calc(var(--spotlight-size) * 0.75) calc(var(--spotlight-size) * 0.75) at
        calc(var(--x, 0) * 1px)
        calc(var(--y, 0) * 1px),
        hsl(var(--hue, 210) calc(var(--saturation, 100) * 1%) calc(var(--lightness, 50) * 1%) / var(--border-spot-opacity, 1)), transparent 100%
    );
    filter: brightness(2);
}

div[data-glow]::after {
    background-image: radial-gradient(
        calc(var(--spotlight-size) * 0.5) calc(var(--spotlight-size) * 0.5) at
        calc(var(--x, 0) * 1px)
        calc(var(--y, 0) * 1px),
        hsl(0 100% 100% / var(--border-light-opacity, 1)), transparent 100%
    );
}

/* Inner glow element */
div[data-glow] > div[data-glow] {
    position: absolute;
    inset: 0;
    will-change: filter;
    opacity: var(--outer, 1);
    border-radius: calc(var(--radius) * 1px);
    border-width: calc(var(--border-size) * 20);
    filter: blur(calc(var(--border-size) * 10));
    background: none;
    pointer-events: none;
    border: none;
}

div[data-glow] > div[data-glow]::before {
    inset: -10px;
    border-width: 10px;
}
</style>
