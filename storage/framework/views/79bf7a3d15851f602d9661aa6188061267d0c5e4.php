<?php $__env->startSection('title', $settings->site_title); ?>

<?php $content = app('App\Http\Controllers\FrontController'); ?>

<?php $__env->startSection('content'); ?>

<!-- NEW HERO SECTION: Fresh statement layout with original background images preserved -->
<section class="relative bg-white overflow-hidden py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-5 sm:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <!-- left side message with rotating content -->
            <div class="order-2 lg:order-1" x-data="{ currentText: 0, texts: ['book', 'rent', 'buy'] }" x-init="setInterval(() => { currentText = (currentText + 1) % texts.length }, 5000)">
                <div class="inline-flex items-center gap-2 bg-[#800020]/5 rounded-full px-4 py-1.5 text-[#800020] text-sm font-medium mb-5">
                    <i class="fas fa-bolt text-[#FFD600] drop-shadow-sm"></i> <span>Best Bike mobility in Nigeria</span>
                </div>
                
                <!-- Rotating Headline - Increased height to prevent button overlap -->
                <div class="relative h-40 sm:h-44 md:h-48 lg:h-52">
                    <!-- Book Delivery Text -->
                    <div x-show="currentText === 0" x-cloak x-transition:enter="transition-all duration-700 ease-out" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition-all duration-500 ease-in" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-8" class="absolute inset-0">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-gray-900">
                            Fast & Reliable<br> 
                            <span class="text-[#800020] border-b-4 border-[#FFD600] inline-block">Book Delivery</span>
                        </h1>
                        <p class="text-gray-600 text-lg mt-4 max-w-lg leading-relaxed">
                            Get your packages delivered fast and reliably with our dedicated bike delivery fleet. Same-day delivery across major cities in Nigeria.
                        </p>
                    </div>

                    <!-- Rent Bikes Text -->
                    <div x-show="currentText === 1" x-cloak x-transition:enter="transition-all duration-700 ease-out" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition-all duration-500 ease-in" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-8" class="absolute inset-0">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-gray-900">
                            Ride Smart,<br> 
                            <span class="text-[#800020] border-b-4 border-[#FFD600] inline-block">Rent a Bike</span>
                        </h1>
                        <p class="text-gray-600 text-lg mt-4 max-w-lg leading-relaxed">
                            No stress. No long-term commitment. Choose from our premium fleet for daily hire or weekly flex. Flexible plans from ₦2,500/day.
                        </p>
                    </div>

                    <!-- Buy Bikes Text -->
                    <div x-show="currentText === 2" x-cloak x-transition:enter="transition-all duration-700 ease-out" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition-all duration-500 ease-in" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-8" class="absolute inset-0">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-gray-900">
                            Own Your Ride,<br> 
                            <span class="text-[#800020] border-b-4 border-[#FFD600] inline-block">Buy a Bike</span>
                        </h1>
                        <p class="text-gray-600 text-lg mt-4 max-w-lg leading-relaxed">
                            Find your perfect bike with our trusted marketplace. Quality new and used bikes at transparent prices. Buy outright with secure payment.
                        </p>
                    </div>
                </div>

                <!-- Two Buttons Only - Added margin-top to push down -->
                <div class="flex flex-wrap gap-4 mt-12">
                    <a href="<?php echo e(route('home.shipments.create')); ?>" class="bg-[#800020] hover:bg-[#6b001a] text-white px-7 py-3.5 rounded-full font-bold text-base shadow-md transition flex items-center gap-2 btn-press">
                        <i class="fas fa-truck-fast"></i> Book Delivery
                    </a>
                    <a href="<?php echo e(route('home.bikes.index')); ?>" class="border-2 border-gray-300 hover:border-[#800020] hover:text-[#800020] px-7 py-3.5 rounded-full font-semibold text-gray-700 transition flex items-center gap-2 btn-press">
                        <i class="fas fa-motorcycle"></i> Rent / Buy a Bike
                    </a>
                </div>

                <!-- micro stats -->
                <div class="flex gap-6 mt-10 text-sm text-gray-500">
                    <div><span class="font-black text-gray-800 text-xl">20+</span> models</div>
                    <div><span class="font-black text-gray-800 text-xl">24h</span> support</div>
                    <div><span class="font-black text-gray-800 text-xl">100%</span> inspected</div>
                </div>
            </div>

            <!-- right visual: original slider images as background/carousel preserved -->
            <div class="order-1 lg:order-2 flex justify-center relative" x-data="{ currentSlide: 0, slides: 3 }" x-init="setInterval(() => { currentSlide = (currentSlide + 1) % slides }, 5000)">
                <div class="relative w-full max-w-md mx-auto">
                    <div class="bg-[#F9F9F9] rounded-3xl shadow-xl overflow-hidden border border-gray-100 relative h-80 md:h-96">
                        <!-- Slide 1 -->
                        <div x-show="currentSlide === 0" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center" style="background-image: url('temp/custom/images/slider/ryd2.jpeg');"></div>
                        <!-- Slide 2 -->
                        <div x-show="currentSlide === 1" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center" style="background-image: url('temp/custom/images/slider/ryd1.jpeg');"></div>
                        <!-- Slide 3 -->
                        <div x-show="currentSlide === 2" x-cloak x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center" style="background-image: url('temp/custom/images/slider/home-main.jpg');"></div>
                    </div>
                    <div class="absolute -bottom-5 -right-3 bg-white rounded-2xl shadow-lg p-3 flex items-center gap-2 border border-gray-100">
                        <div class="bg-[#FFD600] w-8 h-8 rounded-full flex items-center justify-center"><i class="fas fa-motorcycle text-[#800020] text-sm"></i></div>
                        <div><div class="text-xs font-bold">Quick delivery</div><div class="text-[10px] text-gray-500">same-day in Lagos</div></div>
                    </div>
                    <!-- Slide Indicators -->
                    <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-1 z-20">
                        <template x-for="i in slides" :key="i">
                            <button @click="currentSlide = i - 1" :class="currentSlide === (i - 1) ? 'bg-[#800020] w-4' : 'bg-white bg-opacity-50 w-2'" class="h-1.5 rounded-full transition-all duration-300"></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NEW FLOW ELEMENT: QUICK ACTION CARD (track & rent dual lane) replaces big track box -->
<div class="max-w-6xl mx-auto px-5 sm:px-8 -mt-4 relative z-10">
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-5 flex flex-wrap md:flex-nowrap gap-5 items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="bg-[#800020]/10 w-12 h-12 rounded-full flex items-center justify-center"><i class="fas fa-box-open text-[#800020] text-xl"></i></div>
            <div><h3 class="font-bold text-gray-800">Track your delivery</h3><p class="text-xs text-gray-500">Enter your tracking ID</p></div>
        </div>
        <div class="flex-1 w-full min-w-[200px]">
            <form method="POST" action="<?php echo e(route('trackingresult')); ?>" class="flex flex-col sm:flex-row gap-2">
                <?php echo csrf_field(); ?>
                <input type="text" name="trackingnumber" placeholder="e.g., RI-7952-FE0365QF" class="border border-gray-300 rounded-full py-2.5 px-5 text-sm w-full focus:border-[#800020] focus:ring-1 focus:ring-[#800020] transition" required>
                <button type="submit" class="bg-[#800020] hover:bg-[#6b001a] text-white px-5 py-2 rounded-full text-sm font-semibold transition flex items-center justify-center gap-1"><i class="fas fa-location-dot"></i> Track now</button>
            </form>
        </div>
        <div class="text-right"><span class="text-xs text-gray-400"><i class="fas fa-shield-alt"></i> Secure real-time</span></div>
    </div>
</div>

<!-- Bikes Showcase Section -->
<?php if(isset($latestBikes) && $latestBikes->count() > 0): ?>
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
                    <?php $__currentLoopData = $latestBikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="w-[280px] sm:w-[320px] lg:w-[350px] flex-shrink-0">
                            <div class="group/card bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 ease-out">
                                <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="block relative overflow-hidden bg-white p-6">
                                    <div class="aspect-w-4 aspect-h-3 bg-white">
                                        <img src="<?php echo e($bike->image_url); ?>" alt="<?php echo e($bike->name); ?>" class="w-full h-56 object-contain transition-transform duration-500 group-hover/card:scale-105">
                                    </div>
                                    <?php if($bike->available_for_hire): ?>
                                        <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-[#800020] text-white shadow-md">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#FFD600] mr-1.5 animate-pulse"></span>
                                            Available For Hire
                                        </span>
                                    <?php else: ?>
                                        <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gray-600 text-white shadow-md">For Sale Only</span>
                                    <?php endif; ?>
                                </a>

                                <div class="p-5 flex-1 flex flex-col">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-1">
                                                <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="hover:text-[#800020] transition-colors duration-200">
                                                    <?php echo e($bike->name); ?>

                                                </a>
                                            </h3>
                                            <?php if($bike->brand): ?>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium"><?php echo e($bike->brand); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="mt-4 space-y-1">
                                        <p class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">₦<?php echo e(number_format($bike->price, 0)); ?></p>
                                        <?php if($bike->available_for_hire): ?>
                                            <p class="text-base font-semibold text-[#800020] dark:text-[#FFD600]">or ₦<?php echo e(number_format($bike->daily_rate, 0)); ?> <span class="text-sm font-normal text-gray-500">/ day</span></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="mt-5 pt-4 border-t border-gray-100 dark:border-gray-700">
                                        <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>"
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('home.bikes.index')); ?>"
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
<?php endif; ?>

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
    <!-- Bike Rentals -->
    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="p-5 flex flex-row gap-5 items-start">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                    <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service3.jpg');"></div>
                </div>
            </div>
            <div class="flex-1 flex flex-col">
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Bike Rentals</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                    Flexible daily, weekly, and monthly rental plans. Choose from our premium fleet of well-maintained bikes for any occasion.
                </p>
                <a href="<?php echo e(route('home.bikes.index')); ?>" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                    Rent Now 
                    <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Bike Sales -->
    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="p-5 flex flex-row gap-5 items-start">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                    <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service4.jpg');"></div>
                </div>
            </div>
            <div class="flex-1 flex flex-col">
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Buy & Sell Bikes</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                    Trusted marketplace to buy quality new and used bikes or sell your own. Transparent pricing and secure transactions.
                </p>
                <a href="<?php echo e(route('home.bikes.index')); ?>" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                    Browse Bikes 
                    <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Bike Delivery Service -->
    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="p-5 flex flex-row gap-5 items-start">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                    <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service5.jpg');"></div>
                </div>
            </div>
            <div class="flex-1 flex flex-col">
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Bike Delivery Service</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                    Fast and reliable bike delivery across the city. Get your rented or purchased bike delivered to your doorstep same-day.
                </p>
                <a href="<?php echo e(route('home.shipments.create')); ?>" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                    Request Delivery 
                    <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Maintenance & Repair -->
    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="p-5 flex flex-row gap-5 items-start">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                    <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service6.jpg');"></div>
                </div>
            </div>
            <div class="flex-1 flex flex-col">
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Maintenance & Repair</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                    Expert bike servicing, repairs, and spare parts. Keep your ride in top condition with our certified mechanics.
                </p>
                <a href="contact" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                    Book Service 
                    <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Safety Gear & Accessories -->
    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="p-5 flex flex-row gap-5 items-start">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                    <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service1.jpg');"></div>
                </div>
            </div>
            <div class="flex-1 flex flex-col">
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Safety Gear & Accessories</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                    Premium helmets, protective gear, and bike accessories available. Ride safe with our certified safety equipment.
                </p>
                <a href="contact" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                    Shop Gear 
                    <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Group & Corporate Rentals -->
    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
        <div class="p-5 flex flex-row gap-5 items-start">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 bg-[#800020]/10 rounded-2xl flex items-center justify-center overflow-hidden group-hover:bg-[#800020] transition-all duration-300">
                    <div class="w-16 h-16 bg-cover bg-center rounded-xl" style="background-image: url('temp/custom/images/services/service2.jpg');"></div>
                </div>
            </div>
            <div class="flex-1 flex flex-col">
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#800020] transition-colors">Group & Corporate Rentals</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                    Special fleet discounts for groups, events, and corporate clients. Customized rental solutions for your organization.
                </p>
                <a href="contact" class="inline-flex items-center text-[#800020] hover:text-[#6b001a] font-semibold text-sm group/link mt-1">
                    Contact Us 
                    <i class="fas fa-arrow-right ml-1 text-xs transition-transform group-hover/link:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="relative py-20 bg-[#800020] overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('temp/custom/images/slider/trucks.jpg');"></div>
        <div class="absolute inset-0 bg-[#800020]/90"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#FFD600]/20 text-[#FFD600] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-star mr-1"></i> Why Ride With Us
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Why Choose RydaBikes</h2>
            <p class="text-xl text-white/80 max-w-2xl mx-auto">
                Trusted by riders across Nigeria for quality bikes and exceptional service
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Real-Time Tracking -->
            <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white transition-all duration-300 border border-white/20 hover:border-[#FFD600]">
                <div class="flex flex-col items-start text-left">
                    <div class="w-14 h-14 bg-[#FFD600] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#800020] group-hover:scale-110 transition-all duration-300 shadow-md">
                        <i class="fas fa-map-marker-alt text-[#800020] text-xl group-hover:text-[#FFD600] transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-gray-900 mb-3 transition-colors">Real-Time Tracking</h3>
                    <p class="text-white/70 group-hover:text-gray-600 leading-relaxed transition-colors">
                        Get live updates on your delivery or rental status. Know exactly where your bike is at every step.
                    </p>
                </div>
            </div>

            <!-- Premium Quality Bikes -->
            <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white transition-all duration-300 border border-white/20 hover:border-[#FFD600]">
                <div class="flex flex-col items-start text-left">
                    <div class="w-14 h-14 bg-[#FFD600] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#800020] group-hover:scale-110 transition-all duration-300 shadow-md">
                        <i class="fas fa-motorcycle text-[#800020] text-xl group-hover:text-[#FFD600] transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-gray-900 mb-3 transition-colors">Premium Quality Bikes</h3>
                    <p class="text-white/70 group-hover:text-gray-600 leading-relaxed transition-colors">
                        Every bike in our fleet is carefully inspected, maintained, and ready for the road — safe and reliable.
                    </p>
                </div>
            </div>

            <!-- Flexible Rental Plans -->
            <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white transition-all duration-300 border border-white/20 hover:border-[#FFD600]">
                <div class="flex flex-col items-start text-left">
                    <div class="w-14 h-14 bg-[#FFD600] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#800020] group-hover:scale-110 transition-all duration-300 shadow-md">
                        <i class="fas fa-calendar-alt text-[#800020] text-xl group-hover:text-[#FFD600] transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-gray-900 mb-3 transition-colors">Flexible Rental Plans</h3>
                    <p class="text-white/70 group-hover:text-gray-600 leading-relaxed transition-colors">
                        Daily, weekly, or monthly rentals. Choose what works for you with transparent pricing and no hidden fees.
                    </p>
                </div>
            </div>

            <!-- Lightning Fast Delivery -->
            <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white transition-all duration-300 border border-white/20 hover:border-[#FFD600]">
                <div class="flex flex-col items-start text-left">
                    <div class="w-14 h-14 bg-[#FFD600] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#800020] group-hover:scale-110 transition-all duration-300 shadow-md">
                        <i class="fas fa-truck-fast text-[#800020] text-xl group-hover:text-[#FFD600] transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-gray-900 mb-3 transition-colors">Lightning Fast Delivery</h3>
                    <p class="text-white/70 group-hover:text-gray-600 leading-relaxed transition-colors">
                        Get your purchased or rented bike delivered to your doorstep. Same-day delivery available in major cities.
                    </p>
                </div>
            </div>

            <!-- Secure & Safe -->
            <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white transition-all duration-300 border border-white/20 hover:border-[#FFD600]">
                <div class="flex flex-col items-start text-left">
                    <div class="w-14 h-14 bg-[#FFD600] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#800020] group-hover:scale-110 transition-all duration-300 shadow-md">
                        <i class="fas fa-shield-alt text-[#800020] text-xl group-hover:text-[#FFD600] transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-gray-900 mb-3 transition-colors">Secure & Safe</h3>
                    <p class="text-white/70 group-hover:text-gray-600 leading-relaxed transition-colors">
                        Your payments and personal information are protected. Every transaction is encrypted and secure.
                    </p>
                </div>
            </div>

            <!-- 24/7 Customer Support -->
            <div class="group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white transition-all duration-300 border border-white/20 hover:border-[#FFD600]">
                <div class="flex flex-col items-start text-left">
                    <div class="w-14 h-14 bg-[#FFD600] rounded-xl flex items-center justify-center mb-5 group-hover:bg-[#800020] group-hover:scale-110 transition-all duration-300 shadow-md">
                        <i class="fas fa-headset text-[#800020] text-xl group-hover:text-[#FFD600] transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white group-hover:text-gray-900 mb-3 transition-colors">24/7 Customer Support</h3>
                    <p class="text-white/70 group-hover:text-gray-600 leading-relaxed transition-colors">
                        Got questions? Our dedicated support team is available round the clock to assist you with anything.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-heart mr-1"></i> Riders Love Us
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Riders Say</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Real stories from customers who've experienced the RydaBikes difference
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Testimonial 1 -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 p-6 border border-gray-100">
                <div class="flex items-center gap-1 mb-4">
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                </div>
                <blockquote class="text-gray-600 mb-5 leading-relaxed text-sm">
                    "The bike was in perfect condition and the delivery was super fast. Renting was seamless from start to finish. I'll definitely be using RydaBikes again!"
                </blockquote>
                <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                    <div class="w-10 h-10 bg-[#800020]/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-[#800020] text-base"></i>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900 text-sm">Chidi Okonkwo</div>
                        <div class="text-xs text-gray-500">Lagos, Nigeria</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 p-6 border border-gray-100">
                <div class="flex items-center gap-1 mb-4">
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                </div>
                <blockquote class="text-gray-600 mb-5 leading-relaxed text-sm">
                    "I bought my first bike from RydaBikes and the experience was amazing. The team was super helpful and the payment process was very secure. Highly recommended!"
                </blockquote>
                <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                    <div class="w-10 h-10 bg-[#800020]/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-[#800020] text-base"></i>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900 text-sm">Adaeze Nwosu</div>
                        <div class="text-xs text-gray-500">Abuja, Nigeria</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 p-6 border border-gray-100">
                <div class="flex items-center gap-1 mb-4">
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                    <i class="fas fa-star text-[#FFD600] text-sm"></i>
                </div>
                <blockquote class="text-gray-600 mb-5 leading-relaxed text-sm">
                    "The rental process was so easy. I needed a bike for a week and RydaBikes made it happen. Great customer support and the bike was top quality. 10/10!"
                </blockquote>
                <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                    <div class="w-10 h-10 bg-[#800020]/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-[#800020] text-base"></i>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900 text-sm">Tunde Balogun</div>
                        <div class="text-xs text-gray-500">Ibadan, Nigeria</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20 bg-gradient-to-r from-[#800020] to-[#6b001a]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <span class="inline-block px-4 py-1.5 bg-[#FFD600]/20 text-[#FFD600] rounded-full text-sm font-semibold mb-5">
                <i class="fas fa-motorcycle mr-1"></i> Get on the Road
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-5">
                Ready to Ride with RiydaBikes?
            </h2>
            <p class="text-lg text-white/80 mb-8 leading-relaxed">
                Whether you want to buy, rent, or get a bike delivered — we've got you covered. Start your journey with us today.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="contact" class="inline-flex items-center justify-center gap-2 bg-[#FFD600] text-[#800020] px-8 py-3.5 rounded-full hover:bg-[#e6c200] transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="fas fa-motorcycle"></i> Rent / Buy a Bike
                </a>
                <a href="order" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-[#FFD600] text-white px-8 py-3.5 rounded-full hover:bg-[#FFD600] hover:text-[#800020] transition-all duration-300 font-bold text-lg">
                    <i class="fas fa-location-dot"></i> Track Delivery
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    /* Additional styles for new components */
    [x-cloak] {
        display: none !important;
    }
    .btn-press {
        transition: transform 0.1s ease;
    }
    .btn-press:active {
        transform: scale(0.97);
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/index.blade.php ENDPATH**/ ?>