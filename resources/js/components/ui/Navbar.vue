<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import { Menu, X } from 'lucide-vue-next';

const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);

const handleScroll = () => {
    isScrolled.value = window.scrollY > 50;
};

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <nav 
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-transparent"
        :class="{ 'bg-black/80 backdrop-blur-md border-white/10 py-4': isScrolled, 'bg-transparent py-6': !isScrolled }"
    >
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <!-- Logo -->
            <Link href="/" class="text-xl md:text-2xl font-light tracking-tighter text-white z-50">
                Laptop<span class="font-bold">Doctors</span>
            </Link>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center gap-8">
                <Link href="/" class="text-sm uppercase tracking-widest text-white/70 hover:text-white transition-colors">Home</Link>
                <Link href="/about" class="text-sm uppercase tracking-widest text-white/70 hover:text-white transition-colors">About</Link>
                <Link href="/services" class="text-sm uppercase tracking-widest text-white/70 hover:text-white transition-colors">Services</Link>
                <Link 
                    href="/contact" 
                    class="px-6 py-2 rounded-full bg-white text-black text-xs font-bold uppercase tracking-widest hover:bg-gray-200 transition-colors"
                >
                    Contact Us
                </Link>
            </div>

            <!-- Mobile Menu Toggle -->
            <button @click="toggleMobileMenu" class="md:hidden text-white z-50">
                <Menu v-if="!isMobileMenuOpen" class="w-6 h-6" />
                <X v-else class="w-6 h-6" />
            </button>

            <!-- Mobile Nav Overlay -->
            <div 
                v-if="isMobileMenuOpen"
                class="fixed inset-0 bg-black/95 backdrop-blur-xl flex flex-col items-center justify-center gap-8 md:hidden"
            >
                <Link @click="isMobileMenuOpen = false" href="/" class="text-2xl font-light text-white">Home</Link>
                <Link @click="isMobileMenuOpen = false" href="/about" class="text-2xl font-light text-white">About</Link>
                <Link @click="isMobileMenuOpen = false" href="/services" class="text-2xl font-light text-white">Services</Link>
                <Link @click="isMobileMenuOpen = false" href="/contact" class="text-2xl font-light text-white">Contact</Link>
            </div>
        </div>
    </nav>
</template>
