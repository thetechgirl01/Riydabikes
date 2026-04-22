

<?php $__env->startSection('title', $settings->site_title); ?>

<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>

<div class="bg-white print:bg-white" x-data="{ printModal: true }" x-init="setTimeout(() => { window.print(); }, 1000)">
    <!-- Professional receipt container with subtle background pattern -->
    <div class="relative max-w-4xl mx-auto bg-white shadow-lg print:shadow-none overflow-hidden">
        <!-- Background pattern - only visible on screen, not in print -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-50 to-white opacity-50 print:hidden"></div>
        
        <!-- Watermark -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-[0.03] print:opacity-[0.04] z-0">
            <div class="rotate-[-30deg]">
                <p class="text-[120px] font-bold text-gray-700">OFFICIAL</p>
                <p class="text-[80px] font-bold text-gray-700 -mt-24">RECEIPT</p>
            </div>
        </div>

        <!-- Print Button - Only visible on screen -->
        <div class="print:hidden fixed top-4 right-4 z-50" x-show="printModal">
            <button @click="window.print()" class="flex items-center px-4 py-2 bg-primary-600 text-white rounded-md shadow-sm hover:bg-primary-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                Print Receipt
            </button>
        </div>

        <!-- Main content -->
        <div class="relative p-8 bg-white z-10">
            <!-- Premium header with logo and border effect -->
            <div class="relative">
                <!-- Colorful top border -->
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-primary-400 via-primary-600 to-primary-800"></div>
                
                <div class="pt-6 pb-4 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>" class="h-14 object-contain" alt="Company Logo">
                            <div class="ml-4 hidden sm:block">
                                <h1 class="text-xl font-bold text-gray-800"><?php echo e($settings->site_name); ?></h1>
                                <p class="text-sm text-gray-500">Global Logistics Solutions</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <div class="text-right mb-2">
                                <span class="text-xs text-gray-500">Receipt Generated</span>
                                <p class="text-sm font-medium text-gray-700"><?php echo e(\Carbon\Carbon::now()->format('F d, Y')); ?></p>
                            </div>
                            <div class="py-1 px-3 bg-primary-50 rounded-full border border-primary-100">
                                <span class="text-xs font-medium text-primary-700">OFFICIAL RECEIPT</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Company information -->
                    <div class="mt-4 text-center sm:text-left sm:flex sm:justify-between">
                        <div>
                            <h2 class="text-lg font-bold text-primary-700 sm:text-xl"><?php echo e($settings->site_name); ?> Logistics</h2>
                            <p class="text-sm text-gray-600 mt-1">International Shipping & Logistics Services</p>
                        </div>
                        <div class="mt-2 sm:mt-0 text-sm text-gray-600 text-center sm:text-right">
                            <p><?php echo e($settings->contact_email); ?></p>
                            <p><?php echo e($settings->site_address); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tracking ID Banner -->
            <div class="flex justify-between items-center bg-gradient-to-r from-primary-700 to-primary-600 text-white p-4 rounded-md my-6">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.4 6.1C20.9 5.4 20.2 5 19.5 5h-15c-.8 0-1.4.4-1.9 1.1-.5.7-.6 1.6-.4 2.4l2.3 8.1c.2.7.5 1.3 1.1 1.7.5.4 1.2.7 1.9.7h8c.8 0 1.4-.2 1.9-.7.6-.4.9-1 1.1-1.7l2.3-8.1c.2-.8.1-1.7-.4-2.4z"></path><path d="M6 9h12"></path><path d="m9 17 3-5m3 5-3-5"></path></svg>
                    <div>
                        <span class="text-xs font-medium text-white/80">Tracking Number</span>
                        <h3 class="text-xl font-bold"><?php echo e($user->trackingnumber); ?></h3>
                    </div>
                </div>
                <div>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-white text-primary-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                        Verified
                    </span>
                </div>
            </div>

            <!-- Info cards in 3-column grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Sender info -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-3 pb-2 border-b border-gray-100">
                        <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-700" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                        <h3 class="text-base font-semibold text-gray-800">Sender</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="text-primary-700 font-semibold text-base"><?php echo e($user->sname); ?></div>
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 mt-0.5 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <span class="text-gray-700 text-sm"><?php echo e($user->saddress); ?></span>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9"></path><path d="M9 22V12h6v10M2 10.6L12 2l10 8.6"></path></svg>
                            <span class="text-gray-700 text-sm"><?php echo e($user->take_off_point); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Receiver info -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-3 pb-2 border-b border-gray-100">
                        <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-700" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 21a8 8 0 0 0-16 0"></path><circle cx="10" cy="8" r="5"></circle><path d="M22 20c-2 0-6-2-6-6"></path><path d="M16 14c2 0 3-1 3-3"></path></svg>
                        </div>
                        <h3 class="text-base font-semibold text-gray-800">Receiver</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="text-primary-700 font-semibold text-base"><?php echo e($user->name); ?></div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <span class="text-gray-700 text-sm"><?php echo e($user->phone); ?></span>
                        </div>
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 mt-0.5 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <span class="text-gray-700 text-sm"><?php echo e($user->address); ?></span>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9"></path><path d="M9 22V12h6v10M2 10.6L12 2l10 8.6"></path></svg>
                            <span class="text-gray-700 text-sm"><?php echo e($user->final_destination); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Shipment info -->
                <div class="bg-white rounded-lg p-5 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-3 pb-2 border-b border-gray-100">
                        <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-700" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 16h6v6h-6z"></path><path d="M2 16h6v6H2z"></path><path d="M9 16h6v6H9z"></path><path d="M2 9h6v6H2z"></path><path d="M9 9h6v6H9z"></path><path d="M16 9h6v6h-6z"></path><path d="M16 2h6v6h-6z"></path><path d="M2 2h6v6H2z"></path><path d="M9 2h6v6H9z"></path></svg>
                        </div>
                        <h3 class="text-base font-semibold text-gray-800">Shipment Details</h3>
                    </div>
                    <div class="flex justify-center mb-4">
                        <div class="p-2 bg-white border border-gray-200 rounded shadow-sm">
                            <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($user->trackingnumber); ?>&code=Code128" alt="<?php echo e($user->trackingnumber); ?>" class="h-16">
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Order ID:</span>
                            <span class="font-medium text-gray-800"><?php echo e($user->id); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Booking Mode:</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="M12 11.5v1.5"></path><path d="M12 7.5v1.5"></path><path d="M16.5 12H18"></path><path d="M6 12h1.5"></path><path d="M12 16.5V18"></path></svg>
                                ToPay
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipment Cost:</span>
                            <span class="font-medium text-gray-800"><?php echo e($settings->s_currency); ?> <?php echo e($user->cost); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                <?php echo e($user->status); ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipment details table with modern styling -->
            <div class="mb-8">
                <div class="flex items-center px-4 py-3 bg-gray-50 rounded-t-lg border border-gray-200 border-b-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9"></path><path d="M13 2v7h7"></path><path d="M9 13h6"></path><path d="M9 17h6"></path></svg>
                    <h3 class="text-base font-semibold text-gray-800">Parcel Details & Costs</h3>
                </div>
                <div class="overflow-hidden border border-gray-200 rounded-b-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipping Cost</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Clearance Cost</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Cost</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($user->qty); ?></td>
                                    <td class="px-4 py-3.5 whitespace-nowrap text-sm text-gray-900">Parcel</td>
                                    <td class="px-4 py-3.5 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <?php echo e($user->status); ?>

                                        </span>
                                    </td>
                                    <td class="px-4 py-3.5 text-sm text-gray-900"><?php echo e($user->description); ?></td>
                                    <td class="px-4 py-3.5 whitespace-nowrap text-sm text-gray-900"><?php echo e($settings->s_currency); ?> <?php echo e($user->cost); ?></td>
                                    <td class="px-4 py-3.5 whitespace-nowrap text-sm text-gray-900"><?php echo e($settings->s_currency); ?> <?php echo e($user->clearance_cost); ?></td>
                                    <td class="px-4 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($settings->s_currency); ?> <?php echo e($user->clearance_cost+$user->cost); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payment and total section - modern 2-column layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Left column - Payment info with styled cards -->
                <div>
                    <div class="space-y-6">
                        <!-- Payment methods -->
                        <div class="bg-white rounded-lg p-5 border border-gray-200 shadow-sm">
                            <div class="flex items-center mb-3 pb-2 border-b border-gray-100">
                                <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-700" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                                </div>
                                <h4 class="text-base font-semibold text-gray-800">Payment Methods</h4>
                            </div>
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <img src="<?php echo e(asset('temp/securepayment.png')); ?>" alt="Payment Methods" class="h-10 object-contain">
                            </div>
                            <p class="text-xs text-gray-600">
                                For your convenience we have <?php echo e($settings->site_name); ?> several payment reliable, fast, secure.
                            </p>
                        </div>
                        
                        <!-- Stamp section with premium styling -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v8"></path><path d="M8 12h8"></path></svg>
                                    Official Stamp
                                </h4>
                                <div class="flex items-center justify-center h-20 bg-gray-50 rounded-md p-2">
                                    <img src="<?php echo e(asset('temp/stamp1.png')); ?>" alt="Official Stamp" class="h-16 object-contain">
                                </div>
                                <p class="text-xs text-center text-gray-500 mt-2"><?php echo e(\Carbon\Carbon::parse($user->created_at)->toDayDateTimeString()); ?></p>
                            </div>
                            
                            <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>
                                    Stamp Duty
                                </h4>
                                <div class="flex items-center justify-center h-20 bg-gray-50 rounded-md p-2">
                                    <img src="<?php echo e(asset('temp/stamp2.png')); ?>" alt="Stamp Duty" class="h-16 object-contain">
                                </div>
                                <p class="text-xs text-center text-gray-500 mt-2">Verified & Approved</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right column - Amount due with premium styling -->
                <div>
                    <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                        <div class="bg-primary-600 px-5 py-4">
                            <h4 class="text-lg font-bold text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 12V8H6a2 2 0 0 1-2-2c0-1.1.9-2 2-2h12"></path><path d="M18 12v4H6a2 2 0 0 0 0 4h14"></path></svg>
                                Payment Summary
                            </h4>
                        </div>
                        <div class="p-5">
                            <div class="space-y-4">
                                <div class="flex justify-between pb-3 border-b border-gray-200">
                                    <span class="text-gray-600">Shipping Cost:</span>
                                    <span class="font-medium"><?php echo e($settings->s_currency); ?> <?php echo e($user->cost); ?></span>
                                </div>
                                <div class="flex justify-between pb-3 border-b border-gray-200">
                                    <span class="text-gray-600">Clearance Cost:</span>
                                    <span class="font-medium"><?php echo e($settings->s_currency); ?> <?php echo e($user->clearance_cost); ?></span>
                                </div>
                                <div class="pt-2">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-800 font-medium">Total Amount:</span>
                                        <span class="text-xl font-bold text-primary-700"><?php echo e($settings->s_currency); ?> <?php echo e($user->clearance_cost+$user->cost); ?></span>
                                    </div>
                                    <div class="mt-4 pt-4 border-t border-dashed border-gray-200">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-600">Payment Status:</span>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path></svg>
                                                To Pay on Delivery
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- QR Code for digital verification -->
                    <div class="mt-6 bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                        <div class="flex">
                            <div class="w-1/3 flex flex-col items-center justify-center">
                                <div class="p-2 bg-white border border-gray-200 rounded-md shadow-sm">
                                    <svg class="h-20 w-20" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Simple placeholder QR code -->
                                        <rect width="100" height="100" fill="white"/>
                                        <rect x="10" y="10" width="30" height="30" fill="black"/>
                                        <rect x="60" y="10" width="30" height="30" fill="black"/>
                                        <rect x="10" y="60" width="30" height="30" fill="black"/>
                                        <rect x="45" y="45" width="10" height="10" fill="black"/>
                                        <rect x="60" y="60" width="15" height="5" fill="black"/>
                                        <rect x="60" y="70" width="5" height="20" fill="black"/>
                                        <rect x="70" y="70" width="5" height="5" fill="black"/>
                                        <rect x="80" y="70" width="10" height="20" fill="black"/>
                                        <rect x="70" y="80" width="5" height="10" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-2/3 pl-4">
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Digital Verification</h4>
                                <p class="text-xs text-gray-600 mb-2">Scan this QR code to verify this receipt's authenticity and check real-time shipment status.</p>
                                <div class="flex items-center mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    <span class="text-xs text-gray-700">Digitally signed and secured</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Thank you message with professional styling -->
            <div class="text-center mt-8 pt-6 border-t border-gray-200 bg-gradient-to-r from-primary-50 to-white -mx-8 -mb-8 px-8 pb-8 rounded-b-lg">
                <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center mx-auto mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                </div>
                <h3 class="text-base font-bold text-primary-700 mb-1">Thank You for Choosing <?php echo e($settings->site_name); ?></h3>
                <p class="text-gray-600">We appreciate your business and look forward to delivering your package safely.</p>
                <div class="inline-flex items-center mt-4 text-xs text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 8v4l3 3"></path></svg>
                    Receipt generated on <?php echo e(\Carbon\Carbon::now()->format('F d, Y - h:i A')); ?>

                </div>
            </div>
        </div>
    </div>
    
    <style>
        @media  print {
            body {
                background-color: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            
            .print\:hidden {
                display: none !important;
            }
            
            .print\:block {
                display: block !important;
            }
            
            .print\:shadow-none {
                box-shadow: none !important;
            }
            
            .print\:bg-white {
                background-color: white !important;
            }
        }
    </style>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/losideko/shypdirect.elitemaxpro.click/resources/views/home/printinvoice.blade.php ENDPATH**/ ?>