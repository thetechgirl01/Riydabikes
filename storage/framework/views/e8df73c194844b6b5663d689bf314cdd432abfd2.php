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
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Payment Proof</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.shipment.deposits')); ?>">Shipment Deposits</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.view.deposit', $deposit->id)); ?>">Deposit Details</a></li>
                                    <li class="breadcrumb-item active">Payment Proof</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0 flex-grow-1">Payment Proof for Deposit #<?php echo e($deposit->id); ?></h5>
                                    <div>
                                        <a href="<?php echo e(route('admin.view.deposit', $deposit->id)); ?>" class="btn btn-primary btn-sm">
                                            <i class="mdi mdi-arrow-left me-1"></i> Back to Deposit
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="mb-4 text-center">
                                            <img src="<?php echo e(asset($deposit->proof)); ?>" alt="Payment Proof" class="img-fluid rounded shadow-sm" style="max-height: 600px;">
                                        </div>
                                        
                                        <div class="text-center mb-3">
                                            <a href="<?php echo e(asset($deposit->proof)); ?>" class="btn btn-info" target="_blank">
                                                <i class="mdi mdi-open-in-new me-1"></i> Open in New Tab
                                            </a>
                                            <a href="<?php echo e(asset($deposit->proof)); ?>" class="btn btn-success ms-2" download>
                                                <i class="mdi mdi-download me-1"></i> Download Image
                                            </a>
                                        </div>
                                        
                                        <div class="alert alert-info mb-0">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <i class="mdi mdi-information-outline font-size-18"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-0 font-size-16">Deposit Information</h5>
                                                    <p class="mb-1">Amount: <strong><?php echo e($settings->s_currency); ?> <?php echo e(number_format($deposit->amount, 2)); ?></strong></p>
                                                    <p class="mb-1">Payment Method: <strong><?php echo e($deposit->payment_mode); ?></strong></p>
                                                    <p class="mb-1">Status: 
                                                        <?php if($deposit->status == 'Processed'): ?>
                                                            <span class="badge bg-success">Processed</span>
                                                        <?php elseif($deposit->status == 'Pending'): ?>
                                                            <span class="badge bg-warning">Pending</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger">Cancelled</span>
                                                        <?php endif; ?>
                                                    </p>
                                                    <p class="mb-0">Date: <strong><?php echo e(\Carbon\Carbon::parse($deposit->created_at)->format('M d, Y h:i A')); ?></strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div> <!-- page-content -->
    </div> <!-- main-content -->
    
    <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/view-deposit-image.blade.php ENDPATH**/ ?>