      <!-- Create Ticket Modal -->
                <div x-show="showTicketModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div x-show="showTicketModal" @click="showTicketModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div x-show="showTicketModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all w-full sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                            <form wire:submit='submitTicket'>
                                
                                   {{-- form data section --}}
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Send Message</h3>
                                                <div class="mt-4 space-y-4">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Category</label>
                                                        <select wire:model="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                                                            <option value="">Select a topic...</option>
                                                            <option value="Transaction Dispute">Transaction Dispute</option>
                                                            <option value="Account Access">Account Access</option>
                                                            <option value="Technical Issue">Technical Issue</option>
                                                            <option value="General Inquiry">General Inquiry</option>
                                                        </select>
                                                         @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Subject</label>
                                                        <input type="text" wire:model="subject" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm" placeholder="Brief summary of your issue">
                                                          @error('subject') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Message</label>
                                                        <textarea wire:model="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm" placeholder="How can we help you?"></textarea>
                                                          @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     {{-- button section --}}
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-bank-navy text-base font-medium text-white hover:bg-bank-navy/90 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                                            <span wire:loading.remove wire:target="submitTicket">Send</span>
                                            <span wire:loading wire:target="submitTicket"><i class="fa-solid fa-spinner fa-spin"></i> Sending...</span>
                                        </button>
                                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="showTicketModal = false">Cancel</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                                       
                                          <!-- Ticket Success Modal -->
                                        <div x-data="{ showSuccessModal: false }" x-show="showSuccessModal" x-on:ticket-success.window="showSuccessModal = true" @keydown.escape.window="showSuccessModal = false; showTicketModal = false" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center" x-cloak>
                                            <div @click.away="showSuccessModal = false; showTicketModal = false" class="relative mx-auto p-6 border w-full max-w-sm shadow-lg rounded-xl bg-white">
                                                <div class="text-center">
                                                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                                                        <i class="fa-solid fa-check text-green-600 text-xl"></i>
                                                    </div>
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Success!</h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">
                                                            Ticket submitted successfully.
                                                        </p>
                                                    </div>
                                                    <div class="mt-6">
                                                        <button type="button" @click="showSuccessModal = false; showTicketModal = false" class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors w-full">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                </div>