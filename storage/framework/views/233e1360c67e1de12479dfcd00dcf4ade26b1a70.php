<?php $rule = $rule ?? null; ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <h6>Origin State</h6>
        <select name="origin_state" class="form-control" required>
            <option value="">— Select —</option>
            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($st); ?>" <?php echo e(old('origin_state', $rule->origin_state ?? '') == $st ? 'selected' : ''); ?>><?php echo e($st); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group col-md-6">
        <h6>Destination State</h6>
        <select name="destination_state" class="form-control" required>
            <option value="">— Select —</option>
            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($st); ?>" <?php echo e(old('destination_state', $rule->destination_state ?? '') == $st ? 'selected' : ''); ?>><?php echo e($st); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group col-md-6">
        <h6>Base Fare (₦)</h6>
        <input type="number" step="0.01" min="0" name="base_fare" class="form-control" value="<?php echo e(old('base_fare', $rule->base_fare ?? '')); ?>" required>
        <small class="text-muted">Speed multipliers and weight surcharge stack on top of this.</small>
    </div>
    <div class="form-group col-md-6">
        <h6>Status</h6>
        <label class="d-block mt-2">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $rule->is_active ?? 1) ? 'checked' : ''); ?>> Active
        </label>
    </div>
    <div class="form-group col-md-12">
        <h6>Notes <span class="text-muted">(optional)</span></h6>
        <textarea name="notes" rows="2" class="form-control"><?php echo e(old('notes', $rule->notes ?? '')); ?></textarea>
    </div>
</div><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/pricing/_form.blade.php ENDPATH**/ ?>