<?php
    if (Auth('admin')->User()->dashboard_style == 'light') {
        $text = 'dark'; $bg = 'light';
    } else {
        $text = 'light'; $bg = 'dark';
    }

    // Pull state list and pricing speed options the same way the user form does
    $states        = \App\Support\NigerianStates::all();
    $pricing       = \App\Models\DeliveryPricingSettings::current();
    $speedOptions  = $pricing->enabledSpeedOptions();
?>



<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main-panel">
    <div class="content card">
        <div class="page-inner card-body">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-<?php echo e($text); ?> text-center">Create New Delivery</h1>
            </div>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <div class="mb-5 row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card p-2 shadow">
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form id="adminDeliveryForm" method="POST" action="<?php echo e(route('admin.shipments.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                
                                <input type="hidden" name="trackingnumber" value="<?php echo e($trackingnumber ?? ''); ?>">
                                <input type="hidden" name="clearance_cost" value="0">

                                <div class="form-row">

                                    
                                    <div class="form-group col-md-12">
                                        <h2 class="text-<?php echo e($text); ?>">Sender Information</h2>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Sender Name <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="sname" value="<?php echo e(old('sname')); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Sender Email</h6>
                                        <input type="email" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="sender_email" value="<?php echo e(old('sender_email')); ?>">
                                        <small class="text-muted">Optional. Used for sender notifications.</small>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?>">Pickup Address <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="saddress" rows="2" required><?php echo e(old('saddress')); ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?>">Pickup State <span class="text-danger">*</span></h6>
                                        <select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="origin_state" name="take_off_point" required>
                                            <option value="">— Select state —</option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($st); ?>" <?php echo e(old('take_off_point') == $st ? 'selected' : ''); ?>><?php echo e($st); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    
                                    <div class="form-group col-md-12 mt-3">
                                        <h2 class="text-<?php echo e($text); ?>">Receiver Information</h2>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Receiver Name <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="name" value="<?php echo e(old('name')); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Receiver Email <span class="text-danger">*</span></h6>
                                        <input type="email" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Receiver Phone <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="phone" value="<?php echo e(old('phone')); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Delivery State <span class="text-danger">*</span></h6>
                                        <select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="destination_state" name="final_destination" required>
                                            <option value="">— Select state —</option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($st); ?>" <?php echo e(old('final_destination') == $st ? 'selected' : ''); ?>><?php echo e($st); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?>">Delivery Address <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="address" rows="2" required><?php echo e(old('address')); ?></textarea>
                                    </div>

                                    
                                    <div class="form-group col-md-12 mt-3">
                                        <h2 class="text-<?php echo e($text); ?>">Package Details</h2>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?>">Description <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="description" rows="2" required><?php echo e(old('description')); ?></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="text-<?php echo e($text); ?>">Quantity <span class="text-danger">*</span></h6>
                                        <input type="number" min="1" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="qty" value="<?php echo e(old('qty', 1)); ?>" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="text-<?php echo e($text); ?>">Weight (kg)</h6>
                                        <input type="number" step="0.1" min="0" id="weight_kg" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="weight" value="<?php echo e(old('weight', 0)); ?>">
                                        <small class="text-muted">First <?php echo e($pricing->free_weight_kg); ?>kg free, then ₦<?php echo e(number_format($pricing->per_kg_rate, 0)); ?>/kg.</small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="text-<?php echo e($text); ?>">Package Photo</h6>
                                        <input type="file" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="photo" accept="image/*">
                                    </div>

                                    
                                    <div class="form-group col-md-12 mt-3">
                                        <h2 class="text-<?php echo e($text); ?>">Service & Schedule</h2>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Delivery Speed <span class="text-danger">*</span></h6>
                                        <select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="freight_type" name="freight_type" required>
                                            <option value="">— Select —</option>
                                            <?php $__currentLoopData = $speedOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $multiplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($name); ?>" <?php echo e(old('freight_type') == $name ? 'selected' : ''); ?>>
                                                    <?php echo e($name); ?><?php if($multiplier != 1): ?> (×<?php echo e(rtrim(rtrim(number_format($multiplier, 2), '0'), '.')); ?>)<?php endif; ?>
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Pickup Date <span class="text-danger">*</span></h6>
                                        <input type="datetime-local" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="date_shipped" value="<?php echo e(old('date_shipped')); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Expected Delivery Date <span class="text-danger">*</span></h6>
                                        <input type="datetime-local" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="expected_delivery" value="<?php echo e(old('expected_delivery')); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Status</h6>
                                        <select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="status" required>
                                            <?php $__currentLoopData = ['Delivery Created','Pickup Scheduled','Rider Assigned','Picked Up','In Transit','Arrived at Hub','Out for Delivery','Delivered','Delivery Delayed','Delivery Failed','Returned','Pending Payment','Payment Received']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($st); ?>" <?php echo e(old('status', 'Delivery Created') == $st ? 'selected' : ''); ?>><?php echo e($st); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    
                                    <div class="form-group col-md-12 mt-3">
                                        <h2 class="text-<?php echo e($text); ?>">Pricing</h2>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div id="quote-box" class="p-3 rounded" style="background:#f0f9ff; border:1px solid #bae6fd;">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:#64748b;">Auto-calculated Quote</div>
                                                    <div id="quote-total" style="font-size:24px; font-weight:bold; color:#0369a1;">— —</div>
                                                    <div id="quote-breakdown" style="font-size:12px; color:#64748b; display:none;"></div>
                                                </div>
                                                <button type="button" id="applyQuoteBtn" class="btn btn-sm btn-info" disabled>
                                                    <i class="fa fa-magic"></i> Use this price
                                                </button>
                                            </div>
                                            <div id="quote-hint" class="mt-2" style="font-size:12px; color:#64748b;">
                                                Pick pickup state, delivery state and delivery speed to see the price.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="overrideToggle">
                                            <label class="custom-control-label text-<?php echo e($text); ?>" for="overrideToggle">
                                                <strong>Override price manually</strong>
                                                <small class="text-muted d-block">Check this to type a custom delivery fee instead of using the auto-calculated quote.</small>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?> text-danger">Delivery Fee <span class="text-danger">*</span></h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"><?php echo e($settings->s_currency ?? '₦'); ?></span>
                                            </div>
                                            <input type="number" step="0.01" min="0" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="cost" name="cost" value="<?php echo e(old('cost', 0)); ?>" required readonly>
                                        </div>
                                        <small class="text-muted" id="cost-help">Filled automatically. Tick "Override" to edit.</small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?> text-danger">Payment Status <span class="text-danger">*</span></h6>
                                        <select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="payment_status" required>
                                            <option value="Unpaid" <?php echo e(old('payment_status') == 'Unpaid' ? 'selected' : ''); ?>>Unpaid</option>
                                            <option value="Paid" <?php echo e(old('payment_status') == 'Paid' ? 'selected' : ''); ?>>Paid</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?>">Delivery Progress (%)</h6>
                                        <input type="number" min="0" max="100" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="percentage_complete" value="<?php echo e(old('percentage_complete', 0)); ?>">
                                    </div>

                                    <div class="form-group col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save mr-1"></i> Create Delivery
                                        </button>
                                        <a href="<?php echo e(route('admin.shipments')); ?>" class="btn btn-secondary ml-2">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function () {
    const origin    = document.getElementById('origin_state');
    const dest      = document.getElementById('destination_state');
    const weight    = document.getElementById('weight_kg');
    const speed     = document.getElementById('freight_type');
    const cost      = document.getElementById('cost');
    const costHelp  = document.getElementById('cost-help');
    const totalEl   = document.getElementById('quote-total');
    const hintEl    = document.getElementById('quote-hint');
    const breakdown = document.getElementById('quote-breakdown');
    const applyBtn  = document.getElementById('applyQuoteBtn');
    const override  = document.getElementById('overrideToggle');

    let lastQuote = null;
    let quoteTimer;

    const fmt = n => '₦' + Number(n).toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    async function fetchQuote() {
        if (!origin.value || !dest.value || !speed.value) {
            totalEl.textContent = '— —';
            hintEl.style.display = 'block';
            breakdown.style.display = 'none';
            applyBtn.disabled = true;
            lastQuote = null;
            return;
        }
        try {
            const res = await fetch("<?php echo e(route('home.shipments.quote')); ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    take_off_point: origin.value,
                    final_destination: dest.value,
                    weight_kg: parseFloat(weight.value || 0),
                    freight_type: speed.value,
                }),
            });
            const q = await res.json();

            lastQuote = q.total;
            totalEl.textContent = fmt(q.total);
            hintEl.style.display = 'none';
            breakdown.style.display = 'block';
            const parts = [];
            parts.push('Base ' + fmt(q.base_fare));
            if (q.weight_charge > 0) parts.push('+ ' + fmt(q.weight_charge) + ' weight');
            if (q.multiplier !== 1) parts.push('× ' + q.multiplier + ' (' + q.speed + ')');
            breakdown.textContent = parts.join(' · ');
            applyBtn.disabled = false;

            // If admin hasn't overridden, auto-fill cost
            if (!override.checked) {
                cost.value = q.total;
            }
        } catch (e) {
            totalEl.textContent = 'Error';
            hintEl.textContent = 'Could not fetch quote.';
            hintEl.style.display = 'block';
            applyBtn.disabled = true;
        }
    }

    function debouncedQuote() {
        clearTimeout(quoteTimer);
        quoteTimer = setTimeout(fetchQuote, 250);
    }

    [origin, dest, speed].forEach(el => el.addEventListener('change', fetchQuote));
    weight.addEventListener('input', debouncedQuote);

    // Apply quote button — copies the quoted total into the cost field
    applyBtn.addEventListener('click', function () {
        if (lastQuote !== null) {
            cost.value = lastQuote;
            // visual flash
            cost.style.background = '#d1fae5';
            setTimeout(() => cost.style.background = '', 600);
        }
    });

    // Override toggle — unlocks the cost field
    override.addEventListener('change', function () {
        if (override.checked) {
            cost.removeAttribute('readonly');
            cost.focus();
            costHelp.textContent = 'Editing manually — auto-quote changes won\'t update this.';
            costHelp.style.color = '#dc2626';
        } else {
            cost.setAttribute('readonly', 'readonly');
            costHelp.textContent = 'Filled automatically. Tick "Override" to edit.';
            costHelp.style.color = '';
            // Re-fill from latest quote
            if (lastQuote !== null) cost.value = lastQuote;
        }
    });

    // Initial quote attempt (fires if old() values populated all inputs)
    fetchQuote();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/create-shipment.blade.php ENDPATH**/ ?>