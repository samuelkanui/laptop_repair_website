<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import BrandMarquee from '@/components/ui/BrandMarquee.vue';
import Navbar from '@/components/ui/Navbar.vue';
import HoverFooter from '@/components/ui/HoverFooter.vue';
import DisplayCards from '@/components/ui/DisplayCards.vue';
import { ref, onMounted } from 'vue';
import { Monitor, Cpu, Wrench, HardDrive, CheckCircle2, Zap, Shield, Search, PenTool, Truck, Sparkles } from 'lucide-vue-next';

const processCards = [
    {
        icon: Search,
        title: "Diagnosis",
        description: "Root cause identification",
        date: "Step 1",
        iconClassName: "text-blue-500",
        titleClassName: "text-blue-500",
        className: "[grid-area:stack] hover:-translate-y-10 before:absolute before:w-[100%] before:outline-1 before:rounded-xl before:outline-border before:h-[100%] before:content-[''] before:bg-blend-overlay before:bg-background/50 grayscale-[100%] hover:before:opacity-0 before:transition-opacity before:duration:700 hover:grayscale-0 before:left-0 before:top-0",
    },
    {
        icon: Monitor,
        title: "Quote",
        description: "Transparent pricing",
        date: "Step 2",
        iconClassName: "text-emerald-500",
        titleClassName: "text-emerald-500",
        className: "[grid-area:stack] translate-x-20 translate-y-10 hover:-translate-y-1 before:absolute before:w-[100%] before:outline-1 before:rounded-xl before:outline-border before:h-[100%] before:content-[''] before:bg-blend-overlay before:bg-background/50 grayscale-[100%] hover:before:opacity-0 before:transition-opacity before:duration:700 hover:grayscale-0 before:left-0 before:top-0",
    },
    {
        icon: Wrench,
        title: "Repair",
        description: "Expert fixing",
        date: "Step 3",
        iconClassName: "text-purple-500",
        titleClassName: "text-purple-500",
        className: "[grid-area:stack] translate-x-40 translate-y-20 hover:translate-y-10 before:absolute before:w-[100%] before:outline-1 before:rounded-xl before:outline-border before:h-[100%] before:content-[''] before:bg-blend-overlay before:bg-background/50 grayscale-[100%] hover:before:opacity-0 before:transition-opacity before:duration:700 hover:grayscale-0 before:left-0 before:top-0",
    },
    {
        icon: Truck,
        title: "Pickup",
        description: "Ready to go",
        date: "Step 4",
        iconClassName: "text-yellow-500",
        titleClassName: "text-yellow-500",
        className: "[grid-area:stack] translate-x-60 translate-y-30 hover:translate-y-10",
    },
];

const contentVisible = ref(false);
const servicesVisible = ref(false);

const scrollToServices = () => {
    document.getElementById('services')?.scrollIntoView({ behavior: 'smooth' });
};

onMounted(() => {
    // Fade in main title
    setTimeout(() => {
        contentVisible.value = true;
    }, 1000);

    // Fade in services slightly later
    setTimeout(() => {
        servicesVisible.value = true;
    }, 1500);
});
</script>

<template>
    <Head title="Laptop Doctors" />
    <div class="relative min-h-screen bg-black text-white font-sans selection:bg-white/20">
        


        <Navbar />

        <!-- Main Scrollable Content -->
        <div class="relative z-10 w-full flex flex-col items-center">
            
            <!-- Hero Section (Full Viewport Height) -->
            <section class="min-h-screen flex flex-col items-center justify-center p-6 text-center">
                <div 
                    class="transition-all duration-1000 ease-out transform"
                    :class="{ 'opacity-100 translate-y-0': contentVisible, 'opacity-0 translate-y-8': !contentVisible }"
                >
                    <h1 class="text-5xl md:text-8xl font-light tracking-tighter mb-6 bg-clip-text text-transparent bg-gradient-to-b from-white to-white/60">
                        Laptop Doctors
                    </h1>
                    <p class="text-lg md:text-2xl text-white/70 max-w-2xl mx-auto font-light tracking-wide mb-10 leading-relaxed">
                        Precision Repair & Software Excellence.<br/>
                        We bring your digital world back to life.
                    </p>

                    <div class="flex flex-col md:flex-row gap-6 justify-center items-center">
                        <button 
                            @click="scrollToServices"
                            class="group relative px-8 py-4 rounded-full bg-white/10 backdrop-blur-md border border-white/10 hover:bg-white/20 transition-all duration-500 overflow-hidden min-w-[180px]"
                        >
                            <span class="relative text-sm uppercase tracking-[0.2em] font-bold text-white">View Services</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Brand Marquee Section -->
            <section class="w-full pb-20">
                <BrandMarquee />
            </section>

            <!-- Services Details -->
            <section id="services" class="w-full max-w-7xl mx-auto px-6 py-24">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-light mb-4">Our Expertise</h2>
                    <p class="text-white/50 uppercase tracking-widest text-sm">Comprehensive Diagnostics</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Service Card 1 -->
                    <div class="group p-10 rounded-[2.5rem] bg-[#0A0A0A]/80 backdrop-blur-md border border-white/5 hover:border-white/10 transition-all duration-500 hover:transform hover:-translate-y-2">
                        <div class="mb-8 inline-flex p-5 rounded-2xl bg-[#1A1A1A] border border-white/5">
                            <Wrench class="w-8 h-8 text-purple-400" />
                        </div>
                        <h3 class="text-3xl font-light mb-4 text-white tracking-tight">Laptop Repairment</h3>
                        <p class="text-gray-400 leading-relaxed font-light text-lg">
                            From cracked screens to logic board failures. We adhere to the highest industry standards for component-level repair, ensuring your device's longevity.
                        </p>
                        <ul class="mt-8 space-y-3 text-white/60 font-light">
                            <li class="flex items-center gap-3"><CheckCircle2 class="w-4 h-4 text-purple-500"/> Screen & Battery Replacement</li>
                            <li class="flex items-center gap-3"><CheckCircle2 class="w-4 h-4 text-purple-500"/> Water Damage Restoration</li>
                            <li class="flex items-center gap-3"><CheckCircle2 class="w-4 h-4 text-purple-500"/> Motherboard Microsoldering</li>
                        </ul>
                    </div>

                    <!-- Service Card 2 -->
                    <div class="group p-10 rounded-[2.5rem] bg-[#0A0A0A]/80 backdrop-blur-md border border-white/5 hover:border-white/10 transition-all duration-500 hover:transform hover:-translate-y-2">
                        <div class="mb-8 inline-flex p-5 rounded-2xl bg-[#1A1A1A] border border-white/5">
                            <Cpu class="w-8 h-8 text-emerald-400" />
                        </div>
                        <h3 class="text-3xl font-light mb-4 text-white tracking-tight">Software Installation</h3>
                        <p class="text-gray-400 leading-relaxed font-light text-lg">
                            System optimization, OS installation, and essential software setup. We ensure your digital workspace is secure, fast, and ready for productivity.
                        </p>
                        <ul class="mt-8 space-y-3 text-white/60 font-light">
                            <li class="flex items-center gap-3"><CheckCircle2 class="w-4 h-4 text-emerald-500"/> OS Installation (Windows/Linux/MacOS)</li>
                            <li class="flex items-center gap-3"><CheckCircle2 class="w-4 h-4 text-emerald-500"/> Virus & Malware Removal</li>
                            <li class="flex items-center gap-3"><CheckCircle2 class="w-4 h-4 text-emerald-500"/> Data Recovery & Backup</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Why Choose Us -->
            <section class="w-full bg-white/5 backdrop-blur-lg border-y border-white/10 py-24">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                        <div class="text-center space-y-4">
                            <div class="mx-auto w-16 h-16 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 mb-6">
                                <Zap class="w-8 h-8" />
                            </div>
                            <h3 class="text-xl font-medium">Lightning Fast</h3>
                            <p class="text-white/50 leading-relaxed">Most repairs completed within 24-48 hours. We understand your device is essential.</p>
                        </div>
                        <div class="text-center space-y-4">
                            <div class="mx-auto w-16 h-16 rounded-full bg-green-500/10 flex items-center justify-center text-green-400 mb-6">
                                <Shield class="w-8 h-8" />
                            </div>
                            <h3 class="text-xl font-medium">90-Day Warranty</h3>
                            <p class="text-white/50 leading-relaxed">We stand behind our work. All hardware repairs come with a comprehensive warranty.</p>
                        </div>
                        <div class="text-center space-y-4">
                            <div class="mx-auto w-16 h-16 rounded-full bg-orange-500/10 flex items-center justify-center text-orange-400 mb-6">
                                <PenTool class="w-8 h-8" />
                            </div>
                            <h3 class="text-xl font-medium">Certified Pros</h3>
                            <p class="text-white/50 leading-relaxed">Our technicians are certified experts with years of experience in micro-electronics.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Process Section -->
            <section class="w-full max-w-7xl mx-auto px-6 py-24 min-h-[600px] flex flex-col items-center">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-light mb-4">How It Works</h2>
                    <p class="text-white/50 uppercase tracking-widest text-sm">Transparent & Simple</p>
                </div>

                <div class="w-full flex justify-center py-10">
                    <DisplayCards :cards="processCards" />
                </div>
                

            </section>

            <!-- New Hover Footer -->
            <HoverFooter />

        </div>
    </div>
</template>


<style scoped>
/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}
::-webkit-scrollbar-track {
    background: black;
}
::-webkit-scrollbar-thumb {
    background: #333;
    border-radius: 4px;
}
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>

<style scoped>
/* Add any custom animations or font adjustments here if tailwind isn't enough */
</style>
