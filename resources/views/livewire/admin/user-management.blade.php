<main class="flex-1 overflow-y-auto p-8 bg-gray-50" x-data="{ showAddUserModal: false, showEditUserModal: false, showViewUserModal: false }">
    <!-- Header --> 
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-bank-navy max-sm:text-[15px]">User Management</h1>
            <p class="text-gray-500 text-sm mt-1">Manage all registered users on the platform.</p>
        </div>
        <button @click="showAddUserModal = true" class="bg-bank-gold text-white px-4 py-2 max-sm:px-2 max-sm:py-1 max-sm:text-[10px] rounded-lg font-medium hover:bg-bank-gold/90 transition-colors flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Add New User</span>
        </button>
    </div> 

    <!-- Search and Filters  && Users Table -->
     <livewire:admin.includes.management.users-table>

  
    <!-- Add User Modal -->
    <livewire:admin.includes.management.add-user-modal>

    <!-- Edit User Modal -->
    <livewire:admin.includes.management.edit-user-modal>

     <!-- View User Modal -->
     <livewire:admin.includes.management.view-user-modal>
</main>
