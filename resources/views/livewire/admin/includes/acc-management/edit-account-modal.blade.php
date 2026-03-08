<span>
    <!-- Edit Account Modal -->
       <div x-show="showEditAccountModal" @keydown.escape.window="showEditAccountModal = false; $wire.resetUser()" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center" x-cloak>
        <div @click.away="showEditAccountModal = false; $wire.resetUser()" class="relative mx-auto p-6 border w-full max-w-lg shadow-lg rounded-xl bg-white">
            
            <!-- Loading Animation -->
            <div wire:loading.flex class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-white bg-opacity-90 rounded-xl">
                <i class="fa-solid fa-circle-notch fa-spin text-5xl text-bank-gold mb-4"></i>
                <p class="text-bank-navy font-semibold animate-pulse">Loading...</p>
            </div>   
            
            
            <div class="flex justify-between items-center border-b pb-3 mb-5">
                <h3 class="text-xl leading-6 font-bold text-bank-navy"><b>Edit Account</b></h3>
                <button @click="showEditAccountModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>

            <div class="mt-2">
                {{-- This form would be bound to properties holding the account's current data --}}
                <form wire:submit.prevent="updateAccount">
                    <div class="space-y-4">
                        <!-- Client Name (Read-only or Editable depending on logic) -->
                        <div>
                            <label for="edit_client_name" class="block text-sm font-medium text-gray-700"><b>Client Name</b></label>
                            <input type="text" wire:model.defer="client_name" id="edit_client_name" class="mt-1 block w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold sm:text-sm" disabled>
                            @error('client_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <!-- Account Type -->
                        <div>
                            <label for="edit_account_type" class="block text-sm font-medium text-gray-700"><b>Account Type</b></label>
                            <select wire:model.defer="account_type" id="edit_account_type" class="mt-1 block w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                                <option value="{{$this->account->account_type}}">{{$this->account->account_type}}</option>
                                <option value="Savings">Savings</option>
                                <option value="Checking">Checking</option>
                                <option value="Investment">Investment</option>
                            </select>
                              @error('account_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <!-- Balance (Usually not editable directly here, but for demo purposes) -->
                        <div>
                            <label for="edit_balance" class="block text-sm font-medium text-gray-700"><b>Current Balance</b></label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" wire:model.defer="balance" id="edit_balance" class="block w-full rounded-lg border-gray-200 pl-7 focus:border-bank-gold focus:ring-bank-gold sm:text-sm" disabled>
                                  @error('balance') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Status -->
                        <div>
                            <label for="edit_status" class="block text-sm font-medium text-gray-700"><b>Status</b></label>
                            <select wire:model.defer="status" id="edit_status" class="mt-1 block w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                                <option value="{{$this->account->status}}">{{$this->account->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Closed">Closed</option>
                            </select>
                              @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="showEditAccountModal = false" wire:click='resetUser' class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors flex items-center justify-center min-w-[120px]">
                            <span wire:loading.remove wire:target="updateAccount">Save Changes</span>
                            <span wire:loading wire:target="updateAccount">
                                <i class="fa-solid fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> 




    <!-- Success Account Message Modal -->
    <div x-data="{ showSuccessModal: false }" 
         x-on:account-updated.window="showSuccessModal = true; showEditUserModal = false" 
         x-show="showSuccessModal" 
         x-cloak 
         class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
        <div class="relative mx-auto p-6 border w-full max-w-sm shadow-lg rounded-xl bg-white">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <i class="fa-solid fa-check text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg leading-6 font-bold text-bank-navy">Success!</h3>
                <p class="text-sm text-gray-500 mt-2">Account details have been updated successfully.</p>
                <button @click="showSuccessModal = false" class="mt-6 w-full bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors">
                    Done
                </button>
            </div>
        </div>
    </div>
</span>
