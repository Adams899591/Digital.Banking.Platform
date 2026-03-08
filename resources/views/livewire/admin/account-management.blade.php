<main class="flex-1 overflow-y-auto p-8 bg-gray-50" x-data="{ showAddAccountModal: false, showEditAccountModal: false, showViewAccountModal: false }">
    <!-- Header -->
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-bank-navy max-sm:text-[15px]">Account Management</h1>
            <p class="text-gray-500 text-sm mt-1">Manage all bank accounts on the platform.</p>
        </div>
        <button @click="showAddAccountModal = true" class="bg-bank-gold text-white px-4 py-2 max-sm:px-2 max-sm:py-1 max-sm:text-[10px] rounded-lg font-medium hover:bg-bank-gold/90 transition-colors flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>New Account</span>
        </button>
    </div>

     <!-- Search and Filters && Accounts Table -->
     <livewire:admin.includes.acc-management.accounts-table>
    

     <!-- Add Account Modal -->
     <livewire:admin.includes.acc-management.add-account-modal>
    

    <!-- Edit Account Modal -->
    <livewire:admin.includes.acc-management.edit-account-modal>

     <!-- View Account Modal -->
    <livewire:admin.includes.acc-management.view-account-modal>
    
</main>
