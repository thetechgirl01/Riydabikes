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
                    <h1 class="title1">Edit Shipment</h1>
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
                                        <h4 class="card-title mb-0">
                                            <i class="fa fa-edit mr-2"></i> Update Shipment Information
                                        </h4>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <a href="<?php echo e(route('admin.shipments')); ?>" class="btn btn-light">
                                            <i class="fa fa-arrow-left mr-1"></i> Back to List
                                        </a>
                                    </div>
                                </div>
                            </div>
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

                                <form method="POST" action="<?php echo e(route('admin.shipments.update')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($shipment->id); ?>">
                                    
                                    <div class="row">
                                        <!-- Tracking Info -->
                                        <div class="col-md-12 mb-4">
                                            <div class="card shadow bg-light">
                                                <div class="card-body text-center">
                                                    <div class="form-group">
                                                        <label for="trackingnumber">Tracking Number</label>
                                                        <input type="text" class="form-control mb-3" id="trackingnumber" name="trackingnumber" value="<?php echo e(old('trackingnumber', $shipment->trackingnumber)); ?>" required>
                                                        <small class="form-text text-muted mb-3">Edit the tracking number if needed. Barcode will update automatically.</small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <img id="barcode-img" src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($shipment->trackingnumber); ?>&code=Code128" alt="<?php echo e($shipment->trackingnumber); ?>" class="img-fluid">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Current Status</label>
                                                        <select class="form-control" id="status" name="status">
                                                            <option value="Order Confirmed" <?php echo e($shipment->status == 'Order Confirmed' ? 'selected' : ''); ?>>Order Confirmed</option>
                                                            <option value="Picked by Courier" <?php echo e($shipment->status == 'Picked by Courier' ? 'selected' : ''); ?>>Picked by Courier</option>
                                                            <option value="On The Way" <?php echo e($shipment->status == 'On The Way' ? 'selected' : ''); ?>>On The Way</option>
                                                            <option value="Custom Hold" <?php echo e($shipment->status == 'Custom Hold' ? 'selected' : ''); ?>>Custom Hold</option>
                                                            <option value="Delivered" <?php echo e($shipment->status == 'Delivered' ? 'selected' : ''); ?>>Delivered</option>
                                                        </select>
                                                        <small class="form-text text-muted">Changing status here will not send notifications. Use the Update Status page for that.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Sender Information -->
                                        <div class="col-md-6">
                                            <div class="card shadow mb-4">
                                                <div class="card-header bg-primary text-white">
                                                    <h5 class="mb-0">Sender Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="sname">Sender Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="sname" name="sname" value="<?php echo e(old('sname', $shipment->sname)); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="saddress">Sender Address <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="saddress" name="saddress" rows="3" required><?php echo e(old('saddress', $shipment->saddress)); ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="take_off_point">Origin Office <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="take_off_point" name="take_off_point" value="<?php echo e(old('take_off_point', $shipment->take_off_point)); ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Receiver Information -->
                                        <div class="col-md-6">
                                            <div class="card shadow mb-4">
                                                <div class="card-header bg-primary text-white">
                                                    <h5 class="mb-0">Receiver Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name">Receiver Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $shipment->name)); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Receiver Email <span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email', $shipment->email)); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Receiver Phone <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone', $shipment->phone)); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Receiver Address <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="address" name="address" rows="3" required><?php echo e(old('address', $shipment->address)); ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="final_destination">Destination Office <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="final_destination" name="final_destination" value="<?php echo e(old('final_destination', $shipment->final_destination)); ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Shipment Details -->
                                        <div class="col-md-6">
                                            <div class="card shadow mb-4">
                                                <div class="card-header bg-primary text-white">
                                                    <h5 class="mb-0">Shipment Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="qty">Quantity <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="qty" name="qty" value="<?php echo e(old('qty', $shipment->qty)); ?>" min="1" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="description" name="description" rows="4" required><?php echo e(old('description', $shipment->description)); ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="photo">Shipment Photo</label>
                                                        <input type="file" class="form-control" id="photo" name="photo">
                                                        <small class="form-text text-muted">Upload a new image to replace the existing one (if any)</small>
                                                        <?php if($shipment->photo): ?>
                                                            <div class="mt-2">
                                                                <p>Current photo:</p>
                                                                <img src="<?php echo e(asset('public/' . $shipment->photo)); ?>" alt="Shipment Photo" class="img-thumbnail" style="max-height: 150px;">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Cost Information -->
                                        <div class="col-md-6">
                                            <div class="card shadow mb-4">
                                                <div class="card-header bg-primary text-white">
                                                    <h5 class="mb-0">Cost Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="cost">Shipping Cost (<?php echo e($settings->s_currency); ?>) <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="cost" name="cost" value="<?php echo e(old('cost', $shipment->cost)); ?>" min="0" step="0.01" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="clearance_cost">Clearance Cost (<?php echo e($settings->s_currency); ?>) <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="clearance_cost" name="clearance_cost" value="<?php echo e(old('clearance_cost', $shipment->clearance_cost)); ?>" min="0" step="0.01" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="total_cost">Total Cost (<?php echo e($settings->s_currency); ?>)</label>
                                                        <input type="text" class="form-control-plaintext" id="total_cost" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Submit Button -->
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-save mr-1"></i> Update Shipment
                                            </button>
                                            <a href="<?php echo e(route('admin.shipments.view', $shipment->id)); ?>" class="btn btn-secondary">
                                                <i class="fa fa-times-circle mr-1"></i> Cancel
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Calculate and display the total cost
        function calculateTotal() {
            const shippingCost = parseFloat(document.getElementById('cost').value) || 0;
            const clearanceCost = parseFloat(document.getElementById('clearance_cost').value) || 0;
            const totalCost = shippingCost + clearanceCost;
            document.getElementById('total_cost').value = totalCost.toFixed(2);
        }
        
        // Initial calculation
        calculateTotal();
        
        // Recalculate when costs change
        document.getElementById('cost').addEventListener('input', calculateTotal);
        document.getElementById('clearance_cost').addEventListener('input', calculateTotal);
        
        // Update barcode when tracking number changes
        const trackingInput = document.getElementById('trackingnumber');
        const barcodeImg = document.getElementById('barcode-img');
        
        trackingInput.addEventListener('input', function() {
            const trackingNumber = this.value.trim();
            if (trackingNumber) {
                barcodeImg.src = `https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(trackingNumber)}&code=Code128`;
                barcodeImg.alt = trackingNumber;
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirectpro\resources\views/admin/edit-shipment.blade.php ENDPATH**/ ?>