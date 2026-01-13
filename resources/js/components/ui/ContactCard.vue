<script setup lang="ts">
import { cn } from "@/lib/utils";
import { PlusIcon } from "lucide-vue-next";
import type { Component, HTMLAttributes } from "vue";

interface ContactInfoItem {
  icon: Component;
  label: string;
  value: string;
  class?: string;
}

interface Props {
  title?: string;
  description?: string;
  contactInfo?: ContactInfoItem[];
  class?: HTMLAttributes["class"];
  formSectionClassName?: HTMLAttributes["class"];
}

const props = withDefaults(defineProps<Props>(), {
  title: "Contact With Us",
  description: "If you have any questions regarding our Services or need help, please fill out the form here. We do our best to respond within 1 business day.",
});
</script>

<template>
  <div
    :class="cn(
      'bg-card border relative grid h-full w-full shadow md:grid-cols-2 lg:grid-cols-3 overflow-visible',
      props.class,
    )"
  >
    <PlusIcon class="absolute -top-3 -left-3 h-6 w-6 text-white/20" />
    <PlusIcon class="absolute -top-3 -right-3 h-6 w-6 text-white/20" />
    <PlusIcon class="absolute -bottom-3 -left-3 h-6 w-6 text-white/20" />
    <PlusIcon class="absolute -right-3 -bottom-3 h-6 w-6 text-white/20" />
    
    <div class="flex flex-col justify-between lg:col-span-2">
      <div class="relative h-full space-y-4 px-4 py-8 md:p-8">
        <h1 class="text-3xl font-bold md:text-4xl lg:text-5xl text-white">
          {{ title }}
        </h1>
        <p class="text-muted-foreground max-w-xl text-sm md:text-base lg:text-lg">
          {{ description }}
        </p>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-8">
          <div v-for="(info, index) in contactInfo" :key="index" :class="cn('flex items-center gap-3 py-3', info.class)">
            <div class="bg-white/5 border border-white/10 rounded-lg p-3 text-white/70">
              <component :is="info.icon" class="h-5 w-5" />
            </div>
            <div>
              <p class="font-medium text-white text-sm">{{ info.label }}</p>
              <p class="text-white/40 text-xs">{{ info.value }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div
      :class="cn(
        'bg-white/[0.02] flex h-full w-full items-center border-t p-5 md:col-span-1 md:border-t-0 md:border-l border-white/10',
        formSectionClassName,
      )"
    >
      <div class="w-full">
        <slot />
      </div>
    </div>
  </div>
</template>
