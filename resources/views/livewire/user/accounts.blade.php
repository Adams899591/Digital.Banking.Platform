            <!-- Scrollable Content -->
 <main class="flex-1 overflow-y-auto p-8 bg-gray-50" >
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-bank-navy">My Accounts</h1>
            <p class="text-sm text-gray-500">Manage your banking accounts and finances</p>
        </div>
        <button class="bg-bank-navy text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-bank-dark transition-colors shadow-lg shadow-bank-navy/20 flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Open New Account
        </button>
    </div>

    <!-- Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Balance -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-full bg-bank-light text-bank-navy flex items-center justify-center">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <p class="text-sm font-medium text-gray-500">Total Balance</p>
            </div>
            <h3 class="text-2xl font-bold text-bank-navy">${{number_format(Auth::user()->bankAccount->premier_balance ?? 0.00)}}</h3>
            <p class="text-xs text-green-600 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +2.5% from last month
            </p>
        </div>
        <!-- Total Savings -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center">
                    <i class="fa-solid fa-piggy-bank"></i>
                </div>
                <p class="text-sm font-medium text-gray-500">Total Savings</p>
            </div>
            <h3 class="text-2xl font-bold text-bank-navy">$ {{number_format($total, 2) }}</h3>
            <p class="text-xs text-gray-400 mt-2">Across 2 accounts</p>
        </div>
        <!-- Monthly Spending -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-full bg-red-50 text-red-500 flex items-center justify-center">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <p class="text-sm font-medium text-gray-500">Monthly Spending</p>
            </div>
            <h3 class="text-2xl font-bold text-bank-navy">{{number_format(Auth::user()->bankAccount->amount_debited ?? 0.00)}}</h3>
            <p class="text-xs text-red-500 mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +12% vs last month
            </p>
        </div>
    </div>

    <!-- Accounts List -->
    <div class="space-y-6">
        <h3 class="font-bold text-bank-navy text-lg">Your Accounts</h3>
        
        <!-- Checking Account Item -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="p-6 flex items-center justify-between gap-6 overflow-x-auto">
                <div class="flex items-center gap-4 flex-shrink-0">
                    <div class="w-12 h-12 rounded-xl bg-bank-navy text-white flex items-center justify-center text-xl">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h4 class="font-bold text-bank-navy text-lg">Premier Checking</h4>
                               <x-user.status />
                        </div>
                        <p class="text-sm text-gray-500 font-mono mt-1">**** **** **** 8842</p>
                    </div>
                </div>
                
                <div class="flex-1 flex justify-end gap-8 md:gap-16 whitespace-nowrap">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Available Balance</p>
                        <p class="text-xl font-bold text-bank-navy">${{number_format(Auth::user()->bankAccount->premier_balance ?? 0.00)}}</p>
                    </div>
                    <div class="text-right">
                        {{-- this hold all like pending, processing, complected--}}
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Current Balance</p>
                        <p class="text-xl font-bold text-gray-400">$24,100.00</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 flex-shrink-0">
                    <button class="flex-1 md:flex-none px-4 py-2 bg-gray-50 hover:bg-gray-100 text-bank-navy text-sm font-medium rounded-lg transition-colors">
                        History
                    </button>
                    <button class="flex-1 md:flex-none px-4 py-2 bg-bank-gold text-white text-sm font-medium rounded-lg hover:bg-bank-gold_hover transition-colors">
                        Transfer
                    </button>
                </div>
            </div>
            <!-- Quick Stats Footer -->
            <div class="bg-gray-50/50 px-6 py-3 border-t border-gray-100 flex items-center gap-6 text-xs text-gray-500">
                <span><i class="fa-solid fa-arrow-down text-green-500 mr-1"></i> Income: ${{number_format(Auth::user()->bankAccount->premier_balance + 300000000 ?? 0.00)}}</span>
                <span><i class="fa-solid fa-arrow-up text-red-500 mr-1"></i> Expense: ${{number_format(Auth::user()->bankAccount->amount_debited ?? 0.00)}}</span>
            </div>
        </div>

        <!-- Savings Account Item -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="p-6 flex items-center justify-between gap-6 overflow-x-auto">
                <div class="flex items-center gap-4 flex-shrink-0">
                    <div class="w-12 h-12 rounded-xl bg-bank-gold text-white flex items-center justify-center text-xl">
                        <i class="fa-solid fa-piggy-bank"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h4 class="font-bold text-bank-navy text-lg">Gold Savings</h4>
                            {{-- <span class="px-2 py-0.5 rounded-full bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-wider">Active</span> --}}
                            <x-user.status />
                        </div>
                        <p class="text-sm text-gray-500 font-mono mt-1">**** **** **** 9931</p>
                    </div>
                </div>
                
                <div class="flex-1 flex justify-end gap-8 md:gap-16 whitespace-nowrap">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Available Balance</p>
                        <p class="text-xl font-bold text-bank-navy">${{number_format(Auth::user()->bankAccount->goal_balance ?? 0.00)}}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Interest Rate</p>
                        <p class="text-xl font-bold text-green-600">4.50% APY</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 flex-shrink-0">
                    <button class="flex-1 md:flex-none px-4 py-2 bg-gray-50 hover:bg-gray-100 text-bank-navy text-sm font-medium rounded-lg transition-colors">
                        History
                    </button>
                    <button class="flex-1 md:flex-none px-4 py-2 bg-bank-navy text-white text-sm font-medium rounded-lg hover:bg-bank-dark transition-colors">
                        Deposit
                    </button>
                </div>
            </div>
        </div>

        <!-- Investment Account Item -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="p-6 flex items-center justify-between gap-6 overflow-x-auto">
                <div class="flex items-center gap-4 flex-shrink-0">
                    <div class="w-12 h-12 rounded-xl bg-purple-600 text-white flex items-center justify-center text-xl">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h4 class="font-bold text-bank-navy text-lg">Growth Portfolio</h4>
                            {{-- <span class="px-2 py-0.5 rounded-full bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-wider">Active</span> --}}
                            <x-user.status />
                        </div>
                        <p class="text-sm text-gray-500 font-mono mt-1">**** **** **** 4522</p>
                    </div>
                </div>
                
                <div class="flex-1 flex justify-end gap-8 md:gap-16 whitespace-nowrap">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Total Value</p>
                        <p class="text-xl font-bold text-bank-navy">$12,450.00</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Returns (YTD)</p>
                        <p class="text-xl font-bold text-green-600">+8.4%</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 flex-shrink-0">
                    <button class="flex-1 md:flex-none px-4 py-2 bg-gray-50 hover:bg-gray-100 text-bank-navy text-sm font-medium rounded-lg transition-colors">
                        View Details
                    </button>
                    <button class="flex-1 md:flex-none px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-lg hover:bg-purple-700 transition-colors">
                        Invest
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
