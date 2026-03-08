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
                        <a href="{{route("admin.dashboard")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.dashboard") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-chart-line w-5"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.users")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.users") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-users w-5"></i>
                            <span class="font-medium">User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.accounts")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.accounts") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-university w-5"></i>
                            <span class="font-medium">Account Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.transactions")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.transactions") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-exchange-alt w-5"></i>
                            <span class="font-medium">Transactions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.support")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.support") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-ticket-alt w-5"></i>
                            <span class="font-medium">Support Tickets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.notifications")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.notifications") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-bell w-5"></i>
                            <span class="font-medium">System Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.chats")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.chats") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                            <i class="fa-solid fa-comments w-5"></i>
                            <span class="font-medium">Live Chats</span>
                        </a>
                    </li>
                </ul>
 
                <div class="mt-8 px-8">
                    <p class="text-xs uppercase text-gray-500 font-semibold tracking-wider mb-4">Admin Tools</p>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{route("admin.settings")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.settings") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                                <i class="fa-solid fa-cogs w-5"></i> System Settings
                            </a>
                        </li>
                        <li>
                            <a href="{{route("admin.reports")}}" class="flex items-center gap-4 px-4 py-3 {{request()->routeIs("admin.reports") ?  'bg-white/10 text-bank-gold' : " text-gray-300 hover:bg-white/5 hover:text-white" }} rounded-lg transition-all" wire:navigate>
                                <i class="fa-solid fa-file-invoice-dollar w-5"></i> Reports
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- User Snippet -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3">
                    <div class="relative flex-shrink-0">
                            <img src="{{Auth::guard('admin')->user()->profile_picture}}"  class="w-10 h-10 rounded-full border-2 border-bank-gold" >   
                        <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full {{Auth::user()->last_seen  >= now()->subMinutes(2) ? 'bg-green-500' : 'bg-gray-500'}} border-2 border-bank-navy" title="Online"></span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white"> {{Auth::guard("admin")->user()->first_name}}  {{Auth::guard("admin")->user()->last_name}}</p>
                        <p class="text-xs text-gray-400">{{Auth::guard("admin")->user()->role}}</p>
                    </div>
                    <form action="{{route("adminLogout")}}" method="post">
                        @csrf
                       <button type="submit" class="ml-auto text-gray-400 hover:text-white"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </div>
            </div>
        </aside> 