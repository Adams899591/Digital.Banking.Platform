
<div class="min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-[400px]">
        <!-- Logo/Brand Area -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-bank-navy text-bank-gold shadow-lg mb-4">
                <i class="fa-solid fa-building-columns text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-bank-navy">Admin Portal</h1>
            <p class="text-gray-500 text-sm mt-1">Secure access for bank administrators</p>
        </div>

        <!-- Login Card -->
        <div class="glass-effect rounded-2xl shadow-xl border border-white/50 overflow-hidden">
            <div class="p-8">
                <form  wire:submit='AdminSignIn'>
                    <!-- Admin ID Input -->
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">Admin ID</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-regular fa-id-badge text-gray-400 group-focus-within:text-bank-navy transition-colors"></i>
                            </div>
                            <input type="text" wire:model='username'
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm text-bank-navy placeholder-gray-400" 
                                placeholder="Enter your admin ID">
                                @error('username') <span style="color: red" class="text-[15px]">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-6">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-lock text-gray-400 group-focus-within:text-bank-navy transition-colors"></i>
                            </div>
                            <input type="password"  wire:model='password' 
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm text-bank-navy placeholder-gray-400" 
                                placeholder="••••••••••••">
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-bank-navy transition-colors">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                            @error('password') <span style="color: red" class="text-[15px]">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-bank-navy focus:ring-bank-gold">
                            <span class="text-sm text-gray-600">Remember me</span>
                        </label>
                        <a href="{{route("adminForgetPassword")}}" class="text-sm text-bank-navy hover:text-bank-gold font-medium transition-colors" >Forgot Password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-bank-navy text-white font-semibold py-3.5 rounded-lg hover:bg-opacity-90 transition-all transform active:scale-[0.99] shadow-lg shadow-bank-navy/20 flex items-center justify-center gap-2 group">
                        <span>Sign In</span>
                        <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-500">
                    <i class="fa-solid fa-shield-halved mr-1 text-green-600"></i>
                    Protected by enterprise-grade security.
                </p>
            </div>
        </div>
    </div>

</div>