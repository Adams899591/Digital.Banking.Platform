        <!-- Admin Users Table -->
<div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden" x-data="{ showDeleteModal: false, showDeleteSuccessModal: false }">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-bank-navy">Admin Management</h2>
                <p class="text-gray-500 text-sm mt-1">Manage administrators and support staff.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                            <th class="p-4 font-medium">Name</th>
                            <th class="p-4 font-medium">Email</th>
                            <th class="p-4 font-medium">Role</th>
                            <th class="p-4 font-medium">Joined Date</th>
                            <th class="p-4 font-medium">Status</th>
                            <th class="p-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        <!-- Sample Admin Row -->
                        @foreach ($admins as $admin)
                                 
                            <tr wire:key='{{$admin->id}}' class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 font-semibold text-bank-navy">{{$admin->first_name . " " . $admin->last_name}}</td>
                                <td class="p-4 text-gray-700">{{$admin->email}}</td>
                                <td class="p-4">
                                    @if ($admin->role === "Administrator")
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-700">Administrator</span>
                                    @elseif($admin->role === "Support Staff")
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-700">Support Staff</span> 
                                    @elseif($admin->role === "Super Admin")
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Super Admin</span>
                                    @endif
                                </td>
                                <td class="p-4 text-gray-500">{{$admin->created_at?->format("M d, Y")}}</td>
                                 <td class="p-4">
                                    @if ($admin->status === "Active")
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-700">Active</span>
                                    @elseif($admin->status === "Suspended")
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-700">Suspended</span> 
                                    @endif
                                </td>
                                <td class="p-4 text-right">
                                    {{-- In a real app, you'd pass the admin ID to a Livewire method to load the data before opening the modal --}}
                                    {{-- e.g., wire:click="edit({{ $admin->id }})" --}}
                                    <button @click="showEditAdminModal = true" wire:click='editAdmin({{$admin->id}})' class="text-bank-gold hover:text-bank-navy font-medium">Edit</button>
                                    <span class="text-gray-300 mx-1">|</span>
                                    {{-- <a href="#" class="text-red-600 hover:text-red-800 font-medium">Delete</a> --}}
                                    <button @click="showDeleteModal = true" wire:click="confirmDelete({{ $admin->id }})" class="text-red-600 hover:text-red-800 font-medium">Delete</button>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                        {{-- pagination --}}
                        {{$admins->onEachSide(1)->links()}}
            </div>


            
            <!-- Add Admin Modal -->
            @include('livewire/admin/includes/sys-settings/add-admin-modal')

            <!-- Edit Admin Modal -->
            @include('livewire/admin/includes/sys-settings/edit-admin-modal')

            {{-- Delete Admin Modal --}}
            @include('livewire/admin/includes/sys-settings/delete-admin-modal')
 </div>
{{-- wire:click="confirmDelete({{ $admin->id }})" --}}