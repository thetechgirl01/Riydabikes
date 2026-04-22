
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Rental <?php echo e($rental->rental_no); ?></h1>
                    <a href="<?php echo e(route('admin.bikes.rentals')); ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
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

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card p-4 mb-3">
                            <h4>Booking Details</h4>
                            <table class="table">
                                <tr><th>Bike</th><td><?php echo e($rental->bike->name ?? '—'); ?></td></tr>
                                <tr><th>Start</th><td><?php echo e($rental->start_date->format('M d, Y')); ?></td></tr>
                                <tr><th>End</th><td><?php echo e($rental->end_date->format('M d, Y')); ?></td></tr>
                                <tr><th>Days</th><td><?php echo e($rental->total_days); ?></td></tr>
                                <tr><th>Daily Rate</th><td>₦<?php echo e(number_format($rental->daily_rate, 2)); ?></td></tr>
                                <tr><th>Total</th><td><strong>₦<?php echo e(number_format($rental->total_amount, 2)); ?></strong></td></tr>
                                <tr><th>Payment Method</th><td><?php echo e($rental->payment_method); ?></td></tr>
                                <tr><th>Paid At</th><td><?php echo e($rental->paid_at ? $rental->paid_at->format('M d, Y h:i A') : '—'); ?></td></tr>
                                <tr><th>Booked At</th><td><?php echo e($rental->created_at->format('M d, Y h:i A')); ?></td></tr>
                            </table>
                        </div>

                        <div class="card p-4 mb-3">
                            <h4>Customer</h4>
                            <p><strong><?php echo e($rental->guest_name); ?></strong><br>
                            <?php echo e($rental->guest_email); ?><br>
                            <?php echo e($rental->guest_phone); ?></p>
                            <?php if($rental->pickup_address): ?>
                                <p><strong>Pickup Address:</strong><br><?php echo e($rental->pickup_address); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if($rental->proof): ?>
                            <div class="card p-4 mb-3">
                                <h4>Payment Proof</h4>
                                <a href="<?php echo e(asset('storage/'.$rental->proof)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('storage/'.$rental->proof)); ?>" style="max-width:100%;max-height:400px;border-radius:6px;">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-4">
                        <div class="card p-4">
                            <h4>Update Status</h4>
                            <form method="POST" action="<?php echo e(route('admin.bikes.rental.status', $rental->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <?php $__currentLoopData = ['Pending','Approved','Active','Completed','Rejected','Cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($s); ?>" <?php echo e($rental->status == $s ? 'selected' : ''); ?>><?php echo e($s); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Admin Note</label>
                                    <textarea name="admin_note" class="form-control" rows="3"><?php echo e($rental->admin_note); ?></textarea>
                                </div>
                                <button class="btn btn-primary w-100">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/bikes/rental-view.blade.php ENDPATH**/ ?>