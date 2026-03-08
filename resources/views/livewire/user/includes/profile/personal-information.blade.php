            <!-- Personal Information Form -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-bold text-bank-navy text-base sm:text-lg">Personal Details</h3>
                    <p class="text-gray-400 text-xs mt-1">Update your personal information and address.</p>
                </div>

                <div class="p-6">
                    <form wire:submit="updateProfileInformation">
                              {{-- Show success message --}}
                             @if (session("success")) <span class="text-green-700 text-xs mt-1 font-bold">{{ session("success")}}</span>@endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                            <!-- Full Name -->
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Full Name</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fa-regular fa-user"></i></span>
                                    <input type="text" wire:model="name" class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm text-bank-navy" placeholder="John Doe">
                                </div>
                                {{-- Show error message --}}
                                @error('name') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Email Address</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fa-regular fa-envelope"></i></span>
                                    <input type="email" wire:model="email" class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 bg-gray-50 text-gray-500 cursor-not-allowed outline-none text-sm" readonly>
                                </div>
                                <p class="text-[10px] text-gray-400 mt-1 ml-1">Email cannot be changed directly.</p>
                                @error('email') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="space-y-6 mb-8">
                            <!-- Phone Number -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Phone Number</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fa-solid fa-phone"></i></span>
                                    <input type="tel" wire:model="phone" class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm text-bank-navy" placeholder="+1 (555) 000-0000">
                                </div>
                                @error('phone') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                            </div>

                            <!-- Address -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Residential Address</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fa-solid fa-location-dot"></i></span>
                                    <input type="text" wire:model="address" class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm text-bank-navy" placeholder="123 Banking Street, Suite 100">
                                </div>
                                @error('address') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="flex justify-end pt-4 border-t border-gray-50">
                            <button type="submit" class="bg-bank-navy text-white px-6 py-2.5 rounded-lg hover:bg-bank-dark transition-all shadow-lg shadow-bank-navy/20 font-medium text-sm flex items-center gap-2">
                                <i class="fa-regular fa-floppy-disk"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
