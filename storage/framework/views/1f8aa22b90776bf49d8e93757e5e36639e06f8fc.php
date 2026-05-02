<!-- Stored in resources/views/child.blade.php -->

<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo e(Auth('admin')->User()->firstName); ?> <?php echo e(Auth('admin')->User()->lastName); ?>

                            <span class="user-level"> Admin</span>
                            
                        </span>
                    </a>
                </div>
            </div>

            <ul class="nav nav-primary">
                <li class="nav-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('/admin/dashboard')); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if(Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin'): ?>
                    

                    <li class="nav-item">
    <a data-toggle="collapse" href="#bike-menu" aria-expanded="false">
        <i class="fas fa-motorcycle"></i>
        <p>Bikes</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="bike-menu">
        <ul class="nav nav-collapse">
            <li><a href="<?php echo e(route('admin.bikes.index')); ?>"><span class="sub-item">Manage Bikes</span></a></li>
            <li><a href="<?php echo e(route('admin.bikes.purchases')); ?>"><span class="sub-item">Purchases</span></a></li>
            <li><a href="<?php echo e(route('admin.bikes.rentals')); ?>"><span class="sub-item">Rentals</span></a></li>
        </ul>
    </div>
</li>

                  

                  <li class="nav-item <?php echo e(request()->routeIs('admin.shipments') ? 'active' : ''); ?> <?php echo e(request()->routeIs('admin.shipments.view') ? 'active' : ''); ?> <?php echo e(request()->routeIs('admin.shipments.update-status') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('admin.shipments')); ?>">
        <i class="fa fa-truck" aria-hidden="true"></i>
        <p>Manage Deliveries</p>
    </a>
</li>

<li class="nav-item <?php echo e(request()->routeIs('admin.shipments.create') ? 'active' : ''); ?>">
    <a href="<?php echo e(route('admin.shipments.create')); ?>">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        <p>Create New Delivery</p>
    </a>
</li>

<li class="nav-item <?php echo e(request()->is('admin/dashboard/mdeposits') ? 'active' : ''); ?>">
    <a href="<?php echo e(url('/admin/shipment/deposits')); ?>">
        <i class="fa fa-money-bill" aria-hidden="true"></i>
        <p>Delivery Payments</p>
    </a>
</li>
                    <li class="nav-item <?php echo e(request()->routeIs('emailservices') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('emailservices')); ?>">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p>Email Services</p>
                        </a>
                    </li>

                    

                    

                    
                    
                   
                   
                <?php endif; ?>
                
                
                    
                <?php if(Auth('admin')->User()->type == 'Super Admin'): ?>
                    <li
                        class="nav-item <?php echo e(request()->routeIs('addmanager') ? 'active' : ''); ?> <?php echo e(request()->routeIs('madmin') ? 'active' : ''); ?>">
                        <a data-toggle="collapse" href="#adm">
                            <i class="fa fa-user"></i>
                            <p>Administrator(s)</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="adm">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/addmanager')); ?>">
                                        <span class="sub-item">Add Manager</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/dashboard/madmin')); ?>">
                                        <span class="sub-item">Manage Admin(s)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li
                        class="nav-item <?php echo e(request()->routeIs('appsettingshow') ? 'active' : ''); ?> <?php echo e(request()->routeIs('termspolicy') ? 'active' : ''); ?> <?php echo e(request()->routeIs('refsetshow') ? 'active' : ''); ?> <?php echo e(request()->routeIs('paymentview') ? 'active' : ''); ?> <?php echo e(request()->routeIs('frontpage') ? 'active' : ''); ?> <?php echo e(request()->routeIs('allipaddress') ? 'active' : ''); ?> <?php echo e(request()->routeIs('ipaddress') ? 'active' : ''); ?> <?php echo e(request()->routeIs('editpaymethod') ? 'active' : ''); ?> <?php echo e(request()->routeIs('managecryptoasset') ? 'active' : ''); ?>">
                        <a data-toggle="collapse" href="#settings">
                            <i class="fa fa-cog"></i>
                            <p>Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="settings">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?php echo e(route('appsettingshow')); ?>">
                                        <span class="sub-item">App Settings</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo e(route('paymentview')); ?>">
                                        <span class="sub-item">Payment Settings</span>
                                    </a>
                                </li>
                                

                               
                                <!--<li>-->
                                <!--    <a href="<?php echo e(route('termspolicy')); ?>">-->
                                <!--        <span class="sub-item">Terms and Privacy</span>-->
                                <!--    </a>-->
                                <!--</li>-->
                                
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                
                    <li class="nav-item <?php echo e(request()->routeIs('aboutonlinetrade') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/admin/dashboard/about')); ?>">
                            <i class=" fa fa-info-circle" aria-hidden="true"></i>
                            <p>For More script</p>
                        </a>
                    </li>
              
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>