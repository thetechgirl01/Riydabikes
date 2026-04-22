@extends('layouts.base')

@section('title', $bike->name)

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <nav class="mb-6 text-sm">
            <a href="{{ route('home.bikes.index') }}" class="text-blue-600 hover:underline dark:text-blue-400">← Back to bikes</a>
        </nav>

        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 dark:bg-red-900/30">
                <p class="text-sm text-red-700 dark:text-red-300">{{ session('error') }}</p>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-10">

                <!-- Image -->
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden">
                    <img src="{{ $bike->image_url }}" alt="{{ $bike->name }}" class="w-full h-full object-cover">
                </div>

                <!-- Details -->
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $bike->name }}</h1>
                    @if($bike->brand)
                        <p class="mt-1 text-gray-500 dark:text-gray-400">{{ $bike->brand }}</p>
                    @endif

                    <div class="mt-5 space-y-2">
                        <div class="flex items-baseline gap-2">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Buy for</span>
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">₦{{ number_format($bike->price, 2) }}</span>
                        </div>
                        @if($bike->available_for_hire)
                            <div class="flex items-baseline gap-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Hire for</span>
                                <span class="text-xl font-semibold text-indigo-600 dark:text-indigo-400">₦{{ number_format($bike->daily_rate, 2) }} / day</span>
                            </div>
                        @endif
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2">
                        @if($bike->isInStock())
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300">
                                In stock ({{ $bike->stock }})
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300">Out of stock</span>
                        @endif

                        @if($bike->available_for_hire)
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300">
                                Available for hire
                            </span>
                        @endif
                    </div>

                    @if($bike->description)
                        <div class="mt-6 prose prose-sm max-w-none dark:prose-invert">
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $bike->description }}</p>
                        </div>
                    @endif

                    <!-- Action buttons -->
                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @if($bike->isInStock())
                            <a href="{{ route('home.bikes.buy', $bike->slug) }}"
                               class="inline-flex justify-center items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium transition">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                Buy Now
                            </a>
                        @else
                            <button disabled class="inline-flex justify-center items-center px-5 py-3 bg-gray-300 text-gray-500 rounded-md font-medium cursor-not-allowed dark:bg-gray-600">
                                Out of stock
                            </button>
                        @endif

                        @if($bike->available_for_hire)
                            <a href="{{ route('home.bikes.hire', $bike->slug) }}"
                               class="inline-flex justify-center items-center px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-medium transition">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Hire This Bike
                            </a>
                        @else
                            <button disabled class="inline-flex justify-center items-center px-5 py-3 bg-gray-200 text-gray-400 rounded-md font-medium cursor-not-allowed dark:bg-gray-700 dark:text-gray-500">
                                Not available for hire
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection