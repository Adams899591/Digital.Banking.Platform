
<div class="bg-gray-50 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    
    <!-- Header Section -->
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="mx-auto h-12 w-12 text-bank-navy text-center mb-4">
            <i class="fa-regular fa-envelope text-4xl"></i>
        </div>
        <h2 class="text-center text-3xl font-bold text-bank-navy">
            Verify Your Email
        </h2>
        <p class="mt-2 text-center text-sm text-gray-500">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
        </p>
    </div>

    <!-- Form Card -->
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-md rounded-xl border border-gray-100 sm:px-10">
            
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

                    {{-- message section --}}
                    @if (session('message'))
                       <p style="color: green" class="text-[12px]"> {{session('message')}}</p>
                    @endif

                <!-- Submit Button -->
                <div>
                    <button wire:click="sendVerification" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-lg shadow-bank-navy/20 text-sm font-medium text-white bg-bank-navy hover:bg-bank-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bank-navy transition-all">
                        Resend Verification Email
                    </button>
                </div>
       

            <!-- Logout Link -->
            <div class="mt-6 text-center">
                <form method="POST" >
                    @csrf
                    <button type="submit" class="font-medium text-sm text-bank-gold hover:text-bank-navy transition-colors flex items-center justify-center gap-2 mx-auto bg-transparent border-none cursor-pointer">
                        <i class="fa-solid fa-arrow-left"></i> Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
