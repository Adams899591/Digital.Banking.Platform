@extends('banks.layouts.app')


@section('content')
        <!-- Hero Section -->
    <header class="relative bg-cover bg-center h-[85vh] flex items-center" style="background-image: url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0a192f]/95 to-[#0a192f]/60"></div>
        <div class="max-w-[1200px] mx-auto px-5 relative z-10 text-white max-w-[650px]">
            <h1 class="font-heading text-[2.5rem] md:text-[3.5rem] leading-[1.1] mb-5">Financial Excellence tailored to your lifestyle.</h1>
            <p class="text-lg text-text-gray mb-[30px]">Join a banking institution that prioritizes your security and growth. Experience world-class service from our dedicated team of professionals.</p>
            <div class="flex flex-wrap gap-4">
                <a href="#" class="px-6 py-2.5 rounded-sm font-semibold text-sm cursor-pointer transition duration-300 bg-accent-gold text-primary-navy hover:bg-accent-gold-hover">Get Started</a>
                <a href="#" class="px-6 py-2.5 rounded-sm font-semibold text-sm cursor-pointer transition duration-300 border border-white text-white hover:bg-white/10">View Rates</a>
            </div>
        </div>
    </header>

    <!-- Trust Indicators -->
    <section class="bg-accent-gold py-10 text-primary-navy">
        <div class="max-w-[1200px] mx-auto px-5 grid grid-cols-1 md:grid-cols-3 gap-[30px] md:gap-0 text-center">
            <div>
                <h3 class="font-heading text-[2.5rem] mb-1">$50B+</h3>
                <p>Assets Under Management</p>
            </div>
            <div>
                <h3 class="font-heading text-[2.5rem] mb-1">2.5M</h3>
                <p>Happy Clients</p>
            </div>
            <div>
                <h3 class="font-heading text-[2.5rem] mb-1">100%</h3>
                <p>Secure Transactions</p>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white">
        <div class="max-w-[1200px] mx-auto px-5">
            <div class="text-center mb-[60px]">
                <h2 class="font-heading text-[2.5rem] text-primary-navy">Our Expertise</h2>
                <p>Comprehensive financial solutions for every stage of life.</p>
            </div>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-10">
                <div class="p-10 border border-[#eee] transition duration-300 hover:border-accent-gold hover:-translate-y-1 hover:shadow-[0_10px_30px_rgba(0,0,0,0.05)]">
                    <h3 class="font-bold text-lg mb-2">Global Transfers</h3>
                    <p>Send money internationally with zero hidden fees and real-time tracking.</p>
                </div>
                <div class="p-10 border border-[#eee] transition duration-300 hover:border-accent-gold hover:-translate-y-1 hover:shadow-[0_10px_30px_rgba(0,0,0,0.05)]">
                    <h3 class="font-bold text-lg mb-2">Secure Savings</h3>
                    <p>High-yield savings accounts protected by industry-leading security protocols.</p>
                </div>
                <div class="p-10 border border-[#eee] transition duration-300 hover:border-accent-gold hover:-translate-y-1 hover:shadow-[0_10px_30px_rgba(0,0,0,0.05)]">
                    <h3 class="font-bold text-lg mb-2">Business Loans</h3>
                    <p>Empowering your business with flexible financing options and expert advice.</p>
                </div>
            </div>
        </div>
    </section>

    
@endsection