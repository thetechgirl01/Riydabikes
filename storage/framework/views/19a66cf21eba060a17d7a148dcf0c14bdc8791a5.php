<?php $__env->startSection('title', $settings->site_title . ' - Premium Bike Rental & Delivery Services'); ?>

<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>

<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-[#800020]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Services</h1>
            <p class="text-lg text-white/80 max-w-2xl">
                Comprehensive bike rental, sales, and delivery solutions tailored to your needs
            </p>
            <div class="flex items-center gap-2 text-sm text-white/70 mt-6">
                <a href="/" class="hover:text-[#FFD600] transition-colors">Home</a>
                <i class="fas fa-angle-right text-xs"></i>
                <span class="text-white">Our Services</span>
            </div>
        </div>
    </div>
</section>

<!-- Services Introduction -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-motorcycle mr-1"></i> What We Offer
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                From bike rentals to fast deliveries and premium sales — we've got you covered
            </p>
        </div>
    </div>
</section>

<!-- Main Services Grid -->
<section class="pb-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Bike Rental -->
            <div class="group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="relative h-56 overflow-hidden bg-gray-100">
                    <img src="temp/custom/images/services/service1.jpg" alt="Bike Rental" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <div class="w-10 h-10 bg-[#800020] rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-calendar-alt text-white text-sm"></i>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Bike Rental</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Flexible rental plans — daily, weekly, or monthly. Perfect for commuting, deliveries, or leisure rides.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Daily Rental</span>
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Weekly Plans</span>
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Monthly Deals</span>
                    </div>
                    <a href="contact" class="inline-flex items-center text-[#800020] font-semibold text-sm group/link">
                        Learn More
                        <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                    </a>
                </div>
            </div>

            <!-- Fast Delivery -->
            <div class="group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="relative h-56 overflow-hidden bg-gray-100">
                    <img src="temp/custom/images/services/service2.jpg" alt="Fast Delivery" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <div class="w-10 h-10 bg-[#800020] rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-truck-fast text-white text-sm"></i>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Fast Delivery</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Quick and reliable bike delivery service across Lagos and major cities. Same-day delivery available.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Same-Day</span>
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Real-Time Tracking</span>
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Door to Door</span>
                    </div>
                    <a href="order" class="inline-flex items-center text-[#800020] font-semibold text-sm group/link">
                        Learn More
                        <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                    </a>
                </div>
            </div>

            <!-- Bike Sales -->
            <div class="group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="relative h-56 overflow-hidden bg-gray-100">
                    <img src="temp/custom/images/services/service3.jpg" alt="Bike Sales" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <div class="w-10 h-10 bg-[#800020] rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-motorcycle text-white text-sm"></i>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Bike Sales</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Buy premium quality bikes at competitive prices. Fully inspected and ready to ride.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Premium Quality</span>
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Warranty Included</span>
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Free Delivery</span>
                    </div>
                    <a href="<?php echo e(route('home.bikes.index')); ?>" class="inline-flex items-center text-[#800020] font-semibold text-sm group/link">
                        Browse Bikes
                        <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                    </a>
                </div>
            </div>

            <!-- Maintenance & Support -->
            <div class="group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="relative h-56 overflow-hidden bg-gray-100">
                    <img src="temp/custom/images/services/service4.jpg" alt="Maintenance" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <div class="w-10 h-10 bg-[#800020] rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-wrench text-white text-sm"></i>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Maintenance & Support</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        24/7 customer support and maintenance services to keep you on the road safely.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">24/7 Support</span>
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Roadside Assistance</span>
                        <span class="px-2 py-1 bg-[#800020]/10 text-[#800020] text-xs rounded-full">Free Checkups</span>
                    </div>
                    <a href="contact" class="inline-flex items-center text-[#800020] font-semibold text-sm group/link">
                        Contact Us
                        <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-star mr-1"></i> Why Choose Us
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why RydaBikes?</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We're committed to providing the best bike experience in Nigeria
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 transition-all duration-300 hover:shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-[#800020] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-check-circle text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Quality Assured</h3>
                <p class="text-gray-600 text-sm">Every bike is thoroughly inspected and maintained before rental or sale</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 transition-all duration-300 hover:shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-[#800020] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-clock text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Flexible Plans</h3>
                <p class="text-gray-600 text-sm">Daily, weekly, or monthly rentals — choose what works for you</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 transition-all duration-300 hover:shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-[#800020] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-headset text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">24/7 Support</h3>
                <p class="text-gray-600 text-sm">Our team is always available to assist you anytime, anywhere</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-[#800020]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Ride?</h2>
            <p class="text-white/80 mb-8">Get your bike today — rent, buy, or request a delivery</p>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/services.blade.php ENDPATH**/ ?>