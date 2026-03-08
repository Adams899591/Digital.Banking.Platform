                 <!-- Transaction History --> 
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                                <h3 class="font-bold text-bank-navy">Transaction History</h3>
                                <div class="flex gap-2">
                                    <button class="text-gray-400 hover:text-bank-navy" title="Print"><i class="fa-solid fa-print"></i></button>
                                    <button class="text-gray-400 hover:text-bank-navy" title="Export CSV"><i class="fa-solid fa-file-csv"></i></button>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse whitespace-nowrap">
                                    <thead>
                                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                            <th class="p-4 font-medium">Date</th>
                                            <th class="p-4 font-medium">Description</th>
                                            <th class="p-4 font-medium">Type</th>
                                            <th class="p-4 font-medium text-right">Amount</th>
                                            <th class="p-4 font-medium text-right">Balance</th>
                                            <th class="p-4 font-medium text-right">Receipt</th>
                                        </tr>
                                    </thead> 
                                    <tbody class="divide-y divide-gray-100 text-sm">
                                        @foreach ($transactions as $transaction)
                                            
                                              
                                        <tr  wire:key='{{$transaction->id}}' class="hover:bg-gray-50 transition-colors">
                                            <td class="p-4 text-gray-500">{{$transaction->created_at->format('M d, Y • h:i A')}}</td>
                                            <td class="p-4 font-medium text-bank-navy">{{ Str::words($transaction->description, 5) ?? "Fund Transfer"}}</td>
                                            <td class="p-4 text-gray-500">{{$transaction->transaction_type}}</td>
                                            <td class="p-4 text-right font-medium {{$transaction->transaction_type === "Credit" ? " text-green-600" : "text-bank-navy "}}">{{$transaction->transaction_type === "Credit" ? "+" : "-"}} ${{$transaction->amount}}</td>
                                            <td class="p-4 text-right text-gray-500">{{$transaction->transaction_type === "Debit" ? "$". $transaction->sender_balance : "$". $transaction->receiver_balance}}</td>
                                            {{-- Show download receipt only for debited  --}}
                                            @if ($transaction->transaction_type === "Debit")
                                                 <td class="p-4 text-center text-red-500 cursor-pointer"><button wire:click='downloadTransactionReceipt({{$transaction->id}})'><i class="fa-solid fa-download"></i></button></td>
                                            @endif
                                        </tr> 

                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                           
                                
                           {{-- hide the load more button when all transactions are loaded --}}
                            @if($transactions->count() >= $limit)
                                <div class="p-4 border-t border-gray-100 flex justify-center">
                                    <button wire:click='loadMore' class="text-sm text-gray-500 hover:text-bank-navy">Load More</button>
                                </div>
                             @endif
                        </div>
                    </div>




 