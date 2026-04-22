

<?php $__env->startSection('title', 'Buy '.$bike->name); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <nav class="mb-6 text-sm">
            <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="text-blue-600 hover:underline dark:text-blue-400">← Back to <?php echo e($bike->name); ?></a>
        </nav>

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Checkout — <?php echo e($bike->name); ?></h1>

        <?php if($errors->any()): ?>
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 dark:bg-red-900/30">
                <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($e); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 dark:bg-red-900/30">
                <p class="text-sm text-red-700 dark:text-red-300"><?php echo e(session('error')); ?></p>
            </div>
        <?php endif; ?>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <!-- Order summary -->
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/40 border-b dark:border-gray-700">
                <div class="flex items-center gap-4">
                    <img src="<?php echo e($bike->image_url); ?>" alt="<?php echo e($bike->name); ?>" class="w-20 h-20 object-cover rounded-md">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 dark:text-white"><?php echo e($bike->name); ?></p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Unit price: ₦<?php echo e(number_format($bike->price, 2)); ?></p>
                    </div>
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('home.bikes.buy.store', $bike->slug)); ?>" enctype="multipart/form-data" class="p-6 space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Quantity</label>
                    <input type="number" name="quantity" id="quantity" min="1" max="<?php echo e($bike->stock); ?>" value="<?php echo e(old('quantity', 1)); ?>" required
                           class="w-32 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400"><?php echo e($bike->stock); ?> available</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                        <input type="text" name="guest_name" value="<?php echo e(old('guest_name')); ?>" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="guest_email" value="<?php echo e(old('guest_email')); ?>" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                        <input type="text" name="guest_phone" value="<?php echo e(old('guest_phone')); ?>" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Method</label>
                        <select name="payment_method" required
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                            <option value="">— select —</option>
                            <?php $__currentLoopData = $dmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m->name); ?>" <?php echo e(old('payment_method') == $m->name ? 'selected' : ''); ?>><?php echo e($m->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Shipping Address</label>
                    <textarea name="shipping_address" rows="2" required
                              class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm"><?php echo e(old('shipping_address')); ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">City</label>
                        <input type="text" name="city" value="<?php echo e(old('city')); ?>" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">State</label>
                        <input type="text" name="state" value="<?php echo e(old('state')); ?>" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Upload Payment Proof</label>
                    <input type="file" name="proof" accept="image/*" required
                           class="w-full text-sm text-gray-700 dark:text-gray-300">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Screenshot of transfer receipt. JPG / PNG, max 4MB.</p>
                </div>

                <!-- Total -->
                <div class="bg-blue-50 dark:bg-blue-900/30 rounded-md p-4 flex justify-between items-center">
                    <span class="text-sm text-gray-700 dark:text-gray-300">Order Total</span>
                    <span id="order-total" class="text-2xl font-bold text-gray-900 dark:text-white">₦<?php echo e(number_format($bike->price, 2)); ?></span>
                </div>

                <button type="submit" class="w-full inline-flex justify-center items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium transition">
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
            tot.textContent = '₦' + (unit * n).toLocaleString('en-NG', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        }
        qty.addEventListener('input', update);
    })();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/bikes/buy.blade.php ENDPATH**/ ?>