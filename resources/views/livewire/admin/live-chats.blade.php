{{-- The parent container of this main tag should have a defined height for this layout to work correctly.
    I've added a style attribute as an example, assuming a 64px tall navbar.
    You might need to adjust this based on your application's layout. --}}
<main  x-data="{ sidebarOpen: false }" class="relative flex-1 flex bg-gray-100 overflow-hidden" style="height: calc(100vh - 64px);">

    <!-- Left Sidebar: User List -->
    <aside 
        class="w-full md:w-1/3 flex flex-col bg-white border-r border-gray-300 absolute md:relative h-full z-30 transform transition-transform duration-300 ease-in-out md:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <!-- Header -->
        <div class="p-4 border-b border-gray-300">
            <h2 class="text-xl font-semibold">Chats</h2>
            <div class="relative mt-4">
                <input wire:model.live='SearchUserInput' type="text" placeholder="Search customers..." class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold">
                <svg class="w-5 h-5 text-gray-400 absolute top-1/2 left-3 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- User List -->
        @include('livewire/admin/includes/live-chats/user-list')
    

    </aside>

    <!-- Overlay this handles tthe user sideber on mobile view  -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden" x-cloak 
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-end="opacity-0">
    </div>


    <!-- Right Side: Chat Area -->
    <div class="flex-1 flex flex-col" wire:poll='updateReadChatAt'>

        <!-- Chat Header -->
        @include('livewire/admin/includes/live-chats/chat-header')

        <!-- Messages -->
        @include('livewire/admin/includes/live-chats/messages') 


        <!-- Message Form -->
        @include('livewire/admin/includes/live-chats/message-form')


    </div>

</main>

{{-- this  Java Script handles the Function to scroll the chat container to the bottom  --}}
<script>
    document.addEventListener('livewire:initialized', () => {
        const chatBox = document.getElementById('chat-box');

        // Function to scroll the chat container to the bottom
        function scrollToBottom() {
            if (chatBox) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }

        // Scroll immediately when the page loads
        setTimeout(scrollToBottom, 50);
        setTimeout(scrollToBottom, 150);

        // Listen for the custom Livewire event (triggered after sending a message or opening a chat)
        Livewire.on('scroll-chat-to-bottom', () => {
            setTimeout(scrollToBottom, 50);
            setTimeout(scrollToBottom, 200);
        });

        // Watch for DOM updates and scroll when messages are added
        if (chatBox) {
            const observer = new MutationObserver(() => {
                scrollToBottom();
            });
            observer.observe(chatBox, { childList: true, subtree: true });
        }

        // Also scroll on Livewire updates for better compatibility
        document.addEventListener('livewire:updated', () => {
            setTimeout(scrollToBottom, 50);
        });
    });
</script>




{{-- <script>
    const initEcho = () => {
        if (window.Echo) {
            // listen on the same channel the event is broadcasting to
            window.Echo.private(`user-typing-channel.{{ Auth::user()->id }}`)
                // you can also try the dotted name if the plain one doesn’t fire:
                .listen('UserTypingEvent', (e) => {
                    console.log('typing event received', e);
                    // notify Livewire so the component can update the UI
                    window.livewire.emit('userTyping', e.user.id);
                })
                .listen('.UserTypingEvent', (e) => {
                    console.log('fallback typed event', e);
                    window.livewire.emit('userTyping', e.user.id);
                });
        } else {
            setTimeout(initEcho, 250);
        }
    };
    initEcho();
</script> --}}
