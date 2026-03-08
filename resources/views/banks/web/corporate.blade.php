@extends('banks.layouts.app')


@section('content')

    <!-- Hero Section -->
        <header class="relative bg-cover bg-center h-[60vh] flex items-center" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
            <div class="absolute inset-0 bg-primary-navy/80"></div>
            <div class="max-w-[1200px] mx-auto px-5 relative z-10 text-white text-center">
                <h1 class="font-heading text-[3rem] md:text-[4rem] leading-tight mb-5">Corporate Banking</h1>
                <p class="text-xl text-text-gray max-w-2xl mx-auto">Strategic financial solutions empowering your enterprise to scale and succeed in a global market.</p>
            </div>
        </header>

        <!-- Introduction -->
        <section class="py-20 bg-white">
            <div class="max-w-[1000px] mx-auto px-5 text-center">
                <h2 class="font-heading text-3xl text-primary-navy mb-6">Driving Business Excellence</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Prestige International Bank offers a comprehensive suite of corporate banking services designed to meet the complex needs of modern businesses. From liquidity management to cross-border trade finance, our dedicated relationship managers work with you to optimize your financial operations.
                </p>
            </div>
        </section>

        <!-- Services Grid -->
        <section class="py-20 bg-[#f8f9fa]">
            <div class="max-w-[1200px] mx-auto px-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Service 1 -->
                    <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                        <h3 class="font-heading text-2xl text-primary-navy mb-4">Global Trade Finance</h3>
                        <p class="text-gray-600 mb-4">Navigate international markets with confidence. We provide letters of credit, guarantees, and supply chain financing to facilitate your global operations.</p>
                        <ul class="list-disc list-inside text-gray-500 space-y-2">
                            <li>Import & Export financing</li>
                            <li>Bank Guarantees</li>
                            <li>Supply Chain solutions</li>
                        </ul>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                        <h3 class="font-heading text-2xl text-primary-navy mb-4">Cash Management</h3>
                        <p class="text-gray-600 mb-4">Optimize your working capital with our advanced receivables and payables solutions, giving you real-time visibility and control.</p>
                        <ul class="list-disc list-inside text-gray-500 space-y-2">
                            <li>Liquidity Management</li>
                            <li>Automated Payables</li>
                            <li>Virtual Accounts</li>
                        </ul>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                        <h3 class="font-heading text-2xl text-primary-navy mb-4">Commercial Lending</h3>
                        <p class="text-gray-600 mb-4">Fuel your growth with flexible financing options tailored to your business cycles and expansion plans.</p>
                        <ul class="list-disc list-inside text-gray-500 space-y-2">
                            <li>Term Loans</li>
                            <li>Revolving Credit Lines</li>
                            <li>Asset-based Lending</li>
                        </ul>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                        <h3 class="font-heading text-2xl text-primary-navy mb-4">Treasury & Risk</h3>
                        <p class="text-gray-600 mb-4">Protect your bottom line against market volatility. Our treasury experts help you manage interest rate and foreign exchange risks.</p>
                        <ul class="list-disc list-inside text-gray-500 space-y-2">
                            <li>FX Hedging</li>
                            <li>Interest Rate Swaps</li>
                            <li>Investment Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-primary-navy text-white text-center">
            <div class="max-w-[800px] mx-auto px-5">
                <h2 class="font-heading text-3xl mb-6">Ready to Elevate Your Business?</h2>
                <p class="text-text-gray mb-10 text-lg">Connect with our corporate banking team to discuss a strategy tailored to your enterprise.</p>
                <a href="#" class="inline-block px-8 py-4 bg-accent-gold text-primary-navy font-bold rounded-sm hover:bg-accent-gold-hover transition duration-300">Contact Us</a>
            </div>
        </section>

@endsection
