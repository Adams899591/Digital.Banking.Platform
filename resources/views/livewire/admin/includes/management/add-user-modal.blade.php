<span>
     <!-- Add User Modal -->
    <div x-show="showAddUserModal" @keydown.escape.window="showAddUserModal = false" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center" x-cloak>
        <div @click.away="showAddUserModal = false" class="relative mx-auto p-6 border w-full max-w-lg shadow-lg rounded-xl bg-white">
            <div class="flex justify-between items-center border-b pb-3 mb-5">
                <h3 class="text-xl leading-6 font-bold text-bank-navy">Add New User</h3>
                <button @click="showAddUserModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
            <div class="mt-2">
                <form wire:submit.prevent="createUser">
                    <div class="space-y-4">
                        <!-- Full Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700"><b>Full Name</b></label>
                            <input type="text" wire:model.defer="name" id="name" placeholder="e.g., John Doe" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700"><b>Email Address</b></label>
                            <input type="email" wire:model.defer="email" id="email" placeholder="e.g., user@example.com" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700"><b>Password</b></label>
                            <input type="password" wire:model.defer="password" id="password" placeholder="••••••••" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                         <!-- comfirm_password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700"><b>Confirm Password</b></label>
                            <input type="password" wire:model.defer="password_confirmation" id="password" placeholder="••••••••" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                            @error('password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>


                        {{-- Sellect A Bank --}}
                        <div>
                            <label for="bank_id" class="block text-sm font-medium text-gray-700"><b>Sellect a bank</b></label>
                            <select  type="text" wire:model.defer="bank_id" id="bank_id" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                                @foreach ($banks as $bank)
                                    <option wire:key='{{$bank->id}}' value="{{$bank->id}}">{{$bank->name}}</option>
                                @endforeach
                             </select>  
                            @error('bank_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700"><b>Status</b></label>
                            <select wire:model.defer="status" id="status" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Pending">Closed</option>
                            </select>
                            @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="showAddUserModal = false" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors flex items-center justify-center min-w-[120px]">
                            <span wire:loading.remove wire:target="createUser">Create User</span>
                            <span wire:loading wire:target="createUser">
                                <i class="fa-solid fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    
    <!-- Success Modal -->
    <div x-data="{ showSuccessModal: false }" x-show="showSuccessModal" x-on:user-created.window="showSuccessModal = true" @keydown.escape.window="showSuccessModal = false" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center" x-cloak>
        <div @click.away="showSuccessModal = false" class="relative mx-auto p-6 border w-full max-w-sm shadow-lg rounded-xl bg-white">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <i class="fa-solid fa-check text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Success!</h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                        User account created successfully.
                    </p>
                </div>
                <div class="mt-6">
                    <button type="button" @click="showSuccessModal = false" class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors w-full">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</span>
