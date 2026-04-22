<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<!-- Main Payment Container -->
<div class="min-h-screen bg-white dark:bg-gray-900" x-data="paymentHandler()">
    <!-- Hero Banner -->
    <div class="relative bg-gradient-to-r from-blue-700 to-indigo-800 dark:from-blue-800 dark:to-indigo-900">
        <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 relative z-10">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/20 backdrop-blur-sm rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span class="text-sm text-white font-medium">Secure Payment Gateway</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Complete Your Shipment Payment
                </h1>
                <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                    Pay securely via <span class="font-semibold"><?php echo e($payment_mode->name); ?></span> to clear your shipment from customs and continue delivery
                </p>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto fill-white dark:fill-gray-900">
                <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 -mt-8 relative z-20">
        <div class="space-y-4 mb-6" x-data="{ showSuccess: <?php echo e(session('success') ? 'true' : 'false'); ?>, showError: <?php echo e(session('error') ? 'true' : 'false'); ?> }">
            <!-- Custom Error Alert -->
            <div x-show="showError" x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 transform -translate-y-2" 
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform translate-y-0" 
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 class="bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 p-4 rounded-lg shadow-md">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Error</h3>
                        <div class="mt-1 text-sm text-red-700 dark:text-red-300">
                            <?php echo e(session('error')); ?>

                        </div>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button @click="showError = false" type="button" class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 dark:hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Custom Success Alert -->
            <div x-show="showSuccess" x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 transform -translate-y-2" 
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform translate-y-0" 
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 class="bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 p-4 rounded-lg shadow-md">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Success</h3>
                        <div class="mt-1 text-sm text-green-700 dark:text-green-300">
                            <?php echo e(session('success')); ?>

                        </div>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button @click="showSuccess = false" type="button" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 dark:hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Keep the original alerts for fallback -->
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        <!-- Progress Steps -->
        <div class="mb-12 hidden md:block">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center justify-between">
                    <!-- Step 1: Complete -->
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center mb-2 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <p class="font-medium text-gray-900 dark:text-white">Payment Method</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Selected</p>
                        </div>
                    </div>
                    
                    <!-- Connector -->
                    <div class="h-1 w-24 bg-blue-600"></div>
                    
                    <!-- Step 2: Current -->
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center mb-2 shadow-lg">
                            <span class="text-lg font-bold">2</span>
                        </div>
                        <div class="text-center">
                            <p class="font-medium text-gray-900 dark:text-white">Payment Details</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Confirm & Pay</p>
                        </div>
                    </div>
                    
                    <!-- Connector -->
                    <div class="h-1 w-24 bg-gray-300 dark:bg-gray-700"></div>
                    
                    <!-- Step 3: Upcoming -->
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 flex items-center justify-center mb-2">
                            <span class="text-lg font-bold">3</span>
                        </div>
                        <div class="text-center">
                            <p class="font-medium text-gray-500 dark:text-gray-400">Confirmation</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Complete</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('home.process-payment')); ?>" class="space-y-8">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="name" value="<?php echo e($name); ?>">
            <input type="hidden" name="email" value="<?php echo e($email); ?>">
            <!-- Form submission progress overlay -->
            <div x-show="formSubmitted" 
                 class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 max-w-md w-full mx-4 shadow-xl">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 mb-4">
                            <svg class="animate-spin w-full h-full text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Processing Your Payment</h3>
                        <p class="text-center text-gray-600 dark:text-gray-400">
                            Please wait while we upload your payment proof and process your information...
                        </p>
                    </div>
                </div>
            </div>

            <!-- Main Payment Card -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Payment Details -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-lg overflow-hidden">
                        <!-- Card Header -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 px-6 py-5 border-b border-gray-200 dark:border-gray-800">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Shipment Payment Details
                                </h2>
                                <div class="flex items-center gap-2 px-3 py-1 bg-green-50 dark:bg-green-900/30 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <span class="text-sm text-green-600 dark:text-green-400 font-medium">Secure</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card Content -->
                        <div class="p-6 space-y-6">
                            <!-- Shipment Summary -->
                            <div class="p-5 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-100 dark:border-blue-800">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                                    <div>
                                        <p class="text-sm text-blue-700 dark:text-blue-400 mb-1">Payment For</p>
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Shipment Clearance & Fees</h3>
                                        <?php if(session()->has('tracking')): ?>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            <span class="font-medium">Tracking:</span> 
                                            <span class="font-mono tracking-wide"><?php echo e(session('tracking')); ?></span>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mt-4 md:mt-0">
                                        <span class="block text-sm text-gray-600 dark:text-gray-400">Total Amount</span>
                                        <span class="text-2xl font-bold text-gray-900 dark:text-white"><?php echo e($settings->currency); ?><?php echo e(number_format($amount, 2)); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method Details -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    Payment Method
                                </h3>
                                
                                <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                                    <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-white dark:bg-gray-700 rounded-lg shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900 dark:text-white"><?php echo e($payment_mode->name); ?></h4>
                                        <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($payment_mode->duration ?? 'Processing time: 1-24 hours'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Instructions -->
                            <div class="p-5 bg-gray-50 dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Payment Instructions
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/40 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 dark:text-blue-400 font-semibold">1</span>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900 dark:text-white text-sm">Transfer Payment</h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Send payment to the provided account details</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/40 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 dark:text-blue-400 font-semibold">2</span>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900 dark:text-white text-sm">Capture Proof</h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Take a screenshot of your payment confirmation</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/40 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 dark:text-blue-400 font-semibold">3</span>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900 dark:text-white text-sm">Submit & Wait</h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Submit and wait for shipment to clear customs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Details Section -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Account Details
                                </h3>
                                
                                <div class="relative">
                                    <div class="flex">
                                        <input type="text"
                                               value="<?php echo e($payment_mode->wallet_address); ?>"
                                               class="flex-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-l-lg px-4 py-3 text-gray-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               readonly>
                                        <button type="button"
                                                @click="copyToClipboard('<?php echo e($payment_mode->wallet_address); ?>')"
                                                class="px-4 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 border border-blue-600 dark:border-blue-700 rounded-r-lg text-white transition-all duration-200 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                            <span x-text="copied ? 'Copied!' : 'Copy'" class="text-sm font-medium"></span>
                                        </button>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                        Please send exact amount: <?php echo e($settings->currency); ?><?php echo e(number_format($amount, 2)); ?>

                                    </p>
                                </div>
                            </div>

                            <!-- File Upload Section -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    Upload Payment Proof
                                </h3>
                                
                                <div class="relative">
                                    <input type="file"
                                           id="proof"
                                           name="proof"
                                           accept="image/*"
                                           required
                                           class="hidden"
                                           @change="handleFileUpload($event)">

                                    <label for="proof"
                                           class="relative block w-full border-2 border-dashed border-gray-300 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 rounded-lg p-6 text-center cursor-pointer transition-all duration-200 group"
                                           :class="{ 'border-blue-500 bg-blue-50 dark:bg-blue-900/20': isDragOver }"
                                           @dragover.prevent="isDragOver = true"
                                           @dragleave.prevent="isDragOver = false"
                                           @drop.prevent="handleFileDrop($event)">

                                        <div class="space-y-4">
                                            <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/40 rounded-full flex items-center justify-center mx-auto group-hover:bg-blue-200 dark:group-hover:bg-blue-900/60 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                            </div>

                                            <div x-show="!fileName">
                                                <p class="text-lg font-medium text-gray-900 dark:text-white">Choose file or drag & drop</p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                                            </div>

                                            <div x-show="fileName" class="text-center">
                                                <p class="text-lg font-medium text-gray-900 dark:text-white" x-text="fileName"></p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400" x-text="fileSize"></p>
                                                <button type="button"
                                                        @click.stop="removeFile()"
                                                        class="mt-2 text-red-600 dark:text-red-400 hover:text-red-500 dark:hover:text-red-300 text-sm">
                                                    Remove file
                                                </button>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Hidden fields for guest user information (will be handled by the controller) -->
                            <?php if(auth()->guard()->guest()): ?>
                            <input type="hidden" name="name" value="<?php echo e(session('name', '')); ?>">
                            <input type="hidden" name="email" value="<?php echo e(session('email', '')); ?>">
                            <?php endif; ?>

                            <!-- Hidden Fields -->
                            <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
                            <input type="hidden" name="method" value="<?php echo e($payment_mode->name); ?>">
                            <input type="hidden" name="paymethd_method" value="<?php echo e($payment_mode->name); ?>">
                            <?php if(session()->has('tracking')): ?>
                            <input type="hidden" name="tracking" value="<?php echo e(session('tracking')); ?>">
                            <?php endif; ?>
                            <?php if($asset): ?>
                            <input type="hidden" name="asset" value="<?php echo e($asset); ?>">
                            <?php endif; ?>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button type="submit"
                                        :disabled="!fileName"
                                        class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white font-medium py-3.5 px-4 rounded-lg transition-colors shadow-md flex items-center justify-center"
                                        :class="!fileName ? 'opacity-50 cursor-not-allowed' : ''">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                    <span x-text="formSubmitted ? 'Processing...' : 'Complete Shipment Payment'">Complete Shipment Payment</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: QR Code and Shipping Information -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- QR Code Section -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-lg overflow-hidden">
                        <div class="bg-blue-600 px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                                Scan to Pay
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo e($payment_mode->wallet_address); ?>"
                                     alt="Payment QR Code"
                                     class="w-full h-auto mx-auto">
                                <button type="button"
                                        @click="downloadQR()"
                                        class="mt-3 w-full flex items-center justify-center gap-2 py-2 px-4 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg transition-colors text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download QR Code
                                </button>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 text-center">
                                Scan this QR code with your payment app to complete the transaction
                            </p>
                        </div>
                    </div>

                    <!-- Shipment Information -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 px-6 py-4 border-b border-gray-200 dark:border-gray-800">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                </svg>
                                Shipment Information
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/40 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white">What does this payment cover?</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            This payment covers customs clearance fees, import duties, and processing costs to release your shipment from customs hold.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/40 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white">How long after payment?</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            After verification of your payment (typically 1-24 hours), your shipment will be released from customs and proceed to delivery.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/40 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Payment Security</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            All payments are processed through secure, encrypted channels with SSL protection.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-800">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Need Assistance?</h4>
                                <a href="#" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Contact our support team
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Trust and Security Section -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border border-gray-200 dark:border-gray-800 shadow-lg text-center">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/40 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">24/7 Customer Support</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Our dedicated support team is available around the clock to assist with your shipment clearance
                </p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border border-gray-200 dark:border-gray-800 shadow-lg text-center">
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/40 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Fast Processing</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Your payment is processed quickly to ensure minimal delays in your shipment delivery
                </p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border border-gray-200 dark:border-gray-800 shadow-lg text-center">
                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/40 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Secure & Protected</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    All payment data is secured with enterprise-grade encryption and security protocols
                </p>
            </div>
        </div>

        <!-- FAQs for Shipment Payments -->
        <div class="mt-12 bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Frequently Asked Questions</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <span class="text-gray-900 dark:text-white font-medium">Why do I need to pay customs clearance fees?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="px-4 py-3 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 text-sm">
                                Customs clearance fees are required to process your international shipment through customs. These fees cover import duties, taxes, and administrative costs imposed by customs authorities to release your package for delivery.
                            </p>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <span class="text-gray-900 dark:text-white font-medium">How quickly will my shipment be processed after payment?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="px-4 py-3 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 text-sm">
                                Once your payment is verified (typically within 24 hours), your shipment will be processed for customs clearance. The clearance process usually takes 1-3 business days, after which your package will continue its journey to the delivery address.
                            </p>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <span class="text-gray-900 dark:text-white font-medium">Is my payment information secure?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" class="px-4 py-3 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 text-sm">
                                Yes, all payment information is secured with industry-standard SSL encryption. We do not store your payment details after processing. Our payment gateway complies with PCI DSS requirements for secure handling of payment information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function paymentHandler() {
        return {
            copied: false,
            fileName: '',
            fileSize: '',
            isDragOver: false,
            formSubmitted: false,

            copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(() => {
                    this.copied = true;
                    setTimeout(() => {
                        this.copied = false;
                    }, 2000);
                });
            },

            handleFileUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    this.fileName = file.name;
                    this.fileSize = `${(file.size / 1024 / 1024).toFixed(2)}MB`;
                }
            },

            handleFileDrop(event) {
                this.isDragOver = false;
                const file = event.dataTransfer.files[0];
                if (file && file.type.startsWith('image/')) {
                    document.getElementById('proof').files = event.dataTransfer.files;
                    this.fileName = file.name;
                    this.fileSize = `${(file.size / 1024 / 1024).toFixed(2)}MB`;
                }
            },

            removeFile() {
                document.getElementById('proof').value = '';
                this.fileName = '';
                this.fileSize = '';
            },

            downloadQR() {
                const img = document.querySelector('img[alt="Payment QR Code"]');
                const link = document.createElement('a');
                link.href = img.src;
                link.download = 'payment-qr-code.png';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },
            
            submitForm() {
                this.formSubmitted = true;
                // Validation is handled by the browser since we're using required attributes
                return true;
            }
        }
    }

    // Initialize icons when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>

<style>
    .bg-grid-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ship\resources\views/home/payment.blade.php ENDPATH**/ ?>