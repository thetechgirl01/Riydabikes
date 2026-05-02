<?php
    $theme = $theme ?? (\App\Models\Settings::find(1)->website_theme ?? 'green.css');
?>


<?php $__env->startSection('content'); ?>
   
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Pricing Settings</h1>
                    <a href="<?php echo e(route('admin.pricing.index')); ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back to Rules</a>
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

                <form method="POST" action="<?php echo e(route('admin.pricing.settings.update')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="card p-4 mb-3">
                        <h4 class="mb-3"><i class="fa fa-money-bill"></i> Base Pricing</h4>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6>Minimum Fee (₦)</h6>
                                <input type="number" step="0.01" min="0" name="minimum_fee" class="form-control" value="<?php echo e($settings->minimum_fee); ?>" required>
                                <small class="text-muted">No quote will go below this.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Default Fare When No Rule (₦)</h6>
                                <input type="number" step="0.01" min="0" name="default_fare_when_no_rule" class="form-control" value="<?php echo e($settings->default_fare_when_no_rule); ?>" required>
                                <small class="text-muted">Used when an origin/destination pair has no rule.</small>
                            </div>
                        </div>
                    </div>

                    <div class="card p-4 mb-3">
                        <h4 class="mb-3"><i class="fa fa-weight-hanging"></i> Weight Pricing</h4>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6>Free Weight (kg)</h6>
                                <input type="number" step="0.01" min="0" name="free_weight_kg" class="form-control" value="<?php echo e($settings->free_weight_kg); ?>" required>
                                <small class="text-muted">Weight up to this is included; surcharge applies above it.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Per-kg Rate (₦)</h6>
                                <input type="number" step="0.01" min="0" name="per_kg_rate" class="form-control" value="<?php echo e($settings->per_kg_rate); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="card p-4 mb-3">
                        <h4 class="mb-3"><i class="fa fa-tachometer-alt"></i> Delivery Speed Multipliers</h4>
                        <p class="text-muted small">1.0 = base price; 2.0 = double; etc. Uncheck to hide an option from customers.</p>
                        <div class="form-row">
                            <?php $__currentLoopData = [
                                'standard' => 'Standard',
                                'next_day' => 'Next Day',
                                'same_day' => 'Same Day',
                                'express'  => 'Express',
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group col-md-6">
                                    <h6><?php echo e($label); ?></h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <input type="hidden" name="enable_<?php echo e($key); ?>" value="0">
                                                <input type="checkbox" name="enable_<?php echo e($key); ?>" value="1" <?php echo e($settings->{'enable_'.$key} ? 'checked' : ''); ?>>
                                            </span>
                                        </div>
                                        <input type="number" step="0.01" min="0.1" max="10" name="speed_<?php echo e($key); ?>" class="form-control" value="<?php echo e($settings->{'speed_'.$key}); ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">×</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <button class="btn btn-primary"><i class="fa fa-save"></i> Save Settings</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/pricing/settings.blade.php ENDPATH**/ ?>