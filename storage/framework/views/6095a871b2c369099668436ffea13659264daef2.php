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
    <h5 class="page-title">TERMS AND CONDITIONS</h5>
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><span class="active">Terms and Conditions</span></li>
    </ul>
  </section>
  <!-- end sub-header -->
  <section class="about-us">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h4 class="section-title">Terms and Conditions</h4>
        </div>
        <!-- end col-12 -->
        <div class="col-md-12 col-sm-12">
            <div class="content-area padding-top-120 padding-bottom-90">

                Welcome to <a href="<?php echo e($settings->site_address); ?>"><?php echo e($settings->sit_name); ?></a>. This website is owned and operated by Transport Services Limited and <?php echo e($settings->site_name); ?>.

                Information therein is for historical purposes only and that while information contained within the releases was believed to be accurate at the time of issue, the Company will not, and specifically disclaims any duty to, update this information.
                
                Visitors to this website are bound by the following terms and conditions so please read these carefully before going on. For the purposes of these terms and conditions, “this website” means the following parts of the <a href="<?php echo e($settings->site_url); ?>"><?php echo e($settings->site_name); ?></a>.
                <ul>
                    <li>This website contains material including text, photographs and other images and sound, which is protected by copyright and/or other intellectual property rights. All copyright and other intellectual property rights in this material are either owned by <?php echo e($settings->site_name); ?> or have been licensed to it by the owner(s) of those rights so that it can use this material as part of this website.</li>
                    <li>This website also contains trade marks, including the mark <?php echo e($settings->site_name); ?>” and the <?php echo e($settings->site_name); ?> logo. All trade marks included on this website belong to <?php echo e($settings->site_name); ?> or have been licensed to it by the owner(s) of those trade marks for use on this website.</li>
                </ul>
                <strong>You may</strong>
                <ul>
                    <li>access any part of the website;</li>
                    <li>print off one copy of any or all of the pages for your own personal reference.</li>
                </ul>
                <strong>You may not</strong>
                <ul>
                    <li>copy (whether by printing off onto paper, storing on disk, downloading or in any other way), distribute (including distributing copies), broadcast, alter or tamper with in any way or otherwise use any material contained in the website except as set out under “You may”. These restrictions apply in relation to all or part of the material on the website;</li>
                    <li>remove any copyright, trade mark or other intellectual property notices contained in the original material from any material copied or printed off from the website; without our express written consent.</li>
                </ul>
                If you wish to provide a hypertext or other link to this website, please email the <u><a href="mailto:<?php echo e($settings->contact_email); ?>">Webmaster</a></u> and we will consider your request. It is our decision as to whether we agree to your request and we do not have to do so.
                <ul>
                    <li><?php echo e($settings->site_name); ?> may change the terms and conditions and disclaimer set out above from time to time. By browsing this website you are accepting that you are bound by the current terms and conditions and disclaimer and so you should check these each time you revisit the site.</li>
                </ul>
                <strong>Changes to Terms and Conditions</strong>
                <ul>
                    <li><?php echo e($settings->site_name); ?> may change the terms and conditions and disclaimer set out above from time to time. By browsing this website you are accepting that you are bound by the current terms and conditions and disclaimer and so you should check these each time you revisit the site.</li>
                </ul>
                <strong>Changes to/Operation of website</strong>
                <ul>
                    <li><?php echo e($settings->site_name); ?> may change the format and content of this website at any time.</li>
                    <li><?php echo e($settings->site_name); ?> may suspend the operation of this website for support or maintenance work, in order to update the content or for any other reason.</li>
                    <li><?php echo e($settings->site_name); ?> reserves the right to terminate access to this website at any time and without notice.</li>
                </ul>
                <strong>Complaints Procedure</strong>

                If you have a question or complaint about this website, please <u><a href="mailto:<?php echo e($settings->contact_email); ?>">contact the <?php echo e($settings->site_name); ?> webmaster</a></u>.
                
                <strong>Jurisdiction</strong>
                <ul>
                    <li>These terms and conditions are governed by and to be interpreted in accordance with US law and in the event of any dispute arising in relation to these terms and conditions or any dispute arising in relation to the website whether in contract or tort or otherwise the US courts will have non-exclusive jurisdiction over such.</li>
                </ul>



            </div>
        </div>

      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
  <!-- end about-us -->

  <!-- end members -->

  <!-- end application -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215313542/domains/remedycodes.info/public_html/tracking1/resources/views/home/terms.blade.php ENDPATH**/ ?>