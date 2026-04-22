
<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($foramin  ? 'Admin' : $user->name); ?>

<?php if($foramin): ?>
This is to inform you that you <?php echo e($user->name); ?> have made a withdrawal request of <?php echo e($settings->currency.$withdrawal->amount); ?>, kindly login to your account to review and take neccesary action.
<?php else: ?>
<?php if($withdrawal->status == 'Processed'): ?>
This is to inform you that your withdrawal request of <?php echo e($settings->currency.$withdrawal->amount); ?> have been approved and funds have been sent to your selected account
<?php else: ?>
This is to inform you that your withdrawal request of <?php echo e($settings->currency.$withdrawal->amount); ?> is successfull, please wait while we process your request. You will receive a notification regarding the status of your request.
<?php endif; ?>    
<?php endif; ?>
Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\xampp\htdocs\onlinetrader\resources\views/emails/withdrawal-status.blade.php ENDPATH**/ ?>