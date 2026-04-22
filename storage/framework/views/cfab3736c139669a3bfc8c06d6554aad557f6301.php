<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1">Manage Shipments</h1>
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
                
                <!-- Action Button -->
                <div class="mb-3 text-right">
                    <a href="<?php echo e(route('admin.shipments.create')); ?>" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> Create New Shipment
                    </a>
                </div>

                <!-- Search and Filter -->
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <form action="<?php echo e(route('admin.shipments')); ?>" method="GET" class="form-inline">
                            <div class="input-group mr-2 mb-2">
                                <input type="text" name="search" class="form-control" placeholder="Search tracking/name/email..." value="<?php echo e($search ?? ''); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <select name="status" class="form-control mr-2 mb-2">
                                <option value="">All Statuses</option>
                                <option value="Order Confirmed" <?php echo e(($status ?? '') == 'Order Confirmed' ? 'selected' : ''); ?>>Order Confirmed</option>
                                <option value="Picked by Courier" <?php echo e(($status ?? '') == 'Picked by Courier' ? 'selected' : ''); ?>>Picked by Courier</option>
                                <option value="On The Way" <?php echo e(($status ?? '') == 'On The Way' ? 'selected' : ''); ?>>On The Way</option>
                                <option value="Custom Hold" <?php echo e(($status ?? '') == 'Custom Hold' ? 'selected' : ''); ?>>Custom Hold</option>
                                <option value="Delivered" <?php echo e(($status ?? '') == 'Delivered' ? 'selected' : ''); ?>>Delivered</option>
                            </select>
                            
                            <button type="submit" class="btn btn-primary mb-2">Filter</button>
                            
                            <?php if($search || $status): ?>
                                <a href="<?php echo e(route('admin.shipments')); ?>" class="btn btn-secondary mb-2 ml-2">Clear</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>

                <div class="mb-5 row">
                    <div class="col card p-3 shadow">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tracking #</th>
                                        <th>Sender</th>
                                        <th>Receiver</th>
                                        <th>Origin → Destination</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('admin.shipments.view', $shipment->id)); ?>" class="font-weight-bold">
                                                    <?php echo e($shipment->trackingnumber); ?>

                                                </a>
                                            </td>
                                            <td><?php echo e($shipment->sname); ?></td>
                                            <td>
                                                <?php echo e($shipment->name); ?>

                                                <div class="small text-muted">
                                                    <?php echo e($shipment->email); ?><br>
                                                    <?php echo e($shipment->phone); ?>

                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-light"><?php echo e($shipment->take_off_point); ?></span>
                                                <i class="fa fa-long-arrow-alt-right mx-1"></i>
                                                <span class="badge badge-light"><?php echo e($shipment->final_destination); ?></span>
                                            </td>
                                            <td>
                                                <?php if($shipment->status == 'Delivered'): ?>
                                                    <span class="badge badge-success"><?php echo e($shipment->status); ?></span>
                                                <?php elseif($shipment->status == 'Custom Hold'): ?>
                                                    <span class="badge badge-warning"><?php echo e($shipment->status); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-info"><?php echo e($shipment->status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(\Carbon\Carbon::parse($shipment->created_at)->toDayDateTimeString()); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.shipments.view', $shipment->id)); ?>" class="m-1 btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <a href="<?php echo e(route('admin.shipments.update-status-form', $shipment->id)); ?>" class="m-1 btn btn-primary btn-sm">
                                                    <i class="fa fa-truck"></i> Update
                                                </a>
                                                <a href="<?php echo e(route('admin.shipments.print', $shipment->id)); ?>" target="_blank" class="m-1 btn btn-secondary btn-sm">
                                                    <i class="fa fa-print"></i> Print
                                                </a>
                                                
                                                 <form action="<?php echo e(route('admin.shipments.delete', $shipment->id)); ?>" method="POST" style="display: inline-block;"
                                                      onsubmit="return confirm('Are you sure you want to delete shipment <?php echo e($shipment->trackingnumber); ?>? This action cannot be undone.')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="m-1 btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <div class="py-3">
                                                    <i class="fa fa-box-open fa-3x text-muted mb-3"></i>
                                                    <p class="mt-3">No shipments found</p>
                                                    <?php if($search || $status): ?>
                                                        <a href="<?php echo e(route('admin.shipments')); ?>" class="btn btn-outline-primary">Clear Filters</a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('admin.shipments.create')); ?>" class="btn btn-primary">
                                                            <i class="fa fa-plus-circle"></i> Create Shipment
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            
                            <!-- Pagination -->
                            <div class="d-flex justify-content-center mt-4">
                                <?php echo e($shipments->appends(['search' => $search, 'status' => $status])->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirectpro\resources\views/admin/shipments.blade.php ENDPATH**/ ?>