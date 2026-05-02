<?php
    $theme = $theme ?? (\App\Models\Settings::find(1)->website_theme ?? 'green.css');
?>

<?php $__env->startSection('content'); ?>


    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Delivery Pricing Rules</h1>
                    <div>
                        <a href="<?php echo e(route('admin.pricing.settings')); ?>" class="btn btn-secondary"><i class="fa fa-cog"></i> Settings</a>
                        <a href="<?php echo e(route('admin.pricing.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Rule</a>
                    </div>
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

                <div class="card p-3 mb-3">
                    <small class="text-muted">
                        Rules below define the <strong>base fare</strong> for each origin → destination pair.
                        Weight surcharge (₦<?php echo e(number_format($settings->per_kg_rate, 2)); ?>/kg above <?php echo e($settings->free_weight_kg); ?>kg)
                        and speed multipliers are applied on top automatically. Minimum fee: ₦<?php echo e(number_format($settings->minimum_fee, 2)); ?>.
                        Pairs without a rule fall back to ₦<?php echo e(number_format($settings->default_fare_when_no_rule, 2)); ?>.
                    </small>
                </div>

                <div class="card p-3">
                    <form method="GET" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search states..." value="<?php echo e(request('search')); ?>">
                        <button class="btn btn-primary">Filter</button>
                        <?php if(request('search')): ?>
                            <a href="<?php echo e(route('admin.pricing.index')); ?>" class="btn btn-secondary ml-2">Clear</a>
                        <?php endif; ?>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Base Fare</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><strong><?php echo e($rule->origin_state); ?></strong></td>
                                        <td><?php echo e($rule->destination_state); ?></td>
                                        <td>₦<?php echo e(number_format($rule->base_fare, 2)); ?></td>
                                        <td>
                                            <form method="POST" action="<?php echo e(route('admin.pricing.toggle', $rule->id)); ?>" style="display:inline;">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-sm <?php echo e($rule->is_active ? 'btn-success' : 'btn-secondary'); ?>">
                                                    <?php echo e($rule->is_active ? 'Active' : 'Inactive'); ?>

                                                </button>
                                            </form>
                                        </td>
                                        <td><small class="text-muted"><?php echo e(Str::limit($rule->notes, 40)); ?></small></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.pricing.edit', $rule->id)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="<?php echo e(route('admin.pricing.destroy', $rule->id)); ?>" style="display:inline;" onsubmit="return confirm('Delete this rule?')">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr><td colspan="6" class="text-center py-4">No pricing rules yet. Click "Add Rule" to get started.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3"><?php echo e($rules->links()); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/pricing/index.blade.php ENDPATH**/ ?>