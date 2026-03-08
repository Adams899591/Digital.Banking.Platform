            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-8 bg-gray-50">
                
                <!-- Page content for Cards --> 
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- My Cards -->
                    <div class="lg:col-span-2 space-y-8">
                        <div class="flex justify-between items-center max-sm:flex-col max-sm:items-start max-sm:gap-4">
                            <h3 class="font-bold text-bank-navy text-2xl max-sm:text-xl">My Cards</h3>
                            <button class="bg-bank-gold text-white font-bold py-2 px-4 max-sm:py-1.5 max-sm:px-3 rounded-lg hover:bg-bank-gold_hover transition-colors text-sm">
                                <i class="fa-solid fa-plus mr-2"></i> Add New Card
                            </button>
                        </div>

                        <!-- Card 1 -->
                        <div class="bg-bank-navy text-white p-8 max-sm:p-6 rounded-2xl shadow-2xl relative overflow-hidden group">
                             <div class="absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full -mt-16 -mr-16 opacity-50 group-hover:opacity-70 transition-all"></div>
                            <div class="relative z-10">
                                <div class="flex justify-between items-start mb-8 max-sm:mb-6">
                                    <div>
                                        <p class="text-lg max-sm:text-base font-semibold">Premier Visa Card</p>
                                        <p class="text-xs text-gray-400">Primary Debit Card</p>
                                    </div>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" class="h-6 max-sm:h-5 bg-white rounded px-2" alt="Visa">
                                </div>
                                <div class="mb-8 max-sm:mb-6">
                                    <p class="text-3xl max-sm:text-xl font-mono tracking-widest max-sm:tracking-tight">**** **** **** {{substr(Auth::user()->account_number, -4)}}</p>
                                </div>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-xs text-gray-400 uppercase">Card Holder</p>
                                        <p class="font-medium">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-400 uppercase">Expires</p>
                                        <p class="font-medium">12/26</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="bg-white p-8 max-sm:p-6 rounded-2xl shadow-lg border border-gray-100 relative overflow-hidden">
                             <div class="relative z-10">
                                <div class="flex justify-between items-start mb-8 max-sm:mb-6">
                                    <div>
                                        <p class="text-lg max-sm:text-base font-semibold text-bank-navy">Gold Rewards Card</p>
                                        <p class="text-xs text-gray-500">Credit Card</p>
                                    </div>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg" class="h-8 max-sm:h-7" alt="Mastercard">
                                </div>
                                <div class="mb-8 max-sm:mb-6">
                                    <p class="text-3xl max-sm:text-xl font-mono tracking-widest max-sm:tracking-tight text-bank-navy">**** **** **** {{substr(Auth::user()->account_number, -4)}}</p>
                                </div>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase">Card Holder</p>
                                        <p class="font-medium text-bank-navy">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase">Expires</p>
                                        <p class="font-medium text-bank-navy">08/25</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Actions & Settings -->
                    <div class="lg:col-span-1 space-y-8">
                         <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                            <h3 class="font-bold text-bank-navy mb-4">Card Actions</h3>
                            <div class="space-y-3">
                                <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                    <i class="fa-solid fa-lock w-5 text-bank-gold"></i>
                                    <span class="text-sm font-medium text-bank-navy">Lock Card</span>
                                </button>
                                <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                    <i class="fa-solid fa-eye w-5 text-bank-gold"></i>
                                    <span class="text-sm font-medium text-bank-navy">Show PIN</span>
                                </button>
                                <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                    <i class="fa-solid fa-cog w-5 text-bank-gold"></i>
                                    <span class="text-sm font-medium text-bank-navy">Manage Limits</span>
                                </button>
                                <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 text-red-600 transition-colors">
                                    <i class="fa-solid fa-ban w-5"></i>
                                    <span class="text-sm font-medium">Report Lost/Stolen</span>
                                </button>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                            <h3 class="font-bold text-bank-navy mb-4">Card Settings</h3>
                             <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <label for="onlinePayments" class="text-sm font-medium text-gray-700">Online Payments</label>
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="onlinePayments" id="onlinePayments" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked/>
                                        <label for="onlinePayments" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <label for="atmWithdrawals" class="text-sm font-medium text-gray-700">ATM Withdrawals</label>
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="atmWithdrawals" id="atmWithdrawals" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked/>
                                        <label for="atmWithdrawals" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>

            </main>