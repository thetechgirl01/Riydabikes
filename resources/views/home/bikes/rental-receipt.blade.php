@extends('layouts.base')

@section('title', 'Rental Receipt')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="relative bg-gradient-to-r from-[#800020] to-[#6b001a] py-12 px-4 sm:px-6 lg:px-8 text-white overflow-hidden">
        <div class="max-w-4xl mx-auto relative z-10">
            <div class="flex items-center gap-3 mb-3">
                <svg class="w-10 h-10 text-[#FFD600]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h1 class="text-3xl md:text-4xl font-bold">Booking Confirmed!</h1>
            </div>
            <p class="text-xl opacity-95">Thanks for renting with us, <span class="font-semibold text-[#FFD600]">{{ $rental->guest_name }}</span></p>
            <p class="text-sm opacity-80 mt-2">Your booking has been received and is being processed.</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden" style="transform: translateY(1px);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-50 dark:fill-gray-900"></path>
            </svg>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-r-xl p-5 mb-8 dark:bg-green-900/20 dark:border-green-400">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-green-600 dark:text-green-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-sm font-medium text-green-800 dark:text-green-300">
                        Your rental request is in! We'll verify availability and your payment proof, then contact you within 24 hours.
                    </p>
                    <p class="text-xs text-green-600 dark:text-green-400 mt-1">Booking reference: <span class="font-mono">{{ $rental->rental_no }}</span></p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden mb-8">
            <div class="border-b border-gray-100 dark:border-gray-700 px-6 py-5 flex flex-wrap items-center justify-between gap-3 bg-gradient-to-r from-gray-50 to-white dark:from-gray-800/50 dark:to-gray-800">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#800020]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Rental Summary
                    </h2>
                    <p class="text-xs text-gray-500 mt-1">Booking #{{ $rental->rental_no }}</p>
                </div>
                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5 animate-pulse"></span>
                    {{ $rental->status }}
                </span>
            </div>
            
            <div class="px-6 py-6 space-y-6">
                <!-- Bike item -->
                <div class="flex items-center gap-5 pb-5 border-b border-gray-100 dark:border-gray-700">
                    <div class="w-20 h-20 bg-white rounded-xl shadow-sm overflow-hidden flex items-center justify-center p-2 border border-gray-100 dark:border-gray-600">
                        <img src="{{ $rental->bike->image_url }}" alt="{{ $rental->bike->name }}" class="w-full h-full object-contain">
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-gray-900 dark:text-white text-lg">{{ $rental->bike->name }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">{{ $rental->total_days }} day(s) × ₦{{ number_format($rental->daily_rate, 2) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-extrabold text-[#800020] dark:text-[#FFD600]">₦{{ number_format($rental->total_amount, 2) }}</p>
                    </div>
                </div>

                <!-- Rental details grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Rental Period</h3>
                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs text-gray-400">Start Date</p>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $rental->start_date->format('M d, Y') }}</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                <div>
                                    <p class="text-xs text-gray-400">End Date</p>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $rental->end_date->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Payment Information</h3>
                        <div>
                            <p class="text-xs text-gray-400">Payment Method</p>
                            <p class="font-medium text-gray-800 dark:text-white">{{ $rental->payment_method }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Booked On</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $rental->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3 md:col-span-2">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer Details</h3>
                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-4">
                            <p class="font-semibold text-gray-800 dark:text-white">{{ $rental->guest_name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $rental->guest_email }} · {{ $rental->guest_phone }}</p>
                        </div>
                    </div>

                    @if($rental->pickup_address)
                        <div class="space-y-3 md:col-span-2">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pickup Location</h3>
                            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-4">
                                <p class="text-gray-700 dark:text-gray-300">{{ $rental->pickup_address }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Total row -->
                <div class="border-t border-gray-100 dark:border-gray-700 pt-5 mt-2">
                    <div class="flex justify-between items-center">
                        <span class="text-base font-semibold text-gray-700 dark:text-gray-300">Total Rental Fee</span>
                        <span class="text-3xl font-extrabold text-[#800020] dark:text-[#FFD600]">₦{{ number_format($rental->total_amount, 2) }}</span>
                    </div>
                </div>

                @if($settings && $settings->site_name)
                    <div class="text-center pt-4 border-t border-gray-100 dark:border-gray-700">
                        <p class="text-xs text-gray-400">{{ $settings->site_name }} — Premium Bike Rental</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 justify-between items-center">
            <a href="{{ route('home.bikes.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#800020] hover:bg-[#6b001a] text-white rounded-full text-sm font-semibold transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 group">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Browse More Bikes
            </a>
            <button onclick="window.print()" class="inline-flex items-center justify-center gap-2 px-6 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-full text-sm font-semibold text-gray-700 dark:text-gray-200 bg-white dark:bg-transparent hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                Print Receipt
            </button>
        </div>
    </div>
</div>
@endsection