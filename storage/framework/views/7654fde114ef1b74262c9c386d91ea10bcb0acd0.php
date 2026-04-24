<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>

<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-[#800020]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Track Your Delivery</h1>
            <p class="text-lg text-white/80 max-w-2xl">
                Real time tracking for your bike or package delivery
            </p>
            <div class="flex items-center gap-2 text-sm text-white/70 mt-6">
                <a href="/" class="hover:text-[#FFD600] transition-colors">Home</a>
                <i class="fas fa-angle-right text-xs"></i>
                <span class="text-white">Track Delivery</span>
            </div>
        </div>
    </div>
</section>

<!-- Tracking Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Tracking Form -->
            <div>
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <div class="mb-6">
                        <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                            <i class="fas fa-map-marker-alt mr-1"></i> Real Time
                        </span>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Track Your Delivery</h2>
                        <p class="text-gray-600 text-sm">
                            Enter your tracking ID to see the current status and location of your delivery.
                        </p>
                    </div>

                    <?php if(Session::has('error')): ?>
                    <div class="bg-red-50 text-red-700 p-4 rounded-xl mb-6 flex items-center gap-2">
                        <i class="fas fa-exclamation-circle"></i>
                        <span class="text-sm">Invalid tracking ID. Please try again.</span>
                    </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="<?php echo e(route('trackingresult')); ?>" class="space-y-5">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tracking ID</label>
                            <div class="relative">
                                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                                <input 
                                    required 
                                    type="text" 
                                    name="trackingnumber" 
                                    class="block w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#800020] focus:border-transparent text-gray-900 text-sm"
                                    placeholder="e.g., RYD-123456789"
                                >
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full flex justify-center items-center gap-2 px-6 py-3 bg-[#800020] text-white rounded-full font-semibold text-sm hover:bg-[#6b001a] transition-all duration-300 shadow-md hover:shadow-lg">
                            <i class="fas fa-location-dot"></i>
                            Track Delivery
                        </button>
                    </form>

                    <div class="mt-6 pt-5 border-t border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">Quick Tips</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-[#800020] text-xs mt-0.5"></i>
                                <span>Find your tracking ID in your confirmation email</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-[#800020] text-xs mt-0.5"></i>
                                <span>Tracking updates are available 24/7</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-[#800020] text-xs mt-0.5"></i>
                                <span>Contact support if you need assistance</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Illustration -->
            <div class="flex justify-center">
                <div class="relative">
                    <img src="temp/custom/images/tracking.jpg" alt="Delivery Tracking" class="relative z-10 rounded-2xl shadow-lg max-w-full">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-star mr-1"></i> Why Track With Us
            </span>
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Tracking Features</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Know where your delivery is at every step
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-[#800020] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Live Location</h3>
                <p class="text-gray-600 text-sm">See exactly where your delivery is in real time</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-[#800020] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-clock text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">ETA Updates</h3>
                <p class="text-gray-600 text-sm">Get accurate estimated arrival times</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-[#800020] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-history text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Full History</h3>
                <p class="text-gray-600 text-sm">View complete delivery journey timeline</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-question-circle mr-1"></i> Help Center
            </span>
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h2>
            <p class="text-gray-600">
                Everything you need to know about tracking
            </p>
        </div>
        
        <div class="space-y-3" x-data="{active: null}">
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button 
                    class="flex items-center justify-between w-full px-5 py-3 text-left text-gray-900 bg-white hover:bg-gray-50 transition-colors"
                    @click="active = active === 1 ? null : 1"
                >
                    <span class="font-medium">What do I need to track my delivery?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform" :class="{'rotate-180': active === 1}"></i>
                </button>
                <div class="px-5 py-3 bg-gray-50" x-show="active === 1" x-collapse>
                    <p class="text-gray-600 text-sm">You only need your tracking ID. You'll find it in your confirmation email or SMS.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button 
                    class="flex items-center justify-between w-full px-5 py-3 text-left text-gray-900 bg-white hover:bg-gray-50 transition-colors"
                    @click="active = active === 2 ? null : 2"
                >
                    <span class="font-medium">How often is tracking updated?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform" :class="{'rotate-180': active === 2}"></i>
                </button>
                <div class="px-5 py-3 bg-gray-50" x-show="active === 2" x-collapse>
                    <p class="text-gray-600 text-sm">Tracking updates happen in real time whenever your delivery is scanned at checkpoints.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button 
                    class="flex items-center justify-between w-full px-5 py-3 text-left text-gray-900 bg-white hover:bg-gray-50 transition-colors"
                    @click="active = active === 3 ? null : 3"
                >
                    <span class="font-medium">What if my tracking isn't working?</span>
                    <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform" :class="{'rotate-180': active === 3}"></i>
                </button>
                <div class="px-5 py-3 bg-gray-50" x-show="active === 3" x-collapse>
                    <p class="text-gray-600 text-sm">Double check your tracking ID. If issues persist, contact our support team for help.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-[#800020]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl font-bold text-white mb-4">Need Help?</h2>
            <p class="text-white/80 mb-6">Our support team is ready to assist you</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="contact" class="inline-flex items-center justify-center gap-2 bg-[#FFD600] text-[#800020] px-8 py-3 rounded-full hover:bg-[#e6c200] transition-all duration-300 font-bold shadow-lg">
                    <i class="fas fa-envelope"></i> Contact Support
                </a>
                <a href="tel:+2348000000000" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-[#800020] transition-all duration-300 font-bold">
                    <i class="fas fa-phone-alt"></i> Call Us
                </a>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/track-order.blade.php ENDPATH**/ ?>