<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<div x-data="courierPayment()">
    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-blue-700 to-indigo-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 relative z-10">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/20 backdrop-blur-sm rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span class="text-sm text-white font-medium">Secure Payment Gateway</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Shipment Clearance Payment
                </h1>
                <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                    Complete your payment securely to clear your shipment from customs and continue delivery
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

    <!-- Main Content -->
    <div class="bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Alerts -->
            <div class="space-y-4 mb-8">
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

            <!-- Payment Process Steps -->
            <div class="mb-12 hidden md:block">
                <div class="flex items-center justify-between max-w-4xl mx-auto">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center mb-2 shadow-lg">
                            <span class="text-lg font-bold">1</span>
                        </div>
                        <div class="text-center">
                            <p class="font-medium text-gray-900 dark:text-white">Payment Method</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Select your preferred option</p>
                        </div>
                    </div>
                    
                    <!-- Connector -->
                    <div class="h-1 w-24 bg-blue-600"></div>
                    
                    <!-- Step 2 -->
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center mb-2 shadow-lg">
                            <span class="text-lg font-bold">2</span>
                        </div>
                        <div class="text-center">
                            <p class="font-medium text-gray-900 dark:text-white">Payment Details</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Confirm the payment amount</p>
                        </div>
                    </div>
                    
                    <!-- Connector -->
                    <div class="h-1 w-24 bg-gray-300 dark:bg-gray-700"></div>
                    
                    <!-- Step 3 -->
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 flex items-center justify-center mb-2">
                            <span class="text-lg font-bold">3</span>
                        </div>
                        <div class="text-center">
                            <p class="font-medium text-gray-500 dark:text-gray-400">Payment Confirmation</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Complete your payment</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Grid Layout -->
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Payment Form Card -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 px-6 py-5 border-b border-gray-200 dark:border-gray-800">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Shipment Clearance Payment
                                </h2>
                                <div class="flex items-center gap-2 px-3 py-1 bg-green-50 dark:bg-green-900/30 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <span class="text-sm text-green-600 dark:text-green-400 font-medium">Secure</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                                <!-- Payment Information -->
                            <div class="mb-8 p-5 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-100 dark:border-blue-800">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                                    <div>
                                        <p class="text-sm text-blue-700 dark:text-blue-400 mb-1">Payment For</p>
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Shipment Clearance & Processing</h3>
                                        <?php if(isset($tracking)): ?>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            <span class="font-medium">Tracking:</span> 
                                            <span class="font-mono tracking-wide">#<?php echo e($tracking); ?></span>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mt-4 md:mt-0">
                                        <span class="block text-sm text-gray-600 dark:text-gray-400">Total Amount</span>
                                        <span class="text-2xl font-bold text-gray-900 dark:text-white"><?php echo e($settings->currency); ?><?php echo e(number_format($prefilled_amount ?? 0, 2)); ?></span>
                                    </div>
                                </div>
                            </div>

                            <form method="POST" action="<?php echo e(route('home.process-deposit')); ?>" class="space-y-6">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="asset" value=" ">
                                <?php if(isset($tracking)): ?>
                                <input type="hidden" name="tracking" value="<?php echo e($tracking); ?>">
                                <?php endif; ?>                                <!-- Payment Method Selection -->
                                <div class="space-y-3">
                                    <label class="block text-base font-semibold text-gray-800 dark:text-gray-200">
                                        Select Payment Method
                                    </label>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                        <?php $__empty_1 = true; $__currentLoopData = $dmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="relative">
                                                <input type="radio" id="method-<?php echo e($index); ?>" name="payment_method" value="<?php echo e($method->name); ?>" 
                                                       class="peer absolute opacity-0" <?php echo e($index === 0 ? 'checked' : ''); ?>>
                                                <label for="method-<?php echo e($index); ?>" 
                                                       class="flex items-center p-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 
                                                              rounded-lg cursor-pointer transition-all peer-checked:border-blue-500 dark:peer-checked:border-blue-500 
                                                              peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20 hover:bg-gray-50 dark:hover:bg-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 peer-checked:text-blue-600 dark:peer-checked:text-blue-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                    </svg>
                                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 peer-checked:text-blue-700 dark:peer-checked:text-blue-400">
                                                        <?php echo e($method->name); ?>

                                                    </span>
                                                </label>
                                                <div class="absolute top-4 right-4 w-4 h-4 bg-white dark:bg-gray-800 border-2 border-gray-300 dark:border-gray-600 rounded-full peer-checked:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:flex peer-checked:items-center peer-checked:justify-center hidden">
                                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="col-span-full p-4 bg-amber-50 dark:bg-amber-900/20 rounded-lg border border-amber-200 dark:border-amber-800">
                                                <p class="text-amber-700 dark:text-amber-400 text-sm">
                                                    No payment methods available at the moment. Please contact support.
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Amount Input -->
                                <div class="space-y-3">
                                    <label class="block text-base font-semibold text-gray-800 dark:text-gray-200">
                                        Payment Amount
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                            <span class="text-gray-500 dark:text-gray-400 font-medium"><?php echo e($settings->currency); ?></span>
                                        </div>
                                        <input type="number"
                                               id="amount"
                                               name="amount"
                                               required
                                               min="1"
                                               step="0.01"
                                               placeholder="0.00"
                                               value="<?php echo e($prefilled_amount ?? ''); ?>"
                                               <?php echo e($prefilled_amount ? 'readonly' : ''); ?>

                                               class="block w-full pl-10 pr-4 py-3.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                                                     rounded-lg text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors
                                                     <?php echo e($prefilled_amount ? 'bg-gray-50 dark:bg-gray-900' : ''); ?>">
                                    </div>
                                    <?php if(!$prefilled_amount): ?>
                                    <div class="flex flex-wrap gap-2">
                                        <?php
                                            $quickAmounts = [50, 100, 250, 500];
                                        ?>
                                        <?php $__currentLoopData = $quickAmounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button type="button" 
                                                    onclick="setAmount(<?php echo e($amount); ?>)"
                                                    class="px-3 py-1.5 text-xs font-medium bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700
                                                        text-gray-700 dark:text-gray-300 rounded-md border border-gray-200 dark:border-gray-700
                                                        transition-colors">
                                                <?php echo e($settings->currency); ?><?php echo e(number_format($amount)); ?>

                                            </button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php endif; ?>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        This amount covers clearance fees, processing, and handling costs for your shipment.
                                    </p>
                                </div>

                                <!-- Contact Information For Guest Users -->
                                <?php if(auth()->guard()->guest()): ?>
                                <div class="space-y-3 pt-3 border-t border-gray-200 dark:border-gray-800">
                                    <label class="block text-base font-semibold text-gray-800 dark:text-gray-200">
                                        Recipient Information
                                    </label>
                                    
                                <!-- Debug information - can be removed after testing -->
                                    <div class="mb-3 p-3 bg-gray-100 dark:bg-gray-800 rounded text-xs overflow-auto">
                                        <p class="mb-1 font-semibold">Recipient Data:</p>
                                        <p>name: <?php echo e($name ?? 'Not set'); ?></p>
                                        <p>email: <?php echo e($email ?? 'Not set'); ?></p>
                                        <p>tracking: <?php echo e($tracking ?? 'Not set'); ?></p>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Recipient Name <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" 
                                                   id="recipient_name"
                                                   name="name" 
                                                   required
                                                   value="<?php echo e($name ?? ''); ?>"
                                                   placeholder="Enter recipient name"
                                                   class="block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Recipient Email <span class="text-red-500">*</span>
                                            </label>
                                            <input type="email" 
                                                   id="recipient_email"
                                                   name="email" 
                                                   required
                                                   value="<?php echo e($email ?? ''); ?>"
                                                   placeholder="Enter recipient email address"
                                                   class="block w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Submit Button -->
                                <div class="pt-4">
                                    <button type="submit"
                                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3.5 px-4 rounded-lg transition-colors shadow-md flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Proceed to Payment
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="space-y-6">
                    <!-- Clearance Process Information -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-lg overflow-hidden">
                        <div class="bg-blue-600 px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Clearance Information
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white">What are clearance fees?</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            Clearance fees cover customs processing, documentation, inspection, and handling of your international shipment.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white">How long after payment?</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            After payment confirmation, your shipment will be processed within 24-48 hours and released for final delivery.
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Payment Security</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            All payments are processed through secure, encrypted channels with real-time confirmation.
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

                    <!-- Secure Payment Badge -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-lg p-6">
                        <div class="flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-2">Secure Payment Processing</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    All transactions are protected with bank-level security and encryption.
                                </p>
                                <div class="flex items-center justify-center gap-3 mt-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M11.343 18.031c.058.049.12.098.181.146-1.177.508-2.581.806-4.076.806-2.493 0-4.922-.893-6.314-2.302-.203-.206-.357-.445-.391-.716-.068-.545.415-1.002 1.247-1.024.17-.005.342.018.515.063 1.632.429 3.258.653 4.745.653 1.049 0 2.075-.105 3.055-.307.352.048.707.075 1.064.075.142 0 .28-.032.419-.049-.167.232-.35.46-.551.672-.741.779-1.803 1.325-2.977 1.471-.879.109-1.591.04-2.108-.08-.127-.03-.254-.032-.374.036-.292.167-.278.558.03.722.334.178.746.298 1.21.372.764.121 1.633.105 2.528-.058 1.223-.223 2.347-.772 3.191-1.582.32-.309.601-.648.841-1.017.193.977.664 1.853 1.45 2.507.508.426 1.098.758 1.735.967-1.692 1.011-3.818 1.605-5.416 1.605-.73 0-1.377-.088-1.897-.262-.347-.117-.68-.281-.976-.488zm-6.959-15.031c-2.486.009-4.371 2.126-4.371 4.627 0 1.639.062 3.262 1.816 4.064.57.261 1.738.363 2.979-.086-1.008.59-2.266.583-3.183.113-.32-.164-.605-.414-.825-.715-.605-.826-.854-2.043-.854-3.361 0-2.278 1.411-4.202 3.311-4.643.133-.031.28.032.326.162.034.097-.002.183-.086.251-.226.183-.425.399-.574.645-.154.249-.261.524-.336.812-.117.44-.129.901-.032 1.35.114.53.374.996.75 1.352.602.57 1.516.815 2.304.615.527-.134.998-.445 1.33-.884.239-.317.387-.664.464-1.028.147-.696.024-1.439-.356-2.054-.384-.624-1.037-1.091-1.797-1.232-.07-.013-.128-.059-.16-.126-.041-.086-.027-.178.033-.247.274-.317.621-.556 1.004-.7.208-.078.431-.129.661-.142 1.707-.101 3.301 1.212 3.664 2.985.177.87.048 1.754-.36 2.518-.343.641-.837 1.166-1.438 1.54.647-.245 1.181-.686 1.575-1.248.65-.926.795-2.138.405-3.195-.423-1.144-1.462-1.99-2.634-2.253-.205-.046-.408-.069-.608-.069-.608 0-1.182.182-1.666.522-.52-.33-1.126-.495-1.722-.494zm14.101 10.742c.021-.574-.153-1.168-.75-1.548-.535-.343-1.253-.326-1.839.008-1.242.71-1.897 2.088-1.897 3.806-.121-.8-.273-1.414-.9-1.926-.282-.23-.614-.364-.958-.406-.356-.044-.742.011-1.041.242-.624.482-.752 1.385-.543 2.146-.553-.418-1.122-.899-1.833-1.688-1.035-1.15-1.429-2.105-1.577-2.611.021.029.027.044.054.083 1.44 2.159 3.45 3.322 5.781 3.322.112 0 .224-.002.335-.007-.507.01-1.017-.049-1.499-.173 2.361.438 4.507-.298 6.189-2.174.286-.318.517-.675.691-1.056.374-.821.497-1.717.366-2.618.02.155.03.312.03.469 0 1.248-.625 2.491-1.656 3.202-.791.543-1.58.574-2.079.574-1.041 0-2.04-.237-2.961-.708 1.061.077 2.156.007 3.213-.274.839-.222 1.642-.585 2.297-1.148.565-.486.938-1.151.938-1.888 0-1.341-1.266-2.471-2.941-2.604-.633-.05-1.271.058-1.842.309-.574.252-1.053.634-1.366 1.097-.686-2.07-2.656-3.365-4.741-3.151-.345.035-.684.111-1.008.23-.864.315-1.628.94-2.055 1.772-.521 1.014-.549 2.25-.079 3.279.341.747.901 1.339 1.601 1.688-.512.048-1.024-.125-1.434-.49-.47-.42-.755-.999-.839-1.618-.149-1.087.196-2.224.972-3.06.195-.211.41-.397.643-.562-1.602.622-2.557 2.369-2.557 4.007 0 1.339.592 2.537 1.549 3.323-.407-.61-.607-1.346-.558-2.075.098-1.439 1.281-2.589 2.701-2.688 1.405-.099 2.713.802 3.071 2.157.066.244.099.494.099.748 0 .488-.126.961-.362 1.381.416-.5.59-1.155.477-1.787-.14-.79-.69-1.446-1.421-1.761-.731-.317-1.593-.208-2.234.281-.803.614-1.149 1.717-.849 2.732.148.5.437.943.848 1.234.251.179.531.298.826.355z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M22 9.761c0 .536-.065 1.084-.169 1.627-.847 4.419-3.746 5.946-7.449 5.946h-.572c-.453 0-.838.334-.908.789l-.803 5.09c-.071.453-.456.787-.908.787h-2.736c-.39 0-.688-.348-.628-.732l1.386-8.88.062-.056h2.155c5.235 0 8.509-2.618 9.473-7.568.812.814 1.097 1.876 1.097 2.997zm-14.216 4.252c.116-.826.459-1.177 1.006-1.177h2.9c3.391 0 6.031-1.068 6.79-4.859.127-.567.172-1.075.172-1.529 0-1.72-1.412-2.448-3.983-2.448h-5.232c-.571 0-1.055.398-1.142.945l-1.88 11.89c-.097.634.39 1.165 1.025 1.165h3.01l.459-2.928.875-1.059zm.87-11.632c-.199.414-.59.621-1.09.621h-6.964c-.53 0-.938-.466-.852-.981l1.941-11.315c.14-.818.88-1.417 1.717-1.417h5.958c1.274 0 2.292.315 3.102.906.892.649 1.354 1.654 1.354 2.9 0 5.337-2.605 8.129-5.166 9.286zm-3.389-.714h-1.501c-.184 0-.332-.148-.332-.332v-1.101c0-.184.148-.332.332-.332h1.501c.184 0 .332.148.332.332v1.101c0 .184-.148.332-.332.332zm2.669 0h-1.501c-.184 0-.332-.148-.332-.332v-1.101c0-.184.148-.332.332-.332h1.501c.184 0 .332.148.332.332v1.101c0 .184-.148.332-.332.332zm2.67 0h-1.501c-.184 0-.332-.148-.332-.332v-1.101c0-.184.148-.332.332-.332h1.501c.184 0 .332.148.332.332v1.101c0 .184-.149.332-.332.332z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M22 5.3c-.8.4-1.6.6-2.5.8.9-.5 1.6-1.4 1.9-2.4-.8.5-1.8.9-2.7 1.1-.8-.9-1.9-1.4-3.2-1.4-2.4 0-4.3 2-4.3 4.3 0 .3 0 .7.1 1-3.6-.2-6.8-1.9-8.9-4.5-.4.6-.6 1.4-.6 2.2 0 1.5.8 2.8 1.9 3.6-.7 0-1.4-.2-1.9-.5v.1c0 2.1 1.5 3.8 3.4 4.2-.4.1-.7.2-1.1.2-.3 0-.5 0-.8-.1.5 1.7 2.1 2.9 4 3-1.5 1.2-3.3 1.9-5.3 1.9-.3 0-.7 0-1-.1 1.9 1.2 4.2 1.9 6.6 1.9 7.9 0 12.2-6.5 12.2-12.2v-.6c.9-.6 1.6-1.3 2.2-2.2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
        
        // No need to decode URL params now as they are passed properly from the controller
        console.log('Name value:', document.getElementById('recipient_name')?.value);
        console.log('Email value:', document.getElementById('recipient_email')?.value);
    });

    function courierPayment() {
        return {
            // Alpine.js data and methods can be added here if needed
        }
    }

    function setAmount(amount) {
        document.getElementById('amount').value = amount;
        document.getElementById('amount').focus();
    }
</script>

<style>
    .bg-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ship\resources\views/home/deposits.blade.php ENDPATH**/ ?>