<?php $__env->startSection('title', 'Terms'); ?>



<?php $__env->startSection('content'); ?>



    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(temp/front/assets/img/banner/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Our Services</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        
                        <li class="active">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Services 
    ============================================= -->
    <div class="services-area bg-gray default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="services-items item-cell">
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-report"></i>
                                <span>01</span>
                            </div>
                            <div class="info">
                                <h4>Easy Forex Trading</h4>
                                <p>
                                    Easy access for Beginners  & experienced traders. Forex traders are aware of their profits in advance — their main
		objective is to select the correct direction of the market movement.
                                </p>
                                 
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-plan"></i>
                                <span>02</span>
                            </div>
                            <div class="info">
                                <h4>Investment Planning</h4>
                                <p>
                                   Realtime Analyisis & Proper planning, Watch asset's value in real time monitoring platform and decide when to trade in.
                                </p>
                              
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-money"></i>
                                <span>03</span>
                            </div>
                            <div class="info">
                                <h4>Good Signals</h4>
                                <p>
                                    We provide Cumulative and consistent High returns with our best trade signals.
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="icon">
                               <i class="fas fa-phone"></i>
                                <span>04</span>
                            </div>
                            <div class="info">
                                <h4> 24/7 Support  </h4>
                                <p>
                                    Guest tiled he quick by so these trees am. It announcing alteration at surrounded 
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-graph"></i>
                                <span>05</span>
                            </div>
                            <div class="info">
                                <h4>Capital Markets</h4>
                                <p>
                                    We understand the importance always approaching each work point integrally and believe.
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="icon">
                               <i class="flaticon-piggy-bank"></i> 
                                <span>06</span>
                            </div>
                            <div class="info">
                                <h4>Bitcoin Mining/Transaction</h4>
                                <p>
                                    A transaction is a transfer of value between Bitcoin wallets that gets included in the block chain. Bitcoin wallets keep a secret piece of data called a private key or seed, which is used to sign transactions, providing a mathematical proof that they have come from the owner of the wallet.
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->
 
   

    <!-- Start Pricing Area
    ============================================= -->
    <div id="pricing" class="pricing-area   default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Our Pricing</h2>
                        
                    </div>
                </div>
            </div>
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
    <!-- End Pricing Area -->
    <!-- End Pricing Area -->

<?php $__env->stopSection(); ?>
   
  
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/home/service.blade.php ENDPATH**/ ?>