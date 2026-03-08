<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', '@') }}</title> 
    <!-- Professional Font Pairing: Playfair Display (Headings) + Inter (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-navy': '#0a192f',
                        'primary-light': '#172a45',
                        'accent-gold': '#c5a059',
                        'accent-gold-hover': '#d4af37',
                        'text-white': '#e6f1ff',
                        'text-gray': '#8892b0',
                    },
                    fontFamily: {
                        'heading': ['"Playfair Display"', 'serif'],
                        'body': ['"Inter"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    @livewireStyles
</head>
<body class="font-body bg-[#f4f4f4] text-[#333] leading-relaxed">

    <!-- Top Bar (Contact Info) -->
    <div class="bg-primary-navy text-text-gray text-sm py-2 border-b border-white/10">
        <div class="max-w-[1200px] mx-auto px-5 flex justify-between">
            <span><span class="icon">🔒</span> Secure & Encrypted Connection</span>
            <span><a href="{{route("adminLogin")}}">24/7 Support: 1-800-PRESTIGE</a></span>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white shadow-[0_2px_15px_rgba(0,0,0,0.05)] sticky top-0 z-[1000] py-4">
        <div class="max-w-[1200px] mx-auto px-5 flex justify-between items-center">
            <div class="font-heading text-3xl font-bold text-primary-navy tracking-tighter">Prestige Bank</div>
            
            <!-- Mobile Menu Checkbox Hack -->
            <input type="checkbox" id="menu-toggle" class="hidden peer">
            <label for="menu-toggle" class="block md:hidden cursor-pointer text-2xl text-primary-navy">
                <div class="w-[25px] h-[3px] bg-primary-navy my-[5px]"></div>
                <div class="w-[25px] h-[3px] bg-primary-navy my-[5px]"></div>
                <div class="w-[25px] h-[3px] bg-primary-navy my-[5px]"></div>
            </label>

            <!-- Navigation Links & Login -->
            <div class="hidden peer-checked:flex flex-col items-center absolute top-[70px] left-0 right-0 bg-white p-5 shadow-lg md:shadow-none md:flex md:flex-row md:static md:bg-transparent md:p-0 md:items-center gap-x-8">
                <ul class="flex flex-col md:flex-row gap-y-4 gap-x-8 list-none text-center md:text-left">
                    <li><a href="{{ route('banks.home') }}" class="font-medium text-primary-navy text-[0.95rem] hover:text-accent-gold transition duration-300" wire:navigate >Home</a></li>
                    <li><a href="{{ route('banks.privateBanking') }}" class="font-medium text-primary-navy text-[0.95rem] hover:text-accent-gold transition duration-300" wire:navigate>Private Banking</a></li>
                    <li><a href="{{route('banks.corporate')}}" class="font-medium text-primary-navy text-[0.95rem] hover:text-accent-gold transition duration-300" wire:navigate>Corporate</a></li>
                    <li><a href="{{route('banks.wealthManagement')}}" class="font-medium text-primary-navy text-[0.95rem] hover:text-accent-gold transition duration-300" wire:navigate>Wealth Management</a></li>
                </ul>
                <div class="mt-5 md:mt-0">
                    {{-- <a href="#" class="px-6 py-2.5 rounded-sm font-semibold text-sm cursor-pointer transition duration-300 border border-primary-navy text-primary-navy hover:bg-gray-50">Open Account</a> --}}
                    <a href="{{ route('login') }}" class="px-6 py-2.5 rounded-sm font-semibold text-sm cursor-pointer transition duration-300 bg-primary-navy text-white hover:bg-primary-light" wire:navigate>Online Banking Login</a>
                </div>
            </div>
        </div>
    </nav>

      @yield('content')

      @livewireScripts
</body>
</html>


{{-- this handles our online and offline status indicator--}}
@include('Status.online-offline-indicator')
