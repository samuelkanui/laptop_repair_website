<script setup lang="ts">
import { ref } from 'vue';

const brands = [
    { name: 'Apple', slug: 'apple', color: 'white' },
    { name: 'Dell', slug: 'dell' },
    { name: 'HP', slug: 'hp' },
    { name: 'Lenovo', slug: 'lenovo' },
    { name: 'Asus', slug: 'asus' },
    { name: 'Acer', slug: 'acer' },
    { name: 'MSI', slug: 'msi' },
    { name: 'Microsoft', slug: 'microsoft', color: 'white' }, // Force white for visibility
    { name: 'Samsung', slug: 'samsung' },
    { name: 'Razer', slug: 'razer' },
    { name: 'Alienware', slug: 'alienware', color: 'white' },
    { name: 'LG', slug: 'lg' },
    { name: 'Toshiba', slug: 'toshiba' },
    { name: 'Sony', slug: 'sony', color: 'white' },
    { name: 'Panasonic', slug: 'panasonic' },
    { name: 'Fujitsu', slug: 'fujitsu' },
    { name: 'Huawei', slug: 'huawei' },
    { name: 'Xiaomi', slug: 'xiaomi' },
    { name: 'Google', slug: 'google', color: 'white' }, // Google often looks better white on dark in single-color
    { name: 'Intel', slug: 'intel' }, 
];

// Duplicate the list to ensure seamless infinite scrolling
const marqueeList = [...brands, ...brands];
</script>

<template>
    <div class="w-full bg-black/50 overflow-hidden py-10 border-t border-white/5 backdrop-blur-sm">
        <div class="relative w-full max-w-7xl mx-auto px-4">
            <h3 class="text-center text-white/30 text-xs uppercase tracking-[0.3em] mb-12">Trusted Diagnostics For</h3>
            
            <div class="flex overflow-hidden relative fade-mask">
                <div class="flex animate-marquee whitespace-nowrap gap-16 items-center">
                    <div 
                        v-for="(brand, index) in marqueeList" 
                        :key="index"
                        class="group flex items-center justify-center opacity-80 hover:opacity-100 transition-opacity duration-300 select-none px-4 filter drop-shadow-[0_0_8px_rgba(255,255,255,0.05)]"
                    >
                        <img 
                            :src="`https://cdn.simpleicons.org/${brand.slug}${brand.color ? '/' + brand.color : ''}`" 
                            :alt="brand.name"
                            class="h-10 md:h-12 w-auto object-contain max-w-[120px]"
                            @error="(e) => (e.target as HTMLImageElement).style.display = 'none'"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.animate-marquee {
    animation: marquee 60s linear infinite;
}

.fade-mask {
    mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
}

@keyframes marquee {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}
</style>
