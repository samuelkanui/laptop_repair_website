<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SpiralAnimation from '@/components/ui/SpiralAnimation.vue';
import Navbar from '@/components/ui/Navbar.vue';
import { ShieldCheck, Clock, Users, Wrench } from 'lucide-vue-next';
</script>

<template>
    <Head title="About Us" />
    <div class="fixed inset-0 w-full h-full overflow-hidden bg-black text-white font-sans selection:bg-white/20 overflow-y-auto">
        <!-- Background -->
        <div class="fixed inset-0 z-0 opacity-40 pointer-events-none">
            <SpiralAnimation />
        </div>

        <Navbar />

        <div class="relative z-10 w-full flex flex-col items-center">
            
            <!-- Hero Section -->
            <div class="min-h-[80vh] flex flex-col items-center justify-center p-6 text-center animate-in fade-in zoom-in-95 duration-1000">
                <h1 class="text-5xl md:text-8xl font-light tracking-tighter mb-6 bg-clip-text text-transparent bg-gradient-to-b from-white to-white/50">
                    Restoring<br/>Digital Lives
                </h1>
                <p class="text-lg md:text-2xl text-white/60 max-w-2xl mx-auto font-light leading-relaxed">
                    We are the <span class="text-white font-medium">Laptop Doctors</span>. <br/>
                    Dedication to precision, transparency, and the art of hardware revival.
                </p>
            </div>

            <!-- Stats grid -->
            <div class="w-full max-w-6xl px-6 grid grid-cols-2 md:grid-cols-4 gap-8 mb-32">
                <div class="text-center space-y-2 p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-400">10+</div>
                    <div class="text-xs uppercase tracking-widest text-white/50">Years Experience</div>
                </div>
                <div class="text-center space-y-2 p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-400 to-teal-400">5k+</div>
                    <div class="text-xs uppercase tracking-widest text-white/50">Devices Fixed</div>
                </div>
                <div class="text-center space-y-2 p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-orange-400 to-red-400">24h</div>
                    <div class="text-xs uppercase tracking-widest text-white/50">Avg. Turnaround</div>
                </div>
                <div class="text-center space-y-2 p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-rose-400">100%</div>
                    <div class="text-xs uppercase tracking-widest text-white/50">Satisfaction</div>
                </div>
            </div>

            <!-- Story Section -->
            <div class="w-full bg-[#0A0A0A] border-t border-white/10 py-24 px-6">
                <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                    <div class="space-y-6">
                        <div class="text-purple-400 uppercase tracking-widest text-sm font-medium">The Mission</div>
                        <h2 class="text-4xl font-light text-white">More than just repairs.</h2>
                        <p class="text-gray-400 leading-relaxed text-lg">
                            Founded in 2016, Laptop Doctors started with a simple toolbox and a passion for technology. We noticed a gap in the market: repairs were slow, expensive, and opaque.
                        </p>
                        <p class="text-gray-400 leading-relaxed text-lg">
                            We set out to change that. By combining expert diagnostic tools with component-level repair capabilities, we save devices others condemn to the landfill. We believe in the right to repair and the longevity of high-quality electronics.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4 pt-8">
                            <div class="p-6 bg-[#151515] rounded-2xl border border-white/5">
                                <ShieldCheck class="w-8 h-8 text-white mb-4" />
                                <h4 class="text-white font-medium">Warranty</h4>
                                <p class="text-gray-500 text-sm mt-2">Every repair is backed by our guarantee.</p>
                            </div>
                            <div class="p-6 bg-[#151515] rounded-2xl border border-white/5">
                                <Clock class="w-8 h-8 text-white mb-4" />
                                <h4 class="text-white font-medium">Speed</h4>
                                <p class="text-gray-500 text-sm mt-2">We value your time as much as you do.</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="p-6 bg-[#151515] rounded-2xl border border-white/5">
                                <Wrench class="w-8 h-8 text-white mb-4" />
                                <h4 class="text-white font-medium">Expertise</h4>
                                <p class="text-gray-500 text-sm mt-2">Certified technicians on every job.</p>
                            </div>
                            <div class="p-6 bg-[#151515] rounded-2xl border border-white/5">
                                <Users class="w-8 h-8 text-white mb-4" />
                                <h4 class="text-white font-medium">Personal</h4>
                                <p class="text-gray-500 text-sm mt-2">You speak to the tech fixing your device.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="w-full py-24 text-center">
                <h2 class="text-3xl text-white font-light mb-8">Ready to fix your device?</h2>
                <a 
                    href="/contact"
                    class="inline-block px-10 py-4 rounded-full bg-white text-black font-semibold tracking-widest uppercase hover:bg-gray-200 transition-colors"
                >
                    Get in Touch
                </a>
            </div>

            <div class="w-full text-center text-white/30 text-xs tracking-widest uppercase pb-6">
                &copy; 2026 Laptop Doctors.
            </div>

        </div>
    </div>
</template>
