

<?php $__env->startSection('title', $bike->name); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <nav class="mb-6 text-sm">
            <a href="<?php echo e(route('home.bikes.index')); ?>" class="text-blue-600 hover:underline dark:text-blue-400">← Back to bikes</a>
        </nav>

        <?php if(session('error')): ?>
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 dark:bg-red-900/30">
                <p class="text-sm text-red-700 dark:text-red-300"><?php echo e(session('error')); ?></p>
            </div>
        <?php endif; ?>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-10">

                <!-- Image -->
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden">
                    <img src="<?php echo e($bike->image_url); ?>" alt="<?php echo e($bike->name); ?>" class="w-full h-full object-cover">
                </div>

                <!-- Details -->
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($bike->name); ?></h1>
                    <?php if($bike->brand): ?>
                        <p class="mt-1 text-gray-500 dark:text-gray-400"><?php echo e($bike->brand); ?></p>
                    <?php endif; ?>

                    <div class="mt-5 space-y-2">
                        <div class="flex items-baseline gap-2">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Buy for</span>
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">₦<?php echo e(number_format($bike->price, 2)); ?></span>
                        </div>
                        <?php if($bike->available_for_hire): ?>
                            <div class="flex items-baseline gap-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Hire for</span>
                                <span class="text-xl font-semibold text-indigo-600 dark:text-indigo-400">₦<?php echo e(number_format($bike->daily_rate, 2)); ?> / day</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <?php if($bike->isInStock()): ?>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300">
                                In stock (<?php echo e($bike->stock); ?>)
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300">Out of stock</span>
                        <?php endif; ?>

                        <?php if($bike->available_for_hire): ?>
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300">
                                Available for hire
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if($bike->description): ?>
                        <div class="mt-6 prose prose-sm max-w-none dark:prose-invert">
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line"><?php echo e($bike->description); ?></p>
                        </div>
                    <?php endif; ?>

                    <!-- Action buttons -->
                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <?php if($bike->isInStock()): ?>
                            <a href="<?php echo e(route('home.bikes.buy', $bike->slug)); ?>"
                               class="inline-flex justify-center items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium transition">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                Buy Now
                            </a>
                        <?php else: ?>
                            <button disabled class="inline-flex justify-center items-center px-5 py-3 bg-gray-300 text-gray-500 rounded-md font-medium cursor-not-allowed dark:bg-gray-600">
                                Out of stock
                            </button>
                        <?php endif; ?>

                        <?php if($bike->available_for_hire): ?>
                            <a href="<?php echo e(route('home.bikes.hire', $bike->slug)); ?>"
                               class="inline-flex justify-center items-center px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-medium transition">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Hire This Bike
                            </a>
                        <?php else: ?>
                            <button disabled class="inline-flex justify-center items-center px-5 py-3 bg-gray-200 text-gray-400 rounded-md font-medium cursor-not-allowed dark:bg-gray-700 dark:text-gray-500">
                                Not available for hire
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/bikes/show.blade.php ENDPATH**/ ?>