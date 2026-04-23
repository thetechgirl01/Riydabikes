@extends('layouts.base')

@section('title', 'Bikes')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
    <!-- Hero -->
    <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 py-12 px-4 sm:px-6 lg:px-8 text-white">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Our Bikes</h1>
            <p class="text-lg opacity-90">Buy outright or hire by the day.</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden rotate-180" style="transform: translateY(1px);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-50 dark:fill-gray-900"></path>
            </svg>
        </div>
    </div>

   <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        @if($bikes->isEmpty())
            <div class="text-center py-16">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0l-2 7H6l-2-7m16 0H4"/>
                </svg>
                <p class="mt-4 text-gray-600 dark:text-gray-300">No bikes available right now. Please check back soon.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($bikes as $bike)
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 ease-out">
                        <a href="{{ route('home.bikes.show', $bike->slug) }}" class="block relative overflow-hidden bg-white">
                            <div class="aspect-w-4 aspect-h-3 bg-white p-6">
                                <img src="{{ $bike->image_url }}" alt="{{ $bike->name }}" class="w-full h-64 object-contain transition-transform duration-500 group-hover:scale-105">
                            </div>
                            @if($bike->available_for_hire)
                                <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-[#800020] text-white shadow-md">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#FFD600] mr-1.5 animate-pulse"></span>
                                    Available For Hire
                                </span>
                            @else
                                <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gray-600 text-white shadow-md">Unavailable For Hire</span>
                            @endif
                        </a>
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-1">
                                        <a href="{{ route('home.bikes.show', $bike->slug) }}" class="hover:text-[#800020] transition-colors duration-200">{{ $bike->name }}</a>
                                    </h3>
                                    @if($bike->brand)
                                        <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">{{ $bike->brand }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-4 space-y-1">
                                <p class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">₦{{ number_format($bike->price, 2) }}</p>
                                @if($bike->available_for_hire)
                                    <p class="text-base font-semibold text-[#800020] dark:text-[#FFD600]">or ₦{{ number_format($bike->daily_rate, 2) }} <span class="text-sm font-normal text-gray-500">/ day</span></p>
                                @endif
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                                <a href="{{ route('home.bikes.show', $bike->slug) }}"
                                   class="w-full inline-flex justify-center items-center px-5 py-3 bg-[#800020] hover:bg-[#6b001a] text-white rounded-full text-sm font-semibold transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 gap-2">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $bikes->links() }}
            </div>
        @endif
    </div>
</div>
@endsection