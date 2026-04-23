@extends('layouts.base')

@section('title', $bike->name)

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <nav class="mb-8 text-sm">
            <a href="{{ route('home.bikes.index') }}" class="inline-flex items-center gap-2 text-[#800020] hover:text-[#6b001a] font-medium transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Browse All Bikes
            </a>
        </nav>

        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 rounded-r-xl p-4 dark:bg-red-900/20">
                <p class="text-sm text-red-700 dark:text-red-300">{{ session('error') }}</p>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-8">
                <!-- Image Section -->
                <div class="bg-white p-8 flex items-center justify-center border-b lg:border-b-0 lg:border-r border-gray-100 dark:border-gray-700">
                    <div class="w-full max-w-md">
                        <img src="{{ $bike->image_url }}" alt="{{ $bike->name }}" class="w-full h-auto object-contain">
                    </div>
                </div>

                <!-- Details Section -->
                <div class="p-8 lg:p-10">
                    <div class="flex items-start justify-between gap-4 flex-wrap">
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white">{{ $bike->name }}</h1>
                            @if($bike->brand)
                                <p class="mt-2 text-gray-500 dark:text-gray-400 text-sm font-medium">{{ $bike->brand }}</p>
                            @endif
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @if($bike->isInStock())
                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300 shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                    In Stock ({{ $bike->stock }})
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300 shadow-sm">
                                    Out of Stock
                                </span>
                            @endif

                            @if($bike->available_for_hire)
                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-[#800020]/10 text-[#800020] dark:bg-[#800020]/30 dark:text-[#FFD600] shadow-sm">
                                    <i class="fas fa-motorcycle text-xs mr-1"></i>
                                    Available for Hire
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row sm:items-baseline sm:justify-between gap-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wide">Purchase Price</p>
                                <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">₦{{ number_format($bike->price, 2) }}</p>
                            </div>
                            @if($bike->available_for_hire)
                                <div class="sm:text-right">
                                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wide">Rental Rate</p>
                                    <p class="text-2xl font-bold text-[#800020] dark:text-[#FFD600] mt-1">₦{{ number_format($bike->daily_rate, 2) }} <span class="text-sm font-normal text-gray-500">/ day</span></p>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($bike->description)
                        <div class="mt-8">
                            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide mb-3">Description</h3>
                            <div class="prose prose-sm max-w-none dark:prose-invert">
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed whitespace-pre-line">{{ $bike->description }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Action buttons -->
                    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @if($bike->isInStock())
                            <a href="{{ route('home.bikes.buy', $bike->slug) }}"
                               class="group inline-flex justify-center items-center gap-2 px-6 py-3.5 bg-[#800020] hover:bg-[#6b001a] text-white rounded-full font-semibold text-base transition-all duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                Buy Now
                            </a>
                        @else
                            <button disabled class="inline-flex justify-center items-center px-6 py-3.5 bg-gray-200 text-gray-500 rounded-full font-semibold cursor-not-allowed dark:bg-gray-700 dark:text-gray-400">
                                Out of Stock
                            </button>
                        @endif

                        @if($bike->available_for_hire)
                            <a href="{{ route('home.bikes.hire', $bike->slug) }}"
                               class="group inline-flex justify-center items-center gap-2 px-6 py-3.5 border-2 border-[#800020] text-[#800020] hover:bg-[#800020] hover:text-white rounded-full font-semibold text-base transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5 dark:border-[#FFD600] dark:text-[#FFD600] dark:hover:bg-[#FFD600] dark:hover:text-[#800020]">
                                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Rent This Bike
                            </a>
                        @else
                            <button disabled class="inline-flex justify-center items-center px-6 py-3.5 bg-gray-100 text-gray-400 rounded-full font-semibold cursor-not-allowed dark:bg-gray-800 dark:text-gray-500 border border-gray-200 dark:border-gray-700">
                                Not Available for Rent
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection