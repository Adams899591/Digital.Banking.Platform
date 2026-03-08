<main class="flex-1 overflow-y-auto p-8 bg-gray-50" x-data="{ showManageModal: false, showViewModal: false }">
    <!-- Header -->
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-bank-navy  max-sm:text-[15px]">Support Tickets</h1>
            <p class="text-gray-500 text-sm mt-1">Manage user inquiries, transaction disputes, and support requests.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors flex items-center gap-2">
                <i class="fa-solid fa-cog"></i>
                <span>Settings</span>
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase">Open Tickets</p>
                    <h3 class="text-2xl font-bold text-bank-navy mt-1">24</h3>
                </div>
                <div class="p-2 bg-blue-50 rounded-lg text-blue-600">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase">In Progress</p>
                    <h3 class="text-2xl font-bold text-bank-navy mt-1">12</h3>
                </div>
                <div class="p-2 bg-yellow-50 rounded-lg text-yellow-600">
                    <i class="fa-solid fa-spinner"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase">High Priority</p>
                    <h3 class="text-2xl font-bold text-bank-navy mt-1">5</h3>
                </div>
                <div class="p-2 bg-red-50 rounded-lg text-red-600">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase">Resolved Today</p>
                    <h3 class="text-2xl font-bold text-bank-navy mt-1">18</h3>
                </div>
                <div class="p-2 bg-green-50 rounded-lg text-green-600">
                    <i class="fa-solid fa-check-circle"></i>
                </div>
            </div>
        </div>
    </div>



     <!--  Tickets Table  Search and Filters -->
     <livewire:admin.includes.sup-tickets.tickets-table>


      <!-- Manage Ticket Modal -->
      <livewire:admin.includes.sup-tickets.manage-ticket-modal>


      <!-- View Ticket Modal -->
     <livewire:admin.includes.sup-tickets.view-ticket-modal>  



 
</main>
