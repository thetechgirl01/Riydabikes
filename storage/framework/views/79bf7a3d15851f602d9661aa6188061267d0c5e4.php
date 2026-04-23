<?php $__env->startSection('title', $settings->site_title); ?>

<?php $content = app('App\Http\Controllers\FrontController'); ?>

<?php $__env->startSection('content'); ?>

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
            <?php if(Session::has('error')): ?>
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
            <?php endif; ?>
            
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Track Your Delivery in Real Time</h2>
                <p class="text-gray-600 text-lg">Got a delivery on the way? Enter your unique tracking ID below and see exactly where your package is right now.</p>
            </div>
            
            <form method="POST" action="<?php echo e(route('trackingresult')); ?>" class="max-w-2xl mx-auto">
                <?php echo csrf_field(); ?>
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
<?php if(isset($latestBikes) && $latestBikes->count() > 0): ?>
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-motorcycle mr-1"></i> Shop & Hire
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Latest Bikes</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Buy outright or hire by the day — quality bikes ready for the road.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $latestBikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col">
                    <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="block relative h-56 overflow-hidden bg-gray-100">
                        <img src="<?php echo e($bike->image_url); ?>" alt="<?php echo e($bike->name); ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <?php if($bike->available_for_hire): ?>
                            <span class="absolute top-3 right-3 inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full bg-green-500 text-white shadow">
                                <span class="w-1.5 h-1.5 rounded-full bg-white mr-1.5 animate-pulse"></span>
                                For Hire
                            </span>
                        <?php endif; ?>
                    </a>

                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">
                            <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="hover:text-primary-600 transition-colors">
                                <?php echo e($bike->name); ?>

                            </a>
                        </h3>
                        <?php if($bike->brand): ?>
                            <p class="text-sm text-gray-500 mb-3"><?php echo e($bike->brand); ?></p>
                        <?php endif; ?>

                        <div class="mt-auto">
                            <div class="flex items-baseline justify-between mb-4">
                                <div>
                                    <p class="text-2xl font-bold text-gray-900">₦<?php echo e(number_format($bike->price, 0)); ?></p>
                                    <?php if($bike->available_for_hire): ?>
                                        <p class="text-xs text-gray-500">or ₦<?php echo e(number_format($bike->daily_rate, 0)); ?> / day</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>"
                               class="w-full inline-flex justify-center items-center px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm font-medium transition-colors">
                                View Details
                                <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('home.bikes.index')); ?>"
               class="inline-flex items-center px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-semibold text-lg shadow-lg hover:shadow-xl transition-all">
                Browse All Bikes
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Services Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive shipping and logistics solutions tailored to your business needs
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Air Freight -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/services/service1.jpg');">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    <div class="absolute top-4 left-4">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-plane text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Air Freight</h3>
                    <p class="text-gray-600 mb-4">
                        <?php echo e($settings->site_name); ?>, as an IATA-endorsed air forwarder, offers professional and reliable global air-freight solutions.
                    </p>
                    <a href="services" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Sea/Ocean Freight -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/services/service2.jpg');">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    <div class="absolute top-4 left-4">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-ship text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Sea/Ocean Freight</h3>
                    <p class="text-gray-600 mb-4">
                        International ocean freight shipping import and export services. FCL, LCL shipments, port to port or door to door.
                    </p>
                    <a href="services" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Road Transportation -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/services/service3.jpg');">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    <div class="absolute top-4 left-4">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-truck text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Road Transportation</h3>
                    <p class="text-gray-600 mb-4">
                        Highly experienced and dependable, <?php echo e($settings->site_name); ?> is a trusted partner in domestic road transportation.
                    </p>
                    <a href="services" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Diplomatic Services -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/services/service4.jpg');">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    <div class="absolute top-4 left-4">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Diplomatic Bag & Secure Logistics</h3>
                    <p class="text-gray-600 mb-4">
                        Global secure mail and equipment delivery service with complete confidence and security.
                    </p>
                    <a href="diplomatic" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Warehousing -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/services/service5.jpg');">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    <div class="absolute top-4 left-4">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-warehouse text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Warehousing</h3>
                    <p class="text-gray-600 mb-4">
                        Shared and dedicated warehousing solutions supported by state-of-the-art technology and warehouse services.
                    </p>
                    <a href="services" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Packaging & Storage -->
            <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-64 bg-cover bg-center" style="background-image: url('temp/custom/images/services/service6.jpg');">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    <div class="absolute top-4 left-4">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-box text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Packaging & Storage</h3>
                    <p class="text-gray-600 mb-4">
                        Professional packaging and storage solutions for raw materials, electronics, and finished goods with cargo insurance.
                    </p>
                    <a href="services" class="text-primary-600 hover:text-primary-700 font-medium inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
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
                    "Given my past experiences with other logistics companies, I can say without exception that the services provided by <?php echo e($settings->site_name); ?> greatly exceed industry standards."
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
                    "More than once, <?php echo e($settings->site_name); ?> has 'saved the day', delivering our cargo on time with short notice. They have won my gratitude and loyalty with their 'can do' approach."
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
                    "I am very pleased with the service provided by <?php echo e($settings->site_name); ?>. They find good carriers and use them regularly so we get a high level of service. Their communication is outstanding."
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/index.blade.php ENDPATH**/ ?>