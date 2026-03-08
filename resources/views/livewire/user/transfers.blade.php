    <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-8 bg-gray-50" >


                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                        <!-- Main Transfer Form -->       
                        <livewire:user.includes.transfer.transfer-form >
                        
                
                        <!-- Side Column: Balances & Recent -->
                        <div class="space-y-8">
                            <!-- Balance Card -->
                            <div class="bg-bank-navy text-white p-6 rounded-xl shadow-lg">
                                <p class="text-gray-300 text-sm mb-1">Total Available Balance</p>
                                <p class="text-3xl font-bold tracking-tight mb-4">${{ number_format($total, 2) }}</</p>
                                <div class="space-y-3 text-sm">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-400">Premier Checking</span>
                                        <span class="font-medium">${{number_format(Auth::user()->bankAccount->premier_balance ?? 0.00)}}0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-400">Gold Savings</span>
                                        <span class="font-medium">${{number_format(Auth::user()->bankAccount->goal_balance ?? 0.00)}}</span>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Recent Beneficiaries -->
                            <livewire:user.includes.transfer.recent-beneficiaries >
                        </div>
                    </div>

            
            </main>
