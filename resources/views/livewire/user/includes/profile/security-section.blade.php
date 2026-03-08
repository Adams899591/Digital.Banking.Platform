            <!-- Security Section -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-bold text-bank-navy text-base sm:text-lg">Security Settings</h3>
                    <p class="text-gray-400 text-xs mt-1">Update your password and security preferences.</p>
                </div>
                <div class="p-6">

                    <form wire:submit="updatePassword">
                        <div class="space-y-4 mb-6">
                            {{-- Show success message --}}
                             @if (session("success")) <span class="text-green-700 text-xs mt-1 font-bold">{{ session("success")}}</span>@endif
                          
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Current Password</label>
                                <input type="password" wire:model="current_password" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm">
                                 @error('current_password') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">New Password</label>
                                    <input type="password" wire:model="password" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm">
                                    @error('password') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Confirm Password</label>
                                    <input type="password" wire:model="password_confirmation" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm">
                                    @error('password_confirmation') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end pt-4 border-t border-gray-50">
                            <button type="submit" class="bg-white border border-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:border-bank-gold hover:text-bank-navy hover:bg-bank-gold/5 transition-all font-medium text-sm">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
