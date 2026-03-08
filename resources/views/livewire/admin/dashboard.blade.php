<!-- Scrollable Content -->
<main class="flex-1 overflow-y-auto p-8 bg-gray-50">
 
    <!-- Welcome Section -->
    <div class="mb-8 flex justify-between items-end">
        <div>
            <p class="text-gray-500 text-sm mb-1">Welcome back, {{Auth::guard("admin")->user()->first_name}}  {{Auth::guard("admin")->user()->last_name}}</p>
            <h1 class="text-3xl font-bold text-bank-navy">Admin</h1>
        </div>
        <div>
            <p class="text-sm text-gray-500">System Status: <span class="font-medium text-green-600">All Systems Operational</span></p>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm">Total Users</p>
                    <p class="text-3xl font-bold text-bank-navy mt-1">{{App\Models\User::count()}}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
            <p class="text-xs text-green-600 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +15 this week
            </p>
        </div>

        <!-- Total Transactions -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm">Total Transactions</p>
                    <p class="text-3xl font-bold text-bank-navy mt-1">{{App\Models\Transaction::count()}}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                    <i class="fa-solid fa-exchange-alt"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 flex items-center gap-1">
                <i class="fa-solid fa-clock"></i> Last 24 hours: 312
            </p>
        </div>

        <!-- Transaction Volume -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm">Transaction Volume</p>
                    <p class="text-3xl font-bold text-bank-navy mt-1">$1.2M</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
            </div>
            <p class="text-xs text-green-600 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> +5.2% today
            </p>
        </div>

        <!-- Open Support Tickets -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm">Open Support Tickets</p>
                    <p class="text-3xl font-bold text-bank-navy mt-1">27</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                    <i class="fa-solid fa-ticket-alt"></i>
                </div>
            </div>
            <p class="text-xs text-red-600 flex items-center gap-1">
                <i class="fa-solid fa-exclamation-circle"></i> 3 high priority
            </p>
        </div>
    </div>

    <!-- Recent Platform Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Transactions -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="font-bold text-bank-navy">Recent Transactions</h3>
                <a href="{{route('admin.transactions')}}" class="text-sm text-bank-gold hover:text-bank-navy font-medium" wire:navigate>View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                            <th class="p-4 font-medium">User</th>
                            <th class="p-4 font-medium">Type</th>
                            <th class="p-4 font-medium">Date</th>
                            <th class="p-4 font-medium">Status</th>
                            <th class="p-4 font-medium text-right">Amount</th>
                        </tr> 
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                     @foreach ($transactions as $transaction)
                         
                    
                            @if ($transaction->transaction_type == "Credit")

                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="p-4 flex items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name={{urlencode($transaction->sender->first_name . " " . $transaction->sender->last_name)}}&background=random" alt="User" class="w-8 h-8 rounded-full">
                                        <span class="font-semibold text-bank-navy">{{$transaction->sender->first_name}}  {{$transaction->sender->last_name}}</span>
                                    </td>
                                    <td class="p-4 text-gray-500">{{$transaction->transaction_type}}</td>
                                    <td class="p-4 text-gray-500">{{$transaction->created_at->format("M d, Y")}}</td>
                                    <td class="p-4"><span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Completed</span></td>
                                    <td class="p-4 text-right font-medium text-green-600">+ ${{$transaction->amount}}</td>
                                </tr>     
                                
                            @else

                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="p-4 flex items-center gap-3">
                                       <img src="https://ui-avatars.com/api/?name={{urlencode($transaction->receiver->first_name . " " . $transaction->receiver->last_name)}}&background=random" alt="User" class="w-8 h-8 rounded-full">
                                        <span class="font-semibold text-bank-navy">{{$transaction->receiver->first_name}}  {{$transaction->receiver->last_name}}</span>
                                    </td>
                                    <td class="p-4 text-gray-500">{{$transaction->transaction_type}}</td>
                                    <td class="p-4 text-gray-500">{{$transaction->created_at->format("M d, Y")}}</td>
                                    <td class="p-4"><span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Completed</span></td>
                                    <td class="p-4 text-right font-medium text-red-600">- $500.00</td>
                                </tr>
                            
                            @endif


                      @endforeach


                        {{-- <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Marcus+Chen&background=random" alt="User" class="w-8 h-8 rounded-full">
                                <span class="font-semibold text-bank-navy">Marcus Chen</span>
                            </td>
                            <td class="p-4 text-gray-500">Deposit</td>
                            <td class="p-4 text-gray-500">Oct 24, 2023</td>
                            <td class="p-4"><span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Completed</span></td>
                            <td class="p-4 text-right font-medium text-green-600">+ $2,100.00</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Sophia+Lorenzo&background=random" alt="User" class="w-8 h-8 rounded-full">
                                <span class="font-semibold text-bank-navy">Sophia Lorenzo</span>
                            </td>
                            <td class="p-4 text-gray-500">Bill Payment</td>
                            <td class="p-4 text-gray-500">Oct 23, 2023</td>
                            <td class="p-4"><span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-700">Processing</span></td>
                            <td class="p-4 text-right font-medium text-bank-navy">- $85.50</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- New Users -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="font-bold text-bank-navy">New User Registrations</h3>
                <a href="{{route('admin.users')}}" class="text-sm text-bank-gold hover:text-bank-navy font-medium" wire:navigate>View All</a>
            </div>
            <ul class="divide-y divide-gray-100">

                {{-- Loop through the latest 3 users and display their information --}}
                @foreach ($users as $user)
                    
                <li class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name={{urlencode($user->first_name . " " . $user->last_name )}}&background=random" alt="User" class="w-9 h-9 rounded-full">
                        <div>
                            <p class="font-semibold text-bank-navy text-sm">{{$user->first_name}}  {{$user->last_name}}</p>
                            <p class="text-xs text-gray-500">{{$user->created_at->format('M d, Y • h:i A')}}</p>
                        </div>
                    </div>
                </li>

                @endforeach
            
            </ul>
        </div>
    </div>
</main>
