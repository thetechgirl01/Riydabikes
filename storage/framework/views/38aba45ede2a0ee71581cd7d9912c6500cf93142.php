

<?php $__env->startSection('title', 'Our Bikes - RydaBikes'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
    <!-- Page Header -->
    <section class="relative pt-32 pb-20 bg-[#800020]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Bikes</h1>
                <p class="text-lg text-white/80 max-w-2xl">
                    Buy outright or hire by the day — premium bikes ready for the road
                </p>
                <div class="flex items-center gap-2 text-sm text-white/70 mt-6">
                    <a href="/" class="hover:text-[#FFD600] transition-colors">Home</a>
                    <i class="fas fa-angle-right text-xs"></i>
                    <span class="text-white">Bikes</span>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <?php if($bikes->isEmpty()): ?>
            <div class="text-center py-16">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0l-2 7H6l-2-7m16 0H4"/>
                </svg>
                <p class="mt-4 text-gray-600 dark:text-gray-300">No bikes available right now. Please check back soon.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $bikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 ease-out">
                        <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="block relative overflow-hidden bg-white">
                            <div class="aspect-w-4 aspect-h-3 bg-white p-6">
                                <img src="<?php echo e($bike->image_url); ?>" alt="<?php echo e($bike->name); ?>" class="w-full h-64 object-contain transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <?php if($bike->available_for_hire): ?>
                                <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-[#800020] text-white shadow-md">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#FFD600] mr-1.5 animate-pulse"></span>
                                    Available For Hire
                                </span>
                            <?php else: ?>
                                <span class="absolute top-3 right-3 inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gray-600 text-white shadow-md">Unavailable For Hire</span>
                            <?php endif; ?>
                        </a>
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-1">
                                        <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="hover:text-[#800020] transition-colors duration-200"><?php echo e($bike->name); ?></a>
                                    </h3>
                                    <?php if($bike->brand): ?>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 font-medium"><?php echo e($bike->brand); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mt-4 space-y-1">
                                <p class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">₦<?php echo e(number_format($bike->price, 2)); ?></p>
                                <?php if($bike->available_for_hire): ?>
                                    <p class="text-base font-semibold text-[#800020] dark:text-[#FFD600]">or ₦<?php echo e(number_format($bike->daily_rate, 2)); ?> <span class="text-sm font-normal text-gray-500">/ day</span></p>
                                <?php endif; ?>
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                                <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>"
                                   class="w-full inline-flex justify-center items-center px-5 py-3 bg-[#800020] hover:bg-[#6b001a] text-white rounded-full text-sm font-semibold transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 gap-2">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-10">
                <?php echo e($bikes->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/bikes/index.blade.php ENDPATH**/ ?>