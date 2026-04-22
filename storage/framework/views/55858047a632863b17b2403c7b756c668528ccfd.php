<?php $__env->startSection('content'); ?>
<!-- Add Leaflet CSS and JS for a free, open-source mapping solution -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
      crossorigin=""></script>

<!-- Custom map styling -->
<style>
    #shipment_map {
        position: relative !important;
        overflow: hidden;
        border-radius: 0.5rem;
    }
    /* Fix the map to prevent movement and make it fixed within the card */
    .leaflet-container {
        position: absolute !important;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }
    /* Prevent the map from overflowing its container */
    .leaflet-pane {
        z-index: 1;
    }
</style>

<div class="bg-gray-50 py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 800)">
            <!-- Loading State -->
            <div x-show="loading" class="flex flex-col items-center justify-center p-8 bg-white rounded-xl shadow-lg">
                <div class="w-16 h-16 border-4 border-primary-500 border-t-transparent rounded-full animate-spin mb-4"></div>
                <h4 class="text-lg font-medium text-gray-700">
                    Fetching Result for Tracking Number: <?php echo e($courier->trackingnumber); ?>...
                </h4>
            </div>

            <!-- Tracking Result Container -->
            <div x-show="!loading" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100">

                <!-- Header & Navigation -->
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
                    <div>
                        <div class="flex items-center space-x-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"></path><path d="m7.5 4.27 9 5.15"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><line x1="12" x2="12" y1="22" y2="12"></line><circle cx="18.5" cy="15.5" r="2.5"></circle><path d="M20.27 17.27 22 19"></path></svg>
                            <h1 class="text-2xl font-bold text-gray-800">Shipment Tracking</h1>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <a href="/" class="flex items-center hover:text-primary-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Home
                            </a>
                            <span>/</span>
                            <span>Tracking</span>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                            Back to Home
                        </a>
                    </div>
                </div>

                <!-- Tracking Summary Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-primary-700 to-primary-600">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="mb-4 md:mb-0">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white/90 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3"></path><path d="M21 16v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3"></path><path d="M4 12h16"></path><path d="M9 12v4"></path><path d="M15 12v4"></path><path d="M13 12v1"></path><path d="M11 12v1"></path></svg>
                                    <h2 class="text-xl font-bold text-white">Tracking Number</h2>
                                </div>
                                <div class="mt-2 font-mono text-2xl md:text-3xl font-bold text-white opacity-90 flex items-center">
                                    <?php echo e($courier->trackingnumber); ?>

                                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white text-primary-800">
                                        Verified
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex items-center px-4 py-2 bg-white/20 backdrop-filter backdrop-blur-sm rounded-lg mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-white" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="text-white font-medium">Current Status:</span>
                                    <div class="ml-2 px-2 py-0.5 rounded-full bg-<?php echo e($courier->status === 'Delivered' ? 'green' : ($courier->status === 'Custom Hold' ? 'amber' : 'blue')); ?>-600 text-white text-sm font-medium">
                                        <?php echo e($courier->status); ?>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Shipment Information -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Sender Information -->
                            <div class="space-y-3 bg-primary-50/60 p-4 rounded-lg border border-primary-100">
                                <div class="flex items-center text-primary-600 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <h3 class="text-base font-semibold">Sender Information</h3>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="font-medium text-gray-800"><?php echo e($courier->sname); ?></span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                        <span class="font-medium text-gray-700"><?php echo e($courier->saddress); ?></span>
                                    </div>
                                    <!--<div class="flex items-center">-->
                                    <!--    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>-->
                                    <!--    <span class="font-medium text-gray-700"><?php echo e($courier->sphone ?? 'N/A'); ?></span>-->
                                    <!--</div>-->
                                </div>
                            </div>

                            <!-- Receiver Information -->
                            <div class="space-y-3 bg-primary-50/60 p-4 rounded-lg border border-primary-100">
                                <div class="flex items-center text-primary-600 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <h3 class="text-base font-semibold">Receiver Information</h3>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="font-medium text-gray-800"><?php echo e($courier->name); ?></span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                        <span class="font-medium text-gray-700"><?php echo e($courier->address); ?></span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        <span class="font-medium text-gray-700"><?php echo e($courier->phone); ?></span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"></path><path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path></svg>
                                        <span class="font-medium text-gray-700"><?php echo e($courier->email); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipment Details -->
                            <div class="space-y-3 bg-primary-50/60 p-4 rounded-lg border border-primary-100">
                                <div class="flex items-center text-primary-600 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><path d="M12 11h4"></path><path d="M12 16h4"></path><path d="M8 11h.01"></path><path d="M8 16h.01"></path></svg>
                                    <h3 class="text-base font-semibold">Shipment Details</h3>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v-4h2"></path><circle cx="17" cy="8" r="2"></circle><rect x="3" y="3" width="18" height="18" rx="2"></rect></svg>
                                        <span class="text-gray-500 mr-2">Weight:</span>
                                        <span class="font-medium text-gray-800"><?php echo e($courier->weight); ?> kg</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.9 19.1C1 15.2 1 8.8 4.9 4.9"></path><path d="M7.8 16.2c-2.3-2.3-2.3-6.1 0-8.5"></path><circle cx="12" cy="12" r="2"></circle><path d="M16.2 7.8c2.3 2.3 2.3 6.1 0 8.5"></path><path d="M19.1 4.9C23 8.8 23 15.1 19.1 19"></path></svg>
                                        <span class="text-gray-500 mr-2">Freight type:</span>
                                        <span class="font-medium text-gray-800"><?php echo e($courier->freight_type); ?></span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span class="text-gray-500 mr-2">Shipped:</span>
                                        <span class="font-medium text-gray-800"><?php echo e(\Carbon\Carbon::parse($courier->date_shipped)->format('M d, Y')); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Information -->
                            <div class="space-y-3 bg-primary-50/60 p-4 rounded-lg border border-primary-100">
                                <div class="flex items-center text-primary-600 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                                    <h3 class="text-base font-semibold">Status Information</h3>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 6v6l4 2"></path></svg>
                                        <span class="text-gray-500 mr-2">Status:</span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($courier->status === 'Delivered' ? 'bg-green-100 text-green-800' : ($courier->status === 'Custom Hold' ? 'bg-amber-100 text-amber-800' : 'bg-blue-100 text-blue-800')); ?>">
                                            <?php echo e($courier->status); ?>

                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                        <span class="text-gray-500 mr-2">Location:</span>
                                        <span class="font-medium text-gray-800"><?php echo e($courier->location); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipment Progress Tracker -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">Shipment Progress</h3>
                    </div>
                    <div class="p-6">
                        <?php
                            // Get unique statuses from tracking history in chronological order
                            $uniqueStatuses = $tracks->unique('status')->sortBy('created_at')->values();
                            $statusCount = $uniqueStatuses->count();
                            
                            // Define status icons and colors
                            $statusConfig = [
                                'Order Confirmed' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
                                    'color' => 'bg-primary-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Picked by Courier' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"></path><path d="M3 11v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v2H7v-2a2 2 0 0 0-4 0Z"></path><path d="M5 11V9"></path><path d="M19 11V9"></path></svg>',
                                    'color' => 'bg-blue-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Security Checking' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>',
                                    'color' => 'bg-indigo-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Border Check' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7V5a2 2 0 0 1 2-2h2"></path><path d="M17 3h2a2 2 0 0 1 2 2v2"></path><path d="M21 17v2a2 2 0 0 1-2 2h-2"></path><path d="M7 21H5a2 2 0 0 1-2-2v-2"></path><rect x="7" y="7" width="10" height="10" rx="2"></rect></svg>',
                                    'color' => 'bg-purple-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Missing Document' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" x2="12" y1="18" y2="12"></line><line x1="12" x2="12.01" y1="9" y2="9"></line></svg>',
                                    'color' => 'bg-red-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'On The Way' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 17h4V5H2v12h3"></path><path d="M20 17V9l-4-4H2"></path><path d="M13 5v4h7"></path><circle cx="7" cy="17" r="2"></circle><circle cx="17" cy="17" r="2"></circle></svg>',
                                    'color' => 'bg-cyan-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Custom Hold' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
                                    'color' => 'bg-amber-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Pending Payment' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path><path d="M12 18V6"></path></svg>',
                                    'color' => 'bg-orange-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Payment Received' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
                                    'color' => 'bg-green-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Additional Fee Applied' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" x2="22" y1="10" y2="10"></line></svg>',
                                    'color' => 'bg-rose-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Money Laundering' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>',
                                    'color' => 'bg-red-700',
                                    'inactive' => 'bg-gray-200'
                                ],
                                'Delivered' => [
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12V6a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-6"></path><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><circle cx="9" cy="19" r="2"></circle><path d="m9 12-2 2 2 2"></path><path d="m13 12 2 2-2 2"></path></svg>',
                                    'color' => 'bg-green-600',
                                    'inactive' => 'bg-gray-200'
                                ],
                            ];
                        ?>

                        <?php if($statusCount > 1): ?>
                            <div class="relative">
                                <!-- Progress Lines -->
                                <div class="hidden md:flex absolute top-1/2 left-0 w-full h-1 transform -translate-y-1/2 z-0">
                                    <?php for($i = 0; $i < $statusCount - 1; $i++): ?>
                                        <?php
                                            $currentStatus = $uniqueStatuses[$i];
                                            $nextStatus = $uniqueStatuses[$i + 1];
                                            $config = $statusConfig[$nextStatus->status] ?? ['color' => 'bg-primary-600'];
                                        ?>
                                        <div class="h-full flex-1 <?php echo e($config['color']); ?>"></div>
                                    <?php endfor; ?>
                                </div>

                                <!-- Mobile Progress Line -->
                                <div class="md:hidden absolute top-0 left-8 h-full z-0 flex flex-col">
                                    <?php for($i = 0; $i < $statusCount - 1; $i++): ?>
                                        <?php
                                            $nextStatus = $uniqueStatuses[$i + 1];
                                            $config = $statusConfig[$nextStatus->status] ?? ['color' => 'bg-primary-600'];
                                        ?>
                                        <div class="w-1 flex-1 <?php echo e($config['color']); ?>"></div>
                                    <?php endfor; ?>
                                </div>

                                <!-- Progress Steps -->
                                <div class="flex flex-col md:flex-row justify-between relative z-10">
                                    <?php $__currentLoopData = $uniqueStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $config = $statusConfig[$track->status] ?? [
                                                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" x2="12" y1="8" y2="16"></line><line x1="8" x2="16" y1="12" y2="12"></line></svg>',
                                                'color' => 'bg-primary-600',
                                                'inactive' => 'bg-gray-200'
                                            ];
                                            $isLast = $index === $statusCount - 1;
                                        ?>
                                        
                                        <div class="flex md:block md:text-center <?php echo e(!$isLast ? 'mb-8 md:mb-0' : ''); ?>">
                                            <div class="flex-shrink-0 flex items-center justify-center w-16 h-16 md:mx-auto rounded-full <?php echo e($config['color']); ?> text-white shadow-lg border-4 border-white">
                                                <?php echo $config['icon']; ?>

                                            </div>
                                            <div class="ml-4 md:ml-0 md:mt-3">
                                                <h4 class="text-sm font-semibold text-gray-900"><?php echo e($track->status); ?></h4>
                                                <p class="text-xs text-gray-500 mt-1"><?php echo e(\Carbon\Carbon::parse($track->created_at)->format('M d, Y')); ?></p>
                                                <?php if($track->address): ?>
                                                    <p class="text-xs text-gray-400 mt-0.5"><?php echo e($track->address); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"></path><path d="m7.5 4.27 9 5.15"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><line x1="12" x2="12" y1="22" y2="12"></line></svg>
                                <p class="text-gray-500">No tracking progress available yet</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Content Grid Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Left Column: Shipment History Timeline -->
                    <div class="lg:order-1 bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <h3 class="text-lg font-bold text-gray-800">Shipment History</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <?php if($tracks->count() > 0): ?>
                                <div class="relative">
                                    <!-- Timeline Line -->
                                    <div class="absolute top-0 left-4 h-full w-0.5 bg-gray-200 z-0"></div>

                                    <!-- Timeline Items -->
                                    <div class="space-y-6">
                                        <?php $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="relative z-10 flex items-start">
                                                <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full <?php echo e(($track->status === 'Delivered' || $track->status === 'Payment Received') ? 'bg-green-500' : ($track->status === 'Custom Hold' ? 'bg-amber-500' : 'bg-primary-600')); ?> text-white shadow-md border-2 border-white">
                                                    <?php if($track->status === 'Delivered' || $track->status === 'Payment Received'): ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                    <?php elseif($track->status === 'Custom Hold'): ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                                    <?php else: ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="flex items-center">
                                                        <span class="text-xs font-medium text-gray-500"><?php echo e(\Carbon\Carbon::parse($track->created_at)->format('M d, Y - h:i A')); ?></span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e(($track->status === 'Delivered' || $track->status === 'Payment Received') ? 'bg-green-100 text-green-800' : ($track->status === 'Custom Hold' ? 'bg-amber-100 text-amber-800' : 'bg-blue-100 text-blue-800')); ?>">
                                                            <?php echo e($track->status); ?>

                                                        </span>
                                                    </div>
                                                    <div class="mt-2 text-sm text-gray-700">
                                                        <p class="font-medium"><?php echo e($track->city); ?></p>
                                                        <p class="mt-1 text-gray-600"><?php echo e($track->comment); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="flex flex-col items-center justify-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    <p class="text-gray-500 text-center">No shipment history available</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Center/Right Column: Live Tracking Map (spans 2 columns on larger screens) -->
                    <div class="lg:order-2 lg:col-span-2 bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="flex items-center px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <h3 class="text-lg font-bold text-gray-800">Complete Shipment Route</h3>
                            <span class="ml-auto text-xs text-gray-500">(Fixed Map View)</span>
                        </div>
                        <div class="p-0">
                            <div class="relative h-[550px]">
                                <!-- Using Leaflet.js for mapping with yellow route lines - doesn't require API key -->
                                <div id="shipment_map" class="w-full h-full overflow-hidden"></div>

                                <!-- Route Info Overlay -->
                                <div class="absolute bottom-4 left-4 bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm p-4 rounded-lg shadow-lg max-w-sm">
                                    <h4 class="text-sm font-semibold text-gray-800 mb-3">Shipment Route</h4>

                                    <div class="space-y-3">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 h-5 w-5 rounded-full bg-blue-500 border-2 border-white shadow-sm flex items-center justify-center mt-0.5">
                                                <span class="text-white text-xs font-bold">A</span>
                                            </div>
                                            <div class="ml-2">
                                                <p class="text-xs font-medium text-gray-900">Origin Point</p>
                                                <p class="text-xs text-gray-600 truncate"><?php echo e($courier->saddress); ?></p>
                                            </div>
                                        </div>

                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 h-5 w-5 rounded-full bg-amber-500 border-2 border-white shadow-sm flex items-center justify-center mt-0.5">
                                                <span class="text-white text-xs font-bold">B</span>
                                            </div>
                                            <div class="ml-2">
                                                <p class="text-xs font-medium text-gray-900">Current Location</p>
                                                <p class="text-xs text-gray-600 truncate"><?php echo e($courier->location); ?></p>
                                                <?php if($tracks->count() > 0): ?>
                                                    <?php
                                                        $latestTrack = $tracks->sortByDesc('created_at')->first();
                                                    ?>
                                                    <p class="text-xs text-gray-500">
                                                        Updated: <?php echo e(\Carbon\Carbon::parse($latestTrack->created_at)->format('M d, Y - h:i A')); ?>

                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 h-5 w-5 rounded-full bg-green-500 border-2 border-white shadow-sm flex items-center justify-center mt-0.5">
                                                <span class="text-white text-xs font-bold">C</span>
                                            </div>
                                            <div class="ml-2">
                                                <p class="text-xs font-medium text-gray-900">Destination</p>
                                                <p class="text-xs text-gray-600 truncate"><?php echo e($courier->address); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3 pt-3 border-t border-gray-200">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                <span class="text-xs font-medium">Estimated Distance:</span>
                                            </div>
                                            <span id="route_distance" class="text-xs font-semibold text-primary-700">Calculating...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parcel Information Card -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 16h6v6h-6z"></path><path d="M2 16h6v6H2z"></path><path d="M9 16h6v6H9z"></path><path d="M2 9h6v6H2z"></path><path d="M9 9h6v6H9z"></path><path d="M16 9h6v6h-6z"></path><path d="M16 2h6v6h-6z"></path><path d="M2 2h6v6H2z"></path><path d="M9 2h6v6H9z"></path></svg>
                            <h3 class="text-lg font-bold text-gray-800">Parcel Information</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row">
                            <?php if($courier->photo): ?>
                            <div class="md:w-1/4 mb-6 md:mb-0 md:pr-6">
                                <div class="bg-gray-100 p-2 rounded-lg">
                                    <img src="<?php echo e(asset('public/' . $courier->photo)); ?>"
                                        class="w-full h-auto rounded-lg object-cover"
                                        alt="Parcel photo">
                                </div>
                                
                                <?php if($courier->video): ?>
                                <div class="mt-4">
                                    <h4 class="text-sm font-semibold text-gray-800 mb-2">Shipment Video</h4>
                                    <div class="bg-gray-100 p-2 rounded-lg">
                                        <video controls class="w-full h-auto rounded-lg" preload="metadata">
                                            <source src="<?php echo e(asset('public/' . $courier->video)); ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <div class="md:w-<?php echo e($courier->photo ? '3/4' : 'full'); ?>">
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="m15 9-6 6"></path><path d="m9 9 6 6"></path></svg>
                                            <h4 class="text-sm font-semibold text-gray-800">Duty Fees</h4>
                                        </div>
                                        <p class="text-green-600 font-semibold"><?php echo e($courier->plan); ?></p>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v-4h2"></path><circle cx="17" cy="8" r="2"></circle><rect x="3" y="3" width="18" height="18" rx="2"></rect></svg>
                                            <h4 class="text-sm font-semibold text-gray-800">Weight</h4>
                                        </div>
                                        <p class="text-gray-700"><?php echo e($courier->weight); ?> kg</p>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            <h4 class="text-sm font-semibold text-gray-800">Pickup Date</h4>
                                        </div>
                                        <p class="text-gray-700"><?php echo e(\Carbon\Carbon::parse($courier->date_shipped)->format('M d, Y - h:i A')); ?></p>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 3 21 3 21 8"></polyline><line x1="4" y1="20" x2="21" y2="3"></line><polyline points="21 16 21 21 16 21"></polyline><line x1="15" y1="15" x2="21" y2="21"></line><line x1="4" y1="4" x2="9" y2="9"></line></svg>
                                            <h4 class="text-sm font-semibold text-gray-800">Expected Delivery</h4>
                                        </div>
                                        <p class="text-gray-700"><?php echo e(\Carbon\Carbon::parse($courier->expected_delivery)->format('M d, Y - h:i A')); ?></p>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.9 19.1C1 15.2 1 8.8 4.9 4.9"></path><path d="M7.8 16.2c-2.3-2.3-2.3-6.1 0-8.5"></path><circle cx="12" cy="12" r="2"></circle><path d="M16.2 7.8c2.3 2.3 2.3 6.1 0 8.5"></path><path d="M19.1 4.9C23 8.8 23 15.1 19.1 19"></path></svg>
                                            <h4 class="text-sm font-semibold text-gray-800">Delivery Mode</h4>
                                        </div>
                                        <p class="text-gray-700"><?php echo e($courier->freight_type); ?></p>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                                            <h4 class="text-sm font-semibold text-gray-800">Tracking Status</h4>
                                        </div>
                                        <p class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($courier->status === 'Delivered' ? 'bg-green-100 text-green-800' : ($courier->status === 'Custom Hold' ? 'bg-amber-100 text-amber-800' : 'bg-blue-100 text-blue-800')); ?>">
                                            <?php echo e($courier->status); ?>

                                        </p>
                                    </div>
                                </div>

                                <div class="mt-6 flex flex-wrap gap-3 justify-center md:justify-start">
                                    <a href="<?php echo e(route('printnow', $courier->id)); ?>" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                        Print Reciept
                                    </a>

                                    <?php if($courier->clearance_cost > 0 || $courier->cost > 0): ?>
                                    <a href="<?php echo e(route('home.deposits', ['courier_id' => $courier->id])); ?>" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                        Pay Clearance Fee (<?php echo e(number_format($courier->clearance_cost + $courier->cost, 2)); ?>)
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet Map integration script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Wait a bit for Alpine.js to finish loading
        setTimeout(function() {
            // Initialize the map
            const mapElement = document.getElementById("shipment_map");
            if (!mapElement) return;

            // Store addresses to use in geocoding
            const originAddress = "<?php echo e($courier->saddress); ?>";
            const currentAddress = "<?php echo e($courier->location); ?>";
            const destinationAddress = "<?php echo e($courier->address); ?>";

            // Initialize the Leaflet map with English language setting and fixed position
            const map = L.map('shipment_map', {
                lang: 'en', // Set language to English
                preferCanvas: true,
                dragging: false,      // Disable map dragging to keep it fixed
                touchZoom: false,     // Disable touch zoom
                scrollWheelZoom: false, // Disable scroll wheel zoom
                doubleClickZoom: false, // Disable double click zoom
                boxZoom: false,       // Disable box zoom
                tap: false,           // Disable tap handler for mobile
                keyboard: false,      // Disable keyboard navigation
                zoomControl: false,   // Hide zoom control
                attributionControl: true // Keep attribution visible
            }).setView([0, 0], 2);

            // Add OpenStreetMap tile layer (free, no API key needed)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 19,
                language: 'en' // Force English language
            }).addTo(map);

            // Function to geocode addresses and add markers
            async function geocodeAndAddMarkers() {
                try {
                    // Use OpenStreetMap Nominatim for geocoding (free, no API key needed) - set to English language
                    // Origin marker (blue)
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(originAddress)}&accept-language=en`)
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.length > 0) {
                                const originLat = parseFloat(data[0].lat);
                                const originLon = parseFloat(data[0].lon);

                                // Add origin marker
                                const originMarker = L.marker([originLat, originLon], {
                                    title: 'Origin'
                                }).addTo(map);
                                originMarker.bindPopup(`<b>Origin:</b><br>${originAddress}`).openPopup();

                                // Get current location coordinates
                                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(currentAddress)}&accept-language=en`)
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data && data.length > 0) {
                                            const currentLat = parseFloat(data[0].lat);
                                            const currentLon = parseFloat(data[0].lon);

                                            // Add current location marker (yellow)
                                            const currentIcon = L.divIcon({
                                                html: '<div style="background-color: #FFD700; width: 24px; height: 24px; border-radius: 50%; border: 2px solid white;"></div>',
                                                className: 'custom-div-icon',
                                                iconSize: [24, 24],
                                                iconAnchor: [12, 12]
                                            });

                                            const currentMarker = L.marker([currentLat, currentLon], {
                                                icon: currentIcon,
                                                title: 'Current Location'
                                            }).addTo(map);
                                            currentMarker.bindPopup(`<b>Current Location:</b><br>${currentAddress}`);

                                            // Get destination coordinates
                                            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(destinationAddress)}&accept-language=en`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data && data.length > 0) {
                                                        const destLat = parseFloat(data[0].lat);
                                                        const destLon = parseFloat(data[0].lon);

                                                        // Add destination marker (green)
                                                        const destIcon = L.divIcon({
                                                            html: '<div style="background-color: #4CAF50; width: 24px; height: 24px; border-radius: 50%; border: 2px solid white;"></div>',
                                                            className: 'custom-div-icon',
                                                            iconSize: [24, 24],
                                                            iconAnchor: [12, 12]
                                                        });

                                                        const destMarker = L.marker([destLat, destLon], {
                                                            icon: destIcon,
                                                            title: 'Destination'
                                                        }).addTo(map);
                                                        destMarker.bindPopup(`<b>Destination:</b><br>${destinationAddress}`);

                                                        // Draw a yellow polyline connecting all points
                                                        const routePoints = [
                                                            [originLat, originLon],
                                                            [currentLat, currentLon],
                                                            [destLat, destLon]
                                                        ];

                                                        const yellowRoute = L.polyline(routePoints, {
                                                            color: '#FFD700',
                                                            weight: 5,
                                                            opacity: 0.8
                                                        }).addTo(map);

                                                        // Force English language for all map controls
                                                        map.getContainer().setAttribute('lang', 'en');

                                                        // Fit the map to show all markers with fixed bounds
                                                        map.fitBounds(yellowRoute.getBounds(), {
                                                            padding: [50, 50],
                                                            animate: false,
                                                            maxZoom: 10 // Limit max zoom to keep the map fixed
                                                        });

                                                        // Disable all map interactions after fitting bounds
                                                        map.once('moveend', function() {
                                                            map._handlers.forEach(function(handler) {
                                                                handler.disable();
                                                            });
                                                            // Add a class to indicate the map is fixed
                                                            map.getContainer().classList.add('fixed-map');
                                                        });

                                                        // Update route distance text in English
                                                        document.getElementById("route_distance").textContent = "Route with yellow path lines";
                                                    }
                                                });
                                        }
                                    });
                            }
                        });
                } catch (error) {
                    console.error("Error geocoding addresses:", error);
                    // Fallback text if geocoding fails
                    document.getElementById("route_distance").textContent = "Unable to calculate route";
                }
            }

            // Call the function to geocode and add markers
            geocodeAndAddMarkers();

            // Create a link for users to see the Google Maps directions as backup
            const routeLink = document.createElement('div');
            routeLink.className = 'absolute bottom-4 right-4 bg-white p-2 rounded shadow-md z-[1000]';
            routeLink.innerHTML = `
                <a href="https://www.google.com/maps/dir/${encodeURIComponent(originAddress)}/${encodeURIComponent(currentAddress)}/${encodeURIComponent(destinationAddress)}"
                   class="text-xs text-primary-600 hover:text-primary-800 font-medium"
                   target="_blank">
                   Open in Google Maps
                </a>
            `;

            // Append the route link to the map container
            mapElement.appendChild(routeLink);
        }, 1000);
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shyp\resources\views/home/track-result.blade.php ENDPATH**/ ?>