        <!-- Messages -->
        <div  wire:poll id="chat-box"  class="flex-1 p-6 overflow-y-auto bg-[#e5ddd5]" style="background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');">
            {{-- <!-- Date Divider -->
            <div class="flex justify-center mb-4">
                <span class="bg-white/80 text-gray-600 text-xs px-3 py-1 rounded-lg shadow-sm">Today</span>
            </div> --}}

            @if ($selectedUser) {{--  if a user is selected fetch all the user chat --}}
                
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


            @else     {{--  show a default message if user is not selected--}}
            
                <div class="flex flex-col items-center justify-center h-full text-center text-gray-500">
                    <svg class="w-24 h-24 text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700">Select a Chat</h3>
                    <p class="mt-2">Please select a customer from the list on the left to view the conversation.</p>
                </div>

            @endif

       
        </div>