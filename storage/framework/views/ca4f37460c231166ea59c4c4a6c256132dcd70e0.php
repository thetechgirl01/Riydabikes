


<?php $__env->startSection('title', 'Home'); ?>

<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>
      

  






    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(temp/front/assets/img/banner/1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>About Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        
                        <li class="active">About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Our About
    ============================================= -->
    <div class="about-area inc-video default-padding">
        <div class="container">
            <div class="row">
                <!-- Start About -->
                <div class="about-content">
                    <div class="col-md-6 video-info">
                        <div class="thumb">
                            <img src="temp/front/assets/img/about/4.jpg" alt="Thumb">
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 info">
                        <h4>About Us</h4>
                        <h2>We have <span>10+ Years</span> of experiance in standard professional services</h2>
                        <p>
We do so by providing an intuitive trading platform designed with the latest technological 
advancements that’s geared towards new traders as well as professionals. We place great emphasis 
on education, providing a well-rounded library of V.O.D. seminars, webinars, good signals, analysis and more. 
Our customer service and support is always available to meet your needs, and our account managers
 know that your success is our success.                       
					   </p>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info">
                                    <span>Opening Hours</span> Mon - Fri 9:00 - 21:00
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info">
                                    <span>Helpline</span> <?php echo e($settings->whatsapp); ?>

                                </div>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Read more</a>
                    </div>
                </div>
                <!-- End About -->
            </div>
        </div>
    </div>
    <!-- End Our About -->

    <!-- Start Skill
    ============================================= -->
    <div class="skill-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 info">
                    <h2>How do we help you become a star trader?</h2>
                    <p>
                   Most trading platforms have a high-risk area where you can either double or even 
				   triple your capital and then lose it in few minutes. <?php echo e($settings->site_name); ?> have several
				   advantages that make it possible to get more profit with little or no risk.
				   <br>
                  Opportunities arise daily and are numerous, and we provide you with the means to connect from one to the other
				   </p>
				   <p>Whether you’re new to the markets or a professional, dedicated customer support is an integral part of a successful trading experience; if you have questions, comments or concerns, our local staff is on-hand to answer all your needs.</p><br />
 <a href="contact">Contact us</a> by <a href="mailto:<?php echo e($settings->contact_email); ?>">Email</a>! 
<p><br />
<?php echo e($settings->site_name); ?> is always interested in meeting talented applicants. If you’re interested in joining our team, <a href="mailto:<?php echo e($settings->contact_email); ?>">email</a> us!</p>
                </div>
               
                <div class="col-md-6 info">
                    <h2>Our Commitment</h2>
                     
                    <div class="skill-items">
                        <!-- Progress Bar Start -->
                        <div class="progress-box">
                            <h5>Connecting Opportunities <span class="pull-right">99%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="99"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Maintaining Control <span class="pull-right">92%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="92"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Personal, Professional Support <span class="pull-right">94%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="94"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Freedom of Choice<span class="pull-right">98%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="98"></div>
                            </div>
                        </div>
                        <!-- End Progressbar -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Skill -->

   

   



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/home/about.blade.php ENDPATH**/ ?>