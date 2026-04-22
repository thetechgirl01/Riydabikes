<?php $__env->startSection('content'); ?>

    <div class="mt-2 mb-4">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.page-title','data' => []]); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    Welcome back, <?php echo e(Auth('admin')->User()->firstName); ?>

                    <?php echo e(Auth('admin')->User()->lastName); ?>!
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <h5 class="op-7 mb-4">Yesterday I was clever, so I wanted to change the world. Today I am wise, so I am
                    changing myself.</h5>
            </div>
            <?php if(Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin'): ?>
                <div class="py-2 ml-md-auto py-md-0">
                    <a href="<?php echo e(route('admin.shipments.create')); ?>" class="mr-2 btn btn-success d-lg-inline">Create New Shipment</a>
                    <a href="<?php echo e(route('admin.shipments')); ?>" class="mr-2 btn btn-danger d-lg-inline">Manage Shipment</a>
                    
                </div>
            <?php endif; ?>
        </div>
    </div>
   
    
    <!-- Beginning of  Dashboard Stats  -->
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="flaticon-success"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-12 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Shippment</p>
                                <h4 class="card-title"><?php echo e(number_format($numberOfUsers)); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <!-- End of Dashboard Stats  -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Shipments Statistics</div>
                    <div>
                        <p><?php echo e(now()->format('Y')); ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fw-mediumbold">Latest Shipments</div>
                    <div class="card-list">
                        <?php $__empty_1 = true; $__currentLoopData = $latestUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('viewuser', ['id' => $user->id])); ?>">
                                <div class="item-list shadow-sm d-flex">
                                    <div class="info-user ml-3 text-decoration-none">
                                        <div class="username font-weight-bolder"><?php echo e($user->trackingnumber); ?></div>
                                        <div class="status"><?php echo e($user->email); ?></div>
                                    </div>
                                    <div>
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('dash/js/plugin/chart.js/chart.min.js')); ?>"></script>
    <script>
        //var data = <?php echo json_encode($usersData, 15, 512) ?>;
        var userStats = <?php echo e(Illuminate\Support\Js::from($usersData)); ?>;

        var lineChart = document.getElementById('lineChart').getContext('2d');
        var myLineChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Shipments Made",
                    borderColor: "#1d7af3",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#1d7af3",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    backgroundColor: 'transparent',
                    fill: true,
                    borderWidth: 2,
                    data: userStats
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 10,
                        fontColor: '#1d7af3',
                    }
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Processed Deposit', 'Pending Deposit', 'Processed Withdrawal', 'Pending Withdrawal'],
                datasets: [{
                    label: "# Transactions statistics in <?php echo e($settings->currency); ?>",
                    data: [
                        "<?php echo e($total_deposited); ?>",
                        "<?php echo e($chart_pendepsoit); ?>",
                        "<?php echo e($total_withdrawn); ?>",
                        "<?php echo e($chart_pendwithdraw); ?>",
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>