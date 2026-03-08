<span>
  <!-- Edit User Modal -->
    <div x-show="showEditUserModal" @keydown.escape.window="showEditUserModal = false; $wire.resetUser()" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center" x-cloak>
        <div @click.away="showEditUserModal = false; $wire.resetUser()" class="relative mx-auto p-6 border w-full max-w-lg shadow-lg rounded-xl bg-white">

             <!-- Loading Animation -->
            <div wire:loading.flex class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-white bg-opacity-90 rounded-xl">
                <i class="fa-solid fa-circle-notch fa-spin text-5xl text-bank-gold mb-4"></i>
                <p class="text-bank-navy font-semibold animate-pulse">Loading...</p>
            </div>

            <div class="flex justify-between items-center border-b pb-3 mb-5">
                <h3 class="text-xl leading-6 font-bold text-bank-navy">Edit User</h3>
                <button @click="showEditUserModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
            <div class="mt-2">
                {{-- This form would be bound to properties holding the user's current data --}}
                <form wire:submit.prevent="updateUser">
                    <div class="space-y-4">
                        <!-- Full Name -->
                        <div>
                            <label for="edit_name" class="block text-sm font-medium text-gray-700"><b>Full Name</b></label>
                            <input type="text" wire:model.defer="name" id="edit_name" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <!-- Email -->
                        <div>
                            <label for="edit_email" class="block text-sm font-medium text-gray-700"><b>Email Address</b></label>
                            <input type="email" wire:model.defer="email" id="edit_email" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <!-- Password -->
                        <div>
                            <label for="edit_password" class="block text-sm font-medium text-gray-700"><b>New Password  (optional)</b></label>
                            <input type="password" wire:model.defer="password" id="edit_password" placeholder="Leave blank to keep current password" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <!-- Status -->
                        <div>
                            <label for="edit_status" class="block text-sm font-medium text-gray-700"><b>Status</b></label>
                            <select wire:model.defer="status" id="edit_status" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-bank-gold focus:border-bank-gold sm:text-sm">
                                <option value="{{$user->status}}">{{$user->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Pending">Pending</option>
                            </select>
                            @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" wire:click='resetUser' @click="showEditUserModal = false"  class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors flex items-center justify-center min-w-[120px]">
                            <span wire:loading.remove wire:target="updateUser">Save Changes</span>
                            <span wire:loading wire:target="updateUser">
                                <i class="fa-solid fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>  


    <!-- Success User Message Modal -->
    <div x-data="{ showSuccessModal: false }" 
         x-on:user-updated.window="showSuccessModal = true; showEditUserModal = false" 
         x-show="showSuccessModal" 
         x-cloak 
         class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
        <div class="relative mx-auto p-6 border w-full max-w-sm shadow-lg rounded-xl bg-white">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <i class="fa-solid fa-check text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg leading-6 font-bold text-bank-navy">Success!</h3>
                <p class="text-sm text-gray-500 mt-2">User details have been updated successfully.</p>
                <button @click="showSuccessModal = false" class="mt-6 w-full bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors">
                    Done
                </button>
            </div>
        </div>
    </div>


</span>
 