


<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>



        <!-- end full-header -->
        <section class="sub-header">
            <h5 class="page-title">TRACK ORDER</h5>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><span class="active">Track Order</span></li>
            </ul>
        </section>
        <!-- end sub-header -->
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h4 class="section-title">TRACK ORDER</h4>
                    </div>
                    <!-- end col-12 -->
                    <div class="col-md-12 col-sm-12">

                        <div class="tracking-area">
                            <div class="container">
                                <!-- <div class="row justify-content-center"> -->
                                    <!-- <div class="col-xl-12 col-lg-12"> -->
                                        <div class="tracking-id-info text-center">
                                            <?php if(Session::has('error')): ?>
        <span class='text-danger text-center'><strong>Error!!!</strong>You have entered an incorrect Tracking Number.</span>
          <?php endif; ?>
                                            <p>Enter Your Cargo Tracking, Door to Door Office <a href="javascript:(void)">Order Number.</a></p>
                                            <form method="POST" action="<?php echo e(route('trackingresult')); ?>" class="tracking-id-form">
                                                <?php echo csrf_field(); ?>
                                                <center>
                                                    <input type="text" style="width:50%" class="form-control"  name="trackingnumber" placeholder="Enter Tracking your Number" required>
                                                    <button style="margin-top:20px;" class="btn btn-primary" type='submit'>Track Order</button>
                                                </center>
                                            </form>

                                            <hr/>

                                            <div style="margin-top:50px;"></div>

                                                                                                    </div>
                                                    </center>
                                                </div>
                                            </div>

                                        </div>
                                    <!-- </div> -->
                                <!-- </div> -->
                            </div>
                        </div>

                    </div>
                    <!-- end col-4 -->

                    <!-- end col-12 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end contact -->

        


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215313542/domains/remedycodes.info/public_html/tracking1/resources/views/home/track-order.blade.php ENDPATH**/ ?>