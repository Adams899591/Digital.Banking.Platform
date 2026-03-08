                        <!-- Recent Beneficiaries -->
                        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                            <h3 class="font-bold text-bank-navy mb-4">Recent Beneficiaries</h3>
                            <ul class="space-y-4">

                             @foreach ($transactions as $transaction)
                                 
                           
                                <li class="flex items-center gap-4 hover:bg-gray-50 p-2 rounded-lg cursor-pointer">
                                    @if (!empty( $transaction->receiver->profile_picture)) 
                                        <img src="{{ asset("storage/". $transaction->receiver->profile_picture) }}" class="w-10 h-10 rounded-full">
                                    @else 
                                        <!-- Fallback to UI Avatars if no photo -->
                                       <img src="https://ui-avatars.com/api/?name={{ urlencode($transaction->receiver->first_name . ' ' . $transaction->receiver->last_name) }}&background=random" alt="Avatar" class="w-10 h-10 rounded-full">
                                    @endif
                                    <div>
                                        <p class="font-semibold text-sm text-bank-navy">{{ $transaction->receiver->first_name }} {{ $transaction->receiver->last_name }}</p>
                                        <p class="text-xs text-gray-500">{{ $transaction->receiver->bank->name ?? 'Bank' }} - **** {{ substr($transaction->receiver->account_number, -4) }}</p>
                                    </div>
                                </li>
                                @endforeach 
                                {{$transactions->links()}} 
                                {{-- <li class="flex items-center gap-4 hover:bg-gray-50 p-2 rounded-lg cursor-pointer">
                                    <img src="https://ui-avatars.com/api/?name=Michael+B&background=random" alt="Avatar" class="w-10 h-10 rounded-full">
                                    <div>
                                        <p class="font-semibold text-sm text-bank-navy">Michael Brown</p>
                                        <p class="text-xs text-gray-500">Bank of America - **** 5678</p>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
 