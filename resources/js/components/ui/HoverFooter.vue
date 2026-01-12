<script setup lang="ts">
import { Mail, Phone, MapPin, Facebook, Instagram, Twitter, Dribbble, Globe, Heart } from 'lucide-vue-next';
import TextHoverEffect from '@/components/ui/TextHoverEffect.vue';
import { ref } from 'vue';

const footerLinks = [
    {
        title: "About Us",
        links: [
            { label: "Our Story", href: "/about" },
            { label: "Our Services", href: "/#services" },
            { label: "Careers", href: "#" },
            { label: "Privacy Policy", href: "#" },
        ],
    },
    {
        title: "Helpful Links",
        links: [
            { label: "Contact Support", href: "/contact" },
            { label: "FAQs", href: "#" },
            {
                label: "Live Chat",
                href: "#",
                pulse: true,
            },
        ],
    },
];

const contactInfo = [
    {
        icon: Mail,
        text: "support@laptopdoctors.com",
        href: "mailto:support@laptopdoctors.com",
    },
    {
        icon: Phone,
        text: "+1 (555) 123-4567",
        href: "tel:+15551234567",
    },
    {
        icon: MapPin,
        text: "123 Tech Avenue, Silicon Valley",
        href: null,
    },
];

const socialLinks = [
    { icon: Facebook, label: "Facebook", href: "#" },
    { icon: Instagram, label: "Instagram", href: "#" },
    { icon: Twitter, label: "Twitter", href: "#" },
    { icon: Globe, label: "Website", href: "https://xubh.top/" },
];
</script>

<template>
    <footer class="bg-[#0F0F11] relative h-fit rounded-[3rem] overflow-hidden m-4 md:m-8 border border-white/5 shadow-2xl">
        <div class="max-w-7xl mx-auto p-12 md:p-14 z-40 relative">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 md:gap-8 lg:gap-16 pb-12">
                <!-- Brand section -->
                <div class="flex flex-col space-y-4">
                    <div class="flex items-center space-x-2">
                        <Heart class="text-[#3ca2fa] w-6 h-6 fill-current" />
                        <span class="text-white text-3xl font-bold tracking-tight">Laptop Doctors</span>
                    </div>
                    <p class="text-sm leading-relaxed text-gray-400">
                        Restoring digital lives with precision, speed, and transparency.
                    </p>
                </div>

                <!-- Footer link sections -->
                <div v-for="section in footerLinks" :key="section.title">
                    <h4 class="text-white text-lg font-semibold mb-6">
                        {{ section.title }}
                    </h4>
                    <ul class="space-y-3">
                        <li v-for="link in section.links" :key="link.label" class="relative">
                            <a
                                :href="link.href"
                                class="text-gray-400 hover:text-[#3ca2fa] transition-colors text-sm"
                            >
                                {{ link.label }}
                            </a>
                            <span v-if="link.pulse" class="absolute top-0 -right-3 w-2 h-2 rounded-full bg-[#3ca2fa] animate-pulse"></span>
                        </li>
                    </ul>
                </div>

                <!-- Contact section -->
                <div>
                    <h4 class="text-white text-lg font-semibold mb-6">
                        Contact Us
                    </h4>
                    <ul class="space-y-4">
                        <li v-for="(item, i) in contactInfo" :key="i" class="flex items-center space-x-3">
                            <component :is="item.icon" class="w-4 h-4 text-[#3ca2fa]" />
                            <a
                                v-if="item.href"
                                :href="item.href"
                                class="text-gray-400 hover:text-[#3ca2fa] transition-colors text-sm"
                            >
                                {{ item.text }}
                            </a>
                            <span v-else class="text-gray-400 text-sm">
                                {{ item.text }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-t border-gray-800 my-8" />

            <!-- Footer bottom -->
            <div class="flex flex-col md:flex-row justify-between items-center text-sm space-y-4 md:space-y-0 relative z-50">
                <!-- Social icons -->
                <div class="flex space-x-6 text-gray-400">
                    <a
                        v-for="link in socialLinks"
                        :key="link.label"
                        :href="link.href"
                        :aria-label="link.label"
                        class="hover:text-[#3ca2fa] transition-colors"
                    >
                        <component :is="link.icon" class="w-5 h-5" />
                    </a>
                </div>

                <!-- Copyright -->
                <p class="text-center md:text-left text-gray-500">
                    &copy; 2026 Laptop Doctors. All rights reserved.
                </p>
            </div>
        </div>

        <!-- Text hover effect -->
        <div class="lg:flex hidden h-[20rem] md:h-[30rem] w-full items-center justify-center absolute bottom-[-5rem] left-0 pointer-events-none z-0 mix-blend-overlay opacity-50">
             <div class="w-full h-full flex items-end justify-center">
                <TextHoverEffect text="LAPTOP DOCTORS" class-name="translate-y-[40%]" />
             </div>
        </div>

        <!-- Background Gradient -->
        <div
            class="absolute inset-0 z-0 pointer-events-none"
            style="background: radial-gradient(circle at 50% 0%, #0F0F11 10%, #3ca2fa10 100%, transparent);"
        ></div>
    </footer>
</template>
