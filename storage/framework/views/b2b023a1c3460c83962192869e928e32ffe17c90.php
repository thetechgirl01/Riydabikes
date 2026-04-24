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
                    <h1 class="title1">Shipment Details</h1>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h4 class="card-title mb-3 mb-md-0">
                                            <i class="fa fa-box mr-2"></i> Shipment Information
                                        </h4>
                                    </div>
                                    <div class="col-md-6 text-center text-md-right">
                                        <div class="d-flex flex-wrap justify-content-center justify-content-md-end action-buttons">
                                            <a href="<?php echo e(route('admin.shipments')); ?>" class="btn btn-light m-1">
                                                <i class="fa fa-arrow-left mr-1"></i> <span>Back</span>
                                            </a>
                                            <a href="<?php echo e(route('admin.shipments.update-status-form', $shipment->id)); ?>" class="btn btn-info m-1">
                                                <i class="fa fa-truck-loading mr-1"></i> <span>Status</span>
                                            </a>
                                            <a href="<?php echo e(route('admin.shipments.edit', $shipment->id)); ?>" class="btn btn-warning m-1">
                                                <i class="fa fa-edit mr-1"></i> <span>Edit</span>
                                            </a>
                                            <a href="<?php echo e(route('admin.shipments.print', $shipment->id)); ?>" target="_blank" class="btn btn-secondary m-1">
                                                <i class="fa fa-print mr-1"></i> <span>Print</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if(session('success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session('success')); ?>

                                    </div>
                                <?php endif; ?>

                                <!-- Tracking Information -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="card shadow bg-light">
                                            <div class="card-body text-center">
                                                <div class="mb-3">
                                                    <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($shipment->trackingnumber); ?>&code=Code128" alt="<?php echo e($shipment->trackingnumber); ?>" class="img-fluid">
                                                </div>
                                                <h5 class="tracking-number"><?php echo e($shipment->trackingnumber); ?></h5>
                                                <div class="badge badge-<?php echo e($shipment->status == 'Delivered' ? 'success' : 
                                                    ($shipment->status == 'Custom Hold' ? 'warning' : 'info')); ?> badge-lg">
                                                    <?php echo e($shipment->status); ?>

                                                </div>
                                                <div class="mt-2 text-muted">
                                                    Created on <?php echo e(\Carbon\Carbon::parse($shipment->created_at)->format('F d, Y - h:i A')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Sender & Receiver Information -->
                                    <div class="col-md-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Sender Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th width="30%">Name:</th>
                                                        <td><?php echo e($shipment->sname); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td><?php echo e($shipment->saddress); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Origin:</th>
                                                        <td><?php echo e($shipment->take_off_point); ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="card shadow">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Receiver Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th width="30%">Name:</th>
                                                        <td><?php echo e($shipment->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email:</th>
                                                        <td>
                                                            <a href="mailto:<?php echo e($shipment->email); ?>"><?php echo e($shipment->email); ?></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone:</th>
                                                        <td>
                                                            <a href="tel:<?php echo e($shipment->phone); ?>"><?php echo e($shipment->phone); ?></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td><?php echo e($shipment->address); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Destination:</th>
                                                        <td><?php echo e($shipment->final_destination); ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Shipment Details & Costs -->
                                    <div class="col-md-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Package Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th width="30%">Quantity:</th>
                                                        <td><?php echo e($shipment->qty); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Description:</th>
                                                        <td><?php echo e($shipment->description); ?></td>
                                                    </tr>
                                                    <?php if($shipment->photo): ?>
                                                    <tr>
                                                        <th>Photo:</th>
                                                        <td>
                                                            <a href="<?php echo e(asset('public/' . $shipment->photo)); ?>" target="_blank">
                                                                <img src="<?php echo e(asset('public/' . $shipment->photo)); ?>" alt="Shipment Photo" class="img-thumbnail" style="max-height: 200px;">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="card shadow mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Cost Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th width="50%">Shipping Cost:</th>
                                                        <td><?php echo e($settings->s_currency); ?> <?php echo e(number_format($shipment->cost, 2)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Clearance Cost:</th>
                                                        <td><?php echo e($settings->s_currency); ?> <?php echo e(number_format($shipment->clearance_cost, 2)); ?></td>
                                                    </tr>
                                                    <tr class="table-active font-weight-bold">
                                                        <th>Total Cost:</th>
                                                        <td><?php echo e($settings->s_currency); ?> <?php echo e(number_format($shipment->cost + $shipment->clearance_cost, 2)); ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tracking History -->
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="card shadow">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Tracking History</h5>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="tracking-timeline">
                                                    <?php $__empty_1 = true; $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <div class="tracking-item">
                                                            <div class="tracking-icon bg-<?php echo e($track->status == 'Delivered' ? 'success' : 
                                                                ($track->status == 'Custom Hold' ? 'warning' : 'info')); ?>">
                                                                <i class="fa fa-<?php echo e($track->status == 'Delivered' ? 'check' : 
                                                                    ($track->status == 'Custom Hold' ? 'exclamation' : 'truck')); ?>"></i>
                                                            </div>
                                                            <div class="tracking-content">
                                                                <div class="tracking-date">
                                                                    <?php echo e(\Carbon\Carbon::parse($track->created_at)->format('F d, Y - h:i A')); ?>

                                                                </div>
                                                                <div class="tracking-status">
                                                                    <span class="font-weight-bold"><?php echo e($track->status); ?></span>
                                                                    <?php if($track->address): ?>
                                                                        <span class="ml-2 text-muted">
                                                                            <i class="fa fa-map-marker-alt"></i> <?php echo e($track->address); ?>

                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="tracking-text mt-2">
                                                                    <?php echo e($track->comment); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <div class="text-center p-4">
                                                            <p>No tracking history found</p>
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
        </div>
    </div>
</div>

<style>
    .badge-lg {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }
    
    .tracking-number {
        font-family: monospace;
        font-size: 1.2rem;
        font-weight: bold;
        letter-spacing: 1px;
    }
    
    .tracking-timeline {
        position: relative;
        padding: 30px;
    }
    
    .tracking-item {
        position: relative;
        padding-left: 60px;
        margin-bottom: 30px;
    }
    
    .tracking-item:last-child {
        margin-bottom: 0;
    }
    
    .tracking-icon {
        position: absolute;
        left: 0;
        top: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        color: white;
    }
    
    .tracking-content {
        position: relative;
        padding-bottom: 30px;
        border-bottom: 1px dashed #ddd;
    }
    
    .tracking-item:last-child .tracking-content {
        border-bottom: none;
    }
    
    .tracking-date {
        color: #777;
        font-size: 0.9rem;
        margin-bottom: 6px;
    }
    
    /* Responsive styles for action buttons */
    .action-buttons {
        width: 100%;
    }
    
    .action-buttons .btn {
        min-width: 100px;
        margin: 0.25rem !important;
        flex-grow: 1;
    }
    
    @media (max-width: 767px) {
        .action-buttons {
            margin-top: 1rem;
        }
        
        /* Make buttons more touch-friendly on mobile */
        .action-buttons .btn {
            padding: 0.6rem 0.75rem;
            font-size: 0.9rem;
        }
        
        /* Hide text and show only icons on very small screens */
        @media (max-width: 375px) {
            .action-buttons .btn i {
                margin-right: 0 !important;
            }
            
            .action-buttons .btn span {
                display: none;
            }
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/view-shipment.blade.php ENDPATH**/ ?>