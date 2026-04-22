<div class="row">
    <div class="col-12">
        <form method="post" action=<?php echo e(route('updatepreference')); ?>>
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5 class="">Contact Email</h5>
                    <input type="text" class="form-control  " name="contact_email"
                        value="<?php echo e($settings->contact_email); ?>" required>
                </div>

                <input name="s_currency" value="<?php echo e($settings->s_currency); ?>" id="s_c" type="hidden">
                <div class="form-group col-md-6">
                    <h5 class="">Website Currency</h5>
                    <select name="currency" id="select_c" class="form-control   select2" onchange="changecurr()"
                        style="width: 100%">
                        <option value="<?php echo htmlentities($settings->currency); ?>"><?php echo e($settings->currency); ?></option>
                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="<?php echo e($key); ?>" value="<?php echo html_entity_decode($currency); ?>">
                                <?php echo e($key . ' (' . html_entity_decode($currency) . ')'); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>
                <input type="hidden" value="<?php echo e($settings->site_preference); ?>" name="site_preference">
                <div class="form-group col-md-6">
                    <h5 class="">HomePage Url (Redirect)</h5>
                    <input type="text" class="form-control " name="redirect_url"
                        placeholder="eg https://myhomepage.com" value="<?php echo e($settings->redirect_url); ?>">
                    <small>If you use a custom homepage and you want all request to be rediected to that page, please
                        enter the url here, if empty the system will use our default homepage/webpages</small>
                </div>
            </div>

            
            
            <div class="mt-4">
                <input type="submit" class="px-5 btn btn-primary btn-lg" value="Save">
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\shyp\resources\views/admin/Settings/AppSettings/webpreference.blade.php ENDPATH**/ ?>