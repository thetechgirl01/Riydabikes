
<!DOCTYPE html>
<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
  <link rel="shortcut icon" href="<?php echo e(asset('storage/app/public/'.$settings->favicon)); ?>" type="image/x-icon">
  <meta name="author" content="">
  <meta name="description" content="Logistic, Delivery and Transportation ">
  <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, courier, caring">
  <link href="temp/custom/css/style1.css" rel="stylesheet">
  <link href="temp/custom/css/main.css" rel="stylesheet">
  <link href="temp/custom/css/custom-style.css" rel="stylesheet">
</head>


<title><?php echo e($settings->site_name); ?> Logistic, Delivery and Transportation</title>
<body>
<div class="soft-transition"></div>
<!-- end soft-transition -->
<div class="transition-overlay"></div>
<!-- end transition-overlay -->
<main>

  <header class="full-header">
    <nav class="navbar navbar-default">
        <div class="top-bar">
        <div class="container">
            <div class="row">
            <div class="col-md-6 col-sm-6 hidden-xs"> </div>
            <!-- end col-6 -->
            <div class="col-md-3 col-sm-2 col-xs-4">
                <div id="google_translate_element"></div>
            </div>
            <!-- end col-3 -->
            <div class="col-md-3 col-sm-4 col-xs-8"> <span class="phone"><i class="ion-ios-telephone"></i>  <?php echo e($settings->whatsapp); ?> </span> </div>
            <!-- end col-3 --> 
            </div>
            <!-- end row --> 
        </div>
        <!-- end container --> 
        </div>
        <!-- end top-bar -->
        <div class="container">
        <div class="navbar-header">
            <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <button type="button" class="navbar-toggle toggle-menu menu-left push-body" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="/"><img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>" alt="Image"></a> </div>
            <!-- end col-5 -->
            <div class="col-md-3 col-sm-4 hidden-xs"> <i class="icon-global"></i>
                <h6>OPENING HOURS<br>
                <span>MON-FRI 07:00 - 18:00 </span></h6>
            </div>
            <!-- end col-2 -->
            <div class="col-md-3 col-sm-4 hidden-xs"> <i class="icon-map-pin"></i>
                <h6>OUR LOCATION<br>
                <span><?php echo e($settings->locations); ?></span></h6>
            </div>
            <!-- end col-2 -->
            <div class="col-md-3 hidden-sm hidden-xs"> <i class="icon-chat"></i>
                <h6>QUICK SUPPORT<br>
                <span><?php echo e($settings->contact_email); ?></span></h6>
            </div>
            <!-- end col-2 --> 
            </div>
            <!-- end row --> 
            
        </div>
        <!-- end navbar-header -->
        <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav main-menu">
            <li><a href="/" class="transition">HOME</a></li>
            <li><a href="track-order" class="transition">TRACK ORDER</a></li>
            <li><a href="request-quote" class="transition">REQUEST QUOTE</a></li>
            <li><a href="about" class="transition">ABOUT US</a></li>
            <li><a href="services" class="transition">SERVICES</a></li>
            <li><a href="contact" class="transition">CONTACT US</a></li>
            </ul>

            <ul class="nav navbar-nav social-nav visible-lg visible-xs">
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="ion-social-facebook"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="ion-social-twitter"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Google+"><i class="ion-social-googleplus"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="ion-social-youtube"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Vimeo"><i class="ion-social-vimeo"></i></a></li>
            </ul>
        </div>
        <!-- end navbar-collapse --> 
        </div>
        <!-- end container --> 
        <div id="google_translate_element"></div>

        <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
        </script>
        
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </nav>
    <?php if(Session::has('error')): ?>

    
      <h3 class='text-danger text-center'><strong>Error!!!</strong>You have entered an incorrect Tracking Number.</h3>
     
    
        <?php endif; ?>
</header>

<?php echo $__env->yieldContent('content'); ?>

<footer class="dark-footer">
    <div class="footer-content">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <h4 class="title"><span>01</span>ABOUT US</h4>
            <p>You can use the icons above to access more information about our credentials, providing solutions in a host of specific industries. However, these are far from the only industries that SHIPPER has proudly served.</p>
            <ul class="social-media">
              <li><a href="#"><i class="ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="ion-social-youtube"></i></a></li>
              <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
            </ul>
          </div>
          <!-- end col-5 -->
          <div class="col-md-2 col-sm-3 col-xs-6">
            <h4 class="title"><span>02</span>SERVICES</h4>
            <ul class="footer-menu">
              <li><a href="services">Aceon Freight</a></li>
              <li><a href="services">Storeage</a></li>
              <li><a href="services">Package Security</a></li>
              <li><a href="services">Air Freight</a></li>
              <li><a href="services">Warehousing</a></li>
            </ul>
          </div>
          <!-- end col-2 -->
          <div class="col-md-2 col-sm-3 col-xs-6">
            <h4 class="title"><span>03</span>QUICK LINKS</h4>
            <ul class="footer-menu">
              <li><a href="about">About Us</a></li>
              <li><a href="contact">Contact Us</a></li>
              <li><a href="services">Services</a></li>
              <li><a href="privacy">Privacy Policy</a></li>
              <li><a href="terms">Terms and Conditions</a></li>
            </ul>
          </div>
          <!-- end col-2 -->
          <!-- end col-2 --> 
        </div>
        <!-- end row -->
        <div class="row middle-bar">
          <div class="col-lg-4 col-md-3 hidden-sm hidden-xs"> <img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>" alt="Image" class="logo">
            <h4>INTERNATIONAL LOGISTIC</h4>
          </div>
          <!-- end col-4 -->
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <h3>MOBILE APP</h3>
            <p>Download our mobile applications from Google Play and Apple Store or decode QR Code just below and start using.</p>
          </div>
          <!-- end col-4 -->
          <div class="col-lg-4 col-sm-6 col-md-5 col-xs-12">
            <ul>
              <li><img src="temp/custom/images/icon-appstore.png" alt="Image"></li>
              <li><img src="temp/custom/images/icon-googleplay.png" alt="Image"></li>
            </ul>
            <i class="icon-mobile responsive-icon"></i> <a rel='nofollow' href='' ><img src='https://chart.googleapis.com/chart?cht=qr&amp;chl=www.themezinho.net&amp;chs=90x90' alt=''></a> </div>
          <!-- end col-4 --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container --> 
    </div>
    <!-- end footer-content -->
    <div class="sub-footer">
      <div class="container"> <span class="copyright">Copyright © <?php echo e($settings->year); ?> , <?php echo e($settings->site_name); ?> | LOGISTICS  </span></div>
      <!-- end container --> 
    </div>
    <!-- end sub-footer --> 
  </footer>

  </main>

  <!--Start of Tawk.to Script-->
<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->


<script type="text/javascript" src="https://translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<!-- JS FILES --> 
<script src="temp/custom/js/jquery.min.js"></script> 
<script src="temp/custom/js/bootstrap.min.js"></script> 
<script src="temp/custom/js/bootstrap-select.js"></script> 
<script src="temp/custom/js/bootstrap-datepicker.js"></script> 
<script src="temp/custom/js/jquery.counterup.min.js"></script> 
<script src="temp/custom/js/jquery.stellar.js"></script> 
<script src="temp/custom/js/jquery.validate.min.js"></script> 
<script src="temp/custom/js/jquery.form.js"></script> 
<script src="temp/custom/js/contact-form.js"></script> 
<script src="temp/custom/js/jquery.fancybox.js"></script> 
<script src="temp/custom/js/waypoints.min.js"></script> 
<script src="temp/custom/js/slick.js"></script> 
<script src="temp/custom/js/masonry.min.js"></script> 
<script src="temp/custom/js/scripts.js"></script>
  <!-- end footer --> 

<?php if($settings->tido): ?>
    <script src="//code.tidio.co/<?php echo e($settings->tido); ?>.js" async></script>
    <?php endif; ?>
    
    
    <!-- GetButton.io widget -->
    <?php if($settings->whatsapp): ?>
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "<?php echo e($settings->whatsapp); ?>", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
  <?php endif; ?>
</body>



</html><?php /**PATH /home/u215313542/domains/remedycodes.info/public_html/tracking1/resources/views/layouts/base.blade.php ENDPATH**/ ?>