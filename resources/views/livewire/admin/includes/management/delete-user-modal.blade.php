<span>
     <!-- Delete Confirmation Modal -->
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
        <div class="relative mx-auto p-6 border w-full max-w-sm shadow-lg rounded-xl bg-white">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg leading-6 font-bold text-bank-navy">Delete User?</h3>
                <p class="text-sm text-gray-500 mt-2">Are you sure you want to delete this record? This action cannot be undone.</p>
                
                <div class="mt-6 flex justify-center gap-3">
                    <button @click="showDeleteModal = false" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button wire:click="deleteUser" class="bg-red-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-red-700 transition-colors flex items-center justify-center min-w-[100px]">
                        <span wire:loading.remove wire:target="deleteUser">Confirm</span>
                        <span wire:loading wire:target="deleteUser">
                            <i class="fa-solid fa-spinner fa-spin"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Success Modal -->
    <div x-show="showDeleteSuccessModal" 
         x-on:user-deleted.window="showDeleteSuccessModal = true; showDeleteModal = false" 
         x-cloak 
         class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
        <div class="relative mx-auto p-6 border w-full max-w-sm shadow-lg rounded-xl bg-white">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <i class="fa-solid fa-check text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg leading-6 font-bold text-bank-navy">Deleted!</h3>
                <p class="text-sm text-gray-500 mt-2">The user credential has been deleted successfully.</p>
                <button @click="showDeleteSuccessModal = false" class="mt-6 w-full bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors">
                    Done
                </button>
            </div>
        </div>
    </div> 
</span>
