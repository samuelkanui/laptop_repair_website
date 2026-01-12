<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { cn } from '@/lib/utils';
import { gsap } from 'gsap';

const props = defineProps<{
    text: string;
    duration?: number;
    automatic?: boolean;
    className?: string;
}>();

const svgRef = ref<SVGSVGElement | null>(null);
const cursor = ref({ x: 0, y: 0 });
const hovered = ref(false);
const maskPosition = ref({ cx: '50%', cy: '50%' });
const strokeDashoffset = ref(1000);
const strokeDasharray = 1000;

const handleMouseMove = (e: MouseEvent) => {
    if (svgRef.current) {
        const svgRect = svgRef.current.getBoundingClientRect();
        cursor.value = { x: e.clientX, y: e.clientY };
        
        const cxPercentage = ((e.clientX - svgRect.left) / svgRect.width) * 100;
        const cyPercentage = ((e.clientY - svgRect.top) / svgRect.height) * 100;
        
        maskPosition.value = {
            cx: `${cxPercentage}%`,
            cy: `${cyPercentage}%`
        };
    }
};

const handleMouseEnter = () => {
    hovered.value = true;
};

const handleMouseLeave = () => {
    hovered.value = false;
};

onMounted(() => {
    // Initial reveal animation mimicking framer-motion's initialization
    gsap.to(strokeDashoffset, {
        value: 0,
        duration: 4,
        ease: 'power2.inOut',
        onUpdate: () => {
            // Trigger reactivity if needed, usually GSAP modifies the DOM directly or we bind the ref
        }
    });
});
</script>

<template>
    <svg
        ref="svgRef"
        width="100%"
        height="100%"
        viewBox="0 0 600 100"
        xmlns="http://www.w3.org/2000/svg"
        @mouseenter="handleMouseEnter"
        @mouseleave="handleMouseLeave"
        @mousemove="handleMouseMove"
        :class="cn('select-none uppercase cursor-pointer', props.className)"
    >
        <defs>
            <linearGradient
                id="textGradient"
                gradientUnits="userSpaceOnUse"
                cx="50%"
                cy="50%"
                r="25%"
            >
                <template v-if="hovered">
                    <stop offset="0%" stop-color="#eab308" />
                    <stop offset="25%" stop-color="#ef4444" />
                    <stop offset="50%" stop-color="#80eeb4" />
                    <stop offset="75%" stop-color="#06b6d4" />
                    <stop offset="100%" stop-color="#8b5cf6" />
                </template>
            </linearGradient>

            <radialGradient
                id="revealMask"
                gradientUnits="userSpaceOnUse"
                r="20%"
                :cx="maskPosition.cx"
                :cy="maskPosition.cy"
            >
                <stop offset="0%" stop-color="white" />
                <stop offset="100%" stop-color="black" />
            </radialGradient>

            <mask id="textMask">
                <rect
                    x="0"
                    y="0"
                    width="100%"
                    height="100%"
                    fill="url(#revealMask)"
                />
            </mask>
        </defs>

        <!-- Base Text (Faint) -->
        <text
            x="50%"
            y="50%"
            text-anchor="middle"
            dominant-baseline="middle"
            stroke-width="0.3"
            class="fill-transparent stroke-neutral-700 font-[helvetica] text-5xl font-bold dark:stroke-neutral-700"
            :style="{ opacity: hovered ? 1 : 0.5 }"
        >
            {{ text }}
        </text>

        <!-- Animated Stroke -->
        <text
            x="50%"
            y="50%"
            text-anchor="middle"
            dominant-baseline="middle"
            stroke-width="0.3"
            class="fill-transparent stroke-[#3ca2fa] font-[helvetica] text-5xl font-bold dark:stroke-[#3ca2fa]"
            :stroke-dasharray="strokeDasharray"
            :stroke-dashoffset="strokeDashoffset.value"
            :style="{ opacity: hovered ? 1 : 0 }"
        >
            {{ text }}
        </text>

        <!-- Gradient Masked Text -->
        <text
            x="50%"
            y="50%"
            text-anchor="middle"
            dominant-baseline="middle"
            stroke="url(#textGradient)"
            stroke-width="0.3"
            mask="url(#textMask)"
            class="fill-transparent font-[helvetica] text-5xl font-bold"
        >
            {{ text }}
        </text>
    </svg>
</template>
