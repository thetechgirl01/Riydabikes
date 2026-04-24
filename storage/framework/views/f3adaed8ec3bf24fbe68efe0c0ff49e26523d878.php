```php


<?php $__env->startSection('content'); ?>
<!-- Add Leaflet CSS and JS for free mapping -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
      crossorigin=""></script>

<style>
    #delivery_map {
        position: relative !important;
        overflow: hidden;
        border-radius: 1rem;
    }
    .leaflet-container {
        position: absolute !important;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }
    .leaflet-pane {
        z-index: 1;
    }
</style>

<div class="bg-gray-50 py-10 md:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 600)">
            <!-- Loading State -->
            <div x-show="loading" class="flex flex-col items-center justify-center p-10 bg-white rounded-2xl shadow-lg">
                <div class="w-14 h-14 border-4 border-[#800020] border-t-transparent rounded-full animate-spin mb-4"></div>
                <p class="text-gray-600 font-medium">Loading delivery details...</p>
            </div>

            <!-- Tracking Result -->
            <div x-show="!loading" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

                <!-- Header -->
                <div class="mb-6">
                    <div class="flex items-center gap-2 mb-3">
                        <i class="fas fa-location-dot text-[#800020] text-lg"></i>
                        <h1 class="text-2xl font-bold text-gray-800">Delivery Tracking</h1>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <a href="/" class="hover:text-[#800020] transition-colors">Home</a>
                        <i class="fas fa-angle-right text-xs"></i>
                        <span class="text-gray-700">Track Delivery</span>
                    </div>
                </div>

                <!-- Tracking Summary Card -->
                <div class="bg-white rounded-2xl shadow-md overflow-hidden mb-6">
                    <div class="px-6 py-5 bg-[#800020]">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <p class="text-white/70 text-sm mb-1">Tracking ID</p>
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl md:text-3xl font-mono font-bold text-white"><?php echo e($courier->trackingnumber); ?></span>
                                    <span class="px-2 py-0.5 bg-white/20 rounded-full text-xs text-white">Active</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-circle text-[#FFD600] text-xs"></i>
                                <span class="text-white font-medium">Status:</span>
                                <span class="px-3 py-1 rounded-full text-sm font-semibold <?php echo e($courier->status === 'Delivered' ? 'bg-green-500 text-white' : ($courier->status === 'Custom Hold' ? 'bg-amber-500 text-white' : 'bg-blue-500 text-white')); ?>">
                                    <?php echo e($courier->status); ?>

                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Info Row -->
                    <div class="p-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#800020]/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-box text-[#800020]"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Weight</p>
                                <p class="font-semibold text-gray-800"><?php echo e($courier->weight); ?> kg</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#800020]/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-truck text-[#800020]"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Freight Type</p>
                                <p class="font-semibold text-gray-800"><?php echo e($courier->freight_type); ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#800020]/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-calendar text-[#800020]"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Shipped On</p>
                                <p class="font-semibold text-gray-800"><?php echo e(\Carbon\Carbon::parse($courier->date_shipped)->format('M d, Y')); ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#800020]/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-clock text-[#800020]"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Expected Delivery</p>
                                <p class="font-semibold text-gray-800"><?php echo e(\Carbon\Carbon::parse($courier->expected_delivery)->format('M d, Y')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Two Column Layout: Map + Timeline -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Map Section (Left on desktop, takes 2/3) -->
                    <div class="lg:col-span-2 order-2 lg:order-1">
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                            <div class="px-5 py-4 bg-gray-50 border-b border-gray-100">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-map text-[#800020]"></i>
                                    <h3 class="font-bold text-gray-800">Delivery Route Map</h3>
                                </div>
                            </div>
                            <div class="relative h-[450px]">
                                <div id="delivery_map" class="w-full h-full"></div>
                                <!-- Route Overlay -->
                                <div class="absolute bottom-4 left-4 bg-white/95 backdrop-blur-sm p-3 rounded-xl shadow-md max-w-xs">
                                    <p class="text-xs font-semibold text-gray-700 mb-2">📍 Route Points</p>
                                    <div class="space-y-2 text-xs">
                                        <div class="flex items-center gap-2">
                                            <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                                            <span class="text-gray-600">Origin: Pickup location</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="w-3 h-3 rounded-full bg-[#FFD600]"></div>
                                            <span class="text-gray-600">Current: <?php echo e($courier->location); ?></span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                            <span class="text-gray-600">Destination: Delivery address</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Section (Right on desktop, takes 1/3) -->
                    <div class="lg:col-span-1 order-1 lg:order-2">
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                            <div class="px-5 py-4 bg-gray-50 border-b border-gray-100">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-history text-[#800020]"></i>
                                    <h3 class="font-bold text-gray-800">Delivery Timeline</h3>
                                </div>
                            </div>
                            <div class="p-5 max-h-[450px] overflow-y-auto">
                                <?php if($tracks->count() > 0): ?>
                                    <div class="relative pl-4 border-l-2 border-gray-200 space-y-5">
                                        <?php $__currentLoopData = $tracks->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="relative">
                                                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full <?php echo e(($track->status === 'Delivered') ? 'bg-green-500' : (($track->status === 'Custom Hold') ? 'bg-amber-500' : 'bg-[#800020]')); ?> border-2 border-white shadow-sm"></div>
                                                <div class="ml-4">
                                                    <p class="text-xs text-gray-500"><?php echo e(\Carbon\Carbon::parse($track->created_at)->format('M d, Y - h:i A')); ?></p>
                                                    <p class="text-sm font-semibold text-gray-800 mt-0.5"><?php echo e($track->status); ?></p>
                                                    <?php if($track->city): ?>
                                                        <p class="text-xs text-gray-500 mt-0.5"><?php echo e($track->city); ?></p>
                                                    <?php endif; ?>
                                                    <?php if($track->comment): ?>
                                                        <p class="text-xs text-gray-600 mt-1"><?php echo e($track->comment); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center py-6">
                                        <i class="fas fa-clock text-gray-300 text-3xl mb-2"></i>
                                        <p class="text-gray-500 text-sm">No updates yet</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Cards Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white rounded-xl shadow-sm p-4 border-l-4 border-blue-500">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-store text-blue-500 text-sm"></i>
                            <h4 class="text-sm font-semibold text-gray-700">Pickup From</h4>
                        </div>
                        <p class="text-gray-800 text-sm font-medium"><?php echo e($courier->sname); ?></p>
                        <p class="text-gray-500 text-xs mt-1"><?php echo e($courier->saddress); ?></p>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-4 border-l-4 border-[#FFD600]">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-motorcycle text-[#FFD600] text-sm"></i>
                            <h4 class="text-sm font-semibold text-gray-700">Current Location</h4>
                        </div>
                        <p class="text-gray-800 text-sm font-medium"><?php echo e($courier->location); ?></p>
                        <?php if($tracks->count() > 0): ?>
                            <p class="text-gray-400 text-xs mt-1">Updated: <?php echo e(\Carbon\Carbon::parse($tracks->sortByDesc('created_at')->first()->created_at)->format('M d, h:i A')); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-4 border-l-4 border-green-500">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-home text-green-500 text-sm"></i>
                            <h4 class="text-sm font-semibold text-gray-700">Deliver To</h4>
                        </div>
                        <p class="text-gray-800 text-sm font-medium"><?php echo e($courier->name); ?></p>
                        <p class="text-gray-500 text-xs mt-1"><?php echo e($courier->address); ?></p>
                        <p class="text-gray-500 text-xs"><?php echo e($courier->phone); ?></p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="<?php echo e(route('printnow', $courier->id)); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#800020] text-white rounded-full text-sm font-semibold hover:bg-[#6b001a] transition-all shadow-sm">
                        <i class="fas fa-print"></i> Print Receipt
                    </a>
                    <?php if(($courier->clearance_cost ?? 0) > 0 || ($courier->cost ?? 0) > 0): ?>
                    <a href="<?php echo e(route('home.deposits', ['courier_id' => $courier->id])); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#FFD600] text-[#800020] rounded-full text-sm font-semibold hover:bg-[#e6c200] transition-all shadow-sm">
                        <i class="fas fa-credit-card"></i> Pay Fee (₦<?php echo e(number_format(($courier->clearance_cost ?? 0) + ($courier->cost ?? 0), 2)); ?>)
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            const mapElement = document.getElementById("delivery_map");
            if (!mapElement) return;

            const originAddress = "<?php echo e($courier->saddress); ?>";
            const currentAddress = "<?php echo e($courier->location); ?>";
            const destinationAddress = "<?php echo e($courier->address); ?>";

            const map = L.map('delivery_map', {
                dragging: false,
                touchZoom: false,
                scrollWheelZoom: false,
                doubleClickZoom: false,
                boxZoom: false,
                tap: false,
                keyboard: false,
                zoomControl: false
            }).setView([0, 0], 2);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            async function geocodeAndAddMarkers() {
                try {
                    // Origin
                    const originRes = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(originAddress)}&limit=1`);
                    const originData = await originRes.json();
                    
                    // Current
                    const currentRes = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(currentAddress)}&limit=1`);
                    const currentData = await currentRes.json();
                    
                    // Destination
                    const destRes = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(destinationAddress)}&limit=1`);
                    const destData = await destRes.json();

                    const points = [];
                    
                    if (originData && originData.length > 0) {
                        const lat = parseFloat(originData[0].lat);
                        const lon = parseFloat(originData[0].lon);
                        points.push([lat, lon]);
                        L.marker([lat, lon], { title: 'Origin' }).addTo(map).bindPopup('<b>Pickup Location</b>');
                    }
                    
                    if (currentData && currentData.length > 0) {
                        const lat = parseFloat(currentData[0].lat);
                        const lon = parseFloat(currentData[0].lon);
                        points.push([lat, lon]);
                        const currentIcon = L.divIcon({
                            html: '<div style="background-color: #FFD600; width: 14px; height: 14px; border-radius: 50%; border: 2px solid white; box-shadow: 0 0 5px rgba(0,0,0,0.3);"></div>',
                            className: 'custom-div-icon',
                            iconSize: [14, 14],
                            iconAnchor: [7, 7]
                        });
                        L.marker([lat, lon], { icon: currentIcon, title: 'Current' }).addTo(map).bindPopup('<b>Current Location</b><br>' + currentAddress);
                    }
                    
                    if (destData && destData.length > 0) {
                        const lat = parseFloat(destData[0].lat);
                        const lon = parseFloat(destData[0].lon);
                        points.push([lat, lon]);
                        const destIcon = L.divIcon({
                            html: '<div style="background-color: #4CAF50; width: 14px; height: 14px; border-radius: 50%; border: 2px solid white; box-shadow: 0 0 5px rgba(0,0,0,0.3);"></div>',
                            className: 'custom-div-icon',
                            iconSize: [14, 14],
                            iconAnchor: [7, 7]
                        });
                        L.marker([lat, lon], { icon: destIcon, title: 'Destination' }).addTo(map).bindPopup('<b>Delivery Location</b>');
                    }

                    if (points.length >= 2) {
                        const routeLine = L.polyline(points, { color: '#FFD600', weight: 4, opacity: 0.8 }).addTo(map);
                        map.fitBounds(routeLine.getBounds(), { padding: [40, 40] });
                    } else if (points.length === 1) {
                        map.setView(points[0], 12);
                    }

                    map._handlers.forEach(handler => handler.disable());
                } catch (error) {
                    console.error("Map error:", error);
                }
            }

            geocodeAndAddMarkers();
        }, 800);
    });
</script>
<?php $__env->stopSection(); ?>
```
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/track-result.blade.php ENDPATH**/ ?>