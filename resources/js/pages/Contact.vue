<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import Navbar from '@/components/ui/Navbar.vue';
import BellLoader from '@/components/ui/BellLoader.vue';
import { Mail, Phone, MapPin, Send, ChevronDown } from 'lucide-vue-next';
import { AccordionContent, AccordionHeader, AccordionItem, AccordionRoot, AccordionTrigger } from 'radix-vue';

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
    <div class="bg-slate-950 min-h-screen">
        <Navbar />
        
        <!-- Bell Loader Hero Section -->
        <div class="relative h-[40vh] md:h-[50vh] w-full overflow-hidden bg-black border-b border-white/5">
            <BellLoader 
                auto-start 
                :duration-ms="3500" 
                loading-label="Connecting..."
                done-label="Service Ready"
                keep-bell-on-when-done
                class="scale-[0.5] md:scale-90"
            />
        </div>

        <!-- Standard Header -->
        <div class="py-12 px-6 text-center border-b border-white/5">
            <h1 class="bg-gradient-to-br from-slate-300 to-slate-500 py-4 bg-clip-text text-center text-4xl font-medium tracking-tight text-transparent md:text-7xl">
                Get in Touch
            </h1>
            <p class="text-white/60 text-lg font-light leading-relaxed max-w-2xl mx-auto mt-4">
                Have a broken device or need a custom build? We are here to help. Reach out to the Laptop Doctors today.
            </p>
        </div>

        <div class="bg-slate-950 py-20">
            <div class="flex flex-col items-center justify-center w-full max-w-6xl mx-auto px-6">
                 <!-- Content Grid -->
                 <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-start text-left">
                     <!-- Contact Info Section -->
                    <div class="space-y-8 animate-in fade-in slide-in-from-left-8 duration-1000">
                        <div class="hidden">
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
                    <div class="bg-[#0A0A0A] p-8 md:p-10 rounded-[2rem] border border-white/10 shadow-2xl animate-in fade-in slide-in-from-right-8 duration-1000 delay-200 relative z-50">
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

        <!-- FAQ Section with Accordion -->
        <div class="bg-slate-950 py-20">
            <div class="w-full max-w-4xl mx-auto px-6">
                 <div class="w-full mt-20 mb-12 max-w-4xl mx-auto">
                     <div class="space-y-2 mb-8">
                         <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-br from-slate-300 to-slate-500 bg-clip-text text-transparent">
                             Frequently Asked Questions
                         </h2>
                         <p class="text-white/60 font-light max-w-2xl">
                             Here are some common questions and answers about our laptop repair services. If you don't find what you're looking for, feel free to reach out.
                         </p>
                     </div>
                     
                     <AccordionRoot
                         type="single"
                         :collapsible="true"
                         default-value="item-1"
                         class="w-full space-y-2"
                     >
                         <AccordionItem
                             value="item-1"
                             class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-colors"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-4 text-[15px] font-semibold text-white hover:no-underline [&[data-state=open]>svg]:rotate-180">
                                     Do you offer a "No Fix, No Fee" policy?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-200" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-4 pt-0 text-white/70 font-light leading-relaxed">
                                     Yes. We believe you should only pay for results. If we cannot repair your device or provide a viable solution, there is no service charge.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <AccordionItem
                             value="item-2"
                             class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-colors"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-4 text-[15px] font-semibold text-white hover:no-underline [&[data-state=open]>svg]:rotate-180">
                                     What brands do you repair?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-200" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-4 pt-0 text-white/70 font-light leading-relaxed">
                                     We service all major brands, including Apple (MacBook), HP, Dell, Lenovo, ASUS, Acer, and Microsoft Surface.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <AccordionItem
                             value="item-3"
                             class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-colors"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-4 text-[15px] font-semibold text-white hover:no-underline [&[data-state=open]>svg]:rotate-180">
                                     Do I need an appointment to bring in my laptop?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-200" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-4 pt-0 text-white/70 font-light leading-relaxed">
                                     No appointment is necessary for walk-ins at our CBD office. However, we do require appointments for home or office visits.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <AccordionItem
                             value="item-4"
                             class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-colors"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-4 text-[15px] font-semibold text-white hover:no-underline [&[data-state=open]>svg]:rotate-180">
                                     How much does a diagnosis cost?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-200" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-4 pt-0 text-white/70 font-light leading-relaxed">
                                     Basic diagnosis is FREE if you bring your laptop to our shop. We will provide a complete estimate before starting any work.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <AccordionItem
                             value="item-5"
                             class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-colors"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-4 text-[15px] font-semibold text-white hover:no-underline [&[data-state=open]>svg]:rotate-180">
                                     How long will the repair take?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-200" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-4 pt-0 text-white/70 font-light leading-relaxed">
                                     Most standard repairs (screen, battery, software) are completed within 1 to 24 hours. Complex motherboard repairs usually take 2–3 business days, depending on parts availability.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <AccordionItem
                             value="item-6"
                             class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-colors"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-4 text-[15px] font-semibold text-white hover:no-underline [&[data-state=open]>svg]:rotate-180">
                                     Is my data safe during the repair?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-200" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-4 pt-0 text-white/70 font-light leading-relaxed">
                                     We prioritize data privacy and follow strict protocols. However, we highly recommend backing up your data before any hardware repair as a precaution.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <AccordionItem
                             value="item-7"
                             class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-colors"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-4 text-[15px] font-semibold text-white hover:no-underline [&[data-state=open]>svg]:rotate-180">
                                     What should I bring when dropping off my laptop?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-200" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-4 pt-0 text-white/70 font-light leading-relaxed">
                                     Please bring the laptop and its charger. You do not need to bring laptop cases or external accessories unless they are part of the problem.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <AccordionItem
                             value="item-8"
                             class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-colors"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-4 text-[15px] font-semibold text-white hover:no-underline [&[data-state=open]>svg]:rotate-180">
                                     Do you use genuine parts?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-200" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-4 pt-0 text-white/70 font-light leading-relaxed">
                                     We use genuine manufacturer parts whenever available. In cases where they are discontinued, we use high-quality, tested third-party alternatives and will always inform you beforehand.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>
                     </AccordionRoot>

                     <p class="text-white/60 font-light mt-8">
                         Can't find what you're looking for? Contact our{' '}
                         <a href="#" class="text-cyan-400 hover:underline">
                             customer support team
                         </a>
                     </p>
                 </div>
            </div>
        </div>
    </div>
</template>
