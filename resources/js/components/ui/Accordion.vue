<script setup lang="ts">
import { AccordionContent, AccordionHeader, AccordionItem, AccordionRoot, AccordionTrigger } from 'radix-vue';
import { ChevronDown } from 'lucide-vue-next';
import { cn } from '@/lib/utils';
</script>

<template>
    <!-- Accordion Root -->
    <component :is="'div'" v-if="false" />
</template>

<script setup lang="ts" generic="T extends 'single' | 'multiple'">
export interface AccordionRootProps {
    type?: T;
    collapsible?: boolean;
    defaultValue?: string;
    className?: string;
}
</script>

<template>
    <AccordionRoot
        v-bind="$attrs"
        :class="cn('w-full', $attrs.class as string)"
    >
        <slot />
    </AccordionRoot>
</template>

<!-- Separate exports for sub-components -->
<script setup lang="ts">
// Re-export sub-components
export { AccordionItem, AccordionHeader, AccordionTrigger, AccordionContent };
</script>
