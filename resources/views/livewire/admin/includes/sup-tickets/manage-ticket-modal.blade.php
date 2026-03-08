    <!-- Manage Ticket Modal -->
<div x-show="showManageModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showManageModal"  @click="showManageModal = false; $wire.resetUser()" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="showManageModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all w-full sm:my-8 sm:align-middle sm:max-w-lg">


            <!-- Loading Animation -->
            <div wire:loading.flex class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-white bg-opacity-90 rounded-xl">
                <i class="fa-solid fa-circle-notch fa-spin text-5xl text-bank-gold mb-4"></i>
                <p class="text-bank-navy font-semibold animate-pulse">Loading...</p>
            </div>  


            
                <form wire:submit='sendReply'>

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Manage Ticket</h3>


                                <div class="mt-4 space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"><b>Client Name</b></label>
                                        <input type="text" wire:model='clientName' readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-50 sm:text-sm" disabled>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"><b>Subject</b></label>
                                        <input type="text" wire:model='subject' readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-50 sm:text-sm" disabled>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"><b>Message</b></label>
                                        <textarea wire:model='message' readonly rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-50 sm:text-sm"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"><b>Replied By</b></label>
                                        <input type="text" value="{{Auth::guard("admin")->user()->first_name . " " .  Auth::guard("admin")->user()->last_name  }}" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-50 sm:text-sm" disabled >
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"><b>Reply Message</b></label>
                                        <textarea wire:model='replyMessage' rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm" placeholder="Write your reply here..."></textarea>
                                        @error('replyMessage') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-bank-navy text-base font-medium text-white hover:bg-bank-navy/90 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            <span wire:loading.remove wire:target="sendReply">Send Reply</span>
                            <span wire:loading wire:target="sendReply"><i class="fa-solid fa-spinner fa-spin"></i> Sending...</span>
                        </button>
                        <button wire:click='resetUser' type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="showManageModal = false">Cancel</button>
                    </div>

                </form>

            </div>
        </div>




    <!-- Success Ticket Modal -->
    <div x-data="{ showSuccessModal: false }" 
         x-on:ticket-updated.window="showSuccessModal = true; showEditUserModal = false" 
         x-show="showSuccessModal" 
         x-cloak 
         class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
        <div class="relative mx-auto p-6 border w-full max-w-sm shadow-lg rounded-xl bg-white">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <i class="fa-solid fa-check text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg leading-6 font-bold text-bank-navy">Success!</h3>
                <p class="text-sm text-gray-500 mt-2">Reply Sent successfully.</p>
                <button @click="showSuccessModal = false; showManageModal = false" class="mt-6 w-full bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors">
                    Done
                </button>
            </div>
        </div>
    </div>

</div>