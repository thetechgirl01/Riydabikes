<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Title -->
    <div class="mb-5">
        <h1 class="h2 m-0">
            Withdraw from your account.
        </h1>
        <p class="m-0">Place a withdrawal request using any of the payment method below.</p>
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
     <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, []); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
    <div class="row mb-6">
        <?php $__empty_1 = true; $__currentLoopData = $wmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-xl-4">
                <!-- Card -->
                <div class="card border-0 py-6 px-4 mb-6 mb-xl-3">
                    <div class="card-body">
                        <h2 class="card-title h4 text-uppercase text-secondary text-center mb-3"><?php echo e($method->name); ?></h2>
                        <h3 class="card-text display-3 text-center">
                            <?php echo e($settings->currency); ?><?php echo e(number_format($method->maximum)); ?> <span
                                class="fs-3 fw-normal text-secondary">Max</span>
                        </h3>

                        <!-- Divider -->
                        <hr>

                        <ul class="list-unstyled mb-7">
                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                Minimum amount: <?php echo e($settings->currency); ?><?php echo e(number_format($method->minimum)); ?>

                            </li>
                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                Charge Type: <?php echo e($method->charges_type); ?>

                            </li>
                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                Charges Amount:
                                <?php if($method->charges_type == 'percentage'): ?>
                                    <?php echo e($method->charges_amount); ?>%
                                <?php else: ?>
                                    <?php echo e($settings->currency); ?><?php echo e($method->charges_amount); ?>

                                <?php endif; ?>
                            </li>
                            <li class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="12"
                                    class="me-2 text-primary">
                                    <path
                                        d="M23.37.29a1.49,1.49,0,0,0-2.09.34L7.25,20.2,2.56,15.51A1.5,1.5,0,0,0,.44,17.63l5.93,5.94a1.53,1.53,0,0,0,2.28-.19l15.07-21A1.49,1.49,0,0,0,23.37.29Z"
                                        style="fill: currentColor" />
                                </svg>
                                Duration: <?php echo e($method->duration); ?>

                            </li>
                        </ul>
                        <?php if($settings->enable_with == 'false'): ?>
                            <button class="btn btn-lg btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#withdrawdisabled" type="button">Select this method</button>
                        <?php else: ?>
                            <form action='<?php echo e(route('withdrawamount')); ?>' method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo e($method->name); ?>" name="method">
                                    <button class="btn btn-lg btn-primary w-100" type='submit'>
                                        Select this method
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center">
                <h3>No withdrawal method enabled.</h3>
            </div>
        <?php endif; ?>

        <div id="withdrawdisabled" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">Withdawal is disabled</h3>
                    </div>
                    <div class="modal-footer m-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashly1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/user/withdrawals.blade.php ENDPATH**/ ?>