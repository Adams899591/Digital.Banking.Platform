<!-- Transaction Details Modal -->
    @if ($showTransactionModal)
        <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity" wire:click="closeModal()"></div>
    
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    
                    <!-- Modal Panel -->
                    <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-bank-gold/10 sm:mx-0 sm:h-10 sm:w-10">
                                    <i class="fa-solid fa-receipt text-bank-gold"></i>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-lg font-semibold leading-6 text-bank-navy" id="modal-title">Transaction Details</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Full details for the selected transaction.</p>
                                    </div>
    
                                    <!-- Transaction Info Grid -->
                                    <div class="mt-4 grid grid-cols-2 gap-4 border-t border-gray-100 pt-4">
                                        {{-- Transaction ID --}}
                                        <div>
                                            <p class="text-xs text-gray-400 uppercase font-medium">Transaction ID</p>
                                            <p class="text-sm font-semibold text-bank-navy mt-1">TXN00{{ optional($selectedTransaction)->id }}</p>
                                        </div>
                                        {{-- Amount --}}
                                        <div>
                                            <p class="text-xs text-gray-400 uppercase font-medium">Amount</p>

                                            @if (optional($selectedTransaction)->transaction_type == "Credit")
                                                   <p class="text-sm font-semibold text-green-700 mt-1">+${{ optional($selectedTransaction)->amount }}</p>             
                                            @elseif(optional($selectedTransaction)->transaction_type == "Debit")
                                                  <p class="text-sm font-semibold text-red-700 mt-1">-${{ optional($selectedTransaction)->amount }}</p>
                                            @endif

                                        </div>
                                        {{-- Date --}}
                                        <div>
                                            <p class="text-xs text-gray-400 uppercase font-medium">Date</p>
                                            <p class="text-sm font-semibold text-bank-navy mt-1">{{ optional($selectedTransaction)->created_at?->format('M d, Y') }}</p>
                                        </div>
                                        {{-- Type --}}
                                        <div>
                                            <p class="text-xs text-gray-400 uppercase font-medium">Type</p>
                                            <p class="text-sm font-semibold text-bank-navy mt-1">{{ optional($selectedTransaction)->transaction_type }}</p>                    
                                        </div>
                                        {{-- Status --}}
                                        <div>
                                            <p class="text-xs text-gray-400 uppercase font-medium">Status</p>

                                                @if (optional($selectedTransaction)->status  === "Completed")
                                                         <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700 mt-1 inline-block">{{ optional($selectedTransaction)->status ?? 'N/A' }}</span>    
                                                @elseif(optional($selectedTransaction)->status  === "Pending")
                                                         <span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-700 mt-1 inline-block">{{ optional($selectedTransaction)->status ?? 'N/A' }}</span>    
                                                @else
                                                         <span class="px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-700 mt-1 inline-block">{{ optional($selectedTransaction)->status ?? 'N/A' }}</span>    
                                                @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" wire:click="closeModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
