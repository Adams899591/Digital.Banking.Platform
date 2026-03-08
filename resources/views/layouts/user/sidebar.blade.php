        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-bank-navy text-white hidden md:flex flex-col shadow-xl z-20">
            <!-- Logo -->
            <div class="h-20 flex items-center px-8 border-b border-white/10">
                <div class="font-serif text-xl font-bold tracking-wide text-white">
                    Prestige<span class="text-bank-gold">.</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-6">
                <ul class="space-y-2 px-4">
                    <li>
                        <a href="{{route("user.dashboard")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("user.dashboard") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-chart-line w-5"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("user.accounts")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("user.accounts") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-wallet w-5"></i>
                            <span class="font-medium">My Accounts</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("user.transfers")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("user.transfers") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-money-bill-transfer w-5"></i>
                            <span class="font-medium">Transfers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("user.statements")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("user.statements") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-file-invoice-dollar w-5"></i>
                            <span class="font-medium">Statements</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("user.cards")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("user.cards") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-credit-card w-5"></i>
                            <span class="font-medium">Cards</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("user.notifications")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("user.notifications") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-bell w-5"></i>
                            <span class="font-medium">Notifications</span>
                        </a>
                    </li>
                </ul>

                <div class="mt-8 px-8">
                    <p class="text-xs uppercase text-gray-500 font-semibold tracking-wider mb-4">Settings</p>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{route("user.profileAndSecurity")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("user.profileAndSecurity") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                                <i class="fa-solid fa-user-shield w-5"></i> Profile & Security
                            </a>
                        </li>
                        <li>
                            <a href="{{route("user.supportCenters")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("user.supportCenters") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                                <i class="fa-solid fa-headset w-5"></i> Support Center
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- User Snippet -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3">
                    <div class="relative flex-shrink-0">

                        {{--  check if profile picture is a URL or a local path, and display accordingly --}}
                        @if (Auth::user()->profile_picture && !Illuminate\Support\Str::startsWith(Auth::user()->profile_picture, 'http'))
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile picture" class="w-10 h-10 rounded-full border-2 border-bank-gold">
                         
                        @else  {{-- show UI Avatar if no profile picture or if it's a URL --}}

                            <img src="{{ Auth::user()->profile_picture ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->first_name . ' ' . Auth::user()->last_name) . '&background=c5a059&color=fff&size=128' }}" alt="Profile picture" class="w-10 h-10 rounded-full border-2 border-bank-gold">
                        
                        @endif
                        
                        <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full {{Auth::user()->last_seen  >= now()->subMinutes(2) ? 'bg-green-500' : 'bg-gray-500'}} border-2 border-bank-navy" title="Online"></span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                        <p class="text-xs text-gray-400">Premium Member</p>
                    </div>
                    <form action="{{route("userLogout")}}" method="post">
                        @csrf
                       <button type="submit" class="ml-auto text-gray-400 hover:text-white"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </div>
            </div>
        </aside> 