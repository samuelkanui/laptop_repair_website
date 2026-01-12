<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import SpiralAnimation from '@/components/ui/SpiralAnimation.vue';
import { Mail, Phone, MapPin, Send } from 'lucide-vue-next';

const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
});

const submit = () => {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Contact Us" />
    <div class="fixed inset-0 w-full h-full overflow-hidden bg-black text-white font-sans selection:bg-white/20 overflow-y-auto">
        <!-- Background -->
        <div class="fixed inset-0 z-0 opacity-40 pointer-events-none">
            <SpiralAnimation />
        </div>

        <div class="relative z-10 min-h-screen flex flex-col items-center justify-center p-6 md:p-12">
            
            <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-12 items-start mt-20 md:mt-0">
                
                <!-- Contact Info Section -->
                <div class="space-y-8 animate-in fade-in slide-in-from-left-8 duration-1000">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-light tracking-tighter mb-4 bg-clip-text text-transparent bg-gradient-to-r from-white to-white/60">
                            Get in Touch
                        </h1>
                        <p class="text-white/60 text-lg font-light leading-relaxed">
                            Have a broken device or need a custom build? We are here to help. Reach out to the Laptop Doctors today.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors">
                            <div class="bg-blue-500/20 p-3 rounded-lg text-blue-300">
                                <Mail class="w-6 h-6" />
                            </div>
                            <div>
                                <h3 class="text-white font-medium mb-1">Email Us</h3>
                                <p class="text-white/50 font-light">support@laptopdoctors.com</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors">
                            <div class="bg-purple-500/20 p-3 rounded-lg text-purple-300">
                                <Phone class="w-6 h-6" />
                            </div>
                            <div>
                                <h3 class="text-white font-medium mb-1">Call Us</h3>
                                <p class="text-white/50 font-light">+1 (555) 123-4567</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors">
                            <div class="bg-emerald-500/20 p-3 rounded-lg text-emerald-300">
                                <MapPin class="w-6 h-6" />
                            </div>
                            <div>
                                <h3 class="text-white font-medium mb-1">Visit Us</h3>
                                <p class="text-white/50 font-light">123 Tech Avenue, Silicon Valley, CA</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Section -->
                <div class="bg-[#0A0A0A] p-8 md:p-10 rounded-[2rem] border border-white/10 shadow-2xl animate-in fade-in slide-in-from-right-8 duration-1000 delay-200">
                    <form @submit.prevent="submit" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm uppercase tracking-wider text-white/40">Name</label>
                                <input 
                                    v-model="form.name"
                                    type="text" 
                                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all font-light"
                                    placeholder="John Doe"
                                    required
                                />
                                <div v-if="form.errors.name" class="text-red-400 text-xs mt-1">{{ form.errors.name }}</div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm uppercase tracking-wider text-white/40">Email</label>
                                <input 
                                    v-model="form.email"
                                    type="email" 
                                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all font-light"
                                    placeholder="john@example.com"
                                    required
                                />
                                <div v-if="form.errors.email" class="text-red-400 text-xs mt-1">{{ form.errors.email }}</div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm uppercase tracking-wider text-white/40">Subject</label>
                            <input 
                                v-model="form.subject"
                                type="text" 
                                class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all font-light"
                                placeholder="Repair Inquiry / Software Help"
                                required
                            />
                            <div v-if="form.errors.subject" class="text-red-400 text-xs mt-1">{{ form.errors.subject }}</div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm uppercase tracking-wider text-white/40">Message</label>
                            <textarea 
                                v-model="form.message"
                                rows="5"
                                class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all font-light resize-none"
                                placeholder="Describe your issue..."
                                required
                            ></textarea>
                            <div v-if="form.errors.message" class="text-red-400 text-xs mt-1">{{ form.errors.message }}</div>
                        </div>

                        <button 
                            :disabled="form.processing" 
                            type="submit" 
                            class="w-full bg-white text-black font-semibold rounded-xl py-4 hover:bg-white/90 transition-all flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed"
                        >
                            <span v-if="form.processing">Sending...</span>
                            <span v-else class="flex items-center gap-2">Send Message <Send class="w-4 h-4" /></span>
                        </button>
                        
                        <div v-if="form.recentlySuccessful" class="text-emerald-400 text-center text-sm mt-4 animate-pulse">
                            Message sent successfully! We will get back to you shortly.
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>
