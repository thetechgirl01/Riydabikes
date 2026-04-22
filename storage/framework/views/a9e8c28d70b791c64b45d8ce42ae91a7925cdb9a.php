
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <h1 class="title1 mt-2 mb-4">Bike Rentals</h1>
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

                <div class="card p-3">
                    <form method="GET" class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search by rental #, name, email" value="<?php echo e(request('search')); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <select name="status" class="form-control">
                                <option value="">All statuses</option>
                                <?php $__currentLoopData = ['Pending','Approved','Active','Completed','Rejected','Cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($s); ?>" <?php echo e(request('status')==$s ? 'selected':''); ?>><?php echo e($s); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Rental #</th><th>Bike</th><th>Customer</th><th>Dates</th><th>Days</th><th>Total</th><th>Status</th><th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $rentals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($r->rental_no); ?></td>
                                        <td><?php echo e($r->bike->name ?? '—'); ?></td>
                                        <td><?php echo e($r->guest_name); ?><br><small><?php echo e($r->guest_email); ?></small></td>
                                        <td><?php echo e($r->start_date->format('M d')); ?> → <?php echo e($r->end_date->format('M d, Y')); ?></td>
                                        <td><?php echo e($r->total_days); ?></td>
                                        <td>₦<?php echo e(number_format($r->total_amount, 2)); ?></td>
                                        <td><span class="badge bg-<?php echo e(['Approved'=>'success','Active'=>'info','Completed'=>'primary','Rejected'=>'danger','Cancelled'=>'secondary','Pending'=>'warning'][$r->status] ?? 'secondary'); ?>"><?php echo e($r->status); ?></span></td>
                                        <td><a href="<?php echo e(route('admin.bikes.rental.view', $r->id)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr><td colspan="8" class="text-center py-4">No rentals yet.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3"><?php echo e($rentals->links()); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/bikes/rentals.blade.php ENDPATH**/ ?>