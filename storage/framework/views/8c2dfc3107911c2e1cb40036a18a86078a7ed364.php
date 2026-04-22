<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content card">
            <div class="page-inner card-body">
                <div class="mt-2 mb-4">
                    <h1 class="title1 text-<?php echo e($text); ?> text-center">Update Shipment Status</h1>
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
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <div class="row">
                                    <!-- Shipment Information -->
                                    <div class="col-md-4">
                                        <div class="card shadow">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Shipment Information</h5>
                                            </div>
                                            <div class="card-body bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>">
                                                <div class="mb-3 text-center">
                                                    <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($shipment->trackingnumber); ?>&code=Code128" alt="<?php echo e($shipment->trackingnumber); ?>" class="img-fluid">
                                                    <div class="mt-2 font-weight-bold"><?php echo e($shipment->trackingnumber); ?></div>
                                                </div>
                                                
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th class="text-<?php echo e($text); ?>">Status</th>
                                                        <td>
                                                            <?php if($shipment->status == 'Delivered'): ?>
                                                                <span class="badge badge-success"><?php echo e($shipment->status); ?></span>
                                                            <?php elseif($shipment->status == 'Custom Hold'): ?>
                                                                <span class="badge badge-warning"><?php echo e($shipment->status); ?></span>
                                                            <?php else: ?>
                                                                <span class="badge badge-info"><?php echo e($shipment->status); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-<?php echo e($text); ?>">Sender</th>
                                                        <td class="text-<?php echo e($text); ?>"><?php echo e($shipment->sname); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-<?php echo e($text); ?>">Receiver</th>
                                                        <td class="text-<?php echo e($text); ?>"><?php echo e($shipment->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-<?php echo e($text); ?>">Origin</th>
                                                        <td class="text-<?php echo e($text); ?>"><?php echo e($shipment->take_off_point); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-<?php echo e($text); ?>">Destination</th>
                                                        <td class="text-<?php echo e($text); ?>"><?php echo e($shipment->final_destination); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-<?php echo e($text); ?>">Created</th>
                                                        <td class="text-<?php echo e($text); ?>"><?php echo e(\Carbon\Carbon::parse($shipment->created_at)->toDayDateTimeString()); ?></td>
                                                    </tr>
                                                </table>
                                                
                                                <div class="mt-3">
                                                    <a href="<?php echo e(route('admin.shipments.view', $shipment->id)); ?>" class="btn btn-info btn-block">
                                                        <i class="fa fa-eye mr-1"></i> View Complete Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                        <!-- Update Status Form -->
                        <div class="col-md-8">
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Update Status</h5>
                                </div>
                                <div class="card-body bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>">
                                    <form method="POST" action="<?php echo e(route('admin.shipments.update-status')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="shipment_id" value="<?php echo e($shipment->id); ?>">
                                        
                                        <div class="form-group mb-4">
                                            <h6 class="text-<?php echo e($text); ?>">New Status <span class="text-danger">*</span></h6>
                                            <select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="status" name="status" required>
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="Order Confirmed" <?php echo e(old('status') == 'Order Confirmed' ? 'selected' : ''); ?>>Order Confirmed</option>
                                                <option value="Picked by Courier" <?php echo e(old('status') == 'Picked by Courier' ? 'selected' : ''); ?>>Picked by Courier</option>
                                                <option value="On The Way" <?php echo e(old('status') == 'On The Way' ? 'selected' : ''); ?>>On The Way</option>
                                                <option value="Custom Hold" <?php echo e(old('status') == 'Custom Hold' ? 'selected' : ''); ?>>Custom Hold</option>
                                                <option value="Delivered" <?php echo e(old('status') == 'Delivered' ? 'selected' : ''); ?>>Delivered</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group mb-4">
                                            <h6 class="text-<?php echo e($text); ?>">Current Location <span class="text-danger">*</span></h6>
                                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="location" name="location" value="<?php echo e(old('location')); ?>" required>
                                            <small class="text-muted">Enter the current location of the shipment</small>
                                        </div>
                                        
                                        <div class="form-group mb-4">
                                            <h6 class="text-<?php echo e($text); ?>">Comment/Details <span class="text-danger">*</span></h6>
                                            <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="comment" name="comment" rows="4" required><?php echo e(old('comment')); ?></textarea>
                                            <small class="text-muted">Provide details about the status update (will be visible to the customer)</small>
                                        </div>
                                        
                                        <div class="custom-control custom-checkbox mb-4">
                                            <input type="checkbox" class="custom-control-input" id="notify_customer" name="notify_customer" value="1" checked>
                                            <label class="custom-control-label text-<?php echo e($text); ?>" for="notify_customer">Send email notification to customer</label>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-paper-plane mr-1"></i> Update Status
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Status History -->
                            <div class="card shadow mt-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Status History</h5>
                                </div>
                                <div class="card-body p-0 bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>">
                                    <div class="timeline">
                                        <?php $__empty_1 = true; $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="timeline-item">
                                                <div class="timeline-marker bg-<?php echo e($track->status == 'Delivered' ? 'success' : 
                                                    ($track->status == 'Custom Hold' ? 'warning' : 'info')); ?>"></div>
                                                <div class="timeline-content">
                                                    <h5 class="text-<?php echo e($text); ?>"><?php echo e($track->status); ?></h5>
                                                    <p class="text-muted mb-2">
                                                        <i class="fa fa-map-marker-alt mr-1"></i> <?php echo e($track->address); ?>

                                                        <span class="ml-3">
                                                            <i class="fa fa-clock mr-1"></i> <?php echo e(\Carbon\Carbon::parse($track->created_at)->format('M d, Y - h:i A')); ?>

                                                        </span>
                                                    </p>
                                                    <p class="text-<?php echo e($text); ?>"><?php echo e($track->comment); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="text-center p-4">
                                                <p class="text-<?php echo e($text); ?>">No status updates yet</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .timeline {
        position: relative;
        padding: 20px 0;
    }
    
    .timeline-item {
        position: relative;
        padding-left: 40px;
        margin-bottom: 20px;
    }
    
    .timeline-marker {
        position: absolute;
        left: 0;
        top: 0;
        width: 15px;
        height: 15px;
        border-radius: 50%;
    }
    
    .timeline-content {
        position: relative;
        padding-bottom: 20px;
        border-bottom: 1px solid #e9ecef;
    }
    
    .timeline-item:last-child .timeline-content {
        border-bottom: none;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elitemaxpro/shypdirect.elitemaxpro.click/resources/views/admin/update-shipment-status.blade.php ENDPATH**/ ?>