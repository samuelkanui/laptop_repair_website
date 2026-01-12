<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SpiralAnimation from '@/components/ui/SpiralAnimation.vue';
import BrandMarquee from '@/components/ui/BrandMarquee.vue';
import { ref, onMounted } from 'vue';
import { Monitor, Cpu, Wrench, HardDrive } from 'lucide-vue-next';

const contentVisible = ref(false);
const servicesVisible = ref(false);

const scrollToServices = () => {
    document.getElementById('services')?.scrollIntoView({ behavior: 'smooth' });
};

onMounted(() => {
    // Fade in main title
    setTimeout(() => {
        contentVisible.value = true;
    }, 1500);

    // Fade in services slightly later
    setTimeout(() => {
        servicesVisible.value = true;
    }, 2000);
});
</script>

<template>
    <Head title="Laptop Doctors" />
    <div class="fixed inset-0 w-full h-full overflow-hidden bg-black text-white font-sans selection:bg-white/20">
        <!-- Spiral Animation Background -->
        <div class="absolute inset-0 z-0 opacity-60">
            <SpiralAnimation />
        </div>

        <!-- content overlay -->
        <div class="relative z-10 h-full flex flex-col items-center justify-center p-6">
            
            <!-- Hero Section -->
            <div 
                class="text-center transition-all duration-1000 ease-out transform"
                :class="{ 'opacity-100 translate-y-0': contentVisible, 'opacity-0 translate-y-8': !contentVisible }"
            >
                <h1 class="text-5xl md:text-7xl font-light tracking-tighter mb-4 bg-clip-text text-transparent bg-gradient-to-b from-white to-white/60">
                    Laptop Doctors
                </h1>
                <p class="text-lg md:text-xl text-white/70 max-w-lg mx-auto font-light tracking-wide mb-10">
                    Precision Repair & Software Excellence
                </p>

                <div class="flex flex-col md:flex-row gap-6 mt-8 justify-center items-center">
                    <button 
                        @click="scrollToServices"
                        class="group relative px-8 py-3 rounded-full bg-white/5 backdrop-blur-sm border border-white/10 hover:bg-white/10 transition-all duration-500 overflow-hidden min-w-[160px]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                        <span class="relative text-sm uppercase tracking-[0.2em] font-medium text-white/90">View Services</span>
                    </button>

                    <a 
                        href="/contact"
                        class="group relative px-8 py-3 rounded-full bg-transparent border border-white/20 hover:border-white/50 hover:bg-white/5 transition-all duration-300 min-w-[160px]"
                    >
                        <span class="relative text-sm uppercase tracking-[0.2em] font-medium text-white/80 group-hover:text-white">Contact Us</span>
                    </a>

                    <a 
                        href="/about"
                        class="group relative px-6 py-3 rounded-full bg-transparent hover:bg-white/5 transition-all duration-300"
                    >
                        <span class="relative text-xs uppercase tracking-[0.15em] font-medium text-white/60 group-hover:text-white/90">About</span>
                    </a>
                </div>
            </div>

            <!-- Services Details -->
            <div 
                id="services" 
                class="mt-32 grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl w-full transition-all duration-1000 delay-300 ease-out p-4"
                :class="{ 'opacity-100 translate-y-0': servicesVisible, 'opacity-0 translate-y-12': !servicesVisible }"
            >
                <!-- Service Card 1 -->
                <div class="group p-8 rounded-[2rem] bg-[#0A0A0A] border border-white/5 hover:border-white/10 transition-colors duration-300">
                    <div class="mb-6 inline-flex p-4 rounded-2xl bg-[#1A1A1A] border border-white/5">
                        <Wrench class="w-6 h-6 text-purple-400" />
                    </div>
                    <h3 class="text-2xl font-medium mb-4 text-white tracking-tight">Laptop Repairment</h3>
                    <p class="text-gray-400 leading-relaxed font-normal text-base">
                        Expert hardware diagnostics and component-level repairs. We breathe new life into your devices with precision and care.
                    </p>
                </div>

                <!-- Service Card 2 -->
                <div class="group p-8 rounded-[2rem] bg-[#0A0A0A] border border-white/5 hover:border-white/10 transition-colors duration-300">
                    <div class="mb-6 inline-flex p-4 rounded-2xl bg-[#1A1A1A] border border-white/5">
                        <Cpu class="w-6 h-6 text-emerald-400" />
                    </div>
                    <h3 class="text-2xl font-medium mb-4 text-white tracking-tight">Software Installation</h3>
                    <p class="text-gray-400 leading-relaxed font-normal text-base">
                        System optimization, OS installation, and essential software setup. Ensuring your digital workspace works as hard as you do.
                    </p>
                </div>
            </div>
            
            <!-- Brand Marquee -->
            <div 
                class="mt-24 w-full transition-all duration-1000 delay-500 ease-out"
                :class="{ 'opacity-100 translate-y-0': servicesVisible, 'opacity-0 translate-y-12': !servicesVisible }"
            >
                <BrandMarquee />
            </div>
            
        </div>
        
        <!-- Footer / Contact Info (Optional) -->
        <div class="absolute bottom-2 w-full text-center text-white/30 text-xs tracking-widest uppercase pb-4">
            &copy; 2026 Laptop Doctors. All systems operational.
        </div>
    </div>
</template>

<style scoped>
/* Add any custom animations or font adjustments here if tailwind isn't enough */
</style>
