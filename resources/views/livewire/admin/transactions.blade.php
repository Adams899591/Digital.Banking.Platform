<main class="flex-1 overflow-y-auto p-8 bg-gray-50">
    <!-- Header -->
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-bank-navy  max-sm:text-[15px]">Transactions</h1>
            <p class="text-gray-500 text-sm mt-1">View and manage all platform transactions.</p>
        </div>
        <button class="bg-bank-gold text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-gold/90 transition-colors flex items-center gap-2">
            <i class="fa-solid fa-download"></i>
            <span>Export</span>
        </button>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <input type="text" placeholder="Search by ID, client, or account..." class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
            <select class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                <option value="">All Statuses</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="failed">Failed</option>
            </select>
            <select class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
                <option value="">All Types</option>
                <option value="deposit">Deposit</option>
                <option value="withdrawal">Withdrawal</option>
                <option value="transfer">Transfer</option>
            </select>
            <input type="date" placeholder="Date from..." class="w-full border-gray-200 rounded-lg focus:ring-bank-gold focus:border-bank-gold">
            <button class="bg-bank-navy text-white px-4 py-2 rounded-lg font-medium hover:bg-bank-navy/90 transition-colors">
                Filter
            </button>
        </div>
    </div>

    <!-- Transactions Table -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-medium">Transaction / Client</th>
                        <th class="p-4 font-medium">Type</th>
                        <th class="p-4 font-medium">Amount</th>
                        <th class="p-4 font-medium">Date</th>
                        <th class="p-4 font-medium">Status</th>
                        <th class="p-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                   

                    @foreach ($transactions as $transaction)

                        @if ($transaction->transaction_type === "Credit")

                                 <!-- Sample Row 1 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="p-4 flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center">
                                            <i class="fa-solid fa-arrow-down text-green-700"></i>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-bank-navy">TXN00{{$transaction->id}}XXXX</span>
                                            <p class="text-gray-500 text-xs">{{$transaction->sender->first_name}}  {{$transaction->sender->last_name}}</p>
                                        </div>
                                    </td>
                                    <td class="p-4 text-gray-500">{{$transaction->transaction_type}}</td>
                                    <td class="p-4 text-green-600 font-semibold">+${{$transaction->amount}}</td>
                                    <td class="p-4 text-gray-500">{{$transaction->created_at->format("M d, Y")}}</td>
                                    <td class="p-4">
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Completed</span>
                                    </td>
                                    <td class="p-4 text-right">
                                        <button wire:click="viewTransaction({{$transaction->id}})" class="text-bank-gold hover:text-bank-navy font-medium">View</button>
                                    </td>
                                </tr>

                        @elseif($transaction->transaction_type === "Debit")

                                <!-- Sample Row 2 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="p-4 flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-red-100 flex items-center justify-center">
                                            <i class="fa-solid fa-arrow-up text-red-700"></i>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-bank-navy">TXN00{{$transaction->id}}XXXX</span>
                                            <p class="text-gray-500 text-xs">{{$transaction->receiver->first_name}}  {{$transaction->receiver->last_name}}</p>
                                        </div>
                                    </td>
                                    <td class="p-4 text-gray-500">{{$transaction->transaction_type}}</td>
                                    <td class="p-4 text-red-600 font-semibold">-${{$transaction->amount}}</td>
                                    <td class="p-4 text-gray-500">{{$transaction->created_at->format("M d, Y")}}</td>
                                    <td class="p-4">
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Complected</span>
                                    </td>
                                    <td class="p-4 text-right">
                                        <button wire:click="viewTransaction({{$transaction->id}})" class="text-bank-gold hover:text-bank-navy font-medium">View</button>
                                    </td>
                                </tr>

                        @endif

                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        {{$transactions->onEachSide(1)->links()}}
   
    </div>


    @include('livewire.admin.includes.transaction.transaction-details-modal')
 
</main>
