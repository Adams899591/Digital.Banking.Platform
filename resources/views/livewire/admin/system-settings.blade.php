<main class="flex-1 overflow-y-auto p-8 bg-gray-50" x-data="{ showAddAdminModal: false, showEditAdminModal: false }">
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center">
        <div>
            <h1 class="text-3xl font-bold text-bank-navy  max-sm:text-[15px]">System Settings</h1>
            <p class="text-gray-500 text-sm mt-1">Manage general system configurations, security, and admin users.</p>
        </div>
        <div class="flex gap-3 mt-4 md:mt-0">
            <button @click="showAddAdminModal = true" class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors flex items-center gap-2">
                <i class="fa-solid fa-user-plus"></i>
                <span>Add New Admin</span>
            </button>
        </div>
    </div>

    <!-- Settings Sections -->
    <div class="space-y-8">
        <!-- General Settings -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h2 class="text-xl font-bold text-bank-navy mb-6 border-b border-gray-200 pb-4">General Settings</h2>
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                    <input type="text" id="site_name" value="Digital Banking Platform" class="mt-1 w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                </div>
                <div>
                    <label for="site_email" class="block text-sm font-medium text-gray-700">Default Email Address</label>
                    <input type="email" id="site_email" value="noreply@example.com" class="mt-1 w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                </div>
                <div>
                    <label for="timezone" class="block text-sm font-medium text-gray-700">Timezone</label>
                    <select id="timezone" class="mt-1 w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                        <option>UTC</option>
                        <option>America/New_York</option>
                        <option>Europe/London</option>
                    </select>
                </div>
                <div class="md:col-span-2 flex justify-end">
                    <button type="submit" class="bg-bank-navy text-white px-6 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Admin Users Table -->
         <livewire:admin.includes.sys-settings.admin-users-table>
        
    </div>

</main>