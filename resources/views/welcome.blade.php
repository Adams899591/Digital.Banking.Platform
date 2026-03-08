<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(["resources/css/app.css","resources/js/app.js"])
    {{-- @vite("resources/css/app.js") --}}
</head>
<body>
    
    <h1>Home tho sjjjjjjjjjjj </h1>
     {{-- Set-ExecutionPolicy -Scope Process -ExecutionPolicy Bypass --}}
     <iframe src="" frameborder="0"></iframe>
 
</body>
</html>










       <!-- My Account Content -->
            <main class="flex-1 overflow-y-auto p-8 bg-gray-50">
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column: Profile & Balance -->
                    <div class="space-y-6">
                        <!-- Profile Card -->
                        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center">
                            <div class="relative inline-block">
                                <img src="https://ui-avatars.com/api/?name=Jonathan+Doe&background=c5a059&color=fff&size=128" alt="User" class="w-32 h-32 rounded-full border-4 border-white shadow-lg mx-auto mb-4">
                                <button class="absolute bottom-2 right-2 bg-bank-navy text-white p-2 rounded-full hover:bg-bank-gold transition-colors shadow-sm">
                                    <i class="fa-solid fa-camera"></i>
                                </button>
                            </div>
                            <h2 class="text-xl font-bold text-bank-navy">Jonathan Doe</h2>
                            <p class="text-gray-500 text-sm">Premium Member</p>
                            <div class="mt-4 flex justify-center gap-2">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Verified</span>
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Tier 2</span>
                            </div>
                        </div>

                        <!-- Balance Card with Toggle -->
                        <div class="bg-bank-navy text-white p-6 rounded-xl shadow-lg relative overflow-hidden">
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-300 text-sm">Total Balance</p>
                                <button id="toggleBalanceBtn" class="text-bank-gold hover:text-white transition-colors focus:outline-none" title="Show/Hide Balance">
                                    <i class="fa-regular fa-eye" id="balanceIcon"></i>
                                </button>
                            </div>
                            <div class="mb-2">
                                <h3 class="text-3xl font-bold tracking-tight" id="balanceAmount">$ 142,593.00</h3>
                            </div>
                            <p class="text-xs text-gray-400">Available across all accounts</p>
                        </div>
                    </div>

                    <!-- Right Column: Details & Settings -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Personal Information -->
                        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-bold text-bank-navy text-lg">Personal Information</h3>
                                <button class="text-sm text-bank-gold hover:text-bank-navy font-medium">Edit</button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs text-gray-500 uppercase font-semibold mb-1">Full Name</label>
                                    <p class="text-bank-navy font-medium">Jonathan Doe</p>
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500 uppercase font-semibold mb-1">Email Address</label>
                                    <p class="text-bank-navy font-medium">jonathan.doe@example.com</p>
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500 uppercase font-semibold mb-1">Phone Number</label>
                                    <p class="text-bank-navy font-medium">+1 (555) 123-4567</p>
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500 uppercase font-semibold mb-1">Date of Birth</label>
                                    <p class="text-bank-navy font-medium">March 15, 1985</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs text-gray-500 uppercase font-semibold mb-1">Address</label>
                                    <p class="text-bank-navy font-medium">123 Banking Blvd, Financial District, NY 10001</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
