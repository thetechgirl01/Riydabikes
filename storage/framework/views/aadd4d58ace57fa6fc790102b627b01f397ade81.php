<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
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
                <!-- Beginning of  Dashboard Stats  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-3 card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h1>Tracking Number: <?php echo e($user->trackingnumber); ?></h1>
                                        <h3 class="d-inline text-primary">Details of shipment from <?php echo e($user->sname); ?> to <?php echo e($user->name); ?></h3><span></span>
                                        <div class="d-inline">
                                            <div class="float-right btn-group">
                                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('manageusers')); ?>"> <i
                                                        class="fa fa-arrow-left"></i> back</a> &nbsp;
                                                <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                                    data-toggle="dropdown" data-display="static" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-lg-right">
                                                    
                                                    
                                                    
                                                    
                                                        
                                                        
                                                         
                                                        
                                                        
                                                     
                                                    <a href="#" data-toggle="modal" data-target="#TradingModal"
                                                        class="dropdown-item">Add Shipment Update/History</a>
                                                    <a href="#" data-toggle="modal" data-target="#edituser"
                                                        class="dropdown-item">Edit Shipment</a>
                                                        <a href="<?php echo e(route('printnow', $user->id)); ?>"
                                                            class="dropdown-item">Print Invoice</a>
                                                
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#sendmailtooneuserModal" class="dropdown-item">Send
                                                        Email</a>
                                                    

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 mt-4 border rounded row ">
                                    <div class="col-md-3">
                                        <h5 class="text-bold">Reciver's Name</h5>
                                        <h6  class='badge badge-secondary'><?php echo e($user->name); ?>

                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Reciver's Email</h5>
                                        <h6  class='badge badge-secondary'><?php echo e($user->email); ?></h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Reciver's Address</h5>
                                        <h6  class='badge badge-secondary'><?php echo e($user->address); ?></h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Reciver's  Country</h5>
                                        <h6  class='badge badge-secondary'><?php echo e($user->country); ?></h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Shippment Type</h5>
                                       <p class='badge badge-secondary'> <?php echo e($user->shipment_type); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5> Current Location</h5>
                                        <h6  class='badge badge-secondary'><?php echo e($user->location); ?></h6>

                                    </div>
                                    <div class="col-md-3">
                                        <h5>Status</h5>
                                        <?php if($user->status == 'Delivered'): ?>
                                                            <span class='badge badge-success'><?php echo e($user->status); ?></span>
                                                        <?php elseif($user->status == 'Cancelled'): ?>
                                                            <span class='badge badge-danger'><?php echo e($user->status); ?></span>
                                                            <?php else: ?>
                                                            <span class='badge badge-warning'><?php echo e($user->status); ?></span>
                                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Shipment Delivery Date</h5>
                                        <h6 class='badge badge-secondary'><?php echo e(\Carbon\Carbon::parse($user->expected_delivery)->toDayDateTimeString()); ?></h6>
                                    </div>
                                </div>
                                <div class="mt-3 row ">
                                    <div class="col-md-12">
                                        <h1 text='text-primary'>Updated Tracking Information</h1>
                                    </div>
                                </div>



                     
                                <div class="card-body">
                                    <div class="table-responsive" data-example-id="hoverable-table">
                                        <table class="table table-hover themes/purposeTheme/assets/">
                                            <thead>
                                                <tr>
                                                    
                                                    
                                                    <th>Time updated</th>
                                                    <th>Current Location</th>
                                                    <th>Status</th>
                                                    <th>Comment</th>
                                                    <th>Delete History</th>
                                                </tr>
                                            </thead>
                                            <tbody id="userslisttbl">
    
                                                <?php $__empty_1 = true; $__currentLoopData = $trackings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tracking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        
                                                        <td>
                                                            <?php echo e($tracking->created_at->diffForHumans()); ?>

                                                        </td>
                                                       
                                                        <td><?php echo e($tracking->country); ?>|<?php echo e($tracking->city); ?></td>
                                                       
                                                        
                                                        <td>
                                                            <?php if($tracking->status == 'Delivered'): ?>
                                                                <span class='badge badge-success'><?php echo e($tracking->status); ?></span>
                                                            <?php elseif($tracking->status == 'Cancelled'): ?>
                                                                <span class='badge badge-danger'><?php echo e($tracking->status); ?></span>
                                                                <?php else: ?>
                                                                <span class='badge badge-warning'><?php echo e($tracking->status); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($tracking->comment); ?></td>
                                                        <td>
                                                            <a class='btn btn-danger btn-sm'
                                                                href="<?php echo e(route('delhistory', $tracking->id)); ?>" role='button'>
                                                               Delete
                                                           
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <td colspan="9">
                                                        No  Updated History Shipment Available
                                                    </td>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                           
                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>                   
        <?php echo $__env->make('admin.Users.users_actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/Users/userdetails.blade.php ENDPATH**/ ?>