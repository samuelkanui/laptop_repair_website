<script setup lang="ts">
import { cn } from '@/lib/utils';
import { Sparkles } from 'lucide-vue-next';
import { type Component } from 'vue';

export interface DisplayCardProps {
    className?: string;
    icon?: Component;
    title?: string;
    description?: string;
    date?: string;
    iconClassName?: string;
    titleClassName?: string;
}

const props = defineProps<DisplayCardProps>();
</script>

<template>
    <div
        :class="cn(
            'relative flex h-42 w-[24rem] -skew-y-[8deg] select-none flex-col justify-between rounded-xl border-2 bg-muted/70 backdrop-blur-sm px-6 py-5 transition-all duration-700 after:absolute after:-right-1 after:top-[-5%] after:h-[110%] after:w-[20rem] after:bg-gradient-to-l after:from-background after:to-transparent after:content-[\'\'] hover:border-white/20 hover:bg-muted [&>*]:flex [&>*]:items-center [&>*]:gap-2',
            props.className
        )"
    >
        <div>
            <span class="relative inline-block rounded-full bg-blue-800 p-1">
                <component :is="props.icon || Sparkles" :class="cn('size-4 text-blue-300', props.iconClassName)" />
            </span>
            <p :class="cn('text-lg font-bold', props.titleClassName)">{{ props.title }}</p>
        </div>
        <p class="whitespace-nowrap text-xl font-semibold text-zinc-800 shadow-sm">{{ props.description }}</p>
        <p class="text-zinc-500 font-medium">{{ props.date }}</p>
    </div>
</template>
