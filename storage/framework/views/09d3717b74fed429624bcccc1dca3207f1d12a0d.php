<?php $__env->startSection('title', 'Contact us'); ?>

<?php $__env->startSection('styles'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>




<section class="page-title wrapper clearfix" style="background-image: url(temp/custom/images/about-page-bg.jpg);">
<div class="container">
<div class="row">
<div class="title-wrap wow fadeIn" data-wow-delay="1s">
<h1>Contact</h1>
<div class="breadcrumbs">
<p>You Are Here :
<span><a href="/">Home</a></span>
<span class="arrow"><i class="icon icon-arrow-right"></i></span>
<span>Contact</span></p>
</div>
</div>
</div>
</div>
</section>


<section id="content" class="clearfix">

<div class="contact-page wrapper">
<div class="container">
<div class="row">
<div class="col-md-12">
<style>
                                        #jvectormap svg {
                                            height: 320px;
                                        }
                                    </style>
<div class="col-md-12 text-center">
<h4 class="single_title">OUR GLOBAL NETWORK</h4>

</div>
</div>
</div>
</div>
</div>
<div class="contact-page wrapper bg-color">
<div class="container">
<div class="row">
<div class="contact-wrap row">
<div class="contact-details col-md-4" style="font-size: 15px;">
<div class="address wow fadeInLeft" data-wow-delay="0.3s">
<h4 class="title">reach us</h4>
<p class="pb-4"><strong><i class="fa fa-phone"></i></a></li></strong> : TOLL FREE </p>
<p class="pb-4"><strong><i class="fa fa-envelope"></i></a></li></strong> <?php echo e($settings->contact_email); ?></p>
<!-- <p class="pb-4"><i class="fa fa-envelope"></i></a></li> : logistics@shypdirect.com</p> -->
<!-- <p class="pb-4"><i class="fa fa-envelope"></i></a></li> : delivery@shypdirect.com</p> -->
<p class="pb-4"><strong><i class="fa fa-map-marker"></i></a></li></strong> : <?php echo e($settings->locations); ?></p>
</div>
<!--
<div class="address wow fadeInLeft" data-wow-delay="0.3s">
<h4 class="title">UK Address</h4>
<p class="pb-4"><strong><i class="fa fa-phone"></i></a></li></strong> : +44 7451273439</p>
<p class="pb-4"><i class="fa fa-envelope"></i></a></li> : customercare@shypdirect.com</p>
<p class="pb-4"><strong><i class="fa fa-map-marker"></i></a></li></strong> : 141 Tempo Road, Enniskillen, BT74 4RH, Northern Ireland, United Kingdom</p>
</div>-->
</div>
<div class="contact-form col-md-8">
<form method="post" action="<?php echo e(route('enquiry')); ?>" class="row">
     <?php echo csrf_field(); ?>

<p class="name col-md-6">
<label for="name">Name</label>
<input id="fname" name="name"  type="text" value="" placeholder="Name" required="required">
</p>
<p class="email col-md-6">
<label for="email">Email</label>
<input id="email" name="email" type="text" value="" placeholder="Email" required="required">
</p>
<p class="telephone col-md-6">
<label for="phone">Phone Number</label>
<input id="phone"  name="phone" type="text" value="" placeholder="Phone Number" required="required">
</p>
<p class="subject col-md-6">
<label for="subject">Subject</label>
<input id="subject" name="subject" type="text" value="" placeholder="Subject" required="required">
</p>
<p class="message col-md-12">
<label for="message">Message</label>
<textarea id="message" name="message" cols="45" rows="7" placeholder="Write your message here" required="required"></textarea>
</p>
<p class="col-md-12">
<!-- <input type="hidden" name="action" value="SEND" /> -->
<button name="submit" type="submit" id="submit" class="btn btn-primary button-normal">Send Message</button>
</p>
</form>
</div>
</div>
</div>
</div>
</div>


</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vectoranalysis/demo5.vectoranalysis.sbs/resources/views/home/contact.blade.php ENDPATH**/ ?>