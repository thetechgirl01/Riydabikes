

<?php $__env->startSection('title', 'Book a Delivery'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-[#800020]/10 text-[#800020] rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-truck-fast mr-1"></i> Request a Pickup
            </span>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Book a Delivery</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Fill in the details below and we'll handle the rest. Fast, reliable, and secure delivery service.
            </p>
        </div>

        <?php if($errors->any()): ?>
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 rounded-r-xl p-4">
                <ul class="list-disc list-inside text-sm text-red-700">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($e); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 rounded-r-xl p-4">
                <p class="text-sm text-red-700"><?php echo e(session('error')); ?></p>
            </div>
        <?php endif; ?>
        <?php if(session('info')): ?>
            <div class="mb-6 bg-blue-50 border-l-4 border-blue-400 rounded-r-xl p-4">
                <p class="text-sm text-blue-700"><?php echo e(session('info')); ?></p>
            </div>
        <?php endif; ?>

        <form id="bookingForm" method="POST" action="<?php echo e(route('home.shipments.store')); ?>" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>

            <!-- Sender Section -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-user-tag text-[#800020]"></i> Sender Details
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input name="sname" value="<?php echo e(old('sname')); ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone <span class="text-red-500">*</span></label>
                            <input name="sender_phone" value="<?php echo e(old('sender_phone')); ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="sender_email" value="<?php echo e(old('sender_email')); ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pickup City/Office <span class="text-red-500">*</span></label>
                            <input name="take_off_point" value="<?php echo e(old('take_off_point')); ?>" placeholder="e.g., Lagos" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pickup Address <span class="text-red-500">*</span></label>
                            <textarea name="saddress" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all"><?php echo e(old('saddress')); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Receiver Section -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-user-friends text-[#800020]"></i> Receiver Details
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input name="name" value="<?php echo e(old('name')); ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone <span class="text-red-500">*</span></label>
                            <input name="phone" value="<?php echo e(old('phone')); ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-gray-400">(optional)</span></label>
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Delivery City/Office <span class="text-red-500">*</span></label>
                            <input name="final_destination" value="<?php echo e(old('final_destination')); ?>" placeholder="e.g., Abuja" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Delivery Address <span class="text-red-500">*</span></label>
                            <textarea name="address" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all"><?php echo e(old('address')); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Package Details Section -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-box text-[#800020]"></i> Package Details
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
                            <textarea name="description" rows="2" required placeholder="What's in the package?" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all"><?php echo e(old('description')); ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Quantity <span class="text-red-500">*</span></label>
                            <input type="number" name="qty" min="1" value="<?php echo e(old('qty', 1)); ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Weight <span class="text-gray-400">(optional)</span></label>
                            <input name="weight" value="<?php echo e(old('weight')); ?>" placeholder="e.g., 2kg" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Package Size</label>
                            <select name="package_size" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                                <option value="">— Select Size —</option>
                                <?php $__currentLoopData = ['Small','Medium','Large','Extra Large']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sz); ?>" <?php echo e(old('package_size')==$sz?'selected':''); ?>><?php echo e($sz); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Declared Value (₦) <span class="text-gray-400">(optional)</span></label>
                            <input type="number" step="0.01" name="package_value" value="<?php echo e(old('package_value')); ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Package Photo <span class="text-gray-400">(optional, JPG/PNG, max 4MB)</span></label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#800020] transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="photo" class="relative cursor-pointer bg-white rounded-md font-medium text-[#800020] hover:text-[#6b001a]">
                                            <span>Upload a photo</span>
                                            <input id="photo" name="photo" type="file" accept="image/*" class="sr-only">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Type Section -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-shipping-fast text-[#800020]"></i> Service Type
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Delivery Speed <span class="text-red-500">*</span></label>
                            <select name="freight_type" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                                <option value="">— Select —</option>
                                <option value="Standard" <?php echo e(old('freight_type')=='Standard'?'selected':''); ?>>Standard (2-3 days)</option>
                                <option value="Express" <?php echo e(old('freight_type')=='Express'?'selected':''); ?>>Express (Next Day)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Delivery Type <span class="text-red-500">*</span></label>
                            <select name="shipment_type" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                                <option value="">— Select —</option>
                                <option value="Delivery" <?php echo e(old('shipment_type')=='Delivery'?'selected':''); ?>>Local Delivery</option>
                                <option value="Shipment" <?php echo e(old('shipment_type')=='Shipment'?'selected':''); ?>>Inter-state / Long-haul</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Special Instructions <span class="text-gray-400">(optional)</span></label>
                            <textarea name="delivery_notes" rows="2" placeholder="Anything we should know?" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all"><?php echo e(old('delivery_notes')); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-credit-card text-[#800020]"></i> Payment Information
                    </h2>
                </div>
                <div class="p-6">
                    <div class="mb-5">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Total Amount (₦) <span class="text-red-500">*</span></label>
                        <input type="number" step="0.01" name="cost" value="<?php echo e(old('cost')); ?>" required placeholder="Enter quoted price" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all">
                        <p class="text-xs text-gray-500 mt-1">If you don't know the amount, contact us first for a quote.</p>
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Payment Method</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <label class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:border-[#800020] transition-all has-[:checked]:border-[#800020] has-[:checked]:bg-[#800020]/5">
                                <input type="radio" name="payment_method" value="Bank Transfer" <?php echo e(old('payment_method','Bank Transfer')=='Bank Transfer'?'checked':''); ?> required class="payment-radio w-4 h-4 text-[#800020]">
                                <div class="ml-3">
                                    <span class="block font-medium text-gray-800">Bank Transfer</span>
                                    <span class="block text-xs text-gray-500">Upload receipt</span>
                                </div>
                            </label>
                            <label class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:border-[#800020] transition-all opacity-60">
                                <input type="radio" name="payment_method" value="Paystack" disabled class="w-4 h-4">
                                <div class="ml-3">
                                    <span class="block font-medium text-gray-800">Paystack</span>
                                    <span class="block text-xs text-amber-600">Coming soon</span>
                                </div>
                            </label>
                            <label class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:border-[#800020] transition-all opacity-60">
                                <input type="radio" name="payment_method" value="Flutterwave" disabled class="w-4 h-4">
                                <div class="ml-3">
                                    <span class="block font-medium text-gray-800">Flutterwave</span>
                                    <span class="block text-xs text-amber-600">Coming soon</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Bank Transfer Details -->
                    <div id="bankDetails" class="bg-gray-50 rounded-xl p-5 mb-5">
                        <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                            <i class="fas fa-university text-[#800020]"></i> Bank Account Details
                        </h3>
                        <?php if($paymentMethods->isEmpty()): ?>
                            <p class="text-sm text-gray-600">Bank account details will be shared after submission. Or contact our support team.</p>
                        <?php else: ?>
                            <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3 pb-3 border-b border-gray-200 last:border-0">
                                    <p class="font-semibold text-gray-800"><?php echo e($m->name); ?></p>
                                    <?php if(!empty($m->details)): ?>
                                        <pre class="text-sm text-gray-700 whitespace-pre-wrap font-sans mt-1"><?php echo e($m->details); ?></pre>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                    <div id="proofField">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Payment Proof <span class="text-red-500">*</span></label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#800020] transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="proof" class="relative cursor-pointer bg-white rounded-md font-medium text-[#800020] hover:text-[#6b001a]">
                                        <span>Upload proof</span>
                                        <input id="proof" name="proof" type="file" accept="image/*" required class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">Screenshot of transfer. JPG / PNG, max 4MB.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" id="submitBtn" class="w-full bg-[#800020] hover:bg-[#6b001a] text-white font-semibold py-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                <span id="submitText"><i class="fas fa-paper-plane"></i> Submit Booking</span>
                <span id="submitSpinner" class="hidden"><i class="fas fa-spinner fa-spin"></i> Submitting...</span>
            </button>
        </form>
    </div>
</div>

<script>
(function () {
    const radios   = document.querySelectorAll('.payment-radio');
    const bankBox  = document.getElementById('bankDetails');
    const proofBox = document.getElementById('proofField');

    function refresh() {
        const sel = document.querySelector('.payment-radio:checked');
        const isBank = sel && sel.value === 'Bank Transfer';
        if (bankBox) bankBox.style.display  = isBank ? 'block' : 'none';
        if (proofBox) proofBox.style.display = isBank ? 'block' : 'none';
    }
    radios.forEach(r => r.addEventListener('change', refresh));
    refresh();

    // Submit state
    document.getElementById('bookingForm').addEventListener('submit', function (e) {
        const btn = document.getElementById('submitBtn');
        document.getElementById('submitText').classList.add('hidden');
        document.getElementById('submitSpinner').classList.remove('hidden');
        btn.disabled = true;
    });
})();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/shipments/create.blade.php ENDPATH**/ ?>