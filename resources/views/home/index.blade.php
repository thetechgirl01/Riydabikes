@extends('layouts.base')

@section('title', $settings->site_title)

@inject('content', 'App\Http\Controllers\FrontController')

@section('content')

<!-- Hero Section - Only background overlay layer modified -->
<section class="relative min-h-screen flex items-center overflow-hidden" x-data="{ currentSlide: 0, slides: 3 }" x-init="setInterval(() => { currentSlide = (currentSlide + 1) % slides }, 5000)">
    <!-- Background Video/Images -->
    <div class="absolute inset-0 z-0">
        <div x-show="currentSlide === 0" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
            <video autoplay muted loop class="w-full h-full object-cover">
                <source src="temp/custom/images/slider/airplane_takeoff.mp4" type="video/mp4">
            </video>
        </div>
        
        <div x-show="currentSlide === 1" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center" style="background-image: url('temp/custom/images/slider/trucks.jpg');"></div>
        
        <div x-show="currentSlide === 2" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center" style="background-image: url('temp/custom/images/slider/home-main.jpg');"></div>
        
        <!-- White gradient overlay - 60% width from left, smooth transition -->
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white to-transparent lg:via-white lg:to-transparent w-full lg:w-[90%]"></div>
        
        <!-- Dark overlay removed as white gradient now handles contrast -->
    </div>

    <!-- Rest of hero section remains unchanged -->
    <div class="relative z-10 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:w-[70%]">
                <div class="lg:bg-gradient-to-r lg:from-white lg:via-white/95 lg:to-transparent lg:p-8 lg:rounded-2xl lg:-ml-8">
                    <div class="animate-fade-in text-center lg:text-left">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight text-white lg:text-gray-900">
                            <span x-show="currentSlide === 0" x-cloak x-transition:enter="transition-all duration-1000 delay-300" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                                Rent a Bike,<br><span class="text-[#800020]">Ride Free</span>
                            </span>
                            <span x-show="currentSlide === 1" x-cloak x-transition:enter="transition-all duration-1000 delay-300" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                                Fast & Reliable<br><span class="text-[#800020]">Delivery Service</span>
                            </span>
                            <span x-show="currentSlide === 2" x-cloak x-transition:enter="transition-all duration-1000 delay-300" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                                Buy & Sell Bikes<br><span class="text-[#800020]">Best Deals</span>
                            </span>
                        </h1>
                        
                        <p class="text-lg md:text-xl mb-8 max-w-2xl leading-relaxed text-white lg:text-gray-700">
                            <span x-show="currentSlide === 0" x-cloak>Choose from our wide range of premium bikes. Flexible rental plans for daily, weekly, or monthly needs.</span>
                            <span x-show="currentSlide === 1" x-cloak>Get your packages delivered fast and reliably with our dedicated bike delivery fleet across the city.</span>
                            <span x-show="currentSlide === 2" x-cloak>Find your perfect ride or sell your bike with RydaBikes. Trusted marketplace for quality bikes.</span>
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start items-center">
                            <a href="contact" class="bg-[#800020] text-white px-8 py-4 rounded-full hover:bg-[#6b001a] transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center gap-2">
                                Book a Delivery <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="contact" class="bg-transparent border-2 border-white lg:border-[#800020] text-white lg:text-[#800020] px-8 py-4 rounded-full hover:bg-[#800020] hover:text-white transition-all duration-300 font-semibold text-lg inline-flex items-center gap-2">
                                <i class="fas fa-motorcycle"></i> Rent / Buy a Bike
                            </a>
                        </div>

                        <div class="mt-12 flex flex-col sm:flex-row gap-6 justify-center lg:justify-start">
                            <div class="flex items-center gap-3 bg-white/90 lg:bg-white/80 backdrop-blur-sm rounded-full px-5 py-2 shadow-md">
                                <div class="w-10 h-10 bg-[#800020]/10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-motorcycle text-[#800020] text-lg"></i>
                                </div>
                                <span class="text-gray-800 font-medium text-sm">Wide range of bikes</span>
                            </div>
                            <div class="flex items-center gap-3 bg-white/90 lg:bg-white/80 backdrop-blur-sm rounded-full px-5 py-2 shadow-md">
                                <div class="w-10 h-10 bg-[#800020]/10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-truck-fast text-[#800020] text-lg"></i>
                                </div>
                                <span class="text-gray-800 font-medium text-sm">Fast delivery anywhere</span>
                            </div>
                            <div class="flex items-center gap-3 bg-white/90 lg:bg-white/80 backdrop-blur-sm rounded-full px-5 py-2 shadow-md">
                                <div class="w-10 h-10 bg-[#800020]/10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-shield-alt text-[#800020] text-lg"></i>
                                </div>
                                <span class="text-gray-800 font-medium text-sm">Safe and secure rides</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
        <template x-for="i in slides" :key="i">
            <button @click="currentSlide = i - 1" :class="currentSlide === (i - 1) ? 'bg-[#800020]' : 'bg-white bg-opacity-50'" class="w-3 h-3 rounded-full transition-all duration-300"></button>
        </template>
    </div>

    <div class="absolute bottom-8 left-8 text-white animate-bounce">
        <div class="flex flex-col items-center">
            <span class="text-sm mb-2">Scroll Down</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</section>

<!-- Track & Trace Section - Updated for RydaBikes Delivery -->
<section class="relative -mt-16 z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10">
            @if (Session::has('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-xl">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            <strong>Oops!</strong> The delivery ID you entered appears to be incorrect. Please try again.
                        </p>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Track Your Delivery in Real Time</h2>
                <p class="text-gray-600 text-lg">Got a delivery on the way? Enter your unique tracking ID below and see exactly where your package is right now.</p>
            </div>
            
            <form method="POST" action="{{ route('trackingresult') }}" class="max-w-2xl mx-auto">
                @csrf
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" 
                               name="trackingnumber" 
                               placeholder="e.g., RYD-123456789" 
                               class="w-full px-6 py-4 text-lg border border-gray-300 rounded-full focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all outline-none" 
                               required>
                    </div>
                    <button type="submit" 
                            class="bg-[#800020] text-white px-8 py-4 rounded-full hover:bg-[#6b001a] transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-flex items-center justify-center gap-2">
                        <i class="fas fa-location-dot text-white"></i> Track Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Bikes Showcase Section -->
@if(isset($latestBikes) && $latestBikes->count() > 0)
<section class="py-20 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-motorcycle mr-1"></i> Ride With Us
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Latest Bikes</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Buy outright or hire by the day. Explore our latest arrivals and find your perfect ride today.
            </p>
        </div>

        <!-- Draggable Slider Container -->
        <div class="relative group">
            <!-- Left Navigation Arrow -->
            <button id="scrollLeftBtn" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 lg:-translate-x-6 z-20 w-10 h-10 lg:w-12 lg:h-12 text-black bg-white rounded-full shadow-lg hover:bg-[#800020] hover:text-white transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer disabled:opacity-30 disabled:cursor-not-allowed" style="transition: all 0.3s ease;">
                <i class="fas fa-chevron-left text-black group-hover:text-white text-sm lg:text-base"></i>
            </button>

            <!-- Right Navigation Arrow -->
            <button id="scrollRightBtn" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 lg:translate-x-6 z-20 w-10 h-10 lg:w-12 lg:h-12 text-black bg-white rounded-full shadow-lg hover:bg-[#800020] hover:text-white transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer disabled:opacity-30 disabled:cursor-not-allowed" style="transition: all 0.3s ease;">
                <i class="fas fa-chevron-right text-black group-hover:text-white text-sm lg:text-base"></i>
            </button>

            <!-- Scrollable Cards Container -->
            <div id="bikesSlider" class="overflow-x-auto scrollbar-hide cursor-grab active:cursor-grabbing" style="scroll-behavior: smooth; -webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="flex gap-6" style="width: max-content;">
                    @foreach($latestBikes as $bike)
                        <div class="w-[280px] sm:w-[320px] lg:w-[350px] flex-shrink-0">
                            <div class="group/card bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 ease-out">
                                <a href="{{ route('home.bikes.show', $bike->slug) }}" class="block relative overflow-hidden bg-white p-6">
                                    <div class="aspect-w-4 aspect-h-3 bg-white">
                                        <img src="{{ $bike->image_url }}" alt="{{ $bike->name }}" class="w-full h-56 object-contain transition-transform duration-500 group-hover/card:scale-105">
                                    </div>
                                    @if($bike->available_for_hire)
                                        <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-[#800020] text-white shadow-md">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#FFD600] mr-1.5 animate-pulse"></span>
                                            Available Now
                                        </span>
                                    @else
                                        <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gray-600 text-white shadow-md">For Sale Only</span>
                                    @endif
                                </a>

                                <div class="p-5 flex-1 flex flex-col">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-1">
                                                <a href="{{ route('home.bikes.show', $bike->slug) }}" class="hover:text-[#800020] transition-colors duration-200">
                                                    {{ $bike->name }}
                                                </a>
                                            </h3>
                                            @if($bike->brand)
                                                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">{{ $bike->brand }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-4 space-y-1">
                                        <p class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">₦{{ number_format($bike->price, 0) }}</p>
                                        @if($bike->available_for_hire)
                                            <p class="text-base font-semibold text-[#800020] dark:text-[#FFD600]">or ₦{{ number_format($bike->daily_rate, 0) }} <span class="text-sm font-normal text-gray-500">/ day</span></p>
                                        @endif
                                    </div>

                                    <div class="mt-5 pt-4 border-t border-gray-100 dark:border-gray-700">
                                        <a href="{{ route('home.bikes.show', $bike->slug) }}"
                                           class="w-full inline-flex justify-center items-center gap-2 px-5 py-3 bg-[#800020] hover:bg-[#6b001a] text-white rounded-full text-sm font-semibold transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('home.bikes.index') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-[#800020] hover:bg-[#6b001a] text-white rounded-full font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                Browse All Bikes
                <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>
</section>

<style>
    /* Hide scrollbar for Chrome, Safari and Opera */
    #bikesSlider::-webkit-scrollbar {
        display: none;
    }
    
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    .cursor-grab {
        cursor: grab;
    }
    
    .cursor-grabbing {
        cursor: grabbing;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('bikesSlider');
        const leftBtn = document.getElementById('scrollLeftBtn');
        const rightBtn = document.getElementById('scrollRightBtn');
        
        if (!slider) return;
        
        let isDown = false;
        let startX;
        let scrollLeft;
        
        // Draggable functionality
        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('cursor-grabbing');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('cursor-grabbing');
        });
        
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('cursor-grabbing');
        });
        
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1.5;
            slider.scrollLeft = scrollLeft - walk;
        });
        
        // Touch support for mobile
        slider.addEventListener('touchstart', (e) => {
            isDown = true;
            startX = e.touches[0].pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        
        slider.addEventListener('touchend', () => {
            isDown = false;
        });
        
        slider.addEventListener('touchmove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.touches[0].pageX - slider.offsetLeft;
            const walk = (x - startX) * 1.5;
            slider.scrollLeft = scrollLeft - walk;
        });
        
        // Scroll buttons functionality
        const scrollAmount = 350;
        
        function updateButtons() {
            if (leftBtn && rightBtn) {
                leftBtn.disabled = slider.scrollLeft <= 0;
                rightBtn.disabled = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 5;
            }
        }
        
        if (leftBtn) {
            leftBtn.addEventListener('click', () => {
                slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                setTimeout(updateButtons, 300);
            });
        }
        
        if (rightBtn) {
            rightBtn.addEventListener('click', () => {
                slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                setTimeout(updateButtons, 300);
            });
        }
        
        slider.addEventListener('scroll', updateButtons);
        updateButtons();
        
        // Initial button state
        setTimeout(updateButtons, 100);
    });
</script>
@endif

<!-- Services Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-cog mr-1"></i> What We Offer
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Premium Services</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Comprehensive solutions tailored to get you where you need to be
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Air Freight -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="p-5 flex flex-row gap-5 items-start">
                    <!-- Image/Icon Box -->
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                            <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service1.jpg');"></div>
                            <i class="fas fa-plane text-3xl text-[#800020] group-hover:text-white transition-all duration-300 hidden absolute"></i>
                        </div>
                    </div>
                    
                    <!-- Text Content Column -->
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Air Freight</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            {{$settings->site_name}}, as an IATA-endorsed air forwarder, offers professional and reliable global air-freight solutions.
                        </p>
                        <a href="services" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                            Learn More 
                            <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sea/Ocean Freight -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="p-5 flex flex-row gap-5 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                            <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service2.jpg');"></div>
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Sea/Ocean Freight</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            International ocean freight shipping import and export services. FCL, LCL shipments, port to port or door to door.
                        </p>
                        <a href="services" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                            Learn More 
                            <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Road Transportation -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="p-5 flex flex-row gap-5 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                            <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service3.jpg');"></div>
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Road Transportation</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            Highly experienced and dependable, {{$settings->site_name}} is a trusted partner in domestic road transportation.
                        </p>
                        <a href="services" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                            Learn More 
                            <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Diplomatic Services -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="p-5 flex flex-row gap-5 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                            <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service4.jpg');"></div>
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Diplomatic & Secure Logistics</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            Global secure mail and equipment delivery service with complete confidence and security.
                        </p>
                        <a href="diplomatic" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                            Learn More 
                            <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Warehousing -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="p-5 flex flex-row gap-5 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                            <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service5.jpg');"></div>
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Warehousing</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            Shared and dedicated warehousing solutions supported by state-of-the-art technology and warehouse services.
                        </p>
                        <a href="services" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                            Learn More 
                            <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Packaging & Storage -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="p-5 flex flex-row gap-5 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                            <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service6.jpg');"></div>
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Packaging & Storage</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            Professional packaging and storage solutions for raw materials, electronics, and finished goods with cargo insurance.
                        </p>
                        <a href="services" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                            Learn More 
                            <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Trusted by thousands of customers worldwide for reliable and professional logistics solutions
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Track & Trace -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-search-location text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Track & Trace</h3>
                <p class="text-gray-600 leading-relaxed">
                    Fast and reliable way to check the real-time status of your shipment with our advanced tracking system.
                </p>
            </div>

            <!-- Secure Warehousing -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Secure Warehousing</h3>
                <p class="text-gray-600 leading-relaxed">
                    We leverage a network of operational warehousing facilities with state-of-the-art security systems.
                </p>
            </div>

            <!-- Express Delivery -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-shipping-fast text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Express Delivery</h3>
                <p class="text-gray-600 leading-relaxed">
                    We service your shipments via a diverse operating infrastructure for fastest delivery times.
                </p>
            </div>

            <!-- Domestic Services -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-truck text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Domestic Services</h3>
                <p class="text-gray-600 leading-relaxed">
                    Next business day delivery for time-sensitive parcels with comprehensive domestic coverage.
                </p>
            </div>

            <!-- Global Coverage -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-globe text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Global Coverage</h3>
                <p class="text-gray-600 leading-relaxed">
                    US, Europe & Worldwide coverage by sea & air. We offer a broad range of international freight services.
                </p>
            </div>

            <!-- Dedicated Support -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-headset text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">24/7 Support</h3>
                <p class="text-gray-600 leading-relaxed">
                    Get excellent 24/7 online support and expert advice from our dedicated customer service team.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats & Achievements Section -->
<section class="py-20 bg-gradient-to-br from-primary-600 to-primary-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Impact & Achievements</h2>
            <p class="text-xl text-primary-200 max-w-2xl mx-auto">Delivering excellence across the globe with industry-leading standards</p>
        </div>

        <!-- Main Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
            <!-- Delivered Packages -->
            <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/15 transition-all duration-300">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-box text-white text-xl"></i>
                </div>
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" 
                     style="transition-delay: 200ms;">
                    101,273+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    Delivered Packages
                </div>
            </div>

            <!-- KM Per Year -->
            <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/15 transition-all duration-300">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-route text-white text-xl"></i>
                </div>
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" 
                     style="transition-delay: 400ms;">
                    673,754+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    KM Per Year
                </div>
            </div>

            <!-- Happy Clients -->
            <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/15 transition-all duration-300">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-smile text-white text-xl"></i>
                </div>
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" 
                     style="transition-delay: 600ms;">
                    16,714+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    Happy Clients
                </div>
            </div>

            <!-- Countries Served -->
            <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/15 transition-all duration-300">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-globe text-white text-xl"></i>
                </div>
                <div class="stat-number text-3xl md:text-4xl font-bold mb-2 transform translate-y-4 opacity-0 transition-all duration-700" 
                     style="transition-delay: 800ms;">
                    160+
                </div>
                <div class="text-primary-200 text-sm md:text-base font-medium">
                    Countries Served
                </div>
            </div>
        </div>

        <!-- Additional Professional Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Delivery Performance -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 hover:bg-white/15 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-shipping-fast text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Delivery Performance</h3>
                </div>
                <div class="flex items-center mb-2">
                    <div class="text-3xl font-bold mr-2">99.8%</div>
                    <div class="text-primary-200">On-Time Delivery</div>
                </div>
                <p class="text-sm text-primary-200">Industry-leading on-time delivery performance across all shipping methods</p>
            </div>

            <!-- Tracking Precision -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 hover:bg-white/15 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-search-location text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Tracking Precision</h3>
                </div>
                <div class="flex items-center mb-2">
                    <div class="text-3xl font-bold mr-2">Real-time</div>
                    <div class="text-primary-200">GPS Accuracy</div>
                </div>
                <p class="text-sm text-primary-200">Advanced tracking systems with minute-by-minute updates and GPS precision</p>
            </div>

            <!-- Customer Satisfaction -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 hover:bg-white/15 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-star text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Client Satisfaction</h3>
                </div>
                <div class="flex items-center mb-2">
                    <div class="text-3xl font-bold mr-2">4.9/5</div>
                    <div class="text-primary-200">Average Rating</div>
                </div>
                <p class="text-sm text-primary-200">Outstanding client satisfaction across all our logistics services</p>
            </div>
        </div>

        <!-- Industry Recognition Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Experience -->
            <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-xl p-4 hover:bg-white/15 transition-all duration-300">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-calendar-check text-white text-xl"></i>
                </div>
                <div>
                    <div class="stat-number text-2xl font-bold transform translate-y-4 opacity-0 transition-all duration-700" style="transition-delay: 1000ms;">
                        11+ Years
                    </div>
                    <div class="text-primary-200 text-sm">Industry Experience</div>
                </div>
            </div>

            <!-- Security Rating -->
            <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-xl p-4 hover:bg-white/15 transition-all duration-300">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-shield-alt text-white text-xl"></i>
                </div>
                <div>
                    <div class="stat-number text-2xl font-bold transform translate-y-4 opacity-0 transition-all duration-700" style="transition-delay: 1200ms;">
                        ISO 27001
                    </div>
                    <div class="text-primary-200 text-sm">Security Certification</div>
                </div>
            </div>

            <!-- Awards -->
            <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-xl p-4 hover:bg-white/15 transition-all duration-300">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-trophy text-white text-xl"></i>
                </div>
                <div>
                    <div class="stat-number text-2xl font-bold transform translate-y-4 opacity-0 transition-all duration-700" style="transition-delay: 1400ms;">
                        8+ Awards
                    </div>
                    <div class="text-primary-200 text-sm">Industry Recognition</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Pure JavaScript Intersection Observer for stats animation
        document.addEventListener('DOMContentLoaded', function() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('translate-y-4', 'opacity-0');
                        entry.target.classList.add('translate-y-0', 'opacity-100');
                    }
                });
            }, {
                threshold: 0.5,
                rootMargin: '0px 0px -50px 0px'
            });

            statNumbers.forEach(stat => {
                observer.observe(stat);
            });
        });
    </script>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Hear from our satisfied customers about their experience with our logistics solutions
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-500 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-600 mb-6 leading-relaxed">
                    "Given my past experiences with other logistics companies, I can say without exception that the services provided by {{$settings->site_name}} greatly exceed industry standards."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        MP
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Monique Pete</div>
                        <div class="text-sm text-gray-500">Logistics Manager, Martrax Inc.</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-500 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-600 mb-6 leading-relaxed">
                    "More than once, {{$settings->site_name}} has 'saved the day', delivering our cargo on time with short notice. They have won my gratitude and loyalty with their 'can do' approach."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        SA
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Steve Anderson</div>
                        <div class="text-sm text-gray-500">President/Owner, Duplication Factory</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-500 hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <blockquote class="text-gray-600 mb-6 leading-relaxed">
                    "I am very pleased with the service provided by {{$settings->site_name}}. They find good carriers and use them regularly so we get a high level of service. Their communication is outstanding."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        CB
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Cathy Beckman</div>
                        <div class="text-sm text-gray-500">Logistics Team, Oxea Chemicals</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Trusted Partners</h2>
            <p class="text-gray-600">Working with industry leaders to provide the best logistics solutions</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center opacity-60 hover:opacity-100 transition-opacity duration-300">
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-01.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-02.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-03.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-04.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="flex justify-center">
                <img src="temp/custom/images/content/partner-05.png" alt="Partner Logo" class="h-12 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Ready to Deliver with Confidence?
            </h2>
            <p class="text-xl text-primary-100 mb-8 leading-relaxed">
                Get started with our professional logistics services today. Contact us for a free quote and experience the difference.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="contact" class="bg-white text-primary-600 px-8 py-4 rounded-lg hover:bg-gray-100 transition-all duration-300 font-semibold text-lg shadow-lg">
                    Get Free Quote
                </a>
                <a href="order" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg hover:bg-white hover:text-primary-600 transition-all duration-300 font-semibold text-lg">
                    Track Shipment
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
