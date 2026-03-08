<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', '@') }}</title> 
         @vite(["resources/css/app.css","resources/js/app.js"])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Wind CSS) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Configuration for Bank Theme -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bank: {
                            navy: '#0a192f',
                            dark: '#020c1b',
                            gold: '#c5a059',
                            gold_hover: '#d4af37',
                            light: '#e6f1ff',
                            gray: '#8892b0',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c5a059; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #0a192f; }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-50 font-sans text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- ====== Sidebar ======= -->
        @include('layouts.user.sidebar')

        <!-- ====== Main Content Area ======= -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
            
                <!--  ======= Top Header  ======= -->
                @include('layouts.user.header')

                <!--  ======= Scrollable Content   ======= -->
                                {{$slot}}
        </div>
    </div>
    <script>
    document.addEventListener("livewire:navigated", () => {

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        
        // Create overlay for mobile
        const overlay = document.createElement('div');
        overlay.className = 'fixed inset-0 bg-black/50 z-10 hidden md:hidden';
        document.body.appendChild(overlay);

        function toggleSidebar() {
            const isHidden = sidebar.classList.contains('hidden');
            if (isHidden) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('flex', 'fixed', 'inset-y-0', 'left-0');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('flex', 'fixed', 'inset-y-0', 'left-0');
                overlay.classList.add('hidden');
            }
        }

        mobileMenuBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Notification Dropdown
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationDropdown = document.getElementById('notificationDropdown');

        if (notificationBtn && !notificationBtn.dataset.listenerAttached) {
            notificationBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                notificationDropdown.classList.toggle('hidden');
            });
            notificationBtn.dataset.listenerAttached = 'true';
        }

        // Close dropdown when clicking outside
        if (!window.notificationCloseListenerAttached) {
            document.addEventListener('click', (e) => {
                const btn = document.getElementById('notificationBtn');
                const dropdown = document.getElementById('notificationDropdown');
                if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });
            window.notificationCloseListenerAttached = true;
        }

    });


    // const initEcho = () => {
    //     if (typeof window.Echo !== 'undefined') {
    //         window.Echo.private("user-private-channel.{{Auth::user()->id}}")
    //             .listen("UserNotificationBellEvent", (e) => {
    //                 console.log(e.message);
    //                 window.dispatchEvent(new CustomEvent('refresh-notifications'));
    //             });
    //     } else {
    //         setTimeout(initEcho, 250);
    //     }
    // };
    // initEcho();



     
    </script>
     @livewireScripts
{{-- this handles our online and offline status indicator--}}
@include('Status.online-offline-indicator')
{{-- this handles wire poll --}}
<livewire:user-update-online-status-indicator> 
{{-- this handles toster masmerise --}}
<x-toaster-hub /> 
 

</body>
</html>
