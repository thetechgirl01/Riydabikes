

<?php $__env->startSection('title', 'Bikes'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
    <!-- Hero -->
    <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 py-12 px-4 sm:px-6 lg:px-8 text-white">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Our Bikes</h1>
            <p class="text-lg opacity-90">Buy outright or hire by the day.</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden rotate-180" style="transform: translateY(1px);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-50 dark:fill-gray-900"></path>
            </svg>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <?php if($bikes->isEmpty()): ?>
            <div class="text-center py-16">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0l-2 7H6l-2-7m16 0H4"/>
                </svg>
                <p class="mt-4 text-gray-600 dark:text-gray-300">No bikes available right now. Please check back soon.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $bikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                        <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="block">
                            <div class="aspect-w-4 aspect-h-3 bg-gray-100 dark:bg-gray-700">
                                <img src="<?php echo e($bike->image_url); ?>" alt="<?php echo e($bike->name); ?>" class="w-full h-56 object-cover">
                            </div>
                        </a>
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white">
                                        <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="hover:underline"><?php echo e($bike->name); ?></a>
                                    </h3>
                                    <?php if($bike->brand): ?>
                                        <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($bike->brand); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if($bike->available_for_hire): ?>
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                        Available for Hire
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300">Hire unavailable</span>
                                <?php endif; ?>
                            </div>

                            <div class="mt-4 space-y-1">
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">₦<?php echo e(number_format($bike->price, 2)); ?></p>
                                <?php if($bike->available_for_hire): ?>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">or ₦<?php echo e(number_format($bike->daily_rate, 2)); ?> / day</p>
                                <?php endif; ?>
                            </div>

                            <div class="mt-5 pt-4 border-t border-gray-100 dark:border-gray-700">
                                <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>"
                                   class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition">
                                    View Details
                                    <svg class="w-4 h-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-8">
                <?php echo e($bikes->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/bikes/index.blade.php ENDPATH**/ ?>