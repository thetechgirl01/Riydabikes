
<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($foramin  ? 'Admin' : $user->name); ?>

<?php if($foramin): ?>
 This is to inform you of a successfull Deposit of <?php echo e($settings->currency.$deposit->amount); ?> from <?php echo e($user->name); ?>. <?php echo e($deposit->status == "Processed" ? '' : ' Please login to process it.'); ?>

<?php else: ?>
<?php if($deposit->status == 'Processed'): ?>
This is to inform you that your deposit of <?php echo e($settings->currency.$deposit->amount); ?> have been received and confirmed. Your account balance have been credited with the specified amount.
<?php else: ?>
This is to inform you that your deposit of <?php echo e($settings->currency.$deposit->amount); ?> is successful, please wait while we confirm your deposit. You will receive a notification regarding the status of this transaction.
<?php endif; ?>
<?php endif; ?>
Thanks,
<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>

<?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/emails/success-deposit.blade.php ENDPATH**/ ?>