<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import Navbar from '@/components/ui/Navbar.vue';
import BellLoader from '@/components/ui/BellLoader.vue';
import ContactCard from '@/components/ui/ContactCard.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import { Mail, Phone, MapPin, Send, ChevronDown, PlusIcon } from 'lucide-vue-next';
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
        <!-- Transitional Header -->
        <div class="relative z-10 py-16 px-6 text-center">
            <div class="max-w-4xl mx-auto space-y-4">
                <h2 class="text-white/40 uppercase tracking-[0.3em] text-xs font-bold animate-in fade-in slide-in-from-bottom-4 duration-1000">
                    We're Ready to Help
                </h2>
                <h1 class="text-4xl md:text-6xl font-light tracking-tight text-white animate-in fade-in slide-in-from-bottom-8 duration-1000 delay-200">
                    Connect with the Doctors
                </h1>
                <p class="text-white/50 text-base md:text-lg font-light max-w-2xl mx-auto animate-in fade-in slide-in-from-bottom-12 duration-1000 delay-500">
                    Whether it's a cracked screen, a slow system, or a custom build request, our experts are standing by to restore your tech.
                </p>
            </div>
        </div>

        <div class="bg-black py-12 relative overflow-visible">
            <!-- Background Radial Glow -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-cyan-500/5 blur-[120px] rounded-full pointer-events-none"></div>
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
                        <div class="space-y-2 group">
                            <Label class="text-white/60 uppercase tracking-widest text-[11px] font-bold group-focus-within:text-cyan-400 transition-colors">Name</Label>
                            <Input 
                                v-model="form.name"
                                placeholder="John Doe"
                                class="bg-white/[0.03] border-white/10 rounded-xl py-6 focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500/50 transition-all"
                                required
                            />
                            <div v-if="form.errors.name" class="text-red-400 text-xs">{{ form.errors.name }}</div>
                        </div>
                        
                        <div class="space-y-2 group">
                            <Label class="text-white/60 uppercase tracking-widest text-[11px] font-bold group-focus-within:text-cyan-400 transition-colors">Email</Label>
                            <Input 
                                v-model="form.email"
                                type="email"
                                placeholder="john@example.com"
                                class="bg-white/[0.03] border-white/10 rounded-xl py-6 focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500/50 transition-all"
                                required
                            />
                            <div v-if="form.errors.email" class="text-red-400 text-xs">{{ form.errors.email }}</div>
                        </div>

                        <div class="space-y-2 group">
                            <Label class="text-white/60 uppercase tracking-widest text-[11px] font-bold group-focus-within:text-cyan-400 transition-colors">Subject</Label>
                            <Input 
                                v-model="form.subject"
                                placeholder="Repair Inquiry / Software Help"
                                class="bg-white/[0.03] border-white/10 rounded-xl py-6 focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500/50 transition-all"
                                required
                            />
                            <div v-if="form.errors.subject" class="text-red-400 text-xs">{{ form.errors.subject }}</div>
                        </div>

                        <div class="space-y-2 group">
                            <Label class="text-white/60 uppercase tracking-widest text-[11px] font-bold group-focus-within:text-cyan-400 transition-colors">Message</Label>
                            <Textarea 
                                v-model="form.message"
                                placeholder="Describe your issue in detail..."
                                class="bg-white/[0.03] border-white/10 rounded-xl min-h-[140px] focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500/50 transition-all"
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
        <div class="bg-black py-20 relative overflow-hidden">
             <!-- Background Radial Glow for FAQ -->
             <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-cyan-500/[0.03] blur-[120px] rounded-full pointer-events-none translate-x-1/2 translate-y-1/2"></div>
             
             <!-- Decorative Icons for FAQ -->
             <PlusIcon class="absolute top-10 left-10 h-6 w-6 text-white/10" />
             <PlusIcon class="absolute top-10 right-10 h-6 w-6 text-white/10" />
             <PlusIcon class="absolute bottom-10 left-10 h-6 w-6 text-white/10" />
             <PlusIcon class="absolute bottom-10 right-10 h-6 w-6 text-white/10" />

             <div class="w-full max-w-4xl mx-auto px-6 relative z-10">
                  <div class="w-full mt-10 mb-12 text-center">
                      <div class="space-y-4 mb-12">
                          <h2 class="text-white/40 uppercase tracking-[0.3em] text-xs font-bold">
                              Common Inquiries
                          </h2>
                          <h2 class="text-4xl md:text-5xl font-light text-white tracking-tight">
                              Frequently Asked Questions
                          </h2>
                          <div class="w-24 h-1 bg-cyan-500/30 mx-auto rounded-full"></div>
                          <p class="text-white/50 font-light max-w-2xl mx-auto text-lg leading-relaxed">
                              Everything you need to know about our repair process, pricing, and warranty protocols.
                          </p>
                      </div>
                     
                     <AccordionRoot
                         type="single"
                         :collapsible="true"
                         default-value="item-1"
                         class="w-full space-y-3"
                     >
                         <!-- FAQ Item 1 -->
                         <AccordionItem
                             value="item-1"
                             class="bg-white/[0.03] backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.05] hover:border-cyan-500/30 transition-all duration-300 group/item"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-5 text-[15px] font-medium text-white/90 hover:no-underline [&[data-state=open]>svg]:rotate-180 group-hover/item:text-white transition-colors">
                                     Do you offer a "No Fix, No Fee" policy?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-300" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-5 pt-0 text-white/60 font-light leading-relaxed">
                                     Yes. We believe you should only pay for results. If we cannot repair your device or provide a viable solution, there is no service charge.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <!-- FAQ Item 2 -->
                         <AccordionItem
                             value="item-2"
                             class="bg-white/[0.03] backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.05] hover:border-cyan-500/30 transition-all duration-300 group/item"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-5 text-[15px] font-medium text-white/90 hover:no-underline [&[data-state=open]>svg]:rotate-180 group-hover/item:text-white transition-colors">
                                     What brands do you repair?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-300" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-5 pt-0 text-white/60 font-light leading-relaxed">
                                     We service all major brands, including Apple (MacBook), HP, Dell, Lenovo, ASUS, Acer, and Microsoft Surface.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <!-- FAQ Item 3 -->
                         <AccordionItem
                             value="item-3"
                             class="bg-white/[0.03] backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.05] hover:border-cyan-500/30 transition-all duration-300 group/item"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-5 text-[15px] font-medium text-white/90 hover:no-underline [&[data-state=open]>svg]:rotate-180 group-hover/item:text-white transition-colors">
                                     Do I need an appointment to bring in my laptop?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-300" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-5 pt-0 text-white/70 font-light leading-relaxed">
                                     No appointment is necessary for walk-ins at our CBD office. However, we do require appointments for home or office visits.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <!-- FAQ Item 4 -->
                         <AccordionItem
                             value="item-4"
                             class="bg-white/[0.03] backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.05] hover:border-cyan-500/30 transition-all duration-300 group/item"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-5 text-[15px] font-medium text-white/90 hover:no-underline [&[data-state=open]>svg]:rotate-180 group-hover/item:text-white transition-colors">
                                     How much does a diagnosis cost?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-300" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-5 pt-0 text-white/70 font-light leading-relaxed">
                                     Basic diagnosis is FREE if you bring your laptop to our shop. We will provide a complete estimate before starting any work.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <!-- FAQ Item 5 -->
                         <AccordionItem
                             value="item-5"
                             class="bg-white/[0.03] backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.05] hover:border-cyan-500/30 transition-all duration-300 group/item"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-5 text-[15px] font-medium text-white/90 hover:no-underline [&[data-state=open]>svg]:rotate-180 group-hover/item:text-white transition-colors">
                                     How long will the repair take?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-300" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-5 pt-0 text-white/70 font-light leading-relaxed">
                                     Most standard repairs (screen, battery, software) are completed within 1 to 24 hours. Complex motherboard repairs usually take 2–3 business days, depending on parts availability.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <!-- FAQ Item 6 -->
                         <AccordionItem
                             value="item-6"
                             class="bg-white/[0.03] backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.05] hover:border-cyan-500/30 transition-all duration-300 group/item"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-5 text-[15px] font-medium text-white/90 hover:no-underline [&[data-state=open]>svg]:rotate-180 group-hover/item:text-white transition-colors">
                                     Is my data safe during the repair?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-300" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-5 pt-0 text-white/70 font-light leading-relaxed">
                                     We prioritize data privacy and follow strict protocols. However, we highly recommend backing up your data before any hardware repair as a precaution.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <!-- FAQ Item 7 -->
                         <AccordionItem
                             value="item-7"
                             class="bg-white/[0.03] backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.05] hover:border-cyan-500/30 transition-all duration-300 group/item"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-5 text-[15px] font-medium text-white/90 hover:no-underline [&[data-state=open]>svg]:rotate-180 group-hover/item:text-white transition-colors">
                                     What should I bring when dropping off my laptop?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-300" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-5 pt-0 text-white/70 font-light leading-relaxed">
                                     Please bring the laptop and its charger. You do not need to bring laptop cases or external accessories unless they are part of the problem.
                                 </div>
                             </AccordionContent>
                         </AccordionItem>

                         <!-- FAQ Item 8 -->
                         <AccordionItem
                             value="item-8"
                             class="bg-white/[0.03] backdrop-blur-md border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.05] hover:border-cyan-500/30 transition-all duration-300 group/item"
                         >
                             <AccordionHeader class="flex">
                                 <AccordionTrigger class="flex flex-1 items-center justify-between px-6 py-5 text-[15px] font-medium text-white/90 hover:no-underline [&[data-state=open]>svg]:rotate-180 group-hover/item:text-white transition-colors">
                                     Do you use genuine parts?
                                     <ChevronDown class="h-5 w-5 text-cyan-400 shrink-0 transition-transform duration-300" />
                                 </AccordionTrigger>
                             </AccordionHeader>
                             <AccordionContent class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                 <div class="px-6 pb-5 pt-0 text-white/70 font-light leading-relaxed">
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
