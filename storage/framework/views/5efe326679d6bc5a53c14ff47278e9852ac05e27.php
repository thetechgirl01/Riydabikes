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
                <h1 class="title1 text-<?php echo e($text); ?> text-center">Create New Shipment</h1>
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

                            <form method="POST" action="<?php echo e(route('admin.shipments.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <h2 class="text-<?php echo e($text); ?>">Sender Information:</h2>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Sender Name <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="sname" name="sname" value="<?php echo e(old('sname')); ?>" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Sender Email</h6>
                                        <input type="email" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="sender_email" name="sender_email" value="<?php echo e(old('sender_email')); ?>">
                                        <small class="text-muted">Optional: For sending shipment notifications to sender</small>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?>">Sender Address (country, city, address) <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="saddress" name="saddress" rows="3" required><?php echo e(old('saddress')); ?></textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Origin Location (country, city, address)<span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="take_off_point" name="take_off_point" value="<?php echo e(old('take_off_point')); ?>" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h2 class="text-<?php echo e($text); ?>">Receiver Information:</h2>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Receiver Name <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Receiver Email <span class="text-danger">*</span></h6>
                                        <input type="email" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                        <small class="text-muted">Required for shipment notifications</small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Receiver Phone <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Destination Location(country ,city, address) <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="final_destination" name="final_destination" value="<?php echo e(old('final_destination')); ?>" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?>">Receiver Address (city, country) for map read it correctly, you can leave it as Destination Location <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="address" name="address" rows="3" required><?php echo e(old('address')); ?></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h2 class="text-<?php echo e($text); ?>">Shipment Information:</h2>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Quantity <span class="text-danger">*</span></h6>
                                        <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="qty" name="qty" min="1" value="<?php echo e(old('qty', 1)); ?>" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Weight (kg)</h6>
                                        <input type="number" step="0.01" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="weight" name="weight" value="<?php echo e(old('weight')); ?>">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">freight_type</h6>
                                        
                                        
                                         <select type="text" class="form-control  bg-<?php echo e($bg); ?>  text-<?php echo e($text); ?>"
                                                                name="freight_type"  required>
                                             
                                                                <option value="Air Freight">Air Freight</option> 
                                                                <option value="Sea Freight">Sea Freight</option> 
                                                                <option value="Road Freight">Road Freight</option> 
                                                                <option value="Rail Freight">Rail Freight</option> 
                                                               
                                                        </select>
                                       
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Upload Shipment Photo</h6>
                                        <input type="file" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="photo">
                                        <small class="text-muted">Optional: Upload an image of the shipment package</small>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Payment Method</h6>
                                        <select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="payment_method" name="payment_method">
                                            <option value="To Pay" <?php echo e(old('payment_method') == 'To Pay' ? 'selected' : ''); ?>>To Pay (Receiver Pays)</option>
                                            <option value="Prepaid" <?php echo e(old('payment_method') == 'Prepaid' ? 'selected' : ''); ?>>Prepaid (Sender Pays)</option>
                                            <option value="Third Party" <?php echo e(old('payment_method') == 'Third Party' ? 'selected' : ''); ?>>Third Party</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?>">Package Description <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="description" name="description" rows="3" required><?php echo e(old('description')); ?></textarea>
                                        <small class="text-muted">Provide a detailed description of the shipment contents</small>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <h2 class="text-<?php echo e($text); ?> text-danger">Cost Information:</h2>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?> text-danger">Shipping Cost <span class="text-danger">*</span></h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"><?php echo e($settings->s_currency); ?></span>
                                            </div>
                                            <input type="number" step="0.01" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="cost" name="cost" value="<?php echo e(old('cost', 0)); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?> text-danger">Clearance Cost <span class="text-danger">*</span></h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"><?php echo e($settings->s_currency); ?></span>
                                            </div>
                                            <input type="number" step="0.01" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="clearance_cost" name="clearance_cost" value="<?php echo e(old('clearance_cost', 0)); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?> text-danger">Total Cost</h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"><?php echo e($settings->s_currency); ?></span>
                                            </div>
                                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" id="total_cost" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Date Shipped</h6>
                                        <input type="datetime-local" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="date_shipped" value="<?php echo e(old('date_shipped')); ?>" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Expected Delivery Date</h6>
                                        <input type="datetime-local" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="expected_delivery" value="<?php echo e(old('expected_delivery')); ?>" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?>">Shipment Status</h6>
                                        <select type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="status" required>
                                            <option value="Order Confirmed" <?php echo e(old('status') == 'Order Confirmed' ? 'selected' : ''); ?>>Order Confirmed</option>
                                            <option value="Picked by Courier" <?php echo e(old('status') == 'Picked by Courier' ? 'selected' : ''); ?>>Picked by Courier</option>
                                            <option value="On The Way" <?php echo e(old('status') == 'On The Way' ? 'selected' : ''); ?>>On The Way</option>
                                            <option value="Custom Hold" <?php echo e(old('status') == 'Custom Hold' ? 'selected' : ''); ?>>Custom Hold</option>
                                            <option value="Delivered" <?php echo e(old('status') == 'Delivered' ? 'selected' : ''); ?>>Delivered</option>
                                            <option value="Approved" <?php echo e(old('status') == 'Approved' ? 'selected' : ''); ?>>Approved</option>
                                            <option value="Available" <?php echo e(old('status') == 'Available' ? 'selected' : ''); ?>>Available</option>
                                            <option value="Pending" <?php echo e(old('status') == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-<?php echo e($text); ?> text-danger">Payment Status</h6>
                                        <select type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="payment_status" required>
                                            <option value="Paid" <?php echo e(old('payment_status') == 'Paid' ? 'selected' : ''); ?>>Paid</option>
                                            <option value="Unpaid" <?php echo e(old('payment_status') == 'Unpaid' ? 'selected' : ''); ?>>Unpaid</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <h6 class="text-<?php echo e($text); ?> text-danger">Delivery Percentage Completed</h6>
                                        <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="percentage_complete" value="<?php echo e(old('percentage_complete', 0)); ?>" min="0" max="100" placeholder="Enter Delivery Percentage Completed">
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save mr-2"></i> Create Shipment
                                        </button>
                                        <a href="<?php echo e(route('admin.shipments')); ?>" class="btn btn-secondary ml-2">
                                            <i class="fas fa-times mr-2"></i> Cancel
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
    $(document).ready(function() {
        // Calculate total cost when shipping cost or clearance cost changes
        $('#cost, #clearance_cost').on('input', function() {
            calculateTotal();
        });
        
        // Initial calculation
        calculateTotal();
        
        function calculateTotal() {
            var shippingCost = parseFloat($('#cost').val()) || 0;
            var clearanceCost = parseFloat($('#clearance_cost').val()) || 0;
            var total = shippingCost + clearanceCost;
            
            $('#total_cost').val(total.toFixed(2));
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elitemaxpro/shypdirect.elitemaxpro.click/resources/views/admin/create-shipment.blade.php ENDPATH**/ ?>