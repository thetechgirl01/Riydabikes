

<?php $__env->startSection('title', 'Contact us'); ?>

<?php $__env->startSection('styles'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>

    
  <!-- end full-header -->
  <section class="sub-header">
    <h5 class="page-title">CONTACT</h5>
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><span class="active">Contact</span></li>
    </ul>
  </section>
  <!-- end sub-header -->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h4 class="section-title"><span>01</span>ADDRESS INFOS</h4>
        </div>
        <!-- end col-12 -->
        <div class="col-md-4 col-sm-4">
          <address>
          <h5>HEADQUARTER</h5>
          <p><?php echo e($settings->locations); ?></p>
          <p><?php echo e($settings->whatsapp); ?><br>
            </p>
         
          </address>
        </div>
        <!-- end col-4 
        <div class="col-md-4 col-sm-4">
          <address>
          <h5>GERMANY</h5>
          <p>3481 Melrose Place Beverly Hills, <br>
            Chicago IL 60601, USA</p>
          <p>t: +44(0)3759 4366 82<br>
            f: +44(0)7462 1749 15</p>
          <p>e: <a href="#">info@shipper.com</a></p>
          </address>
        </div> -->
        <!-- end col-4 
        <div class="col-md-4 col-sm-4">
          <address>
          <h5>BELGIUM</h5>
          <p>3481 Melrose Place Beverly Hills, <br>
            Chicago IL 60601, USA</p>
          <p>t: +44(0)3759 4366 82<br>
            f: +44(0)7462 1749 15</p>
          <p>e: <a href="#">info@shipper.com</a></p>
          </address>
        </div>
        <!-- end col-4 --> 
        <div class="col-xs-12">

        	<div class="column">
                <!-- end left-side -->
                <div class="">
                                    <div class="support-form text-center">
                    <form method="POST"  action="<?php echo e(route('enquiry')); ?>" class="contact-page-form">
                      <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Your Phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="country" class="form-control" placeholder="Your Country" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" cols="4" rows="4" placeholder="Message" required></textarea>
                                </div>
                                <div class="btn-wrapper desktop-center">
                                    <button type="submit" name="contact_request" class="boxed-btn reverse-color btn"><span>Send Message</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
                <!-- end right-side -->
            </div>
            <!-- end column -->

        </div>
        <!-- end col-12 -->
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
  <!-- end contact -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shipping\resources\views/home/contact.blade.php ENDPATH**/ ?>