<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-primary-700 to-primary-800 py-24 md:py-32">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.2\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 animate-slide-up">Track & Trace Your Shipment</h1>
            <p class="text-xl text-primary-100 max-w-2xl mx-auto animate-slide-up" style="animation-delay: 0.1s">
                Real-time tracking for your packages, delivered with precision and care
            </p>
            
            <!-- Breadcrumbs -->
            <nav class="mt-8 flex justify-center" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm text-primary-200">
                    <li>
                        <a href="/" class="hover:text-white transition-colors">Home</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-4 w-4 text-primary-300 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white font-medium">Track & Trace Shipment</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="text-white fill-current">
            <path d="M0,96L80,80C160,64,320,32,480,32C640,32,800,64,960,69.3C1120,75,1280,53,1360,42.7L1440,32L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Tracking Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Tracking Form -->
            <div class="lg:col-span-5 order-2 lg:order-1">
                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
                    <div class="text-center lg:text-left mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Track Your Shipment</h2>
                        <p class="text-gray-600">
                            Here's the fastest way to check the status of your shipment. No need to call Customer Service – our online results give you real-time, detailed progress as your shipment speeds through the <strong class="text-primary-600"><?php echo e($settings->site_name); ?></strong> network.
                        </p>
                    </div>

                    <?php if(Session::has('error')): ?>
                    <div class="bg-red-50 text-red-700 p-4 rounded-lg mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span><strong>Error!</strong> You have entered an incorrect Tracking Number.</span>
                    </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="<?php echo e(route('trackingresult')); ?>" class="space-y-6" x-data="{ trackingNumber: '' }">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label for="trackingNumber" class="block text-sm font-medium text-gray-700 mb-2">Tracking Number</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-barcode text-gray-400"></i>
                                </div>
                                <input 
                                    required 
                                    type="text" 
                                    name="trackingnumber" 
                                    id="trackingNumber"
                                    x-model="trackingNumber"
                                    class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-gray-900"
                                    placeholder="Enter your tracking number"
                                >
                                <input value="cid" type="hidden" name="dropdown">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <button type="button" class="text-gray-400 hover:text-gray-500" @click="trackingNumber = ''">
                                        <span class="sr-only">Clear</span>
                                        <svg x-show="trackingNumber.length > 0" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Track Shipment
                        </button>
                    </form>

                    <!-- Tracking Tips -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Tracking Tips</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-primary-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Your tracking number can be found on your shipping confirmation email</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-primary-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Tracking numbers typically contain 10-15 characters</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-primary-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Updates are available 24/7 and reflect real-time status</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Illustration -->
            <div class="lg:col-span-7 order-1 lg:order-2 flex justify-center lg:justify-end">
                <div class="relative">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-primary-100 rounded-full opacity-70"></div>
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-primary-50 rounded-full opacity-70"></div>
                    <img src="temp/custom/images/tracking.jpg" alt="Package Tracking" class="relative z-10 rounded-xl shadow-lg max-w-full lg:max-w-lg xl:max-w-xl">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold tracking-wider uppercase text-sm">Tracking Features</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Real-Time Tracking Benefits</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Monitor your shipments with precision and confidence using our advanced tracking system
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-xl p-8 shadow-md transition-all duration-300 hover:shadow-lg">
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-map-marker-alt text-primary-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Real-Time Updates</h3>
                <p class="text-gray-600">
                    Stay informed with accurate, up-to-the-minute information about your shipment's location and status throughout its journey.
                </p>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-white rounded-xl p-8 shadow-md transition-all duration-300 hover:shadow-lg">
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-calendar-alt text-primary-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Estimated Delivery</h3>
                <p class="text-gray-600">
                    Get precise delivery time estimates that help you plan and prepare for your shipment's arrival with confidence.
                </p>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-white rounded-xl p-8 shadow-md transition-all duration-300 hover:shadow-lg">
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-history text-primary-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Shipment History</h3>
                <p class="text-gray-600">
                    Access a detailed timeline of your package's journey, including all transit points and handling activities along the route.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold tracking-wider uppercase text-sm">Help Center</span>
            <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600">
                Find answers to common tracking and shipping questions
            </p>
        </div>
        
        <div class="space-y-4" x-data="{active: null}">
            <!-- FAQ Item 1 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    class="flex items-center justify-between w-full px-6 py-4 text-lg font-medium text-left text-gray-900 bg-white hover:bg-gray-50 transition-colors" 
                    @click="active = active === 1 ? null : 1"
                    aria-expanded="false"
                >
                    <span>What information do I need to track my package?</span>
                    <svg class="w-5 h-5 text-gray-500" :class="{'transform rotate-180': active === 1}" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="px-6 py-4 bg-gray-50" x-show="active === 1" x-collapse>
                    <p class="text-gray-600">
                        You only need your tracking number to track your shipment. The tracking number is a unique identifier provided to you when you ship a package with us. You can find this number on your shipping receipt, confirmation email, or the shipping label.
                    </p>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    class="flex items-center justify-between w-full px-6 py-4 text-lg font-medium text-left text-gray-900 bg-white hover:bg-gray-50 transition-colors" 
                    @click="active = active === 2 ? null : 2"
                    aria-expanded="false"
                >
                    <span>How often is my tracking information updated?</span>
                    <svg class="w-5 h-5 text-gray-500" :class="{'transform rotate-180': active === 2}" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="px-6 py-4 bg-gray-50" x-show="active === 2" x-collapse>
                    <p class="text-gray-600">
                        Our tracking system provides real-time updates whenever your package is scanned at various checkpoints throughout its journey. Typically, you'll see updates when your package is picked up, arrives at sorting facilities, departs for delivery, and when it's delivered.
                    </p>
                </div>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    class="flex items-center justify-between w-full px-6 py-4 text-lg font-medium text-left text-gray-900 bg-white hover:bg-gray-50 transition-colors" 
                    @click="active = active === 3 ? null : 3"
                    aria-expanded="false"
                >
                    <span>What should I do if my tracking isn't working?</span>
                    <svg class="w-5 h-5 text-gray-500" :class="{'transform rotate-180': active === 3}" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="px-6 py-4 bg-gray-50" x-show="active === 3" x-collapse>
                    <p class="text-gray-600">
                        If your tracking information isn't appearing, first verify that you've entered the correct tracking number. There might be a delay between when your package is shipped and when tracking becomes active. If you've recently shipped your package, please allow 24 hours for the tracking information to appear in our system. If problems persist, please contact our customer service team for assistance.
                    </p>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    class="flex items-center justify-between w-full px-6 py-4 text-lg font-medium text-left text-gray-900 bg-white hover:bg-gray-50 transition-colors" 
                    @click="active = active === 4 ? null : 4"
                    aria-expanded="false"
                >
                    <span>Can I track multiple packages at once?</span>
                    <svg class="w-5 h-5 text-gray-500" :class="{'transform rotate-180': active === 4}" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="px-6 py-4 bg-gray-50" x-show="active === 4" x-collapse>
                    <p class="text-gray-600">
                        Currently, our online tracking system allows you to track one package at a time. If you need to track multiple shipments, you'll need to enter each tracking number separately. For business customers with high-volume shipping needs, please contact our business solutions team to discuss our bulk tracking options.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-6">Need Additional Help With Your Shipment?</h2>
                <p class="text-xl text-primary-100 mb-8">
                    Our customer service team is available to assist you with any questions or concerns about your shipment.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="contact" class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg text-base font-medium bg-white text-primary-700 hover:bg-gray-100 transition-colors">
                        <i class="fas fa-envelope mr-2"></i>
                        Contact Support
                    </a>
                    <a href="tel:+123456789" class="inline-flex items-center px-6 py-3 border border-white rounded-lg text-base font-medium text-white hover:bg-primary-700 transition-colors">
                        <i class="fas fa-phone-alt mr-2"></i>
                        Call Us
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <img src="temp/custom/images/customer-service.svg" alt="Customer Support" class="max-w-sm mx-auto">
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/losideko/shypdirect.elitemaxpro.click/resources/views/home/track-order.blade.php ENDPATH**/ ?>