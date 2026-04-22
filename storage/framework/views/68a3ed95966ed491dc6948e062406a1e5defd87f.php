<?php
    if ($settings->redirect_url != null or !empty($settings->redirect_url)) {
        header("Location: $settings->redirect_url", true, 301);
        exit();
    }
?>


<?php $__env->startSection('title', $settings->site_title); ?>


<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>
        <!-- end full-header -->
        <section class="sub-header">
            <h5 class="page-title">SERVICES</h5>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><span class="active">SERVICES</span></li>
            </ul>
        </section>
        <!-- end sub-header -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h4 class="section-title"><span>01</span>TRADE SERVICES</h4>
                    </div>
                    <!-- end col-12 -->
                    <div class="col-md-9">
                        <p class="lead">What makes our service stand out from the crowd, however, is our ability to provide in-depth, expert knowledge of individual geographic trades and markets.</p>
                        <p>Regardless of your ocean freight needs, SHIPPER Logistics of New York can provide customized, high quality Logistical Solutions for all import shipping tasks. Whether it be large or small, valuable or not, or come with a high degree
                            of complexity our worldwide network of experienced offices and agents can make even the most complex transportation scenario simple and trouble free.</p>
                        <p>MTS Logistics is licensed as a Non-Vessel Operating Common Carrier or NVOCC. As such we can offer a comprehensive range of services including:</p>
                        <ul>
                            <li>Customized freight solutions at competitive pricing</li>
                            <li>Timely alerts and notices with track-and-trace monitoring</li>
                            <li>ISF filing and full customs clearance</li>
                            <li>Local trucking and door-to-door delivery</li>
                            <li>Storage and warehouse options</li>
                            <li>Complete purchase order management</li>
                        </ul>
                        <figure class="image"><img src="temp/custom/images/news-image4.jpg" alt="Image"></figure>
                        <p>If you would like to contact us and discuss the import and cargo services we can offer, please feel free to write, call or fax us with any questions or concerns you may have.</p>
                        <p>Supply chain sustainability is a trending topic nowadays because of people’s growing awareness to keeping the Earth. The container shipping industry’s been very unprofitable over the past 3-5 years. Making things worse, earnings
                            have.
                        </p>
                        <div class="row other-features">
                            <div class="col-xs-12">
                                <h4 class="section-title"><span>02</span> OTHER FEATURES</h4>
                            </div>
                            <!-- end col-12 -->
                            <div class="col-xs-12"> <i class="ion-android-plane"></i>
                                <h5>AIR SHIPPING</h5>
                                <p>We can also offer outside storage facilities in London and both outside and inside storage in Cowdenbeath.</p>
                            </div>
                            <!-- end col-12 -->
                            <div class="col-xs-12"> <i class="ion-android-car"></i>
                                <h5>GROUND LOGISTIC</h5>
                                <p>We can also offer outside storage facilities in London and both outside and inside storage in Cowdenbeath.</p>
                            </div>
                            <!-- end col-12 -->
                            <div class="col-xs-12"> <i class="ion-android-boat"></i>
                                <h5>SEA TRANSPORTATION</h5>
                                <p>We can also offer outside storage facilities in London and both outside and inside storage in Cowdenbeath.</p>
                            </div>
                            <!-- end col-12 -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end col-9 -->
                    <div class="col-md-3">
                        <aside class="services-sidebar">
                            <ul role="menu">
                                <li class="current"><a href="services" class="transition">Trade Services</a></li>
                                <li><a href="services" class="transition">Dry Cargo</a></li>
                                <li><a href="services" class="transition">Reefer Cargo</a></li>
                                <li><a href="services" class="transition">Oversized & Breakbulk Cargo</a></li>
                                <li><a href="services" class="transition">Intermodal</a></li>
                                <li><a href="services" class="transition">Warehousing & Storage </a></li>
                                <li><a href="services" class="transition">Cross Trading</a></li>
                                <li><a href="services" class="transition">Cargo Trailers</a></li>
                            </ul>
                            <figure class="side-banner">
                                <a href="#"><img src="temp/custom/images/side-image.jpg" alt="Image"></a>
                            </figure>
                            <!-- end side-banner -->
                            <div class="pdf-catalog"> <i class="icon-document"></i> <a href="#">DOWNLOAD PDF</a> </div>
                            <!-- end pdf-catalog -->
                        </aside>
                        <!-- end services-sidebar -->
                    </div>
                    <!-- end col-3 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end services-->
       <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215313542/domains/remedycodes.info/public_html/tracking1/resources/views/home/services.blade.php ENDPATH**/ ?>