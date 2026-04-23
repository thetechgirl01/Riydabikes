

<?php $__env->startSection('title', 'Hire '.$bike->name); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <nav class="mb-8 text-sm">
            <a href="<?php echo e(route('home.bikes.show', $bike->slug)); ?>" class="inline-flex items-center gap-2 text-[#800020] hover:text-[#6b001a] font-medium transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to <?php echo e($bike->name); ?>

            </a>
        </nav>

        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Rent This Bike</h1>
        <p class="text-gray-500 dark:text-gray-400 mb-8">Choose your rental period and complete the booking</p>

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
            <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-white dark:from-gray-900/60 dark:to-gray-800 border-b dark:border-gray-700">
                <div class="flex items-center gap-5">
                    <div class="w-24 h-24 bg-white rounded-xl shadow-md overflow-hidden flex items-center justify-center p-2">
                        <img src="<?php echo e($bike->image_url); ?>" alt="<?php echo e($bike->name); ?>" class="w-full h-full object-contain">
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-xl text-gray-900 dark:text-white"><?php echo e($bike->name); ?></p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Daily rate: <span class="font-semibold text-[#800020] dark:text-[#FFD600]">₦<?php echo e(number_format($bike->daily_rate, 2)); ?></span> per day</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('home.bikes.hire.store', $bike->slug)); ?>" enctype="multipart/form-data" class="p-6 space-y-6">
                <?php echo csrf_field(); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Start Date</label>
                        <input type="date" name="start_date" id="start_date" value="<?php echo e(old('start_date')); ?>" min="<?php echo e(\Carbon\Carbon::today()->toDateString()); ?>" required
                               class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">End Date</label>
                        <input type="date" name="end_date" id="end_date" value="<?php echo e(old('end_date')); ?>" min="<?php echo e(\Carbon\Carbon::today()->toDateString()); ?>" required
                               class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4">
                    </div>
                </div>

                <!-- Live quote box -->
                <div id="quote-box" class="hidden rounded-xl p-4 border"></div>

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
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Pickup Address <span class="text-xs font-normal text-gray-500">(optional)</span></label>
                    <textarea name="pickup_address" rows="2"
                              class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-[#800020] focus:border-transparent transition-all py-2.5 px-4"><?php echo e(old('pickup_address')); ?></textarea>
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

                <button type="submit" id="submit-btn" class="w-full inline-flex justify-center items-center gap-2 px-6 py-4 bg-[#800020] hover:bg-[#6b001a] text-white rounded-full font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:transform-none">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Confirm Rental
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    (function () {
        const start = document.getElementById('start_date');
        const end   = document.getElementById('end_date');
        const box   = document.getElementById('quote-box');
        const btn   = document.getElementById('submit-btn');
        const url   = "<?php echo e(route('home.bikes.hire.quote', $bike->slug)); ?>";
        const token = "<?php echo e(csrf_token()); ?>";

        async function quote() {
            if (!start.value || !end.value) { box.classList.add('hidden'); return; }
            if (new Date(end.value) < new Date(start.value)) { box.classList.add('hidden'); return; }

            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
                    body: JSON.stringify({ start_date: start.value, end_date: end.value })
                });
                const data = await res.json();
                box.classList.remove('hidden');

                if (!data.available) {
                    box.className = 'rounded-xl p-4 border border-red-300 bg-red-50 text-red-800 dark:bg-red-900/30 dark:text-red-300 dark:border-red-700';
                    box.innerHTML = '<strong class="block mb-1">❌ Not Available</strong><p class="text-sm">This bike is already booked for some of those dates. Please choose different dates.</p>';
                    btn.disabled = true;
                } else {
                    box.className = 'rounded-xl p-4 border border-green-300 bg-green-50 text-green-900 dark:bg-green-900/30 dark:text-green-300 dark:border-green-700';
                    box.innerHTML = `<div class="flex justify-between items-center"><div><span class="text-sm font-medium">${data.total_days} day${data.total_days>1?'s':''} × ₦${Number(data.daily_rate).toLocaleString('en-NG',{minimumFractionDigits:2})}</span></div><div class="text-right"><span class="text-xs text-gray-600 dark:text-gray-400">Total</span><div class="font-bold text-2xl">₦${Number(data.total_amount).toLocaleString('en-NG',{minimumFractionDigits:2})}</div></div></div>`;
                    btn.disabled = false;
                }
            } catch (e) {
                box.classList.add('hidden');
            }
        }
        start.addEventListener('change', quote);
        end.addEventListener('change', quote);
        if (start.value && end.value) quote();
    })();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/bikes/hire.blade.php ENDPATH**/ ?>