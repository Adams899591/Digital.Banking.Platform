<!-- Scrollable Content -->
<main class="flex-1 overflow-y-auto p-8 bg-gray-50">

        <!-- Header -->
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl max-sm:text-2xl font-bold text-bank-navy">Notifications</h1>
            <p class="text-gray-500 text-sm mt-1">View all your transaction alerts and system messages.</p>
        </div>
    </div>

    <!-- Notifications List -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="divide-y divide-gray-100">
            
  
                @foreach ($notifications as $notification)
                        <div wire:key='{{$notification->id}}' wire:click='UpdateReadStatus({{$notification->id}})' class="p-6 max-sm:p-4 {{$notification->read_status === 0 ? "bg-blue-100 cursor-pointer" : ""}}  transition-colors flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="flex items-start gap-4">
                                    <div class="flex gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                                            <i class="fa-solid fa-ticket"></i>
                                        </div>
                                        <div>

                                            @if ($notification->read_status == 0) {{-- show if statement if notification has not been read --}}
                                               <p class="text-sm font-medium text-bank-navy">New Support Ticket</p>
                                            @elseif($notification->read_status == 1)  {{-- show else if statement if notification has been read --}}
                                                <p class="text-sm font-medium text-bank-navy">Support Ticket Resolved</p>
                                            @endif
                                            
                                            <p class="text-xs text-gray-500 mt-1">
                                                <span class="font-semibold">{{$notification->message}}</span> 
                                            </p>
                                            <p class="text-[10px] text-gray-400 mt-1">{{$notification->created_at->format('M d, Y • h:i A')}}</p>
                                        </div>
                                    </div>
                            </div>
                       </div>
                @endforeach
    
                    <!-- Notification Item: System Alert (No Receipt) -->
                    <div class="p-6 max-sm:p-4 hover:bg-gray-50 transition-colors flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 max-sm:w-10 max-sm:h-10 rounded-full bg-blue-100 text-blue-600 flex-shrink-0 flex items-center justify-center">
                                <i class="fa-solid fa-shield-halved text-xl max-sm:text-lg"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <h3 class="font-bold text-bank-navy text-lg max-sm:text-base">Security Alert</h3>
                                    <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded-full font-medium">Info</span>
                                </div>
                                <p class="text-gray-600 text-sm sm:text-base">New login detected from a new device (MacBook Pro) in London, UK.</p>
                                <p class="text-xs text-gray-400 mt-2 flex items-center gap-2">
                                    <i class="fa-regular fa-clock"></i> Oct 21, 2023 at 11:00 AM
                                </p>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <!-- No receipt for system alerts -->
                        </div>
                    </div>

                    
        <!-- Pagination -->
              {{$notifications->onEachSide(1)->links()}}
    </div>
</main>
