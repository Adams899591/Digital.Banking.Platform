<span>
                         <button id="notificationBtn" class="relative text-gray-500 hover:text-bank-navy transition-colors">
                            <i class="fa-regular fa-bell text-xl"></i>
                            @if($notifications->isNotEmpty()) {{-- if there are notifications, show the count   --}} 
                                <span wire:poll.5s class="absolute -top-2 -right-2 w-5 h-5 bg-red-500 rounded-full text-white text-[10px] flex items-center justify-center font-bold border-2 border-white">{{$notifications->count()}}</span>
                            @endif
                        </button>
                         
                        
                        <!-- Notification Dropdown -->
                        <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-2xl border border-gray-100 z-50 overflow-hidden"> 
                            <div class="p-4 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                                <h4 class="font-bold text-bank-navy text-sm">Notifications</h4>
                                @if($notifications->isNotEmpty()) {{-- if there are notifications, show the mark all as read button  --}}
                                    <span wire:click='MarkAllNotificationsAsRead' class="text-xs text-bank-gold font-medium cursor-pointer">Mark all as read</span>
                                @endif
                            </div>
                            
                            <div class="max-h-64 overflow-y-auto">
                            {{--  loop through notifications and show them in the dropdown --}}

                            @forelse ($notifications as $notification)
                                
                                    @if ($notification->title === "Credit Alert")

                                        <button  wire:click='UpdateReadStatus({{$notification->id}})' class="w-full text-left block p-4 hover:bg-gray-50 transition-colors border-b border-gray-50"  >
                                            <div wire:key='{{$notification->id}}' class="flex gap-3">
                                                <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-arrow-down"></i></div>
                                                <div>
                                                    <p class="text-sm font-medium text-bank-navy">Payment Received</p>
                                                    <p class="text-xs text-gray-500 mt-1">${{$notification->message}}.</p>
                                                    <p class="text-[10px] text-gray-400 mt-1">{{$notification->created_at->diffForHumans()}}</p>
                                                </div>
                                            </div>
                                        </button> 

                                    @elseif( $notification->title === "Debit Alert" )

                                        <button  wire:click='UpdateReadStatus({{$notification->id}})' class="w-full text-left block p-4 hover:bg-gray-50 transition-colors border-b border-gray-50"  >
                                            <div wire:key='{{$notification->id}}' class="flex gap-3">
                                                <div class="w-8 h-8 rounded-full bg-green-100 text-red-600 flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-arrow-up"></i></div>
                                                <div>
                                                    <p class="text-sm font-medium text-bank-navy">Payment Sent</p>
                                                    <p class="text-xs text-gray-500 mt-1">${{$notification->message}}.</p>
                                                    <p class="text-[10px] text-gray-400 mt-1">{{$notification->created_at->diffForHumans()}}</p>
                                                </div>
                                            </div>
                                        </button>

                                    @endif

                            @empty   {{-- if there are no notifications, show this message  --}}
                                <div class="p-4 text-center text-gray-500 text-sm">No new notifications</div>
                            @endempty
                        
                                {{-- <a href="#" class="block p-4 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                    <div class="flex gap-3">
                                        <div class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-shield-halved"></i></div>
                                        <div>
                                            <p class="text-sm font-medium text-bank-navy">Security Alert</p>
                                            <p class="text-xs text-gray-500 mt-1">New login detected from iPhone 13.</p>
                                            <p class="text-[10px] text-gray-400 mt-1">1 hour ago</p>
                                        </div>
                                    </div>
                                </a> --}}

                                {{-- <a href="#" class="block p-4 hover:bg-gray-50 transition-colors">
                                    <div class="flex gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-file-invoice"></i></div>
                                        <div>
                                            <p class="text-sm font-medium text-bank-navy">Statement Available</p>
                                            <p class="text-xs text-gray-500 mt-1">Your October statement is ready to view.</p>
                                            <p class="text-[10px] text-gray-400 mt-1">Yesterday</p>
                                        </div>
                                    </div>
                                </a> --}}

                            </div>
                            
                            
                            @if($notifications->isNotEmpty()) {{-- if there are notifications, show the view all notifications button  --}}
                                <div class="p-3 text-center border-t border-gray-50 bg-gray-50/30">
                                    <a href="{{route("user.notifications")}}" class="text-xs font-medium text-bank-gold hover:text-bank-navy" wire:navigate >View All Notifications</a>
                                </div>
                            @endif
                          
                        </div>
</span>