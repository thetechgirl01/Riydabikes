<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Title -->
    <h1 class="h2">
        Complete withdrawal request
    </h1>
    <?php if(session('status')): ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Error!',
                text: "<?php echo e(session('status')); ?>",
                icon: 'error',
                confirmButtonText: 'Okay'
            })
        </script>
        <?php echo e(session()->forget('status')); ?>

    <?php endif; ?>
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
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-md-2">
                            <div class="mb-3">
                                <h4 class="h2"> <i class="bi bi-cursor"></i> <?php echo e($payment_mode); ?></h4>
                            </div>
                            <?php if($payment_mode == 'USDT' and $settings->auto_merchant_option == 'Binance' and $settings->withdrawal_option == 'auto'): ?>
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.crypto-withdaw', ['paymentMode' => $payment_mode,'payment_mode' => $payment_mode])->html();
} elseif ($_instance->childHasBeenRendered('SYcAxFA')) {
    $componentId = $_instance->getRenderedChildComponentId('SYcAxFA');
    $componentTag = $_instance->getRenderedChildComponentTagName('SYcAxFA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SYcAxFA');
} else {
    $response = \Livewire\Livewire::mount('user.crypto-withdaw', ['paymentMode' => $payment_mode,'payment_mode' => $payment_mode]);
    $html = $response->html();
    $_instance->logRenderedChild('SYcAxFA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            <?php else: ?>
                                <form action="<?php echo e(route('completewithdrawal')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label class="">Enter Amount to
                                            withdraw(<?php echo e($settings->currency); ?>)</label>
                                        <input class="form-control " placeholder="Enter Amount" type="number"
                                            name="amount" step="any" required>
                                    </div>
                                    <input value="<?php echo e($payment_mode); ?>" type="hidden" name="method">

                                    <?php if(Auth::user()->sendotpemail == 'Yes'): ?>
                                        <div class="mb-3">
                                            <label class="m-1 d-inline">Enter OTP</label>
                                            <div class="float-right m-1 btn-group d-inline">
                                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('getotp')); ?>"> <i
                                                        class="fa fa-envelope"></i> Request OTP</a>
                                            </div>
                                            <input class="form-control " placeholder="Enter OTP" type="text"
                                                name="otpcode" required>
                                            <small class="">OTP will be sent to your email when you
                                                request</small>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!$default or $payment_mode == 'BUSD'): ?>
                                        <?php if($methodtype == 'crypto'): ?>
                                            <div class="mb-3">
                                                <h5 class="">Enter <?php echo e($payment_mode); ?> Address </h5>
                                                <input class="form-control " placeholder="Enter <?php echo e($payment_mode); ?> Address"
                                                    type="text" name="details" required>
                                                <small class=""><?php echo e($payment_mode); ?> is not a default
                                                    withdrawal option in your account, please enter the correct
                                                    wallet address to recieve your funds.</small>
                                            </div>
                                        <?php else: ?>
                                            <div class="mb-3">
                                                <label class="">Enter <?php echo e($payment_mode); ?> Details </label>
                                                <textarea class="form-control " row="4" name="details"
                                                    placeholder="BankName: Name, Account Number: Number, Account name: Name, Swift Code: Code" required>
                                            
                                            </textarea>
                                                <small class=""><?php echo e($payment_mode); ?> is not a default
                                                    withdrawal option in your account, please enter the correct bank
                                                    details seperated by comma to recieve your funds.</small> <br />
                                                <span class="text-danger">BankName: Name, Account Number: Number,
                                                    Account name: Name, Swift Code: Code</span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <button class="btn btn-primary" type='submit'>Complete Request</button>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashly1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlinetrader\resources\views/user/withdraw.blade.php ENDPATH**/ ?>