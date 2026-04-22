
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1">Manage Shipment Deposits</h1>
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
                <div class="mb-5 row">
                    <div class="col-12 card shadow p-4">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Client name</th>
                                        <th>Client email</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Date created</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if($deposit->user > 0): ?>
                                                    <?php echo e($deposit->name ?? 'N/A'); ?>

                                                <?php else: ?>
                                                    <?php echo e($deposit->guest_name ?? 'Guest User'); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($deposit->user > 0): ?>
                                                    <?php echo e($deposit->email ?? 'N/A'); ?>

                                                <?php else: ?>
                                                    <?php echo e($deposit->guest_email ?? 'N/A'); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($settings->currency ?? '$'); ?><?php echo e(number_format($deposit->amount)); ?></td>
                                            <td><?php echo e($deposit->payment_mode); ?></td>
                                            <td>
                                                <?php if($deposit->status == 'Processed'): ?>
                                                    <span class="badge badge-success"><?php echo e($deposit->status); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger"><?php echo e($deposit->status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(date('M d, Y H:i:s', strtotime($deposit->created_at))); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.view.deposit', $deposit->id)); ?>"
                                                    class="btn btn-primary btn-sm m-1" title="View deposit details">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                
                                                <?php if($deposit->proof): ?>
                                                    <a href="<?php echo e(route('admin.view.depositimage', $deposit->id)); ?>"
                                                        class="btn btn-info btn-sm m-1" title="View payment screenshot">
                                                        <i class="fa fa-image"></i>
                                                    </a>
                                                <?php endif; ?>
                                                
                                                <a href="<?php echo e(route('admin.delete.deposit', $deposit->id)); ?>"
                                                    class="m-1 btn btn-danger btn-sm">Delete</a>

                                                <?php if($deposit->status != 'Processed'): ?>
                                                    <a class="btn btn-success btn-sm"
                                                        href="<?php echo e(route('admin.process.deposit', $deposit->id)); ?>">Process</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        // Initialize ShipTable
        $('#ShipTable').DataTable({
            responsive: true,
            ordering: true,
            paging: true,
            searching: true,
            info: true,
            "language": {
                "emptyTable": "No deposits found",
                "zeroRecords": "No matching deposits found"
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        // Initialize datepicker for date range
        $('#datepicker-range').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        
        // Initialize datatable
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            "order": [[ 0, "desc" ]],
            "pageLength": 25,
            "language": {
                "paginate": {
                    "previous": "<i class='mdi mdi-chevron-left'>",
                    "next": "<i class='mdi mdi-chevron-right'>"
                }
            },
            "drawCallback": function () {
                $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                
                // Initialize tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            }
        });
        
        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        
        // Counter animation
        $('.counter-value').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-target');
            
            $({ countNum: 0 }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ship\resources\views/admin/shipment-deposits.blade.php ENDPATH**/ ?>