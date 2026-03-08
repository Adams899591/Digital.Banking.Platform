        <!-- Message Form -->
       @if ($selectedUser) {{--  Only show this if a user to chat with is selected --}}
         
            <form wire:submit='adminSubmitChat'>
                <div class="bg-gray-50 p-3 border-t border-gray-200 flex items-center gap-2">

                    {{-- file --}}
                    <input wire:model='chatFile' type="file" id="chat_attachment" class="hidden" />
                    <label for="chat_attachment" class="text-gray-500 hover:text-gray-700 p-2 rounded-full hover:bg-gray-200 transition-colors cursor-pointer">
                        <i class="fa-solid fa-paperclip"></i>
                    </label>

                    {{-- chat message --}}
                    <div class="flex-1 relative">
                        <input   wire:model.live='chatMessage' id="chatMessage" type="text" placeholder="Type a message..." class="w-full border-none rounded-full py-2.5 px-4 bg-white focus:ring-1 focus:ring-bank-gold shadow-sm text-sm">
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i class="fa-regular fa-face-smile"></i>
                        </button>
                    </div>

                    {{-- hide button if it is empty --}}
                    @if ($chatFile || $chatMessage)
                    
                        <button type="submit"  class="w-10 h-10 rounded-full bg-bank-navy text-white flex items-center justify-center hover:bg-bank-navy/90 shadow-md transition-transform active:scale-95">
                            <i class="fa-solid fa-paper-plane text-sm ml-0.5"></i>
                        </button>

                    @endif
                </div>
            </form>

       @endif