{{-- The parent container of this main tag should have a defined height for this layout to work correctly.
    I've added a style attribute as an example, assuming a 64px tall navbar.
    You might need to adjust this based on your application's layout. --}}
<main x-data="{ sidebarOpen: false }" class="relative flex-1 flex bg-gray-100 overflow-hidden" style="height: calc(100vh - 64px);">

    <!-- Left Sidebar: User List -->
    <aside 
        class="w-full md:w-1/3 flex flex-col bg-white border-r border-gray-300 absolute md:relative h-full z-30 transform transition-transform duration-300 ease-in-out md:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <!-- Header -->
        <div class="p-4 border-b border-gray-300">
            <h2 class="text-xl font-semibold">Chats</h2>
            <div class="relative mt-4">
                <input type="text" placeholder="Search customers..." class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold">
                <svg class="w-5 h-5 text-gray-400 absolute top-1/2 left-3 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- User List -->
        <div class="flex-1 overflow-y-auto">
            {{-- In a real application, you would loop through your customers here --}}
            
            <!-- User Item (Active) -->
            @foreach ($users as $user)
                
           
            <div wire:key='{{$user->id}}' wire:click='passedUserId({{$user->id}})' class="flex items-center p-4 cursor-pointer bg-bank-gold/10 border-l-4 border-bank-gold">
                <img src="{{$user->profile_picture}}" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 truncate">{{$user->first_name}} {{$user->last_name}}</h3>
                        <span class="text-xs text-gray-500">10:42 AM</span>
                    </div>
                    {{-- // display last message sent by the user or the admin in the chat message table --}}
                    <p class="text-sm text-gray-600 truncate"> @foreach ($chatMessages as $chatMessage)
                        @if ($chatMessage->sender_type === 'admin' && $chatMessage->receiver_id === $user->id)
                            {{ $chatMessage->message->latest() }}
                        @endif
                    @endforeach</p>
                </div>
            </div>
          @endforeach
            <!-- User Item -->
            <div class="flex items-center p-4 cursor-pointer hover:bg-gray-50 border-b border-gray-200">
                <img src="https://i.pravatar.cc/150?u=john.doe@example.com" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 truncate">John Doe</h3>
                        <span class="text-xs text-green-500">Now</span>
                    </div>
                    <p class="text-sm text-green-500 font-medium truncate">typing...</p>
                </div>
            </div>

            <!-- User Item -->
            <div class="flex items-center p-4 cursor-pointer hover:bg-gray-50 border-b border-gray-200">
                <img src="https://i.pravatar.cc/150?u=michael.brown@example.com" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 truncate">Michael Brown</h3>
                        <span class="text-xs text-green-500">Now</span>
                    </div>
                    <p class="text-sm text-green-500 font-medium truncate">typing...</p>
                </div>
            </div>



            {{-- End of loop --}}
        </div>    
    </aside>

    <!-- Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden" x-cloak 
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-end="opacity-0">
    </div>

    <!-- Right Side: Chat Area -->
    <div class="flex-1 flex flex-col">
        <!-- Chat Header -->
        <div class="bg-bank-navy p-4 flex justify-between items-center shadow-md z-10">
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="text-white mr-4 md:hidden">
                    <i class="fa-solid fa-comments"></i>
                </button>
                <div class="relative">
                    <img src="https://i.pravatar.cc/150?u=jane.smith@example.com" alt="User Avatar" class="w-10 h-10 rounded-full mr-4">
                    <span class="absolute bottom-0 left-7 w-3 h-3 bg-green-500 border-2 border-bank-navy rounded-full"></span>
                </div>
                <div>
                    <h3 class="text-white font-bold text-sm">Jane Smith</h3>
                    <p class="text-bank-gold text-xs flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span> Online</p>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div id="chat-box" class="flex-1 p-6 overflow-y-auto bg-[#e5ddd5]" style="background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');">
            <!-- Date Divider -->
            <div class="flex justify-center mb-4">
                <span class="bg-white/80 text-gray-600 text-xs px-3 py-1 rounded-lg shadow-sm">Today</span>
            </div>

            {{-- loop over all chat by Customer Suporter and User  --}}
            @foreach ($chatMessages as $chatMessage)

                @if ($chatMessage->sender_type === 'admin')

                    <!-- Sent Message (Admin) -->
                    <div class="flex justify-end mb-4">
                        <div class="bg-[#d9fdd3] rounded-lg rounded-br-none p-3 shadow-sm max-w-[80%] relative">
                            @if ($chatMessage->file_path)
                                <img src="{{ asset('storage/' . $chatMessage->file_path) }}" alt="Attachment" class="max-w-full sm:max-w-[200px] h-auto rounded-lg {{ $chatMessage->message ? 'mb-2' : '' }}">
                            @endif

                            @if ($chatMessage->message)
                                <p class="text-sm text-gray-800 leading-relaxed">{{ $chatMessage->message }}</p>
                            @endif

                            <div class="flex items-center justify-end gap-1 mt-1">
                                <span class="text-[10px] text-gray-500">{{ \Carbon\Carbon::parse($chatMessage->created_at)->format('g:i A') }}</span>
                                @if ($chatMessage->read_at !== null)
                                    <i class="fa-solid fa-check-double text-blue-500 text-[10px]"></i>
                                @else
                                    <i class="fa-solid fa-check-double text-gray-400 text-[10px]"></i>
                                @endif
                            </div>
                            <!-- Triangle -->
                            <div class="absolute top-0 -right-2 w-0 h-0 border-t-[10px] border-t-[#d9fdd3] border-r-[10px] border-r-transparent transform -rotate-90"></div>
                        </div>
                    </div>

                @elseif ($chatMessage->sender_type === 'user')

                    <!-- Received Message (User) -->
                    <div class="flex justify-start mb-4">
                        <div class="bg-white rounded-lg rounded-bl-none p-3 shadow-sm max-w-[80%] relative group">
                            @if ($chatMessage->file_path)
                                <img src="{{ asset('storage/' . $chatMessage->file_path) }}" alt="Attachment" class="max-w-full sm:max-w-[200px] h-auto rounded-lg {{ $chatMessage->message ? 'mb-2' : '' }}">
                            @endif

                            @if ($chatMessage->message)
                                <p class="text-sm text-gray-800 leading-relaxed">{{ $chatMessage->message }}</p>
                            @endif

                            <span class="text-xs text-gray-500 block text-right mt-1">{{ \Carbon\Carbon::parse($chatMessage->created_at)->format('g:i A') }}</span>
                            <!-- Triangle -->
                            <div class="absolute top-0 -left-2 w-0 h-0 border-t-[10px] border-t-white border-l-[10px] border-l-transparent transform rotate-90"></div>
                        </div>
                    </div>
                    
                @endif

            @endforeach

       
        </div>

        <!-- Message Input -->
        <form wire:submit='adminSubmitChat'>
            <div class="bg-gray-50 p-3 border-t border-gray-200 flex items-center gap-2">

                {{-- file --}}
                <input wire:model='chatFile' type="file" id="chat_attachment" class="hidden" />
                <label for="chat_attachment" class="text-gray-500 hover:text-gray-700 p-2 rounded-full hover:bg-gray-200 transition-colors cursor-pointer">
                    <i class="fa-solid fa-paperclip"></i>
                </label>

                {{-- chat message --}}
                <div class="flex-1 relative">
                    <input  wire:model.live='chatMessage' type="text" placeholder="Type a message..." class="w-full border-none rounded-full py-2.5 px-4 bg-white focus:ring-1 focus:ring-bank-gold shadow-sm text-sm">
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class="fa-regular fa-face-smile"></i>
                    </button>
                </div>

               @if ($chatFile || $chatMessage) {{--  only show submit button when they is value on any of the form fields --}}
                    <button type="submit" class="w-10 h-10 rounded-full bg-bank-navy text-white flex items-center justify-center hover:bg-bank-navy/90 shadow-md transition-transform active:scale-95">
                        <i class="fa-solid fa-paper-plane text-sm ml-0.5"></i>
                    </button>
               @endif
            </div>
        </form>

    </div>

</main>

{{-- this  Java Script handles the Function to scroll the chat container to the bottom  --}}
<script>
    (() => {
        function scrollToBottom() {
            const chatBox = document.getElementById('chat-box');
            if (chatBox) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }

        // Scroll immediately when the page loads
        scrollToBottom();
        setTimeout(scrollToBottom, 100);

        document.addEventListener('livewire:initialized', () => {
            scrollToBottom();
            Livewire.on('scroll-chat-to-bottom', () => {
                setTimeout(scrollToBottom, 100);
                setTimeout(scrollToBottom, 300);
            });
        });

        document.addEventListener('livewire:navigated', () => {
            scrollToBottom();
        });
    })();
</script>



























{{-- The parent container of this main tag should have a defined height for this layout to work correctly.
    I've added a style attribute as an example, assuming a 64px tall navbar.
    You might need to adjust this based on your application's layout. --}}
<main x-data="{ sidebarOpen: false }" class="relative flex-1 flex bg-gray-100 overflow-hidden" style="height: calc(100vh - 64px);">

    <!-- Left Sidebar: User List -->
    <aside 
        class="w-full md:w-1/3 flex flex-col bg-white border-r border-gray-300 absolute md:relative h-full z-30 transform transition-transform duration-300 ease-in-out md:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <!-- Header -->
        <div class="p-4 border-b border-gray-300">
            <h2 class="text-xl font-semibold">Chats</h2>
            <div class="relative mt-4">
                <input type="text" placeholder="Search customers..." class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold">
                <svg class="w-5 h-5 text-gray-400 absolute top-1/2 left-3 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- User List -->
        <div class="flex-1 overflow-y-auto">
            {{-- In a real application, you would loop through your customers here --}}
            
            <!-- User Item (Active) -->
            @foreach ($users as $user)
                
           
            <div wire:key='{{$user->id}}' wire:click='passedUserId({{$user->id}})' class="flex items-center p-4 cursor-pointer bg-bank-gold/10 border-l-4 border-bank-gold">
                <img src="{{$user->profile_picture}}" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 truncate">{{$user->first_name}} {{$user->last_name}}</h3>
                        <span class="text-xs text-gray-500">10:42 AM</span>
                    </div>
                    {{-- // display last message sent by the user or the admin in the chat message table --}}
                    <p class="text-sm text-gray-600 truncate">
                        @php
                            $lastMsg = $chatMessages->filter(function($msg) use ($user) {
                                return ($msg->sender_type === 'admin' && $msg->receiver_id === $user->id) ||
                                       ($msg->sender_type === 'user' && $msg->sender_id === $user->id);
                            })->last();
                        @endphp
                        {{ $lastMsg ? $lastMsg->message : '' }}
                    </p>
                </div>
            </div>
          @endforeach
            <!-- User Item -->
            <div class="flex items-center p-4 cursor-pointer hover:bg-gray-50 border-b border-gray-200">
                <img src="https://i.pravatar.cc/150?u=john.doe@example.com" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 truncate">John Doe</h3>
                        <span class="text-xs text-green-500">Now</span>
                    </div>
                    <p class="text-sm text-green-500 font-medium truncate">typing...</p>
                </div>
            </div>

            <!-- User Item -->
            <div class="flex items-center p-4 cursor-pointer hover:bg-gray-50 border-b border-gray-200">
                <img src="https://i.pravatar.cc/150?u=michael.brown@example.com" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 truncate">Michael Brown</h3>
                        <span class="text-xs text-green-500">Now</span>
                    </div>
                    <p class="text-sm text-green-500 font-medium truncate">typing...</p>
                </div>
            </div>



            {{-- End of loop --}}
        </div>    
    </aside>

    <!-- Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden" x-cloak 
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-end="opacity-0">
    </div>

    <!-- Right Side: Chat Area -->
    <div class="flex-1 flex flex-col">
        <!-- Chat Header -->
        <div class="bg-bank-navy p-4 flex justify-between items-center shadow-md z-10">
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="text-white mr-4 md:hidden">
                    <i class="fa-solid fa-comments"></i>
                </button>
                <div class="relative">
                    <img src="https://i.pravatar.cc/150?u=jane.smith@example.com" alt="User Avatar" class="w-10 h-10 rounded-full mr-4">
                    <span class="absolute bottom-0 left-7 w-3 h-3 bg-green-500 border-2 border-bank-navy rounded-full"></span>
                </div>
                <div>
                    <h3 class="text-white font-bold text-sm">Jane Smith</h3>
                    <p class="text-bank-gold text-xs flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span> Online</p>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div id="chat-box" class="flex-1 p-6 overflow-y-auto bg-[#e5ddd5]" style="background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');">
            <!-- Date Divider -->
            <div class="flex justify-center mb-4">
                <span class="bg-white/80 text-gray-600 text-xs px-3 py-1 rounded-lg shadow-sm">Today</span>
            </div>

            {{-- loop over all chat by Customer Suporter and User  --}}
            @foreach ($chatMessages as $chatMessage)

                @if ($chatMessage->sender_type === 'admin')

                    <!-- Sent Message (Admin) -->
                    <div class="flex justify-end mb-4">
                        <div class="bg-[#d9fdd3] rounded-lg rounded-br-none p-3 shadow-sm max-w-[80%] relative">
                            @if ($chatMessage->file_path)
                                <img src="{{ asset('storage/' . $chatMessage->file_path) }}" alt="Attachment" class="max-w-full sm:max-w-[200px] h-auto rounded-lg {{ $chatMessage->message ? 'mb-2' : '' }}">
                            @endif

                            @if ($chatMessage->message)
                                <p class="text-sm text-gray-800 leading-relaxed">{{ $chatMessage->message }}</p>
                            @endif

                            <div class="flex items-center justify-end gap-1 mt-1">
                                <span class="text-[10px] text-gray-500">{{ \Carbon\Carbon::parse($chatMessage->created_at)->format('g:i A') }}</span>
                                @if ($chatMessage->read_at !== null)
                                    <i class="fa-solid fa-check-double text-blue-500 text-[10px]"></i>
                                @else
                                    <i class="fa-solid fa-check-double text-gray-400 text-[10px]"></i>
                                @endif
                            </div>
                            <!-- Triangle -->
                            <div class="absolute top-0 -right-2 w-0 h-0 border-t-[10px] border-t-[#d9fdd3] border-r-[10px] border-r-transparent transform -rotate-90"></div>
                        </div>
                    </div>

                @elseif ($chatMessage->sender_type === 'user')

                    <!-- Received Message (User) -->
                    <div class="flex justify-start mb-4">
                        <div class="bg-white rounded-lg rounded-bl-none p-3 shadow-sm max-w-[80%] relative group">
                            @if ($chatMessage->file_path)
                                <img src="{{ asset('storage/' . $chatMessage->file_path) }}" alt="Attachment" class="max-w-full sm:max-w-[200px] h-auto rounded-lg {{ $chatMessage->message ? 'mb-2' : '' }}">
                            @endif

                            @if ($chatMessage->message)
                                <p class="text-sm text-gray-800 leading-relaxed">{{ $chatMessage->message }}</p>
                            @endif

                            <span class="text-xs text-gray-500 block text-right mt-1">{{ \Carbon\Carbon::parse($chatMessage->created_at)->format('g:i A') }}</span>
                            <!-- Triangle -->
                            <div class="absolute top-0 -left-2 w-0 h-0 border-t-[10px] border-t-white border-l-[10px] border-l-transparent transform rotate-90"></div>
                        </div>
                    </div>
                    
                @endif

            @endforeach

       
        </div>

        <!-- Message Input -->
        <form wire:submit='adminSubmitChat'>
            <div class="bg-gray-50 p-3 border-t border-gray-200 flex items-center gap-2">

                {{-- file --}}
                <input wire:model='chatFile' type="file" id="chat_attachment" class="hidden" />
                <label for="chat_attachment" class="text-gray-500 hover:text-gray-700 p-2 rounded-full hover:bg-gray-200 transition-colors cursor-pointer">
                    <i class="fa-solid fa-paperclip"></i>
                </label>

                {{-- chat message --}}
                <div class="flex-1 relative">
                    <input  wire:model.live='chatMessage' type="text" placeholder="Type a message..." class="w-full border-none rounded-full py-2.5 px-4 bg-white focus:ring-1 focus:ring-bank-gold shadow-sm text-sm">
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class="fa-regular fa-face-smile"></i>
                    </button>
                </div>

               @if ($chatFile || $chatMessage) {{--  only show submit button when they is value on any of the form fields --}}
                    <button type="submit" class="w-10 h-10 rounded-full bg-bank-navy text-white flex items-center justify-center hover:bg-bank-navy/90 shadow-md transition-transform active:scale-95">
                        <i class="fa-solid fa-paper-plane text-sm ml-0.5"></i>
                    </button>
               @endif
            </div>
        </form>

    </div>

</main>

{{-- this  Java Script handles the Function to scroll the chat container to the bottom  --}}
<script>
    (() => {
        function scrollToBottom() {
            const chatBox = document.getElementById('chat-box');
            if (chatBox) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }

        // Scroll immediately when the page loads
        scrollToBottom();
        setTimeout(scrollToBottom, 100);

        document.addEventListener('livewire:initialized', () => {
            scrollToBottom();
            Livewire.on('scroll-chat-to-bottom', () => {
                setTimeout(scrollToBottom, 100);
                setTimeout(scrollToBottom, 300);
            });
        });

        document.addEventListener('livewire:navigated', () => {
            scrollToBottom();
        });
    })();
</script>
