                   <!-- Recent Transactions -->
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="font-bold text-bank-navy">Recent Transactions</h3>
                            <a href="{{route("user.statements")}}" class="text-sm text-bank-gold hover:text-bank-navy font-medium" wire:navigate>View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse whitespace-nowrap">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                        <th class="p-4 font-medium">Description</th>
                                        <th class="p-4 font-medium">Type</th>
                                        <th class="p-4 font-medium">Date</th>
                                        <th class="p-4 font-medium">Status</th>
                                        <th class="p-4 font-medium text-right">Amount</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    @foreach ($transactions as $transaction)
                                                                          
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="p-4 flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-red-50{{$transaction->transaction_type === "Credit" ? " text-green-500" : " text-red-500 "}}  flex items-center justify-center">{!! $transaction->transaction_type === "Credit" ? "<i class='fa-solid fa-arrow-up'></i>" : "<i class='fa-solid fa-arrow-down'></i>" !!}</div>
                                                <span class="font-semibold text-bank-navy">{{ Str::words($transaction->description, 5) ?? "Fund Transfer"}}</span>
                                            </td>
                                            <td class="p-4 {{$transaction->transaction_type === "Credit" ? " text-green-700" : " text-red-700 "}}">{{$transaction->transaction_type}}</td>
                                            <td class="p-4 text-gray-500">{{$transaction->created_at->format('M d, Y • h:i A')}}</td>
                                            <td class="p-4"><span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Completed</span></td>
                                            <td class="p-4 text-right font-medium text-bank-navy {{$transaction->transaction_type === "Credit" ? " text-green-700" : " text-red-700 "}}">{{$transaction->transaction_type === "Credit" ? "+" : "-"}} ${{$transaction->amount}}</td>
                                        </tr>

                                    @endforeach
  
                                </tbody>
                            </table>
                        </div>
                    </div>
