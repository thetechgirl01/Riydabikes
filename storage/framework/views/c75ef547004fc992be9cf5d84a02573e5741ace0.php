
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Manage Bikes</h1>
                    <a href="<?php echo e(route('admin.bikes.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Bike</a>
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

                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Daily Rate</th>
                                    <th>Stock</th>
                                    <th>Active</th>
                                    <th>Hireable</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $bikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><img src="<?php echo e($bike->image_url); ?>" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:6px;"></td>
                                        <td>
                                            <strong><?php echo e($bike->name); ?></strong><br>
                                            <small class="text-muted"><?php echo e($bike->brand); ?></small>
                                        </td>
                                        <td>₦<?php echo e(number_format($bike->price, 2)); ?></td>
                                        <td>₦<?php echo e(number_format($bike->daily_rate, 2)); ?></td>
                                        <td><?php echo e($bike->stock); ?></td>
                                        <td>
                                            <form method="POST" action="<?php echo e(route('admin.bikes.toggle-active', $bike->id)); ?>" style="display:inline;">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-sm <?php echo e($bike->is_active ? 'btn-success' : 'btn-secondary'); ?>">
                                                    <?php echo e($bike->is_active ? 'Active' : 'Hidden'); ?>

                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" action="<?php echo e(route('admin.bikes.toggle-hire', $bike->id)); ?>" style="display:inline;">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-sm <?php echo e($bike->available_for_hire ? 'btn-info' : 'btn-secondary'); ?>">
                                                    <?php echo e($bike->available_for_hire ? 'ON' : 'OFF'); ?>

                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.bikes.edit', $bike->id)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="<?php echo e(route('admin.bikes.destroy', $bike->id)); ?>" style="display:inline;"
                                                  onsubmit="return confirm('Delete this bike?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr><td colspan="8" class="text-center py-4">No bikes yet. Click "Add Bike" to get started.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3"><?php echo e($bikes->links()); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/bikes/index.blade.php ENDPATH**/ ?>