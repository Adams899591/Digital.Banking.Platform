<span>

      <!-- View User Modal -->
    <div x-show="showViewUserModal" @keydown.escape.window="showViewUserModal = false;  $wire.resetUser()" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto h-full w-full z-50 flex items-center justify-center" x-cloak>
        <div @click.away="showViewUserModal = false;  $wire.resetUser()" class="relative mx-auto p-6 border w-full max-w-2xl shadow-lg rounded-xl bg-white">
            
            <!-- Loading Animation -->
            <div wire:loading.flex class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-white bg-opacity-90 rounded-xl">
                <i class="fa-solid fa-circle-notch fa-spin text-5xl text-bank-gold mb-4"></i>
                <p class="text-bank-navy font-semibold animate-pulse">Loading...</p>
            </div>

            <div class="flex justify-between items-center border-b pb-3 mb-5">
                <h3 class="text-xl leading-6 font-bold text-bank-navy">User Details</h3>
                <button @click="showViewUserModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>     
          
            <div class="mt-2">
                {{-- In a real app, the properties below would be populated by a Livewire method like `viewUser($userId)` --}}
                {{-- @if($user) --}}
                <div class="space-y-6">
                    <!-- User Profile Header -->
                    <div class="flex items-center gap-4">
                        
                        <img src="https://ui-avatars.com/api/?name={{urlencode($user->first_name . " " . $user->last_name)}}&background=random&size=96" alt="User Avatar" class="w-24 h-24 rounded-full">
                        <div>
                            <h4 class="text-2xl font-bold text-bank-navy">{{$user->first_name}} {{$user->last_name}}</h4>
                            <p class="text-gray-500">{{$user->email}}</p>
                                 {{-- Status badges with different colors based on the user's status --}}
                                @if ($user->status === "Active")
                                <span class="mt-2 inline-block px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">{{$user->status}}</span>             
                                @elseif($user->status === "Suspended")
                                <span class="mt-2 inline-block px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-700">{{$user->status}}</span>
                                @else
                                <span class="mt-2 inline-block px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700">{{$user->status}}</span>
                                @endif
                        </div>
                    </div>

                    <!-- User Details Grid -->
                    <div class="border-t border-gray-200 pt-6">
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Date Registered</dt>
                                <dd class="mt-1 text-sm text-gray-900 font-semibold">{{$user->created_at ? $user->created_at->format("M d, Y") : 'N/A'}}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Last Login</dt>
                                <dd class="mt-1 text-sm text-gray-900 font-semibold">{{$user->last_seen != null ? \Carbon\Carbon::parse($user->last_seen)->format("F d, Y h:i A") : "Never logged in"}}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Bank Account Details -->
                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-lg font-bold text-bank-navy mb-4">Bank Account</h4>

                        {{-- this is used to check if the user has a bank account associated and display it, otherwise show a message --}}
                        @if($user && $user->bank)
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->bank->name) }}&background=random&size=96" alt="Bank Logo" class="w-10 h-10">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $user->bank->name }}</p>
                                    <p class="text-sm text-gray-600">Account:**** **** **** {{substr($user->account_number, -4)}}</p>
                                </div>
                             </div>
                        @else
                            <p class="text-sm text-gray-600">No Bank Account Associated</p>
                        @endif

                    </div>
                </div>
                {{-- @endif --}}

                <div class="mt-8 flex justify-end">
                    <button type="button" wire:click="resetUser" @click="showViewUserModal = false" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                        Close
                    </button>
                </div>
            </div>
           
        </div>
    </div> 
 
</span>
