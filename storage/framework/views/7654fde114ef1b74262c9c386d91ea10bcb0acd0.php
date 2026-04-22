<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>



<section class="page-title wrapper clearfix" style="background-image: url(temp/custom/images/about-page-bg.jpg);">
<div class="container">
<div class="row">
<div class="title-wrap wow fadeIn" data-wow-delay="1s">
<h1>Track & Trace Shipment</h1>
<div class="breadcrumbs">
<p>You Are Here :
<span><a href="/">Home</a></span>
<span class="arrow"><i class="icon icon-arrow-right"></i></span>
<span>Track & Trace Shipment</span></p>
</div>
</div>
</div>
</div>
</section>


<section id="content" class="clearfix">

<div class="single-services wrapper bg-color000">
<div class="container">
<div class="row">
<div class="single-services-wrap row">
<div class="single-content col-md-5">

<h3 class="title">Track & Trace </h3>
<div class="content-text">
<p>Here’s the fastest way to check the status of your shipment.
No need to call Customer Service – our online results give you real-time,
detailed progress as your shipment speeds through the <strong>Shyp Direct</strong> network.
</p>

 <?php if(Session::has('error')): ?>
        <span class='text-danger text-center'><strong>Error!!!</strong>You have entered an incorrect Tracking Number.</span>
          <?php endif; ?>
<form  method="POST" action="<?php echo e(route('trackingresult')); ?>"  class="form-horizontal form-style">
	 <?php echo csrf_field(); ?>
<div class="form-group">
<div class="col-md-7">
<input required style="background: #eee;" type="text" name="trackingnumber"  class="form-control" placeholder="Tracking Number" value="">

<input value="cid"  type="hidden" name="dropdown" >
</div>
<div class="col-md-5">
<button type="submit" name="Submit" class="btn btn-primary">Track Shipment!</button>
</div>
</div>
</form>
</div>
</div>
<div class="sidebar col-md-7">
<img class="full-width0" style="max-width: 400px;" src="temp/custom/images/tracking.jpg" alt="Img">
</div>
</div>
</div>
</div>
</div>

</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/track-order.blade.php ENDPATH**/ ?>