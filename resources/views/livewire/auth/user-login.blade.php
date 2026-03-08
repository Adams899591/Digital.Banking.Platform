<div class="min-h-screen flex flex-col lg:flex-row bg-gray-50">
    <!-- Left Side - Branding -->
    <div class="flex w-full lg:w-1/2 bg-primary-navy relative overflow-hidden flex-col justify-between p-8 lg:p-12 text-white">
        <!-- Background decoration -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent-gold/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
        
        <!-- Logo -->
        <div class="relative z-10">
            <div class="font-heading text-3xl font-bold tracking-wide">
                Prestige<span class="text-accent-gold">.</span>
            </div>
        </div>

        <!-- Hero Text -->
        <div class="relative z-10 max-w-lg">
            <h1 class="font-heading text-5xl font-bold mb-6 leading-tight">Excellence in <br/><span class="text-accent-gold">Digital Banking</span></h1>
            <p class="text-text-gray text-lg leading-relaxed">Experience secure, seamless, and premium banking services designed for your lifestyle. Your financial legacy starts here.</p>
        </div>

        <!-- Footer -->
        <div class="relative z-10 text-sm text-text-gray">
            &copy; 2024 Prestige International Bank. Member FDIC.
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
        <div class="w-full max-w-md space-y-8">
            <!-- Mobile Logo -->
            <div class="hidden text-center mb-8">
                <div class="font-heading text-3xl font-bold tracking-wide text-primary-navy">
                    Prestige<span class="text-accent-gold">.</span>
                </div>
            </div>

            <div class="text-center">
                <h2 class="text-3xl font-bold text-primary-navy font-heading">Welcome Back</h2>
                <p class="mt-2 text-gray-500">Please enter your details to sign in</p>
            </div>

            <form class="mt-8 space-y-6" wire:submit="loginform">
                <div class="space-y-5">
                    <!-- Account Number Input -->
                    <div>
                        <label for="account_number" class="block text-sm font-medium text-gray-700 mb-1">Account Number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-hashtag text-gray-400"></i>
                            </div>
                            <input id="account_number" name="account_number" wire:model="account_number" type="text" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-gold focus:border-transparent transition-all placeholder-gray-400" 
                                placeholder="Enter your 10-digit account number">
                               <x-input-error :messages="$errors->get('account_number')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" wire:model="password" type="password" 
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent-gold focus:border-transparent transition-all placeholder-gray-400" 
                                placeholder="Enter your password">
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors" onclick="togglePassword()">
                                <i class="fa-regular fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                           <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" wire:model="remember" type="checkbox" class="h-4 w-4 text-accent-gold focus:ring-accent-gold border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    <div class="text-sm">
                        <a href="{{route("userForgetPassword")}}" class="font-medium text-accent-gold hover:text-accent-gold-hover" >Forgot password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-primary-navy hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-navy transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fa-solid fa-arrow-right-to-bracket text-accent-gold group-hover:text-white transition-colors"></i>
                        </span>
                        Sign In securely
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    Don't have an online account? 
                    <a href="#" class="font-medium text-accent-gold hover:text-accent-gold-hover">Enroll now</a>
                </p>
            </div>
            
            <!-- Security Badge -->
            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-center items-center gap-2 text-xs text-gray-400">
                <i class="fa-solid fa-shield-halved text-green-600"></i>
                <span>Your session is protected with 256-bit encryption</span>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>

