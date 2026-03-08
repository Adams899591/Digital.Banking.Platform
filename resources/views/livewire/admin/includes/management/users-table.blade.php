<div x-data="{ showDeleteModal: false, showDeleteSuccessModal: false ,}">
   <!-- Search and Filters -->
    <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input wire:model.live="search" type="text" placeholder="Search by name or email..." class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
            <select wire:change='fetchUserByStatuses($event.target.value)' class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                <option value="">All Statuses</option>
                <option value="Active">Active</option>
                <option value="Suspended">Suspended</option>
                <option value="Pending">Pending</option>
            </select>
            <input wire:change='fetchUserByDate($event.target.value)' type="date" placeholder="Registered after..." class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
            <button class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors">
                Filter
            </button>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-medium">User</th>
                        <th class="p-4 font-medium">Email</th>
                        <th class="p-4 font-medium">Date Registered</th>
                        <th class="p-4 font-medium">Status</th>
                        <th class="p-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <!-- User Row 1 -->
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{urlencode($user->first_name . " " . $user->last_name)}}&background=random" alt="User" class="w-9 h-9 rounded-full">
                                <span class="font-semibold text-bank-navy">{{$user->first_name}} {{$user->last_name}}</span>
                            </td>
                            <td class="p-4 text-gray-500">{{$user->first_name}} {{$user->last_name}}</td>
                            <td class="p-4 text-gray-500">{{$user->created_at->format("M d, Y")}}</td>
                            <td class="p-4">

                                {{-- Status badges with different colors based on the user's status --}}
                                @if ($user->status === "Active")
                                <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">{{$user->status}}</span>             
                                @elseif($user->status === "Suspended")
                                <span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-700">{{$user->status}}</span>
                                @else
                                <span class="px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-700">{{$user->status}}</span>
                                @endif

                            </td>
                            <td class="p-4 text-right">
                                {{-- In a real app, you'd pass the user ID to a Livewire method to load the data before opening the modal --}}
                                {{-- e.g., wire:click="viewUser({{ $user->id }})" --}}
                                <button  @click="showViewUserModal = true"  wire:click="viewUser({{ $user->id }})" class="text-bank-gold hover:text-bank-navy font-medium mr-4">View</button>
                                {{-- In a real app, you'd pass the user ID to a Livewire method to load the data before opening the modal --}}
                                {{-- e.g., wire:click="edit({{ $user->id }})" --}}
                                <button @click="showEditUserModal = true" wire:click="editUser({{ $user->id }})" class="text-blue-600 hover:text-blue-800 font-medium mr-4">Edit</button>
                                <button @click="showDeleteModal = true" wire:click="confirmDelete({{ $user->id }})" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                            </td>
                        </tr>                        
                    @endforeach

            
                </tbody>
            </table>
        </div>
         {{-- {pagination} --}}
        {{$users->onEachSide(1)->links()}}
   
    </div>


    <!-- Delete Confirmation Modal -->
     @include('livewire/admin/includes/management/delete-user-modal')
 
</div>
