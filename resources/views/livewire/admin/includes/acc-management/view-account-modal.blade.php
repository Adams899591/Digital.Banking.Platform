<span>
     <!-- View Account Modal -->
    <div x-show="showViewAccountModal" @keydown.escape.window="showViewAccountModal = false; $wire.resetUser()" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center" x-cloak>
        <div @click.away="showViewAccountModal = false; $wire.resetUser()" class="relative mx-auto p-6 border w-full max-w-2xl shadow-lg rounded-xl bg-white">
           
            <!-- Loading Animation -->
            <div wire:loading.flex class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-white bg-opacity-90 rounded-xl">
                <i class="fa-solid fa-circle-notch fa-spin text-5xl text-bank-gold mb-4"></i>
                <p class="text-bank-navy font-semibold animate-pulse">Loading...</p>
            </div>          
           
           
            <div class="flex justify-between items-center border-b pb-3 mb-5">
                <h3 class="text-xl leading-6 font-bold text-bank-navy">Account Details</h3>
                <button @click="showViewAccountModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
            <div class="mt-2">
                {{-- In a real app, the properties below would be populated by a Livewire method like `viewAccount($accountId)` --}}
                <div class="space-y-6">
                    <!-- Client Info -->
                    <div class="flex items-center gap-4">
                         @if ($account && $account->user){{-- Check if account number exist and the related user is loaded  --}}
                             <img src="https://ui-avatars.com/api/?name={{urlencode($account->user->first_name . " " . $account->user->last_name)}}&background=random&size=96"" alt="Client Avatar" class="w-16 h-16 rounded-full">

                            <div>
                                <h4 class="text-xl font-bold text-bank-navy">{{$account->user->first_name}} {{$account->user->last_name}}</h4>
                                <p class="text-gray-500">Client ID: {{$account->user->id}}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Account Details Grid -->
                    <div class="border-t border-gray-200 pt-6">
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
                             @if ($account && $account->user){{-- Check if account number exist and the related user is loaded  --}}     
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Account Number</dt>
                                    <dd class="mt-1 text-lg text-bank-navy font-semibold">{{$account->user->account_number}}</dd>
                                </div>
                            @endif
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Account Type</dt>
                                <dd class="mt-1 text-lg text-gray-900">Savings</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Current Balance</dt>
                                <dd class="mt-1 text-2xl text-green-600 font-bold">${{$account->premier_balance}}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1">
                                    @if ($account->status === "Active")
                                       <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">Active</span> 
                                    @elseif($account->status === "Suspended")
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-700">Suspended</span>  
                                    @else                                   
                                        <span class="px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-700">Closed</span>  
                                    @endif
                                </dd>
                            </div>
                             <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Date Created</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{$account->created_at?->format("M d, Y")}}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="button" @click="showViewAccountModal = false" wire:click='resetUser'  class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div> 
</span>
