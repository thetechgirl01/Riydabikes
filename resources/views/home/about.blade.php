@extends('layouts.base')

@section('title', 'About Us')

@inject('content', 'App\Http\Controllers\FrontController')

@section('content')

<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-[#800020]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">About RydaBikes</h1>
            <div class="flex items-center gap-2 text-sm text-white/70">
                <a href="/" class="hover:text-[#FFD600] transition-colors">Home</a>
                <i class="fas fa-angle-right text-xs"></i>
                <span class="text-white">About Us</span>
            </div>
        </div>
    </div>
</section>

<!-- Company Profile Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                        <i class="fas fa-motorcycle mr-1"></i> Our Story
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">About {{$settings->site_name}}</h2>
                    <p class="text-lg font-semibold text-[#800020] mb-6">
                        Premium bike rental, sales, and delivery service across Nigeria.
                    </p>
                </div>
                
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        {{$settings->site_name}} is Nigeria's leading platform for bike rentals, purchases, and fast delivery services. We connect riders with quality bikes for every need — whether you're commuting, delivering goods, or just enjoying the ride.
                    </p>
                    
                    <p>
                        Our mission is simple: make bikes accessible, affordable, and reliable for everyone. From daily rentals to outright purchases, we offer flexible solutions backed by exceptional customer support and a commitment to safety.
                    </p>
                    
                    <p>
                        With a growing fleet of well-maintained bikes and a network of trusted partners, we serve thousands of happy customers across Lagos, Abuja, and other major cities. Every ride with us is safe, secure, and seamless.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="contact" class="inline-flex items-center justify-center gap-2 bg-[#800020] text-white px-6 py-3 rounded-full hover:bg-[#6b001a] transition-all duration-300 font-semibold shadow-md hover:shadow-lg">
                        Get In Touch
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                    <a href="services" class="inline-flex items-center justify-center gap-2 border-2 border-[#800020] text-[#800020] px-6 py-3 rounded-full hover:bg-[#800020] hover:text-white transition-all duration-300 font-semibold">
                        Our Services
                        <i class="fas fa-motorcycle text-sm"></i>
                    </a>
                </div>
            </div>
            
            <div class="relative" x-data="{ currentImage: 0, images: 3 }" x-init="setInterval(() => { currentImage = (currentImage + 1) % images }, 4000)">
                <div class="relative h-96 rounded-2xl overflow-hidden shadow-xl">
                    <div x-show="currentImage === 0" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img src="temp/custom/images/slider/company-slide-1.jpg" alt="RydaBikes Team" class="w-full h-full object-cover">
                    </div>
                    <div x-show="currentImage === 1" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img src="temp/custom/images/slider/company-slide-2.jpg" alt="RydaBikes Fleet" class="w-full h-full object-cover">
                    </div>
                    <div x-show="currentImage === 2" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img src="temp/custom/images/slider/company-slide-3.jpg" alt="RydaBikes Delivery" class="w-full h-full object-cover">
                    </div>
                </div>
                
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <template x-for="i in images" :key="i">
                        <button @click="currentImage = i - 1" :class="currentImage === (i - 1) ? 'bg-[#800020]' : 'bg-white bg-opacity-50'" class="w-2 h-2 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision & Values -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-compass mr-1"></i> Our Foundation
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Drives Us</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Built on strong values and a clear vision for better mobility
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="group bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100">
                <div class="w-14 h-14 bg-[#800020] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#6b001a] group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-bullseye text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">
                    To connect people with quality bikes for work, delivery, and leisure — making mobility simple, affordable, and reliable for every Nigerian.
                </p>
            </div>
            
            <div class="group bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100">
                <div class="w-14 h-14 bg-[#800020] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#6b001a] group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-eye text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">
                    To become Nigeria's most trusted bike platform — known for quality, safety, and exceptional service in every ride and delivery.
                </p>
            </div>
            
            <div class="group bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100">
                <div class="w-14 h-14 bg-[#800020] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#6b001a] group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-heart text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Core Values</h3>
                <p class="text-gray-600 leading-relaxed">
                    Integrity • Reliability • Safety • Customer First • Innovation • Excellence in every delivery and rental.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-[#800020]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-[#FFD600]/20 text-[#FFD600] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-chart-line mr-1"></i> By The Numbers
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Our Impact So Far</h2>
            <p class="text-white/80 text-lg">Numbers that tell our story</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-[#FFD600] mb-2">5,000+</div>
                <div class="text-white/80 text-sm">Happy Riders</div>
            </div>
            
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-[#FFD600] mb-2">2,500+</div>
                <div class="text-white/80 text-sm">Deliveries Completed</div>
            </div>
            
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-[#FFD600] mb-2">3+</div>
                <div class="text-white/80 text-sm">Years of Service</div>
            </div>
            
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-[#FFD600] mb-2">98%</div>
                <div class="text-white/80 text-sm">Customer Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- Safety & Security Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="space-y-6">
                <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold">
                    <i class="fas fa-shield-alt mr-1"></i> Safety First
                </span>
                <h2 class="text-3xl font-bold text-gray-900">Your Safety Is Our Priority</h2>
                <p class="text-gray-600 leading-relaxed">
                    Every bike in our fleet undergoes rigorous safety checks before hitting the road. We maintain the highest standards to ensure you ride with confidence, whether you're renting, buying, or using our delivery service.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600"></i>
                        </div>
                        <span class="text-sm text-gray-700">Weekly inspections</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600"></i>
                        </div>
                        <span class="text-sm text-gray-700">Qualified mechanics</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600"></i>
                        </div>
                        <span class="text-sm text-gray-700">GPS tracking</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600"></i>
                        </div>
                        <span class="text-sm text-gray-700">24/7 roadside support</span>
                    </div>
                </div>
            </div>
            
            <div class="space-y-6">
                <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold">
                    <i class="fas fa-lock mr-1"></i> Secure Transactions
                </span>
                <h2 class="text-3xl font-bold text-gray-900">Payments You Can Trust</h2>
                <p class="text-gray-600 leading-relaxed">
                    Every payment on RydaBikes is encrypted and secure. We use industry-standard security protocols to protect your personal and financial information.
                </p>
                <div class="flex flex-wrap gap-3">
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-xs text-gray-700">SSL Encrypted</span>
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-xs text-gray-700">Fraud Protection</span>
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-xs text-gray-700">Secure Checkout</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-[#800020] to-[#6b001a]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Ride?</h2>
            <p class="text-white/80 mb-8">Join thousands of happy riders who trust RydaBikes for rentals, purchases, and deliveries.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="contact" class="inline-flex items-center justify-center gap-2 bg-[#FFD600] text-[#800020] px-8 py-3 rounded-full hover:bg-[#e6c200] transition-all duration-300 font-bold shadow-lg">
                    Rent / Buy a Bike
                    <i class="fas fa-motorcycle"></i>
                </a>
                <a href="order" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-[#800020] transition-all duration-300 font-bold">
                    Track Delivery
                    <i class="fas fa-location-dot"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection