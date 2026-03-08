<!-- Online/Offline Status Indicator -->
<div
    x-data="{
        show: false,
        isOnline: true,
        // You can change the duration (in milliseconds) for how long the message appears.
        // Default: 30000ms (30 seconds)
        duration: 30000,
        message: '',
        title: ''
    }"
    x-init="
        window.addEventListener('online', () => {
            isOnline = true;
            title = 'Connection Restored';
            message = 'You are back online.';
            show = true;
            setTimeout(() => show = false, duration);
        });
        window.addEventListener('offline', () => {
            isOnline = false;
            title = 'Connection Lost';
            message = 'You are currently offline. Please check your connection.';
            show = true;
            setTimeout(() => show = false, duration);
        });
    "
    x-show="show"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-4"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-4"
    class="fixed bottom-5 right-5 z-[100] w-full max-w-xs"
>
    <!-- Toast Notification -->
    <div :class="isOnline ? 'bg-green-100 border-green-500' : 'bg-red-100 border-red-500'" class="flex items-start gap-3 p-4 rounded-lg shadow-lg border-l-4">
        <div :class="isOnline ? 'text-green-500' : 'text-red-500'" class="flex-shrink-0 pt-0.5">
            <i class="fa-solid text-xl" :class="isOnline ? 'fa-wifi' : 'fa-triangle-exclamation'"></i>
        </div>
        <div class="flex-grow">
            <p class="font-bold" :class="isOnline ? 'text-green-800' : 'text-red-800'" x-text="title"></p>
            <p class="text-sm" :class="isOnline ? 'text-green-700' : 'text-red-700'" x-text="message"></p>
        </div>
        <button @click="show = false" :class="isOnline ? 'text-green-600 hover:text-green-800' : 'text-red-600 hover:text-red-800'" class="ml-auto -mx-1.5 -my-1.5 p-1.5 rounded-md transition-colors">
             <i class="fa-solid fa-times"></i>
        </button>
    </div>
</div>