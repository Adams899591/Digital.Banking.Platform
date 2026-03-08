            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-8 bg-gray-50" x-data="{ showTicketModal: false, showChatModal: false }">
                
                <!-- Search Hero -->
                <div class="bg-bank-navy rounded-xl p-6 md:p-8 text-center text-white mb-8 relative overflow-hidden shadow-lg">
                    <div class="relative z-10">
                        <h1 class="text-2xl md:text-3xl font-bold mb-4">How can we help you today?</h1>
                        <div class="max-w-2xl mx-auto relative">
                            <input type="text" placeholder="Search for help articles, topics, or questions..." class="w-full py-3 px-5 pl-12 rounded-lg text-sm md:text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-bank-gold shadow-lg">
                            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <!-- Decorative circles -->
                    <div class="absolute top-0 left-0 w-64 h-64 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
                    <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/5 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- FAQ / Categories -->
                    <div class="lg:col-span-2 space-y-8">
                        <div>
                            <h3 class="text-xl font-bold text-bank-navy mb-4">Common Topics</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Topic 1 -->
                                <a href="#" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:border-bank-gold transition-colors group">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-4 group-hover:bg-bank-gold group-hover:text-white transition-colors">
                                        <i class="fa-solid fa-user-lock"></i>
                                    </div>
                                    <h4 class="font-bold text-bank-navy mb-2">Account Security</h4>
                                    <p class="text-sm text-gray-500">Password reset, 2FA, fraud alerts.</p>
                                </a>
                                <!-- Topic 2 -->
                                <a href="#" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:border-bank-gold transition-colors group">
                                    <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center mb-4 group-hover:bg-bank-gold group-hover:text-white transition-colors">
                                        <i class="fa-solid fa-money-bill-transfer"></i>
                                    </div>
                                    <h4 class="font-bold text-bank-navy mb-2">Transfers & Payments</h4>
                                    <p class="text-sm text-gray-500">Wire transfers, Zelle, bill pay limits.</p>
                                </a>
                                <!-- Topic 3 -->
                                <a href="#" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:border-bank-gold transition-colors group">
                                    <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mb-4 group-hover:bg-bank-gold group-hover:text-white transition-colors">
                                        <i class="fa-solid fa-credit-card"></i>
                                    </div>
                                    <h4 class="font-bold text-bank-navy mb-2">Cards</h4>
                                    <p class="text-sm text-gray-500">Activation, lost/stolen, travel notices.</p>
                                </a>
                                <!-- Topic 4 -->
                                <a href="#" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:border-bank-gold transition-colors group">
                                    <div class="w-10 h-10 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center mb-4 group-hover:bg-bank-gold group-hover:text-white transition-colors">
                                        <i class="fa-solid fa-mobile-screen"></i>
                                    </div>
                                    <h4 class="font-bold text-bank-navy mb-2">Mobile Banking</h4>
                                    <p class="text-sm text-gray-500">App issues, mobile check deposit.</p>
                                </a>
                            </div>
                    </div>

                        <div>
                            <h3 class="text-xl font-bold text-bank-navy mb-4">Frequently Asked Questions</h3>
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 divide-y divide-gray-100">
                                <details class="group p-4">
                                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-bank-navy">
                                        <span>How do I reset my password?</span>
                                        <span class="transition group-open:rotate-180">
                                            <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                                        </span>
                                    </summary>
                                    <div class="text-gray-500 text-sm mt-3 group-open:animate-fadeIn">
                                        Go to Settings > Security > Change Password. You will need your current password to set a new one.
                                    </div>
                                </details>
                                <details class="group p-4">
                                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-bank-navy">
                                        <span>What are the daily transfer limits?</span>
                                        <span class="transition group-open:rotate-180">
                                            <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                                        </span>
                                    </summary>
                                    <div class="text-gray-500 text-sm mt-3 group-open:animate-fadeIn">
                                        Standard accounts have a daily transfer limit of $5,000. Premium members can transfer up to $25,000 daily.
                                    </div>
                                </details>
                                <details class="group p-4">
                                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-bank-navy">
                                        <span>How do I report a lost card?</span>
                                        <span class="transition group-open:rotate-180">
                                            <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                                        </span>
                                    </summary>
                                    <div class="text-gray-500 text-sm mt-3 group-open:animate-fadeIn">
                                        Go to the Cards page, select your card, and click "Report Lost/Stolen". Your card will be locked immediately.
                                    </div>
                                </details>
                            </div>
                        </div>
                </div>

                    <!-- Contact Options -->
                <div class="lg:col-span-1 space-y-6">
                        <div class="bg-white p-4 md:p-6 rounded-xl shadow-md border border-gray-100">
                            <h3 class="font-bold text-bank-navy mb-4">Contact Support</h3>
                            <div class="space-y-4">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-bank-gold/10 text-bank-gold flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-bank-navy">Call Us</p>
                                        <p class="text-sm text-gray-500 mb-1">Mon-Fri, 8am - 8pm EST</p>
                                        <a href="tel:+18001234567" class="text-bank-gold font-medium hover:underline">1-800-123-4567</a>
                                    </div>
                                </div>
                                <hr class="border-gray-100">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-bank-gold/10 text-bank-gold flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-bank-navy">Email Us</p>
                                        <p class="text-sm text-gray-500 mb-1">We'll respond within 24 hours</p>
                                        <a href="mailto:support@prestigebank.com" class="text-bank-gold font-medium hover:underline">support@prestigebank.com</a>
                                    </div>
                                </div>
                                <hr class="border-gray-100">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-bank-gold/10 text-bank-gold flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-bank-navy">Send Message</p>
                                        <p class="text-sm text-gray-500 mb-1">Create a support ticket</p>
                                        <button @click="showTicketModal = true"   class="text-bank-gold font-medium hover:underline text-left">Open Ticket</button>
                                    </div>
                                </div>
                                <hr class="border-gray-100">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-bank-gold/10 text-bank-gold flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid fa-comments"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-bank-navy">Live Chat</p>
                                        <p class="text-sm text-gray-500 mb-1">Available 24/7</p>
                                        <button @click="showChatModal = true"  class="text-bank-gold font-medium hover:underline">Start Chat</button>
                                    </div>
                                </div>
                            </div>
                
                        </div>

                        <div class="bg-bank-navy text-white p-4 md:p-6 rounded-xl shadow-md">
                            <h3 class="font-bold mb-2">Schedule an Appointment</h3>
                            <p class="text-sm text-gray-300 mb-4">Meet with a financial advisor at a branch near you.</p>
                            <button class="w-full bg-bank-gold text-white font-bold py-2 px-4 rounded-lg hover:bg-bank-gold_hover transition-colors text-sm">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>

             
                <!-- Create Ticket Modal -->
                <livewire:user.includes.support-center.ticket-modal>
              
                <!-- Live Chat Modal -->
                <livewire:user.includes.support-center.live-chat-modal>
              

</main>
