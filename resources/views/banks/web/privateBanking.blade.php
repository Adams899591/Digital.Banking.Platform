@extends('banks.layouts.app')


@section('content')
       <!-- Hero Section -->
    <header class="relative bg-cover bg-center h-[60vh] flex items-center" style="background-image: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
        <div class="absolute inset-0 bg-primary-navy/80"></div>
        <div class="max-w-[1200px] mx-auto px-5 relative z-10 text-white text-center">
            <h1 class="font-heading text-[3rem] md:text-[4rem] leading-tight mb-5">Private Banking</h1>
            <p class="text-xl text-text-gray max-w-2xl mx-auto">Exquisite service and tailored financial strategies for those who demand the exceptional.</p>
        </div>
    </header>

    <!-- Introduction -->
    <section class="py-20 bg-white">
        <div class="max-w-[1000px] mx-auto px-5 text-center">
            <h2 class="font-heading text-3xl text-primary-navy mb-6">A Partnership Built on Trust</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                At Prestige International Bank, Private Banking is more than a service—it is a partnership dedicated to the preservation and growth of your wealth. We understand that your financial life is complex, which is why we offer a dedicated team of experts to navigate your unique landscape.
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-20 bg-[#f8f9fa]">
        <div class="max-w-[1200px] mx-auto px-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Service 1 -->
                <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                    <h3 class="font-heading text-2xl text-primary-navy mb-4">Dedicated Private Banker</h3>
                    <p class="text-gray-600 mb-4">Your single point of contact for all your banking needs. Available 24/7 to ensure your transactions are handled with speed and discretion.</p>
                    <ul class="list-disc list-inside text-gray-500 space-y-2">
                        <li>Priority transaction processing</li>
                        <li>Direct mobile access</li>
                        <li>Global concierge services</li>
                    </ul>
                </div>

                <!-- Service 2 -->
                <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                    <h3 class="font-heading text-2xl text-primary-navy mb-4">Wealth Structuring</h3>
                    <p class="text-gray-600 mb-4">Comprehensive planning to protect your assets for future generations. We work with your legal and tax advisors to create a robust strategy.</p>
                    <ul class="list-disc list-inside text-gray-500 space-y-2">
                        <li>Trust & Estate planning</li>
                        <li>Philanthropic advisory</li>
                        <li>Tax-efficient investing</li>
                    </ul>
                </div>

                <!-- Service 3 -->
                <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                    <h3 class="font-heading text-2xl text-primary-navy mb-4">Bespoke Lending</h3>
                    <p class="text-gray-600 mb-4">Liquidity solutions designed around your complex assets. From art financing to yacht leasing, we provide flexible capital.</p>
                    <ul class="list-disc list-inside text-gray-500 space-y-2">
                        <li>Securities-backed lending</li>
                        <li>Custom mortgage solutions</li>
                        <li>Aircraft & Marine finance</li>
                    </ul>
                </div>

                <!-- Service 4 -->
                <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                    <h3 class="font-heading text-2xl text-primary-navy mb-4">Exclusive Investments</h3>
                    <p class="text-gray-600 mb-4">Access to opportunities not available to the general public, including private equity, hedge funds, and direct real estate investments.</p>
                    <ul class="list-disc list-inside text-gray-500 space-y-2">
                        <li>Private Equity & Venture Capital</li>
                        <li>Hedge Fund access</li>
                        <li>Pre-IPO opportunities</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary-navy text-white text-center">
        <div class="max-w-[800px] mx-auto px-5">
            <h2 class="font-heading text-3xl mb-6">Experience the Difference</h2>
            <p class="text-text-gray mb-10 text-lg">We invite you to discuss your financial goals with one of our Senior Private Bankers.</p>
            <a href="#" class="inline-block px-8 py-4 bg-accent-gold text-primary-navy font-bold rounded-sm hover:bg-accent-gold-hover transition duration-300">Request a Consultation</a>
        </div>
    </section>
@endsection