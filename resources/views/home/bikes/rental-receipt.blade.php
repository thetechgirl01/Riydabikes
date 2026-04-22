@extends('layouts.base')

@section('title', 'Rental Receipt')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="relative bg-gradient-to-r from-indigo-600 to-purple-700 py-10 px-4 sm:px-6 lg:px-8 text-white">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Rental Receipt</h1>
            <p class="text-xl opacity-90">Thank you, {{ $rental->guest_name }}</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden rotate-180" style="transform: translateY(1px);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-50 dark:fill-gray-900"></path>
            </svg>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-8 dark:bg-green-900/30 dark:border-green-500">
            <p class="text-sm text-green-700 dark:text-green-300">
                Your booking is in. We'll confirm availability and contact you shortly.
            </p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden mb-8">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4 flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Booking {{ $rental->rental_no }}</h2>
                <span class="text-sm bg-yellow-100 text-yellow-800 py-1 px-3 rounded-full font-medium dark:bg-yellow-900/50 dark:text-yellow-300">
                    {{ $rental->status }}
                </span>
            </div>
            <div class="px-6 py-4 space-y-6 text-gray-700 dark:text-gray-300">

                <div class="flex items-center gap-4 pb-4 border-b dark:border-gray-700">
                    <img src="{{ $rental->bike->image_url }}" alt="{{ $rental->bike->name }}" class="w-20 h-20 object-cover rounded-md">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $rental->bike->name }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $rental->total_days }} day(s) × ₦{{ number_format($rental->daily_rate, 2) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-bold text-gray-900 dark:text-white">₦{{ number_format($rental->total_amount, 2) }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Start Date</p>
                        <p class="font-medium">{{ $rental->start_date->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">End Date</p>
                        <p class="font-medium">{{ $rental->end_date->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Payment Method</p>
                        <p class="font-medium">{{ $rental->payment_method }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Booked On</p>
                        <p class="font-medium">{{ $rental->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Customer</p>
                        <p class="font-medium">{{ $rental->guest_name }}</p>
                        <p class="text-sm">{{ $rental->guest_email }} · {{ $rental->guest_phone }}</p>
                    </div>
                    @if($rental->pickup_address)
                        <div class="md:col-span-2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Pickup Address</p>
                            <p class="font-medium">{{ $rental->pickup_address }}</p>
                        </div>
                    @endif
                </div>

                <div class="border-t dark:border-gray-700 pt-4">
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total</span>
                        <span>₦{{ number_format($rental->total_amount, 2) }}</span>
                    </div>
                </div>

                @if($settings && $settings->site_name)
                    <p class="text-xs text-gray-400 text-center pt-4 border-t dark:border-gray-700">{{ $settings->site_name }}</p>
                @endif
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <a href="{{ route('home.bikes.index') }}" class="inline-flex justify-center items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm font-medium">
                Browse More Bikes
            </a>
            <button onclick="window.print()" class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                Print Receipt
            </button>
        </div>
    </div>
</div>
@endsection