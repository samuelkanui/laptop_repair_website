<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/ui/Navbar.vue';
import HoverFooter from '@/components/ui/HoverFooter.vue';
import SpiralAnimation from '@/components/ui/SpiralAnimation.vue';
import NeonCrystalCity from '@/components/ui/NeonCrystalCity.vue';
import { Wrench, Cpu, Search, HardDrive, Shield, Zap } from 'lucide-vue-next';

// Images - usually these would be dynamic or imported, but for now we reference the generated artifacts or placeholders
// Since we are generating images, we will assume they are in /assets or we will use absolute paths if they are artifacts. 
// For this template, I'll use absolute paths to the artifacts I'm generating.
// NOTE: Ideally these should be moved to public/images, but I will link them directly if possible or use placeholders if generation is pending.
// I will use placeholders first and then update if needed, but the prompt says "Don't use placeholders".
// I will assume the generate_image tool puts them in the brain folder, which is not directly accessible by the browser unless served.
// BETTER APPROACH: I will expect the user to move them or I will just reference them knowing they are on the disk.
// actually, for the web app to see them, they need to be in public.
// I will use generic high-quality text descriptors or CSS backgrounds if I can't move files easily.
// WAIT, I can write to public folder. I should probably move the generated images to public/images/services/ after generation.
// For now, in this step, I will create the file and assume images are handled or I'll use a gradient fallback.

// Let's use the image paths that will likely mirror the artifact names, but I can't predict exact paths until generation returns.
// I'll use a computed property or variable for them.
</script>

<template>
    <Head title="Our Services" />
    <div class="min-h-screen w-full bg-black text-white font-sans selection:bg-white/20">
        
        <!-- Background -->
        <div class="fixed inset-0 z-0 pointer-events-none">
             <NeonCrystalCity class="w-full h-full opacity-50" />
             <!-- Gradient Overlay for readability -->
             <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black/80 z-10"></div>
        </div>

        <Navbar />

        <div class="relative z-10 w-full flex flex-col items-center pt-32 pb-20">
            
            <!-- Hero -->
            <div class="text-center px-6 mb-24 max-w-4xl mx-auto">
                <span class="text-purple-400 uppercase tracking-widest text-sm font-medium mb-4 block">What We Do</span>
                <h1 class="text-5xl md:text-7xl font-light tracking-tight mb-8 bg-clip-text text-transparent bg-gradient-to-b from-white to-white/60">
                    Comprehensive<br />Repair Solutions
                </h1>
                <p class="text-xl text-gray-400 font-light leading-relaxed">
                    From complex motherboard microsoldering to enterprise-grade data recovery. 
                    We leverage state-of-the-art diagnostic tools to restore your technology.
                </p>
            </div>

            <!-- Service Sections -->
            <div class="w-full max-w-7xl mx-auto px-6 space-y-32">
                
                <!-- 1. Advanced Hardware Repairs -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center group">
                    <div class="order-2 md:order-1 space-y-8">
                        <div class="inline-flex p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                            <Wrench class="w-8 h-8 text-blue-400" />
                        </div>
                        <h2 class="text-4xl font-light text-white">Advanced Hardware Repairs</h2>
                        <ul class="space-y-6 text-gray-400 text-lg font-light">
                            <li class="flex items-start gap-4">
                                <span class="bg-blue-500/20 p-2 rounded-full text-blue-400 mt-1 shrink-0"><Zap class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">Motherboard Microsoldering</strong>
                                    Specialized, chip-level repairs for complex faults other technicians might reject. We fix power failures, logic board issues, and BGA/graphics faults.
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="bg-blue-500/20 p-2 rounded-full text-blue-400 mt-1 shrink-0"><Zap class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">Liquid Damage Restoration</strong>
                                    Comprehensive ultrasonic cleaning and circuit repair for laptops affected by spills or moisture.
                                </div>
                            </li>
                             <li class="flex items-start gap-4">
                                <span class="bg-blue-500/20 p-2 rounded-full text-blue-400 mt-1 shrink-0"><Zap class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">Screen & Display Replacement</strong>
                                    Precision replacement for cracked or malfunctioning LCD/LED and Retina displays for all brands.
                                </div>
                            </li>
                             <li class="flex items-start gap-4">
                                <span class="bg-blue-500/20 p-2 rounded-full text-blue-400 mt-1 shrink-0"><Zap class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">Battery & Structural Repairs</strong>
                                    Genuine battery replacements, charging port fixes, hinge repairs, and tracking pad/casing replacements.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="order-1 md:order-2 h-[600px] rounded-[3rem] overflow-hidden border border-white/10 relative group-hover:scale-[1.02] transition-transform duration-700">
                         <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 to-black/80 z-10"></div>
                         <img src="/images/hardware_repair.webp" alt="Hardware Repair" class="object-cover w-full h-full opacity-60 group-hover:opacity-80 transition-opacity duration-700" />
                    </div>
                </div>

                <!-- 2. Performance Upgrades -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center group">
                    <div class="order-1 h-[500px] rounded-[3rem] overflow-hidden border border-white/10 relative group-hover:scale-[1.02] transition-transform duration-700">
                         <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/40 to-black/80 z-10"></div>
                         <img src="/images/diagnostics.webp" alt="Performance Upgrades" class="object-cover w-full h-full opacity-60 group-hover:opacity-80 transition-opacity duration-700" />
                    </div>
                    <div class="order-2 space-y-8">
                        <div class="inline-flex p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                            <Zap class="w-8 h-8 text-emerald-400" />
                        </div>
                        <h2 class="text-4xl font-light text-white">Performance Upgrades</h2>
                        <ul class="space-y-6 text-gray-400 text-lg font-light">
                             <li class="flex items-start gap-4">
                                <span class="bg-emerald-500/20 p-2 rounded-full text-emerald-400 mt-1 shrink-0"><HardDrive class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">SSD Upgrades</strong>
                                    Replace slow HDDs with high-speed SSDs for significantly faster boot times and responsiveness.
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="bg-emerald-500/20 p-2 rounded-full text-emerald-400 mt-1 shrink-0"><HardDrive class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">RAM Expansion</strong>
                                    Increase system memory to handle heavy multitasking, creative design, and professional software.
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="bg-emerald-500/20 p-2 rounded-full text-emerald-400 mt-1 shrink-0"><HardDrive class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">System Maintenance</strong>
                                    Deep cleaning of cooling fans and thermal paste replacement to prevent overheating.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                 <!-- 3. Software & OS Solutions -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center group">
                    <div class="order-2 md:order-1 space-y-8">
                        <div class="inline-flex p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                            <Cpu class="w-8 h-8 text-purple-400" />
                        </div>
                        <h2 class="text-4xl font-light text-white">Software & OS Solutions</h2>
                        <ul class="space-y-6 text-gray-400 text-lg font-light">
                             <li class="flex items-start gap-4">
                                <span class="bg-purple-500/20 p-2 rounded-full text-purple-400 mt-1 shrink-0"><Shield class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">OS Installation</strong>
                                    Clean install of Windows (10/11), macOS, and Linux with drivers and security patches.
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="bg-purple-500/20 p-2 rounded-full text-purple-400 mt-1 shrink-0"><Shield class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">Virus & Malware Removal</strong>
                                    Expert detection and removal of spyware, ransomware, and trojans, plus security setup.
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="bg-purple-500/20 p-2 rounded-full text-purple-400 mt-1 shrink-0"><Shield class="w-4 h-4" /></span>
                                <div>
                                    <strong class="text-white block mb-1">Data Recovery & Backup</strong>
                                    Secure retrieval of corrupted files and setup of automated data protection.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="order-1 md:order-2 h-[500px] rounded-[3rem] overflow-hidden border border-white/10 relative group-hover:scale-[1.02] transition-transform duration-700">
                         <div class="absolute inset-0 bg-gradient-to-br from-purple-900/40 to-black/80 z-10"></div>
                         <img src="/images/software_code.webp" alt="Software Services" class="object-cover w-full h-full opacity-60 group-hover:opacity-80 transition-opacity duration-700" />
                    </div>
                </div>

                <!-- 4. Why Choose Laptop Doctors? -->
                <div class="w-full bg-white/5 border border-white/10 rounded-[3rem] p-10 md:p-16 text-center">
                    <h2 class="text-4xl font-light text-white mb-16">Why Choose Laptop Doctors?</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="p-6 rounded-2xl bg-black/40 border border-white/5">
                            <h3 class="text-white text-xl font-medium mb-3">Home & Office Visits</h3>
                            <p class="text-gray-400 font-light">We offer on-site repairs at your convenience across Nairobi.</p>
                        </div>
                        <div class="p-6 rounded-2xl bg-black/40 border border-white/5">
                            <h3 class="text-white text-xl font-medium mb-3">No Fix, No Fee</h3>
                            <p class="text-gray-400 font-light">If we cannot complete your repair, there is absolutely no charge.</p>
                        </div>
                        <div class="p-6 rounded-2xl bg-black/40 border border-white/5">
                            <h3 class="text-white text-xl font-medium mb-3">Fast Turnaround</h3>
                            <p class="text-gray-400 font-light">Most standard repairs done within 24–48 hours; same-day often available.</p>
                        </div>
                        <div class="p-6 rounded-2xl bg-black/40 border border-white/5">
                            <h3 class="text-white text-xl font-medium mb-3">Specialist Expertise</h3>
                            <p class="text-gray-400 font-light">Experts in Apple MacBook, Dell, HP, Lenovo, ASUS, and Acer.</p>
                        </div>
                    </div>
                </div>

            </div>

             <div class="mt-32 w-full">
                <HoverFooter />
            </div>
            
        </div>
    </div>
</template>
