         <!-- Top Header -->
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8 z-10 shadow-md">
                <div class="flex items-center gap-4">
                    <button id="mobileMenuBtn" class="md:hidden text-gray-500 text-xl"><i class="fa-solid fa-bars"></i></button>
                    <h2 class="text-xl font-serif font-bold text-bank-navy">

                            @if (request()->routeIs("admin.dashboard"))
                                Dashboard
                            @elseif(request()->routeIs("admin.users"))
                                Users
                            @elseif(request()->routeIs("admin.accounts"))
                                Accounts
                            @elseif(request()->routeIs("admin.transactions"))
                                Transactions
                            @elseif(request()->routeIs("admin.support"))
                                Support Tickets
                            @elseif(request()->routeIs("admin.notifications"))
                                Notifications
                            @elseif(request()->routeIs("admin.settings"))
                                System Settings
                            @elseif(request()->routeIs("admin.reports"))
                                Reports
                            @endif
                             

                          
                    </h2>
                </div>
                <div class="flex items-center gap-6">
                    <div class="hidden md:flex items-center gap-2 text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full border border-green-100">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Encrypted Connection</span>
                    </div>
                    <div class="relative">
                        
                        <!-- Notification Dropdown -->
                        <livewire:admin.includes.layouts.notification-bell>

                    </div>
                </div>
            </header>