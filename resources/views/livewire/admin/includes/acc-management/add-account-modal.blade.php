<span>
     <!-- Add Account Modal -->
    <div x-show="showAddAccountModal" @keydown.escape.window="showAddAccountModal = false" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center" x-cloak>
        <div @click.away="showAddAccountModal = false" class="relative mx-auto p-6 border w-full max-w-lg shadow-lg rounded-xl bg-white">
            <div class="flex justify-between items-center border-b pb-3 mb-5">
                <h3 class="text-xl leading-6 font-bold text-bank-navy">Create New Account</h3>
                <button @click="showAddAccountModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
            <div class="mt-2">
                <form wire:submit.prevent="createAccount">
                    <div class="space-y-4">
                        <!-- Client Name -->
                        <div>
                            <label for="client_name" class="block text-sm font-medium text-gray-700">Client Name</label>
                            <input type="text" wire:model.defer="client_name" id="client_name" placeholder="e.g., Vera Carpenter" class="mt-1 block w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                            {{-- @error('client_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                        </div>
                        <!-- Account Type -->
                        <div>
                            <label for="account_type" class="block text-sm font-medium text-gray-700">Account Type</label>
                            <select wire:model.defer="account_type" id="account_type" class="mt-1 block w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                                <option value="">Select Type</option>
                                <option value="savings">Savings</option>
                                <option value="checking">Checking</option>
                                <option value="investment">Investment</option>
                            </select>
                            {{-- @error('account_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                        </div>
                        <!-- Initial Balance -->
                        <div>
                            <label for="balance" class="block text-sm font-medium text-gray-700">Initial Balance</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" wire:model.defer="balance" id="balance" class="block w-full rounded-lg border-gray-200 pl-7 focus:border-bank-gold focus:ring-bank-gold sm:text-sm" placeholder="0.00">
                            </div>
                            {{-- @error('balance') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                        </div>
                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select wire:model.defer="status" id="status" class="mt-1 block w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                                <option value="active">Active</option>
                                <option value="suspended">Suspended</option>
                                <option value="closed">Closed</option>
                            </select>
                            {{-- @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="showAddAccountModal = false" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors flex items-center justify-center min-w-[120px]">
                            <span wire:loading.remove wire:target="createAccount">Create Account</span>
                            <span wire:loading wire:target="createAccount">
                                <i class="fa-solid fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</span>
