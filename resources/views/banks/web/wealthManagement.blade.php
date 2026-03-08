@extends('banks.layouts.app')


@section('content')
     
    <!-- Hero Section -->
    <header class="relative bg-cover bg-center h-[60vh] flex items-center" style="background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
        <div class="absolute inset-0 bg-primary-navy/80"></div>
        <div class="max-w-[1200px] mx-auto px-5 relative z-10 text-white text-center">
            <h1 class="font-heading text-[3rem] md:text-[4rem] leading-tight mb-5">Wealth Management</h1>
            <p class="text-xl text-text-gray max-w-2xl mx-auto">Preserving your legacy and growing your future with disciplined, personalized investment strategies.</p>
        </div>
    </header>

    <!-- Introduction -->
    <section class="py-20 bg-white">
        <div class="max-w-[1000px] mx-auto px-5 text-center">
            <h2 class="font-heading text-3xl text-primary-navy mb-6">Your Future, Architected</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                True wealth management goes beyond simple investment advice. It requires a holistic understanding of your life, your family, and your goals. Our advisors work with you to create a comprehensive roadmap that navigates market complexities while keeping your long-term objectives in clear view.
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-20 bg-[#f8f9fa]">
        <div class="max-w-[1200px] mx-auto px-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Service 1 -->
                <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                    <h3 class="font-heading text-2xl text-primary-navy mb-4">Investment Advisory</h3>
                    <p class="text-gray-600 mb-4">We build diversified portfolios tailored to your risk tolerance and time horizon, utilizing global equities, fixed income, and alternative assets.</p>
                    <ul class="list-disc list-inside text-gray-500 space-y-2">
                        <li>Asset Allocation</li>
                        <li>Portfolio Rebalancing</li>
                        <li>Market Analysis</li>
                    </ul>
                </div>

                <!-- Service 2 -->
                <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                    <h3 class="font-heading text-2xl text-primary-navy mb-4">Retirement Planning</h3>
                    <p class="text-gray-600 mb-4">Ensure your lifestyle is maintained throughout your retirement years with strategic income planning and tax-efficient withdrawal strategies.</p>
                    <ul class="list-disc list-inside text-gray-500 space-y-2">
                        <li>Income Projections</li>
                        <li>Pension Maximization</li>
                        <li>Long-term Care Planning</li>
                    </ul>
                </div>

                <!-- Service 3 -->
                <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                    <h3 class="font-heading text-2xl text-primary-navy mb-4">Estate & Trust Services</h3>
                    <p class="text-gray-600 mb-4">Secure your legacy for future generations. We collaborate with your legal counsel to structure trusts and estate plans that minimize tax liability.</p>
                    <ul class="list-disc list-inside text-gray-500 space-y-2">
                        <li>Wealth Transfer</li>
                        <li>Trust Administration</li>
                        <li>Beneficiary Support</li>
                    </ul>
                </div>

                <!-- Service 4 -->
                <div class="bg-white p-10 shadow-sm border-l-4 border-accent-gold">
                    <h3 class="font-heading text-2xl text-primary-navy mb-4">Philanthropy</h3>
                    <p class="text-gray-600 mb-4">Make a lasting impact on the causes you care about. We help you establish charitable foundations and donor-advised funds.</p>
                    <ul class="list-disc list-inside text-gray-500 space-y-2">
                        <li>Charitable Trusts</li>
                        <li>Impact Investing</li>
                        <li>Foundation Management</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary-navy text-white text-center">
        <div class="max-w-[800px] mx-auto px-5">
            <h2 class="font-heading text-3xl mb-6">Plan for What Matters Most</h2>
            <p class="text-text-gray mb-10 text-lg">Schedule a complimentary portfolio review with one of our Senior Wealth Advisors.</p>
            <a href="#" class="inline-block px-8 py-4 bg-accent-gold text-primary-navy font-bold rounded-sm hover:bg-accent-gold-hover transition duration-300">Start the Conversation</a>
        </div>
    </section>
    
@endsection