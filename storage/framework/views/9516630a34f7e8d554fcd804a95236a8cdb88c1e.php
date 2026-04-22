<?php $__env->startSection('title', 'Pricing'); ?>



<?php $__env->startSection('content'); ?>





    <!-- End Header -->
    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(temp/front/assets/img/banner/10.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Our Price Package</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        
                        <li class="active">Pricing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

  

    <!-- Start Pricing Area
    ============================================= -->
    <div id="pricing" class="pricing-area bg-gray default-padding bottom-less">
        <div class="container">
            
            <div class="row">
                <div class="pricing pricing-simple text-center">
                   
                    
                   <div class="row">
                <div class="pricing pricing-simple text-center">
                   
                    
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="pricing-item active">
                            <ul>
                                <li class="icon">
                                    <i class="flaticon-quality-badge"></i>
                                </li>
                                <li class="title">
                                    <h4><?php echo e($plan->name); ?></h4>
                                </li>
                                <li class="pricing-header">
                                     <h4><?php echo e($plan->min_price); ?><?php echo e($settings->currency); ?> - <?php echo e($plan->max_price); ?><?php echo e($settings->currency); ?></h4>
                                </li>
                                 <li>Commission <i class="fas fa-times-circle" style="font-size: 14px"></i></li>
                                <li>Full access to all instrument types: High/low, Boundary, One Touch, Short Term<i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                 <li>Access to all trading assets: Currencies, Shares, Commodites, Indexes <i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                <li>24/7 live Support<i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                <li>Full access to the <?php echo e($settings->site_name); ?> education centre<i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                <li>24/7 live Support<i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                <!--<li><strong>Profit: <small>$/£/€ 9,800 - 27,986</small></strong></li>-->
                                <li class="footer">
                                  <a class="btn btn-dark border btn-sm"  href="login">Get Started</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>
        </div>
    </div>
    
    </dv>
    <!-- End Pricing Area -->
    <!-- End Pricing Area -->
 
  

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/home/pricing.blade.php ENDPATH**/ ?>