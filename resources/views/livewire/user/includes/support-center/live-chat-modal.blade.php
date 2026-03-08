            <!-- Live Chat Modal -->
                <div id="live-chat-modal" wire:click='updateReadChatAt' x-show="showChatModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div x-show="showChatModal" @click="showChatModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div x-show="showChatModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all w-full sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            
                            <div class="h-[600px] flex flex-col" wire:poll='updateReadChatAt'>
                                <!-- Chat Header -->
                                <div class="bg-bank-navy p-4 flex justify-between items-center shadow-md z-10">
                                    <div class="flex items-center gap-3">
                                        <div class="relative">
                                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                                                <i class="fa-solid fa-headset text-gray-600 text-lg"></i>
                                            </div>
                                            <span class="absolute bottom-0 right-0 w-3 h-3 {{$customerSupport->last_seen  >= now()->subMinutes(2) ? 'bg-green-500' : 'bg-gray-500'}} border-2 border-bank-navy rounded-full"></span>
                                        </div>
                                        <div>
                                            <h3 class="text-white font-bold text-sm">Customer Support</h3>
                                            <p class="text-bank-gold text-xs flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full {{$customerSupport->last_seen  >= now()->subMinutes(2) ? 'bg-green-500' : 'bg-gray-500'}} inline-block"></span> {{$customerSupport->last_seen  >= now()->subMinutes(2) ? 'Online' : 'Offline'}}</p>
                                        </div>
                                    </div>
                                    <button @click="showChatModal = false" class="text-gray-400 hover:text-white transition-colors">
                                        <i class="fa-solid fa-xmark text-xl"></i>
                                    </button>
                                </div> 

                                <!-- Chat Area -->
                                <div wire:poll id="chat-box" class="flex-1 bg-[#e5ddd5] p-4 overflow-y-auto space-y-4" style="background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');">
                                    <!-- Date Divider -->
                                    <div class="flex justify-center mb-4">
                                        <span class="bg-white/80 text-gray-600 text-xs px-3 py-1 rounded-lg shadow-sm">Today</span>
                                    </div>

                                     {{-- loop over all chat by Customer Suporter and User  --}}
                                    @foreach ($chatMessages as $chatMessage) 
                                       
                                     
                                            {{-- Handles User Section --}}
                                            @if ($chatMessage->sender_type === "user")  {{-- Message Right (User)  --}}


                                                    <div class="flex items-end gap-2 justify-end">
                                                        <div class="bg-[#d9fdd3] rounded-lg rounded-br-none p-3 shadow-sm max-w-[80%] relative">
            
                                                            @if ($chatMessage->file_path)
                                                                <img src="{{ asset('storage/' . $chatMessage->file_path) }}" alt="Attachment" class="max-w-full sm:max-w-[200px] h-auto rounded-lg {{ $chatMessage->message ? 'mb-2' : '' }}">
                                                            @endif

                                                            @if ($chatMessage->message)
                                                                <p class="text-sm text-gray-800 leading-relaxed">{{$chatMessage->message}}</p>
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
                                                            <div class="absolute top-0 -right-2 w-0 h-0 border-t-[10px] border-t-[#d9fdd3] border-r-[10px] border-r-transparent transform -rotate-10"></div>
                                                        </div>
                                                    </div>


                                                    

                                            {{-- Handles Customer Suporter Section --}}
                                            @elseif($chatMessage->sender_type === "admin")  {{--  Message Left (Agent)  --}}
                        

                                                    <div class="flex items-end gap-2">
                                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex-shrink-0 flex items-center justify-center overflow-hidden border border-gray-300">
                                                            <i class="fa-solid fa-headset text-gray-500 text-xs"></i>
                                                        </div>
                                                        <div class="bg-white rounded-lg rounded-bl-none p-3 shadow-sm max-w-[80%] relative group">
                                                            @if ($chatMessage->file_path)
                                                                <img src="{{ asset('storage/' . $chatMessage->file_path) }}" alt="Attachment" class="max-w-full sm:max-w-[200px] h-auto rounded-lg {{ $chatMessage->message ? 'mb-2' : '' }}">
                                                            @endif

                                                            @if ($chatMessage->message)
                                                                <p class="text-sm text-gray-800 leading-relaxed">{{$chatMessage->message}}</p>
                                                            @endif
                                                            
                                                            <span class="text-[10px] text-gray-400 block text-right mt-1">{{ \Carbon\Carbon::parse($chatMessage->created_at)->format('g:i A') }}</span>
                                                            <!-- Triangle -->
                                                            <div class="absolute top-0 -left-2 w-0 h-0 border-t-[10px] border-t-white border-l-[10px] border-l-transparent transform rotate-10"></div>
                                                        </div>
                                                    </div>

                                            @endif

                                
                                    @endforeach

                                </div>

                                <!-- Input Area -->
                                <form wire:submit='userSubmitChat'>

                                    <div class="bg-gray-50 p-3 border-t border-gray-200 flex items-center gap-2">

                                        {{-- file --}}
                                        <input wire:model='chatFile'  type="file" id="chat_attachment" class="hidden" />
                                        <label for="chat_attachment" class="text-gray-500 hover:text-gray-700 p-2 rounded-full hover:bg-gray-200 transition-colors cursor-pointer">
                                            <i class="fa-solid fa-paperclip"></i>
                                        </label>

                                        {{-- chat message --}}
                                        <div class="flex-1 relative">
                                            <input wire:model.live='chatMessage'    type="text" placeholder="Type a message..." class="w-full border-none rounded-full py-2.5 px-4 bg-white focus:ring-1 focus:ring-bank-gold shadow-sm text-sm">
                                            <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                                <i class="fa-regular fa-face-smile"></i>
                                            </button>
                                        </div>

                                                                        
                                        {{-- submit button --}}
                                         @if ($chatFile  || $chatMessage) {{-- only show submit button when they is value on any of the form fields --}}
                                                <button  type="submit" class="w-10 h-10 rounded-full bg-bank-navy text-white flex items-center justify-center hover:bg-bank-navy/90 shadow-md transition-transform active:scale-95">
                                                    <i class="fa-solid fa-paper-plane text-sm ml-0.5"></i>
                                                </button>
                                         @endif
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- this  Java Script handles the Function to scroll the chat container to the bottom  --}}
                <script>
                    document.addEventListener('livewire:initialized', () => {
                        const chatModal = document.getElementById('live-chat-modal');

                        // Function to scroll the chat container to the bottom
                        function scrollToBottom() {
                            const chatBox = document.getElementById('chat-box');
                            if (chatBox) {
                                chatBox.scrollTop = chatBox.scrollHeight;
                            }
                        }

                        // Listen for the custom Livewire event (triggered after sending a message)
                        Livewire.on('scroll-chat-to-bottom', () => {
                            setTimeout(scrollToBottom, 100);
                        });

                        // Watch for changes to the modal's visibility using MutationObserver
                        // This detects when AlpineJS removes 'display: none' so we can scroll on open
                        if (chatModal) {
                            const observer = new MutationObserver((mutations) => {
                                mutations.forEach((mutation) => {
                                    if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                                        // If the modal is visible (display is not none)
                                        if (chatModal.style.display !== 'none') {
                                            setTimeout(scrollToBottom, 50); // Scroll immediately
                                        }
                                    }
                                });
                            });
                            observer.observe(chatModal, { attributes: true });
                        }
                    });
                </script>
