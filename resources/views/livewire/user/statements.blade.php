
            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-8 bg-gray-50" wire:init="loadPage">
 
                
                @if (!$readyToLoad) {{-- run and show loading skeleton page --}}
                 
                    @include('Status/skeleton')

                @else {{--  show main page   --}}

                <!-- Filters Section -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 mb-8">
                    <div class="flex flex-col md:flex-row gap-4 items-end">
                        <div class="w-full md:w-1/3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Select Account</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold">
                                <option>Premier Checking (**** 8842)</option>
                                <option>Gold Savings (**** 9931)</option>
                            </select>
                        </div>
                        <div class="w-full md:w-1/3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
                            <select  wire:change='filterTransactionByDate(event.target.value)' class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-bank-gold">
                                <option value="60" >Last 60 Days</option>
                                <option value="30">Last 30 Days</option>
                                <option value="7">Last 7 Days</option>
                                <option>2023</option>
                            </select>
                        </div>
                        <div class="w-full md:w-1/3">
                             <button class="w-full bg-bank-navy text-white font-bold py-3 px-6 rounded-lg hover:bg-bank-dark transition-colors">
                                <i class="fa-solid fa-filter mr-2"></i> Apply Filters
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Monthly Statements List -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                            <div class="p-6 border-b border-gray-100">
                                <h3 class="font-bold text-bank-navy">Monthly Statements</h3>
                            </div>
                            <div class="divide-y divide-gray-100">
                                <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-bank-navy">October 2023</p>
                                            <p class="text-xs text-gray-500">Checking Account</p>
                                        </div>
                                    </div>
                                    <button class="text-gray-400 hover:text-bank-gold"><i class="fa-solid fa-download"></i></button>
                                </div>
                                <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-bank-navy">September 2023</p>
                                            <p class="text-xs text-gray-500">Checking Account</p>
                                        </div>
                                    </div>
                                    <button class="text-gray-400 hover:text-bank-gold"><i class="fa-solid fa-download"></i></button>
                                </div>
                                <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-bank-navy">August 2023</p>
                                            <p class="text-xs text-gray-500">Checking Account</p>
                                        </div>
                                    </div>
                                    <button class="text-gray-400 hover:text-bank-gold"><i class="fa-solid fa-download"></i></button>
                                </div>
                            </div>
                            <div class="p-4 text-center border-t border-gray-100">
                                <a href="#" class="text-sm text-bank-gold font-medium hover:text-bank-navy">View Older Statements</a>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction History --> 
                    <livewire:user.includes.statement.transaction-history>
                </div>
              @endif
            </main>
     