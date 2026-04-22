<?php $bike = $bike ?? null; ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <h5>Bike Name</h5>
        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $bike->name ?? '')); ?>" required>
    </div>
    <div class="form-group col-md-6">
        <h5>Brand</h5>
        <input type="text" name="brand" class="form-control" value="<?php echo e(old('brand', $bike->brand ?? '')); ?>">
    </div>

    <div class="form-group col-md-4">
        <h5>Selling Price (₦)</h5>
        <input type="number" step="0.01" name="price" class="form-control" value="<?php echo e(old('price', $bike->price ?? '')); ?>" required>
    </div>
    <div class="form-group col-md-4">
        <h5>Daily Rental Rate (₦)</h5>
        <input type="number" step="0.01" name="daily_rate" class="form-control" value="<?php echo e(old('daily_rate', $bike->daily_rate ?? '')); ?>" required>
    </div>
    <div class="form-group col-md-4">
        <h5>Stock (units available for sale)</h5>
        <input type="number" name="stock" class="form-control" value="<?php echo e(old('stock', $bike->stock ?? 0)); ?>" required>
    </div>

    <div class="form-group col-md-12">
        <h5>Description</h5>
        <textarea name="description" class="form-control" rows="4"><?php echo e(old('description', $bike->description ?? '')); ?></textarea>
    </div>

    <div class="form-group col-md-6">
        <h5>Bike Image</h5>
        <?php if(!empty($bike->image)): ?>
            <div class="mb-2"><img src="<?php echo e($bike->image_url); ?>" style="width:120px;height:120px;object-fit:cover;border-radius:6px;"></div>
        <?php endif; ?>
        <input type="file" name="image" class="form-control" accept="image/*">
        <small>JPG / PNG / WEBP, max 4MB. Leave empty to keep current image.</small>
    </div>

    <div class="form-group col-md-3">
        <h5>Active</h5>
        <label><input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $bike->is_active ?? 1) ? 'checked' : ''); ?>> Show on public site
        </label>
    </div>
    <div class="form-group col-md-3">
        <h5>Available for Hire</h5>
        <label><input type="hidden" name="available_for_hire" value="0">
            <input type="checkbox" name="available_for_hire" value="1" <?php echo e(old('available_for_hire', $bike->available_for_hire ?? 1) ? 'checked' : ''); ?>> Users can hire
        </label>
    </div>
</div><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/bikes/_form.blade.php ENDPATH**/ ?>