<main>
    <!-- Search and Filters -->
    <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <input  wire:model.live="search" type="text" placeholder="Search by Ticket ID, Subject, or Client..." class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
            <select wire:change='fetchUserByStatuses($event.target.value)' class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                <option value="">All Statuses</option>
                <option value="Not Open">Not Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
                {{-- <option value="closed">Closed</option> --}}
            </select>
            <select wire:change='fetchUserByPriorities($event.target.value)' class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                <option value="">All Priorities</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
            <select wire:change='fetchUserByCategories($event.target.value)' class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                <option value="">All Categories</option>
                <option value="Transaction Dispute">Transaction Dispute</option>
                <option value="Account Access">Account Access</option>
                <option value="Technical Issue">Technical Issue</option>
                <option value="General Inquiry">General Inquiry</option>
            </select>
            <button class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors">
                Filter
            </button>
        </div>
    </div>

    <!-- Tickets Table -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-medium">Ticket / Subject</th>
                        <th class="p-4 font-medium">Client</th>
                        <th class="p-4 font-medium">Category</th>
                        <th class="p-4 font-medium">Priority</th>
                        <th class="p-4 font-medium">Status</th>
                        <th class="p-4 font-medium">Last Updated</th>
                        <th class="p-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">

                    <!-- Sample Row 1 -->
                    @foreach ($supportTickets as $supportTicket)
                    
                        <tr class="hover:bg-gray-50 transition-colors" wire:key='{{$supportTicket->id}}'>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <span class="font-semibold text-bank-navy">{{$supportTicket->reference}}</span>
                                </div>
                                <p class="text-gray-500 text-xs mt-0.5">{{$supportTicket->subject}}</p>
                            </td>
                            <td class="p-4 text-gray-700">{{$supportTicket->user->first_name . " " . $supportTicket->user->last_name}}</td>
                            <td class="p-4 text-gray-500">{{$supportTicket->category}}</td>
                            <td class="p-4">

                                    {{-- this if condition handles priority check before display --}}
                                    @if ($supportTicket->priority == 'High')
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-700">High</span>
                                    @elseif ($supportTicket->priority == 'Medium')
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-700">Medium</span>
                                    @elseif($supportTicket->priority == 'Low')
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Low</span>  
                                    @endif
                            </td>
                            <td class="p-4">

                                {{-- this if condition handles Status check before display --}}
                                @if ($supportTicket->status == 'Resolved')
                                    <span class="px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-700">Resolved</span>
                                @elseif($supportTicket->status == 'In Progress')
                                    <span class="px-2 py-1 rounded text-xs font-medium bg-purple-100 text-purple-700">In Progress</span>
                                @elseif($supportTicket->status == 'Not Open')
                                    <span class="px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-700">Not Open</span>
                                @endif

                           </td>
                            <td class="p-4 text-gray-500">{{$supportTicket->created_at->diffForHumans()}}</td>
                            <td class="p-4 text-right">

                                {{-- Show manage button if transaction ststus "Not Open" && "In Progress" --}}
                                    @if ($supportTicket->status == 'Not Open' || $supportTicket->status == 'In Progress')

                                            <!-- When making dynamic: @click="openManageModal(ticket.id)" -->
                                            <button type="button" @click="showManageModal = true"  wire:click="openManageModal({{$supportTicket->id}})" class="text-bank-gold hover:text-bank-navy font-medium bg-transparent border-none cursor-pointer">Manage</button>
                                
                                    @else

                                        <!-- When making dynamic: @click="openViewModal(ticket.id)" -->
                                        <button type="button" @click="showViewModal = true" wire:click="openViewModal({{$supportTicket->id}})" class="text-bank-gold hover:text-bank-navy font-medium bg-transparent border-none cursor-pointer">View</button>
                                   
                                    @endif


                            </td>
                        </tr>

                    @endforeach

                    
                </tbody>
            </table>
        </div>

        
        <!-- Pagination -->
        {{$supportTickets->onEachSide(1)->links()}}

    </div>
    
</main> 