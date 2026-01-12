<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SpiralAnimation from '@/components/ui/SpiralAnimation.vue';
import BrandMarquee from '@/components/ui/BrandMarquee.vue';
import Navbar from '@/components/ui/Navbar.vue';
import { ref, onMounted } from 'vue';
import { Monitor, Cpu, Wrench, HardDrive, CheckCircle2, Zap, Shield, Search, PenTool, Truck } from 'lucide-vue-next';

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
        
        <!-- Fixed Background Animation -->
        <div class="fixed inset-0 z-0 opacity-60 pointer-events-none">
            <SpiralAnimation />
        </div>

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
            <section class="w-full max-w-7xl mx-auto px-6 py-24">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-light mb-4">How It Works</h2>
                    <p class="text-white/50 uppercase tracking-widest text-sm">Transparent & Simple</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                    <!-- Line connecting steps (Desktop only) -->
                    <div class="hidden md:block absolute top-8 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-white/20 to-transparent -z-10"></div>

                    <div class="bg-black/50 border border-white/10 p-8 rounded-2xl text-center relative hover:bg-white/5 transition-colors">
                        <div class="w-16 h-16 bg-[#111] border border-white/20 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 transform -translate-y-12">1</div>
                        <Search class="w-8 h-8 mx-auto mb-4 text-white/60" />
                        <h4 class="text-lg font-medium mb-2">Diagnosis</h4>
                        <p class="text-sm text-white/40">We inspect your device and identify the root cause.</p>
                    </div>

                    <div class="bg-black/50 border border-white/10 p-8 rounded-2xl text-center relative hover:bg-white/5 transition-colors">
                        <div class="w-16 h-16 bg-[#111] border border-white/20 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 transform -translate-y-12">2</div>
                        <Monitor class="w-8 h-8 mx-auto mb-4 text-white/60" />
                        <h4 class="text-lg font-medium mb-2">Quote</h4>
                        <p class="text-sm text-white/40">You receive a transparent price quote. No hidden fees.</p>
                    </div>

                    <div class="bg-black/50 border border-white/10 p-8 rounded-2xl text-center relative hover:bg-white/5 transition-colors">
                        <div class="w-16 h-16 bg-[#111] border border-white/20 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 transform -translate-y-12">3</div>
                        <Wrench class="w-8 h-8 mx-auto mb-4 text-white/60" />
                        <h4 class="text-lg font-medium mb-2">Repair</h4>
                        <p class="text-sm text-white/40">Our experts get to work using high-quality parts.</p>
                    </div>

                    <div class="bg-black/50 border border-white/10 p-8 rounded-2xl text-center relative hover:bg-white/5 transition-colors">
                        <div class="w-16 h-16 bg-[#111] border border-white/20 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 transform -translate-y-12">4</div>
                        <Truck class="w-8 h-8 mx-auto mb-4 text-white/60" />
                        <h4 class="text-lg font-medium mb-2">Pickup</h4>
                        <p class="text-sm text-white/40">Test your device and pay only when satisfied.</p>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="w-full bg-[#050505] border-t border-white/10 py-12 px-6">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8 text-center md:text-left">
                    <div>
                        <div class="text-2xl font-bold text-white mb-2">LaptopDoctors</div>
                        <p class="text-white/40 text-sm">Your trusted partner for all tech repairs.</p>
                    </div>
                    <div class="flex gap-8 text-sm text-white/60">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                        <a href="/contact" class="hover:text-white transition-colors">Contact</a>
                    </div>
                    <div class="text-white/30 text-xs tracking-widest uppercase">
                        &copy; 2026 Laptop Doctors.
                    </div>
                </div>
            </footer>

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
