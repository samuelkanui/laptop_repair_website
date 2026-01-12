<script setup lang="ts">
import DisplayCard from '@/components/ui/DisplayCard.vue';
import type { DisplayCardProps } from '@/components/ui/DisplayCard.vue';
import { Sparkles } from 'lucide-vue-next';

interface DisplayCardsProps {
    cards?: DisplayCardProps[];
}

const props = defineProps<DisplayCardsProps>();

const defaultCards: DisplayCardProps[] = [
    {
        className: "[grid-area:stack] hover:-translate-y-10 before:absolute before:w-[100%] before:outline-1 before:rounded-xl before:outline-border before:h-[100%] before:content-[''] before:bg-blend-overlay before:bg-background/50 grayscale-[100%] hover:before:opacity-0 before:transition-opacity before:duration:700 hover:grayscale-0 before:left-0 before:top-0",
    },
    {
        className: "[grid-area:stack] translate-x-16 translate-y-10 hover:-translate-y-1 before:absolute before:w-[100%] before:outline-1 before:rounded-xl before:outline-border before:h-[100%] before:content-[''] before:bg-blend-overlay before:bg-background/50 grayscale-[100%] hover:before:opacity-0 before:transition-opacity before:duration:700 hover:grayscale-0 before:left-0 before:top-0",
    },
    {
        className: "[grid-area:stack] translate-x-32 translate-y-20 hover:translate-y-10",
    },
];

const cardsToDisplay = props.cards || defaultCards;
</script>

<template>
    <div class="grid [grid-template-areas:'stack'] place-items-center opacity-100 animate-in fade-in-0 duration-700">
        <DisplayCard
            v-for="(card, index) in cardsToDisplay"
            :key="index"
            v-bind="card"
        />
    </div>
</template>
