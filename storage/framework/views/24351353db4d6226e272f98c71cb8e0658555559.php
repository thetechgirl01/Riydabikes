<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Title -->
    <h1 class="h2">
        Welcome, <?php echo e(Auth::user()->name); ?>!
    </h1>
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
    <?php if(!empty($settings->welcome_message) and Auth::user()->created_at->diffInDays() <= 3): ?>
        <div class="row">
            <div class="col-12">
                <div class="py-4 alert alert-primary alert-dismissible fade show" role="alert">
                    <?php echo e($settings->welcome_message); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($settings->enable_annoc == 'on' and !empty($settings->newupdate)): ?>
        <div class="row">
            <div class="col-12">
                <div class="py-4 alert alert-info alert-dismissible fade show" role="alert">
                    <?php echo e($settings->newupdate); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php if(Auth::user()->taxtype=='on'): ?>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card border-0">
                <div class="card-body bg-warning">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <div>
                                <!-- Title -->
                                <h3 class="d-flex align-items-center text-uppercase  fw-semibold mb-2 text-danger">
                                    <span class="legend-circle-sm bg-danger text-danger"></span>
                                   Tax Fee
                                </h3>

                                <!-- Subtitle -->
                                <h2 class="mb-0 text-danger">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->taxamount, 2, '.', ',')); ?>

                                </h2>

                               
                            </div>

                            <span class="text-primary">
                               
                            </span>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <div>
                                <!-- Title -->
                                <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                    <span class="legend-circle-sm bg-primary"></span>
                                    Account Balance
                                </h5>

                                <!-- Subtitle -->
                                <h2 class="mb-0">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?>

                                </h2>

                                <a href="<?php echo e(route('deposits')); ?>" class="fs-6 btn-link mb-0 mt-2 mr-3">
                                    Deposit
                                </a>
                                <span class="">-</span>
                                <?php if($moresettings->use_transfer): ?>
                                    <!-- Comment -->
                                    <a href="<?php echo e(route('transferview')); ?>" class="fs-6 btn-link mb-0 mt-2 ml-3">
                                        Transfer
                                    </a>
                                <?php endif; ?>
                            </div>

                            <span class="text-primary">
                                <i class="bi bi-wallet-fill fs-1"></i>
                            </span>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>
        <?php if($mod['investment']): ?>
            <div class="col-lg-3">
                <!-- Card -->
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <div>
                                    <!-- Title -->
                                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                        <span class="legend-circle-sm bg-success"></span>
                                        Total Profit
                                    </h5>
                                    <!-- Subtitle -->
                                    <h2 class="mb-0">
                                        <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?>

                                    </h2>
                                    <!-- Comment -->
                                    
                                </div>

                                <span class="text-success">
                                    <i class="bi bi-coin fs-1"></i>
                                </span>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <div>
                                <!-- Title -->
                                <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                    <span class="legend-circle-sm bg-info"></span>
                                    Total Bonus
                                </h5>
                                <!-- Subtitle -->
                                <h2 class="mb-0">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->bonus, 2, '.', ',')); ?>

                                </h2>
                                <!-- Comment -->
                                
                            </div>

                            <span class="text-info">
                                <i class="bi bi-gift-fill fs-1"></i>
                            </span>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Card -->
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <div>
                                <!-- Title -->
                                <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                    <span class="legend-circle-sm bg-info"></span>
                                    Referral Bonus
                                </h5>
                                <!-- Subtitle -->
                                <h2 class="mb-0">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->ref_bonus, 2, '.', ',')); ?>

                                </h2>
                                <!-- Comment -->
                               
                            </div>

                            <span class="text-info">
                                <i class="bi bi-piggy-bank fs-1"></i>
                            </span>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <div>
                                <!-- Title -->
                                <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                    <span class="legend-circle-sm bg-success"></span>
                                    Total Deposited
                                </h5>
                                <!-- Subtitle -->
                                <h2 class="mb-0">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format($deposited, 2, '.', ',')); ?>

                                </h2>
                                <!-- Comment -->
                                <a href="<?php echo e(route('accounthistory')); ?>">
                                    <p class="fs-6 btn-link mb-0 mt-2">
                                        View deposits
                                    </p>
                                </a>
                            </div>

                            <span class="text-success">
                                <i class="bi bi-box-arrow-in-down fs-1"></i>
                            </span>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <div>
                                <!-- Title -->
                                <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                    <span class="legend-circle-sm bg-danger"></span>
                                    Total Withdrawal
                                </h5>
                                <!-- Subtitle -->
                                <h2 class="mb-0">
                                    <?php echo e($settings->currency); ?><?php echo e(number_format($total_withdrawal, 2, '.', ',')); ?>

                                </h2>
                                <!-- Comment -->
                                
                            </div>

                            <span class="text-danger">
                                <i class="bi bi-box-arrow-in-up fs-1"></i>
                            </span>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <div>
                                <!-- Title -->
                                <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                    <span class="legend-circle-sm bg-secondary"></span>
                                    Referrals
                                </h5>
                                <!-- Subtitle -->
                                
                            </div>
                            <span class="text-secondary">
                                <i class="bi bi-link fs-1"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(Auth::user()->taxtype!='on'): ?>
        <?php if($mod['subscription']): ?>
            <div class="col-lg-3">
                <div class="card border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <div>
                                    <!-- Title -->
                                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                        <span class="legend-circle-sm bg-info"></span>
                                        Managed Accounts
                                    </h5>
                                    <!-- Subtitle -->
                                    <h2 class="mb-0">
                                        <?php echo e($trading_accounts); ?>

                                    </h2>
                                    <!-- Comment -->
                                    <a href="<?php echo e(route('subtrade')); ?>">
                                        <p class="fs-6 btn-link mb-0 mt-2">
                                            View accounts
                                        </p>
                                    </a>
                                </div>

                                <span class="text-info">
                                    <i class="bi bi-bar-chart-steps fs-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if($mod['investment']): ?>
        
        <div class="mt-4 row">
            <div class="col-12">
                <div>
                    <h5 class="text-primary h5">Active Plan(s)
                        <span class="text-base count">(<?php echo e($plans ? count($plans) : '0'); ?>)</span>
                    </h5>
                </div>
            </div>
            <div class="col-12">
                <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="py-4 card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="h5"><?php echo e($plan->dplan->name); ?></h6>
                                        <p class="h3">
                                            <?php echo e($settings->currency); ?><?php echo e(number_format($plan->amount)); ?>

                                        </p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <div class="d-flex justify-content-around">
                                            <div class="mr-3">
                                                <h6 class="text-black bold">
                                                    <?php echo e($plan->created_at->toDayDateTimeString()); ?>

                                                </h6>
                                                <span class="nk-iv-scheme-value date">Start Date</span>
                                            </div>
                                            <span class="m-3">

                                            </span>
                                            <div class="ml-3">
                                                <h6 class="text-black bold">
                                                    <?php echo e(\Carbon\Carbon::parse($plan->expire_date)->toDayDateTimeString()); ?>

                                                </h6>
                                                <span class="nk-iv-scheme-value date">End Date</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="text-black">
                                            <?php if($plan->active == 'yes'): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php elseif($plan->active == 'expired'): ?>
                                                <span class="badge bg-danger">Expired</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                            <?php endif; ?>
                                        </h6>
                                        <span class="nk-iv-scheme-value amount">Status</span>
                                    </div>

                                    <a href="<?php echo e(route('plandetails', $plan->id)); ?>">
                                        <i class="bi bi-arrow-right fs-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="mt-4 row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="text-center card-body py-4">
                                    <i class="bi bi-database-fill-exclamation" style="font-size: 50px"></i>
                                    <p>You do not have an active investment at the moment.</p>
                                    <a href="<?php echo e(route('mplans')); ?>" class="btn btn-primary">
                                        Invest Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
    <?php endif; ?>
    
    <div class="mt-4 row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h6 class="text-primary h5">
                    Recent transactions
                </h6>
                <div class="">
                    <a href="<?php echo e(route('accounthistory')); ?>" class="btn btn-primary btn-sm">
                        View all transactions
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $t_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php echo e($item->created_at->toDayDateTimeString()); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->type); ?>

                                        </td>
                                        <td>
                                            <span class="badge bg-primary">
                                                <?php echo e($settings->currency); ?><?php echo e(number_format($item->amount)); ?>

                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <td colspan="3">
                                        No record yet
                                    </td>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex">
            <!-- Card -->
            <div class="card border-0 flex-fill w-100">
                <div class="card-header border-0 card-header-space-between">
                    <!-- Title -->
                    <h2 class="card-header-title h4 text-uppercase">
                        Real time market data
                    </h2>
                </div>
                <div class="card-body d-flex flex-column">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                    TradingView</span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js"
                            async>
                            {
                                "width": "100%",
                                "height": "550",
                                "currencies": [
                                    "EUR",
                                    "USD",
                                    "JPY",
                                    "GBP",
                                    "CHF",
                                    "AUD",
                                    "CAD",
                                    "NZD",
                                    "CNY",
                                    "TRY",
                                    "SEK",
                                    "NOK"
                                ],
                                "isTransparent": true,
                                "colorTheme": "light",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashly1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/user/dashboard.blade.php ENDPATH**/ ?>