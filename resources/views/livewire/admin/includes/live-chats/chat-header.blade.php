       <!-- Chat Header -->
        <div class="bg-bank-navy p-4 flex justify-between items-center shadow-md z-10">
            <div class="flex items-center">

                {{-- this button is only visible on mobile view --}}
                <button @click="sidebarOpen = !sidebarOpen" class="text-white mr-4 md:hidden">
                    <i class="fa-solid fa-comments"></i>
                </button>

                @if ($selectedUser) {{--  Only show this if a user to chat with is selected --}}
                         {{-- this section hold user image on header --}}
                        <div class="relative">
                                                            
                            {{--  check if profile picture is a URL or a local path, and display accordingly --}}
                            @if ($selectedUser->profile_picture && !Illuminate\Support\Str::startsWith($selectedUser->profile_picture, 'http'))

                                    <img src="{{ asset("storage/". $selectedUser->profile_picture) }}" class="w-10 h-10 rounded-full mr-4">

                            @else  {{-- show UI Avatar if no profile picture or if it's a URL --}}
                                    
                                <img src="{{$selectedUser->profile_picture ?? 'https://ui-avatars.com/api/?name=' . urlencode($selectedUser->first_name . ' ' . $selectedUser->last_name) . '&background=c5a059&color=fff&size=128'}}" alt="Profile" class="w-10 h-10 rounded-full mr-4">

                            @endif

                            <span class="absolute bottom-0 left-7 w-3 h-3 {{ $selectedUser->last_seen  >= now()->subMinutes(2) ? 'bg-green-500' : 'bg-gray-500'}} border-bank-navy rounded-full"></span>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-sm">{{$selectedUser->first_name . " " . $selectedUser->last_name}}</h3>
                            <p class="text-bank-gold text-xs flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full {{ $selectedUser->last_seen  >= now()->subMinutes(2) ? 'bg-green-500' : 'bg-gray-500'}} inline-block"></span> {{ $selectedUser->last_seen  >= now()->subMinutes(2) ? 'Online' : 'Offline'}}</p>
                        </div>
                @else   {{--  Only show if a user to chat with not selected --}}
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-headset text-bank-gold text-2xl"></i>
                        <h3 class="text-white font-semibold text-lg">Live Chat Support</h3>
                    </div>
                @endif
                
            </div>
        </div> 