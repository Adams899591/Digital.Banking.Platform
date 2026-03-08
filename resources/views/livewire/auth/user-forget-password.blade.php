<div>
<body class="bg-gray-50 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    
    <!-- Header Section -->
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="mx-auto h-12 w-12 text-bank-navy text-center mb-4">
            <i class="fa-solid fa-lock text-4xl"></i>
        </div>
        <h2 class="text-center text-3xl font-bold text-bank-navy">
            Forgot Password?
        </h2>
        <p class="mt-2 text-center text-sm text-gray-500">
            Enter your email address and we'll send you a link to reset your password.
        </p>
    </div>

    <!-- Form Card -->
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-md rounded-xl border border-gray-100 sm:px-10">
            <form class="space-y-6" action="#" method="POST">
                
                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 focus:border-bank-gold focus:ring-1 focus:ring-bank-gold outline-none transition-all text-sm text-bank-navy" 
                            placeholder="Enter your email">
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-lg shadow-bank-navy/20 text-sm font-medium text-white bg-bank-navy hover:bg-bank-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bank-navy transition-all">
                        Send Reset Link
                    </button>
                </div>
            </form>

            <!-- Back to Login Link -->
            <div class="mt-6 text-center">
                <a href="{{route("login")}}" class="font-medium text-sm text-bank-gold hover:text-bank-navy transition-colors flex items-center justify-center gap-2" >
                    <i class="fa-solid fa-arrow-left"></i> Back to Login
                </a>
            </div>
        </div>
    </div>
</body>
</div>