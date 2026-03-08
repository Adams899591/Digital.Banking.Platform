        <!-- User List -->
        <div class="flex-1 overflow-y-auto">
            {{-- In a real application, you would loop through your customers here --}}
            
            <!-- User Item (Active) -->
            @foreach ($users as $user)
                    @php
                        // compute last message once per user so it's available for both the
                        // timestamp and preview text
                        $lastMsg = $this->getLastMessage($user->id);
                    @endphp

                <div wire:key='{{$user->id}}' wire:click='openChat({{$user->id}})' class="flex items-center p-4 cursor-pointer hover:bg-gray-50 border-b border-gray-200">
                    <div class="relative mr-4">

                            {{--  check if profile picture is a URL or a local path, and display accordingly --}}
                            @if ($user->profile_picture && !Illuminate\Support\Str::startsWith($user->profile_picture, 'http'))

                                    <img src="{{ asset("storage/". $user->profile_picture) }}" alt="User Avatar" class="w-12 h-12 rounded-full ">

                            @else  {{-- show UI Avatar if no profile picture or if it's a URL --}}
                                    
                                <img src="{{$user->profile_picture ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->first_name . ' ' . $user->last_name) . '&background=c5a059&color=fff&size=128'}}" alt="User Avatar" class="w-12 h-12 rounded-full ">

                            @endif

                        {{-- <img src="{{$user->profile_picture}}" alt="User Avatar" class="w-12 h-12 rounded-full "> --}}
                        <span class="absolute bottom-0 right-0 w-3.5 h-3.5 {{ $user->last_seen >= now()->subMinutes(2) ? 'bg-green-500' : 'bg-gray-500' }} border-2 border-white rounded-full"></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold text-gray-800 truncate">{{$user->first_name}} {{$user->last_name}}</h3>
                            <span class="text-xs text-gray-500">
                                {{ $lastMsg ? \Carbon\Carbon::parse($lastMsg->created_at)->format('g:i A') : '' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 truncate">
                            {{ $lastMsg ? (strlen($lastMsg->message) > 50 ? substr($lastMsg->message, 0, 50) . '...' : $lastMsg->message) : 'No messages yet' }}
                        </p>
                    </div>
                </div>
            @endforeach

            <!-- User Item -->
            {{-- <div class="flex items-center p-4 cursor-pointer hover:bg-gray-50 border-b border-gray-200">
                <img src="https://i.pravatar.cc/150?u=john.doe@example.com" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 truncate">John Doe</h3>
                        <span class="text-xs text-green-500">Now</span>
                    </div>
                    <p class="text-sm text-green-500 font-medium truncate">typing...</p>
                </div>
            </div> --}}

            <!-- User Item -->
            {{-- <div class="flex items-center p-4 cursor-pointer hover:bg-gray-50 border-b border-gray-200">
                <img src="https://i.pravatar.cc/150?u=michael.brown@example.com" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 truncate">Michael Brown</h3>
                        <span class="text-xs text-green-500">Now</span>
                    </div>
                    <p class="text-sm text-green-500 font-medium truncate">typing...</p>
                </div>
            </div> --}}

        </div> 