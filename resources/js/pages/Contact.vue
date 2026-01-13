<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import Navbar from '@/components/ui/Navbar.vue';
import BellLoader from '@/components/ui/BellLoader.vue';
import ContactCard from '@/components/ui/ContactCard.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
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
    <div class="bg-black text-white min-h-screen selection:bg-white/20">
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


        <div class="bg-black py-20">
            <div class="w-full max-w-6xl mx-auto px-6">
                <ContactCard
                    title="Get in Touch"
                    description="Have a broken device or need a custom build? We are here to help. Reach out to the Laptop Doctors today."
                    :contact-info="[
                        {
                            icon: Mail,
                            label: 'Email Us',
                            value: 'support@laptopdoctors.com',
                        },
                        {
                            icon: Phone,
                            label: 'Call Us',
                            value: '+1 (555) 123-4567',
                        },
                        {
                            icon: MapPin,
                            label: 'Visit Us',
                            value: '123 Tech Avenue, Silicon Valley, CA',
                            class: 'sm:col-span-2 lg:col-span-1'
                        }
                    ]"
                    class="rounded-[2rem] border-white/10 bg-[#0A0A0A] overflow-visible"
                    formSectionClassName="bg-white/[0.01]"
                >
                    <form @submit.prevent="submit" class="space-y-5">
                        <div class="space-y-2">
                            <Label class="text-white/40 uppercase tracking-wider text-[10px]">Name</Label>
                            <Input 
                                v-model="form.name"
                                placeholder="John Doe"
                                class="bg-white/5 border-white/10 rounded-xl py-6"
                                required
                            />
                            <div v-if="form.errors.name" class="text-red-400 text-xs">{{ form.errors.name }}</div>
                        </div>
                        
                        <div class="space-y-2">
                            <Label class="text-white/40 uppercase tracking-wider text-[10px]">Email</Label>
                            <Input 
                                v-model="form.email"
                                type="email"
                                placeholder="john@example.com"
                                class="bg-white/5 border-white/10 rounded-xl py-6"
                                required
                            />
                            <div v-if="form.errors.email" class="text-red-400 text-xs">{{ form.errors.email }}</div>
                        </div>

                        <div class="space-y-2">
                            <Label class="text-white/40 uppercase tracking-wider text-[10px]">Subject</Label>
                            <Input 
                                v-model="form.subject"
                                placeholder="Repair Inquiry / Software Help"
                                class="bg-white/5 border-white/10 rounded-xl py-6"
                                required
                            />
                            <div v-if="form.errors.subject" class="text-red-400 text-xs">{{ form.errors.subject }}</div>
                        </div>

                        <div class="space-y-2">
                            <Label class="text-white/40 uppercase tracking-wider text-[10px]">Message</Label>
                            <Textarea 
                                v-model="form.message"
                                placeholder="Describe your issue..."
                                class="bg-white/5 border-white/10 rounded-xl min-h-[120px]"
                                required
                            />
                            <div v-if="form.errors.message" class="text-red-400 text-xs">{{ form.errors.message }}</div>
                        </div>

                        <Button 
                            type="submit" 
                            class="w-full bg-white text-black hover:bg-white/90 rounded-xl py-7 font-bold transition-all disabled:opacity-50"
                            :disabled="form.processing"
                        >
                            <div class="flex items-center gap-2">
                                {{ form.processing ? 'Sending...' : 'Send Message' }}
                                <Send v-if="!form.processing" class="w-4 h-4" />
                            </div>
                        </Button>

                        <Transition
                            enter-active-class="transition duration-300 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-75 ease-in"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0"
                        >
                            <div v-if="form.recentlySuccessful" class="text-emerald-400 text-center text-sm pt-2">
                                Message sent successfully!
                            </div>
                        </Transition>
                    </form>
                </ContactCard>
            </div>
        </div>

        <!-- FAQ Section with Accordion -->
        <div class="bg-black py-20">
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
