

<?php $__env->startSection('title', 'Buy '.$bike->name); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <nav class="mb-8 text-sm">
            <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="inline-flex items-center gap-2 text-[#800020] hover:text-[#6b001a] font-medium transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to <?php echo e($bike->name); ?>

            </a>
        </nav>

        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Complete Your Purchase</h1>
        <p class="text-gray-500 dark:text-gray-400 mb-8">Fill in the details below to secure your bike</p>

        <?php if($errors->any()): ?>
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 rounded-r-xl p-4 dark:bg-red-900/20">
                <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300 space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($e); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 rounded-r-xl p-4 dark:bg-red-900/20">
                <p class="text-sm text-red-700 dark:text-red-300"><?php echo e(session('error')); ?></p>
            </div>
        <?php endif; ?>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            <!-- Order summary -->
            <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-white dark:from-gray-900/60 dark:to-gray-800 border-b dark:border-gray-700">
                <div class="flex items-center gap-5">
                    <div class="w-24 h-24 bg-white rounded-xl shadow-md overflow-hidden flex items-center justify-center p-2">
                        <img src="<?php echo e($bike->image_url); ?>" alt="<?php echo e($bike->name); ?>" class="w-full h-full object-contain">
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-xl text-gray-900 dark:text-white"><?php echo e($bike->name); ?></p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Unit price: <span class="font-semibold text-[#800020] dark:text-[#FFD600]">₦<?php echo e(number_format($bike->price, 2)); ?></span></p>
                    </div>
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('home.bikes.buy.store', $bike->slug)); ?>" enctype="multipart/form-data" class="p-6 space-y-6">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Quantity</label>
                    <input type="number" name="quantity" id="quantity" min="1" max="<?php echo e($bike->stock); ?>" value="<?php echo e(old('quantity', 1)); ?>" required
                           class="w-36 rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400"><?php echo e($bike->stock); ?> units available</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                        <input type="text" name="guest_name" value="<?php echo e(old('guest_name')); ?>" required
                               class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                        <input type="email" name="guest_email" value="<?php echo e(old('guest_email')); ?>" required
                               class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                        <input type="text" name="guest_phone" value="<?php echo e(old('guest_phone')); ?>" required
                               class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Payment Method</label>
                        <select name="payment_method" required
                                class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                            <option value="">— Select payment method —</option>
                            <?php $__currentLoopData = $dmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m->name); ?>" <?php echo e(old('payment_method') == $m->name ? 'selected' : ''); ?>><?php echo e($m->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Shipping Address</label>
                    <textarea name="shipping_address" rows="3" required
                              class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4"><?php echo e(old('shipping_address')); ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">City</label>
                        <input type="text" name="city" value="<?php echo e(old('city')); ?>" required
                               class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">State</label>
                        <input type="text" name="state" value="<?php echo e(old('state')); ?>" required
                               class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Upload Payment Proof</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-xl hover:border-[#800020] transition-colors duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                <label for="proof" class="relative cursor-pointer bg-white dark:bg-gray-700 rounded-md font-medium text-[#800020] hover:text-[#6b001a] focus-within:outline-none">
                                    <span>Upload a file</span>
                                    <input id="proof" name="proof" type="file" accept="image/*" required class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Transfer receipt screenshot. JPG / PNG up to 4MB</p>
                        </div>
                    </div>
                </div>

                <!-- Total -->
                <div class="bg-gradient-to-r from-[#800020]/10 to-transparent dark:from-[#800020]/20 rounded-xl p-5 flex justify-between items-center">
                    <span class="text-base font-semibold text-gray-700 dark:text-gray-300">Order Total</span>
                    <span id="order-total" class="text-3xl font-extrabold text-[#800020] dark:text-[#FFD600]">₦<?php echo e(number_format($bike->price, 2)); ?></span>
                </div>

                <button type="submit" class="w-full inline-flex justify-center items-center gap-2 px-6 py-4 bg-[#800020] hover:bg-[#6b001a] text-white rounded-full font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Submit Order
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    (function () {
        const unit = <?php echo e($bike->price); ?>;
        const qty = document.getElementById('quantity');
        const tot = document.getElementById('order-total');
        function update() {
            const n = Math.max(1, parseInt(qty.value || 1, 10));
            const total = unit * n;
            tot.textContent = '₦' + total.toLocaleString('en-NG', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        }
        qty.addEventListener('input', update);
    })();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/bikes/buy.blade.php ENDPATH**/ ?>