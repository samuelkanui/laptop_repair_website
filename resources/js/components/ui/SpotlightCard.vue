<script setup lang="ts">
import { cn } from '@/lib/utils';
import { ref } from 'vue';

interface Props {
    spotlightColor?: string;
    class?: string;
}

const props = withDefaults(defineProps<Props>(), {
    spotlightColor: 'rgba(255, 255, 255, 0.15)',
});

const divRef = ref<HTMLDivElement | null>(null);
const position = ref({ x: 0, y: 0 });
const opacity = ref(0);

const handleMouseMove = (e: MouseEvent) => {
    if (!divRef.value) return;

    const rect = divRef.value.getBoundingClientRect();
    position.value = { x: e.clientX - rect.left, y: e.clientY - rect.top };
};

const handleMouseEnter = () => {
    opacity.value = 1;
};

const handleMouseLeave = () => {
    opacity.value = 0;
};
</script>

<template>
    <div
        ref="divRef"
        @mousemove="handleMouseMove"
        @mouseenter="handleMouseEnter"
        @mouseleave="handleMouseLeave"
        :class="cn(
            'relative overflow-hidden rounded-xl border border-neutral-800 bg-neutral-900 text-neutral-200 transition-colors hover:border-neutral-700',
            props.class
        )"
    >
        <div
            class="pointer-events-none absolute -inset-px transition duration-300"
            :style="{
                opacity: opacity,
                background: `radial-gradient(600px circle at ${position.x}px ${position.y}px, ${props.spotlightColor}, transparent 40%)`,
            }"
        />
        <div class="relative z-10">
            <slot />
        </div>
    </div>
</template>
