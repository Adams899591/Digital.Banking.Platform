                    <!-- =============== Main Transfer Form ===============  -->
                    <div class="lg:col-span-2 bg-white p-8 rounded-xl shadow-md border border-gray-100">
                        <h3 class="text-2xl font-bold text-bank-navy mb-6">Send Money</h3> 

                        <form id="transferForm" x-on:transfer-success.window="showModal = false; showSuccessModal = true" x-data="{ 
                            showModal: false,         
                            showSuccessModal: false,
                            open: false, 
                            selected: null, 
                            accountNumber: @entangle('accountNumber'),
                            recipientName: @entangle('recipientName'),
                            amount: '',
                            banks: {{ json_encode(collect($banks)->map(function ($bank) {
                                $colors = ['ef4444', 'f97316', 'f59e0b', '84cc16', '10b981', '06b6d4', '3b82f6', '6366f1', '8b5cf6', 'd946ef', 'f43f5e', '64748b'];
                                $bg = $colors[$bank->id % count($colors)] ?? '0a192f';
                                return ['name' => $bank->name, 'logo' => 'https://ui-avatars.com/api/?name=' . urlencode($bank->name) . '&background=' . $bg . '&color=fff'];
                            })->values()) }}
                        }"> 
                            <!-- =============== From Account  =============== -->
                            <div class="mb-6">
                                <label for="fromAccount" class="block text-sm font-medium text-gray-700 mb-2">From Account</label>
                                <div class="relative">
                                    <select id="fromAccount" name="fromAccount" class="w-full pl-4 pr-10 py-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold focus:border-transparent appearance-none">
                                        <option value="checking" data-balance="24500.50">Premier Checking (**** {{substr(Auth::user()->account_number, -4)}}) - ${{number_format(Auth::user()->bankAccount->premier_balance ?? 0.00)}}</option>
                                        <option value="savings" data-balance="118092.50">Gold Savings (**** {{substr(Auth::user()->account_number, -4)}}) - ${{number_format(Auth::user()->bankAccount->premier_balance ?? 0.00)}}</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <i class="fa-solid fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
            



                            <!-- =============== To Account =============== -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">To</label>
                                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="font-bold text-bank-navy text-lg">Recipient Details</h3>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="relative">
                                            <label class="block text-xs text-gray-500 uppercase font-semibold mb-1">Bank</label>
                                            <input type="hidden" name="bank" :value="selected ? selected.name : ''">
                                            
                                            <button type="button" @click="open = !open" @click.away="open = false" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold bg-white flex items-center justify-between h-[42px]">
                                                <span class="flex items-center gap-2" x-show="selected">
                                                    <template x-if="selected">
                                                        <img :src="selected.logo" class="w-5 h-5 rounded-full">
                                                    </template>
                                                    <span x-text="selected ? selected.name : ''" class="text-sm text-gray-700"></span>
                                                </span>
                                                <span x-show="!selected" class="text-gray-500 text-sm">Select a bank</span>
                                                <i class="fa-solid fa-chevron-down text-xs text-gray-500"></i>
                                            </button>

                                            <div x-show="open" class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto" style="display: none;">
                                                <template x-for="bank in banks" :key="bank.name">
                                                    <div @click="selected = bank; open = false; if(accountNumber) { $wire.fetchAccountName(accountNumber, bank.name) }" class="flex items-center gap-3 p-3 hover:bg-gray-50 cursor-pointer transition-colors border-b border-gray-50 last:border-0">
                                                        <img :src="bank.logo" class="w-8 h-8 rounded-full object-cover shadow-sm">
                                                        <span x-text="bank.name" class="text-sm font-medium text-gray-700"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                        <div>
                                            <label  for="accountNumber" class="block text-xs text-gray-500 uppercase font-semibold mb-1">Account Number</label>
                                             <input @input="$wire.fetchAccountName($event.target.value, selected ? selected.name : null)" maxlength="12"  wire:model.live="accountNumber" type="text" id="accountNumber" name="accountNumber" x-model="accountNumber" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold" placeholder="Enter account number">
                                        </div>
                                        <div class="md:col-span-2">
                                            @if ($recipientName !== "No account found!" && !empty($recipientName))  {{-- show input if recipientName is found --}}
                                                 <label for="recipientName" class="block text-xs text-gray-500 uppercase font-semibold mb-1">Recipient Name</label>
                                                 <input type="text" id="recipientName" name="recipientName" x-model="recipientName" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold text-white bg-black" placeholder="e.g., John Doe" disabled>
                                            @else  {{-- show error if recipientName is not found --}}
                                             <span style="color: red"> {{$recipientName}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- =============== Amount =============== -->
                            <div class="mb-6">
                                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                                        <span class="text-gray-500 text-lg">$</span>
                                    </div>
                                    <input wire:model='amount' type="number" id="amount" name="amount" x-model="amount" class="w-full pl-10 pr-4 py-3 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold focus:border-transparent" placeholder="0.00">
                                </div>
                            </div>
            
                            <!-- =============== Description =============== -->
                            <div class="mb-8">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description (Optional)</label>
                                <textarea wire:model='description' id="description" name="description" rows="3" class="w-full p-3 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold focus:border-transparent" placeholder="e.g., Monthly rent"></textarea>
                            </div>
            


                            <!-- =============== Action Button  =============== -->
                            @if ($recipientName !== "No account found!" && !empty($recipientName))  {{-- show input if recipientName is found --}}
                            <div class="flex justify-end" x-show="amount">
                                <button type="button" @click="showModal = true" class="bg-bank-gold text-white font-bold py-3 px-8 rounded-lg hover:bg-bank-gold_hover transition-colors text-lg">
                                    Review Transfer
                                </button>
                            </div>
                            @endif


                            <!-- =============== Review Transfer Modal =============== -->
                            <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak style="display: none;">
                                <div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-md mx-4 transform transition-all" @click.away="showModal = false">
                                    <div class="text-center mb-6">
                                        <template x-if="selected">
                                            <img :src="selected.logo" class="w-16 h-16 mx-auto rounded-full mb-4 shadow-sm object-cover">
                                        </template>
                                        <h3 class="text-xl font-bold text-bank-navy" x-text="selected ? selected.name : 'Bank Name'"></h3>
                                        <p class="text-gray-500 text-sm mt-1">Confirm Transfer Details</p>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4 mb-6 space-y-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-500 text-sm">Recipient</span>
                                            <span class="font-semibold text-bank-navy" x-text="recipientName || 'Not provided'"></span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-500 text-sm">Account</span>
                                            <span class="font-semibold text-bank-navy" x-text="accountNumber || 'Not provided'"></span>
                                        </div>
                                        <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                                            <span class="text-gray-500 text-sm">Amount</span>
                                            <span class="font-bold text-xl text-bank-gold" x-text="'$' + (amount || '0.00')"></span>
                                        </div>
                                    </div>

                                    <div class="mb-8">
                                        <label class="block text-sm font-medium text-gray-700 mb-4 text-center">Enter 4-Digit PIN to Confirm</label>
                                        <div class="flex justify-center gap-3">
                                            <input wire:model='pin1' type="password" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold transition-shadow" oninput="if(this.value.length === 1) this.nextElementSibling?.focus()">
                                            <input wire:model='pin2' type="password" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold transition-shadow" oninput="if(this.value.length === 1) this.nextElementSibling?.focus(); if(this.value.length === 0) this.previousElementSibling?.focus()">
                                            <input wire:model='pin3' type="password" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold transition-shadow" oninput="if(this.value.length === 1) this.nextElementSibling?.focus(); if(this.value.length === 0) this.previousElementSibling?.focus()">
                                            <input wire:model='pin4' type="password" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold transition-shadow" oninput="if(this.value.length === 0) this.previousElementSibling?.focus()">
                                         </div>
                                         
                                           {{-- show error section --}}
                                            @if (session("error"))
                                                <span style="color: red" class="text-center text-[15px]">{{session("error")}}</span> 
                                             @endif
                                             
                                    </div>
                                                


                                    <div class="grid grid-cols-2 gap-4">
                                        <button type="button" @click="showModal = false" class="py-3 px-4 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                                            Cancel
                                        </button>
                                        <button type="button" wire:click="submitTransfer()" class="py-3 px-4 bg-bank-gold text-white rounded-lg font-bold hover:bg-bank-gold_hover shadow-md transition-colors flex justify-center items-center" wire:loading.attr="disabled">
                                            <span wire:loading.remove wire:target="submitTransfer">Submit</span>
                                            <svg wire:loading wire:target="submitTransfer" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <!-- =============== Success Modal =============== -->
                            <div x-show="showSuccessModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak style="display: none;">
                                <div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-md mx-4 transform transition-all" @click.away="showSuccessModal = false">
                                    <div class="text-center mb-6">
                                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fa-solid fa-check text-2xl text-green-500"></i>
                                        </div>
                                        <h3 class="text-xl font-bold text-bank-navy">Transaction Successful</h3>
                                        <p class="text-gray-500 text-sm mt-1">Your transfer has been processed successfully.</p>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4 mb-6 space-y-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-500 text-sm">Recipient</span>
                                            <span class="font-semibold text-bank-navy">{{ $recipientName }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-500 text-sm">Bank</span>
                                            <span class="font-semibold text-bank-navy" x-text="selected ? selected.name : '{{ $bankName ?? 'Bank Name' }}'"></span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-500 text-sm">Account</span>
                                            <span class="font-semibold text-bank-navy">{{ $accountNumber }}</span>
                                        </div>
                                        <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                                            <span class="text-gray-500 text-sm">Amount Sent</span>
                                            <span class="font-bold text-xl text-bank-gold">${{ $amount }}</span>
                                        </div>
                                    </div>

                                      {{-- ========= Action Button for recipt ========= --}}
                                    <div class="grid grid-cols-2 gap-4">
                                        <a href="{{route("transactionReceipt")}}" class="py-3 px-4 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                                            <i class="fa-solid fa-download"></i>
                                            <span>Receipt</span>
                                        </a>
                                        <button type="button" wire:click="resetForm" @click="showSuccessModal = false; selected = null" class="py-3 px-4 bg-bank-gold text-white rounded-lg font-bold hover:bg-bank-gold_hover shadow-md transition-colors">
                                            Done
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>