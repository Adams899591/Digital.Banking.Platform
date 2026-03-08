  <!-- View Ticket Modal -->
    <div x-show="showViewModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showViewModal" @click="showViewModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="showViewModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                
                <!-- Loading Animation -->
                <div wire:loading.flex class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-white bg-opacity-90 rounded-xl">
                    <i class="fa-solid fa-circle-notch fa-spin text-5xl text-bank-gold mb-4"></i>
                    <p class="text-bank-navy font-semibold animate-pulse">Loading...</p>
                </div>
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Ticket Details</h3>
                            <div class="mt-4 space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700"><b>Client Name</b></label>
                                    <p class="mt-1 text-sm text-gray-900">
                                        @if ($this->supportTicket->user)  {{-- Check if user exist before fetching the user  --}}
                                            {{$this->supportTicket->user->first_name . " " . $this->supportTicket->user->last_name}}
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700"><b>Subject</b></label>
                                    <p class="mt-1 text-sm text-gray-900">{{$supportTicket->subject}}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700"><b>Message</b></label>
                                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-3 rounded-md">{{$supportTicket->message}}</p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"><b>Priority</b></label>
                                        <span class="mt-1 inline-block px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Low</span>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"><b>Status</b></label>
                                        <span class="mt-1 inline-block px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-700">Resolved</span>
                                    </div>
                                </div>
                                <div class="bg-green-50 p-3 rounded-md border border-green-100">
                                    <label class="block text-sm font-medium text-green-800"><b>Reply By: &nbsp;&nbsp; {{$supportTicket->replied_by}}</b></label>
                                    <p class="mt-1 text-sm text-green-900">{{$supportTicket->admin_reply}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="showViewModal = false">Close</button>
                </div>
            </div>
        </div>
    </div> 