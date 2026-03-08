
              <!-- Scrollable Content --> 
            <main class="flex-1 overflow-y-auto p-8 bg-gray-50" wire:init="loadPage">

                @if (!$readyToLoad) {{-- run and show loading skeleton page --}}
                 
                    @include('Status/skeleton')

                @else {{--  show main page   --}}

                    <!-- Welcome Section -->
                    <div class="mb-8 flex justify-between items-end">
                        <div>
                            <p class="text-gray-500 text-sm mb-1">{{ function_exists('greeting') ? greeting() : (now()->hour < 12 ? 'Good Morning' : (now()->hour < 18 ? 'Good Afternoon' : 'Good Evening')) }},</p>
                            <h1 class="text-3xl font-bold text-bank-navy">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
                        </div>
                        <div class="text-right hidden sm:block" x-data="{ show: false }">
                            <p class="text-sm text-gray-500">Total Assets</p>
                            <div class="flex items-center justify-end gap-3">
                                <p class="text-2xl font-serif font-bold text-bank-navy">
                                    <span x-show="!show">********</span>
                                    <span x-show="show" style="display: none;">${{ number_format($total, 2) }}</span>
                                </p>                                     
                                <button @click="show = !show" class="text-gray-400 hover:text-bank-navy transition-colors"><i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Account Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Checking Account -->
                        <div class="bg-bank-navy text-white p-6 rounded-xl shadow-lg relative overflow-hidden group">
                            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                                <i class="fa-brands fa-cc-visa text-9xl"></i>
                            </div>
                            <div class="relative z-10">
                                <div class="flex justify-between items-start mb-6">
                                    <div>
                                        <p class="text-gray-300 text-sm">Premier Checking</p>
                                        <p class="text-xs text-gray-400">**** **** **** {{substr(Auth::user()->account_number, -4)}}</p>
                                    </div>
                                    <span class="bg-white/20 px-2 py-1 rounded text-xs">Active</span>
                                </div>
                                <div class="mb-2 flex items-center gap-3" x-data="{ show: false }">
                                    <p class="text-3xl font-bold">
                                        <span x-show="!show">********</span>
                                        <span x-show="show" style="display: none;">${{number_format(Auth::user()->bankAccount->premier_balance ?? 0.00)}}</span>
                                    </p>
                                    <button @click="show = !show" class="text-gray-300 hover:text-white transition-colors"><i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i></button>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-xs text-gray-400">Available Balance</p>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-4 bg-white rounded px-1" alt="Visa">
                                </div>
                            </div>
                        </div> 

                        <!-- Savings Account -->
                        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 relative overflow-hidden">
                            <div class="flex justify-between items-start mb-6">
                                <div>
                                    <p class="text-gray-500 text-sm">Gold Savings</p>
                                    <p class="text-xs text-gray-400">**** **** **** {{substr(Auth::user()->account_number, -4)}}</p>
                                </div>
                                <div class="w-8 h-8 rounded-full bg-bank-gold/10 flex items-center justify-center text-bank-gold">
                                    <i class="fa-solid fa-piggy-bank"></i>
                                </div>
                            </div>
                            <div class="mb-2 flex items-center gap-3" x-data="{ show: false }">
                                <p class="text-3xl font-bold text-bank-navy">
                                    <span x-show="!show">********</span>
                                    <span x-show="show" style="display: none;">${{ number_format(Auth::user()->bankAccount->goal_balance ?? 0.00)}}</span>
                                </p>
                                <button @click="show = !show" class="text-gray-400 hover:text-bank-navy transition-colors"><i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i></button>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex gap-2">
                                <p class="text-xs text-green-600 flex items-center gap-1">
                                    <i class="fa-solid fa-arrow-trend-up"></i> +2.4% APY
                                </p>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col justify-center">
                            <h3 class="text-bank-navy font-bold mb-4">Quick Actions</h3>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="{{route("user.transfers")}}" class="flex flex-col items-center justify-center p-3 rounded-lg border border-gray-200 hover:border-bank-gold hover:bg-bank-gold/5 transition-all group">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-2 group-hover:bg-bank-gold group-hover:text-white transition-colors">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </div>
                                    <span class="text-xs font-medium text-gray-600">Transfer</span>
                                </a>
                                <button class="flex flex-col items-center justify-center p-3 rounded-lg border border-gray-200 hover:border-bank-gold hover:bg-bank-gold/5 transition-all group">
                                    <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mb-2 group-hover:bg-bank-gold group-hover:text-white transition-colors">
                                        <i class="fa-solid fa-file-invoice"></i>
                                    </div>
                                    <span class="text-xs font-medium text-gray-600">Pay Bill</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Transactions -->
                    <livewire:user.includes.dashboard.recent-transactions>
                @endif

            </main>
