<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Tracking Result</title>

    <!-- Favicon -->
    <link href="<?php echo e(asset('storage/app/public/'.$settings->favicon)); ?>" rel="shortcut icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Libre Barcode 128 Text" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="temp/custom/re/result_files/owl.carousel.css">
    <link rel="stylesheet" href="temp/custom/re/result_files/owl.theme.css">
    <link rel="stylesheet" href="temp/custom/re/result_files/cm-overlay.css">
    <link rel="stylesheet" href="temp/custom/re/result_files/magnific-popup.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="temp/custom/re/result_files/style.css">
    <link rel="stylesheet" href="temp/custom/re/result_files/style2.css">

    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="temp/custom/re/result_files/jquery-1.11.1.min.js"></script>
    <script src="temp/custom/re/result_files/bootstrap.js"></script>
    <script src="temp/custom/re/result_files/html5shiv.min.js"></script>
    <script src="temp/custom/re/result_files/respond.min.js"></script>

    <!-- Google Translate -->
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


 <style>@import  url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

body {
    background-color: #eeeeee;
    font-family: 'Open Sans', serif
}

body2 {
    font-family: 'Libre Barcode 128 Text';font-size: 22px;
}

.container {
    margin-top: 50px;
    margin-bottom: 50px
}

.col {

    margin-bottom: 20px
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative

}

.track .step.active:before {
    background: #0069a3
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #0069a3;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
    font-size: 30px;
}

.track .text {
    display: block;
    margin-top: 7px

}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 270px;

    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #0069a3;
    border-color: #0069a3;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}
</style>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
function nokApply(){
	window.location='next-of-kin.php';
}
</script>
</head>



<body style="position: relative; min-height: 100%; top: 0px;">

	<!-- banner -->
	<div class="banner " id="home">
		<!-- menu -->

<script type="text/javascript">
                    $(document).ready(function(){
                      setTimeout(function(){
                        $("#tracking-loading").fadeOut();
                        $("#tracking-result").fadeIn();
                      },1000); });
                </script>






 <div class="container"><div class="card">
  <div id="tracking-loading" style="text-align: center; padding: 30px 2px; display: none;">
<img src="temp/custom/re/img/ajax-loader.gif" alt="Loading results...">
<h4 style="">
Fetching Result for Tracking Number: <?php echo e($courier->trackingnumber); ?>...
</h4>
</div></div>

 <article id="tracking-result" style="" class="card">
        <header class="card-header">
         <div class="card-body row">
                    <div class="col"> My Orders / Tracking <br> <a align="right" href="/">Back to Home</a>  </div>
                    <div class="col">   </div>

                    <div class="col">  </div>

                    <div class="col">    <body2><h1><?php echo e($courier->trackingnumber); ?></h1>  </body2>   </div>
                </div>



         </header>
        <div class="card-body">
            <h6>Order ID: <?php echo e($courier->trackingnumber); ?> </h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Sender Information:</strong>
                    <br> 	<span class="text-muted"> Name:</span> <?php echo e($courier->sname); ?> <br>
					<span class="text-muted">	 Address:</span>  <?php echo e($courier->saddress); ?> </div>
                    <div class="col"> <strong>Receiver Information:</strong> <br> <i class="fa fa-user"></i> <?php echo e($courier->name); ?> <br> <i class="fa fa-phone"></i> <?php echo e($courier->phone); ?>  </div>

                    <div class="col"> <strong>Destination Address:</strong> <br> <i class="fa fa-map-marker"></i> <?php echo e($courier->address); ?> <br><i class="fa fa-envelope"></i> <?php echo e($courier->email); ?></div>

                    <div class="col"> <strong>Status</strong> <img alt="" src="temp/custom/re/result_files/icon.gif" height="15" width="15"><br> <?php echo e($courier->status); ?> </div>
                </div>

               </article>


              <div class="track">
                        <div class="step active">
                            <span class="icon"><i class="fa fa-check"></i></span>
                            <span class="text">Order confirmed</span>
                        </div>

                        <?php
    // Check if any track has a specific status
    $hasPickedByCourier = $tracks->contains('status', 'Picked by Courier');
    $hasOnTheWay = $tracks->contains('status', 'On The Way');
    $hasCustomHold = $tracks->contains('status', 'Custom Hold');
    $hasDelivered = $tracks->contains('status', 'Delivered');
?>

<div class="step <?php echo e($hasPickedByCourier ? 'active' : ''); ?>">
    <span class="icon"><i class="fa fa-user"></i></span>
    <span class="text">Picked by Courier</span>
</div>

<div class="step <?php echo e($hasOnTheWay ? 'active' : ''); ?>">
    <span class="icon"><i class="fa fa-truck"></i></span>
    <span class="text">On The Way</span>
</div>

<div class="step <?php echo e($hasCustomHold ? 'active' : ''); ?>">
    <span class="icon"><i class="fa fa-exclamation-triangle"></i></span>
    <span class="text">Custom Hold</span>
</div>

<div class="step <?php echo e($hasDelivered ? 'active' : ''); ?>">
    <span class="icon"><i class="fa fa-cubes"></i></span>
    <span class="text">Delivered</span>
</div>
                    </div>


            <br><br>
            <hr>
          <ul class="row list-unstyled">
    <li class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <figure class="itemside d-flex">
                    <?php if($courier->photo != Null): ?>
                    <div class="aside me-3">
                        <img src="<?php echo e(asset('storage/app/public/photos/' . $courier->photo)); ?>"
                             class="img-thumbnail img-fluid"
                             style="max-width: 250px; height: 250px;"
                             alt="Parcel photo">
                    </div>
                    <?php endif; ?>
                    <figcaption class="info flex-grow-1">
                        <h5 class="card-title border-bottom pb-2 mb-3 text-primary">Parcel Information</h5>
                        <dl class="row mb-0">
                            <dt class="col-sm-4 text-muted">Duty Fees:</dt>
                            <dd class="col-sm-8 text-success fw-bold">Paid</dd>

                            <dt class="col-sm-4 text-muted">Weight:</dt>
                            <dd class="col-sm-8"><?php echo e($courier->weight); ?> kg</dd>

                            <dt class="col-sm-4 text-muted">Pickup Date/Time:</dt>
                            <dd class="col-sm-8"><?php echo e(\Carbon\Carbon::parse($courier->date_shipped)->toDayDateTimeString()); ?></dd>

                            <dt class="col-sm-4 text-muted">Date of Departure:</dt>
                            <dd class="col-sm-8"><?php echo e(\Carbon\Carbon::parse($courier->expected_delivery)->toDayDateTimeString()); ?></dd>

                            <dt class="col-sm-4 text-muted">Delivery Mode:</dt>
                            <dd class="col-sm-8"><?php echo e($courier->freight_type); ?></dd>
                        </dl>
                    </figcaption>
                </figure>
            </div>
        </div>
    </li>

    <li class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title text-primary mb-3">Shipment History</h5>
                <hr class="mt-0">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="text-primary">DATE</th>
                                <th class="text-primary">DELIVERY STATUS</th>
                                <th class="text-primary">COUNTRY</th>
                                <th class="text-primary">COMMENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(\Carbon\Carbon::parse($track->created_at)->toDayDateTimeString()); ?></td>
                                <td>
                                    <span class="badge bg-info text-dark"><?php echo e($track->status); ?></span>
                                </td>
                                <td><?php echo e($track->country); ?></td>
                                <td><?php echo e($track->comment); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">
                                    No shipment history available
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </li>
</ul>
            <hr> <a onclick="" href="<?php echo e(route('printnow', $courier->id)); ?>" class="btn btn-warning"> <i class="fa fa-print"></i> Print Tracking</a>





        </div>


       <div style="width: 100%; max-width: 1100px; margin: 0 auto;">
  <div style="position: relative; padding-bottom: 36%; height: 0; overflow: hidden;">
    <iframe
      style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
      frameborder="0"
      scrolling="no"
      marginheight="0"
      marginwidth="0"
      id="gmap_canvas"
      src="https://maps.google.com/maps?width=1126&amp;height=397&amp;hl=en&amp;q=<?php echo e($courier->location); ?>+(Tracking%20map)&amp;t=p&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
      allowfullscreen>
    </iframe>
  </div>
  <div style="text-align: right; font-size: 12px;">
    <a href='https://maps-generator.com/'>Maps Generator</a>
  </div>
</div>
    </article>












<script>
function googleTranslateElementInit() {
new google.translate.TranslateElement({
pageLanguage: 'da',
includedLanguages: 'da,pt,ar,pl,fr,es,it,en,ko,zh-CN',
layout: google.translate.TranslateElement.InlineLayout.SIMPLE
}, 'google_translate_element');
}
</script><script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<div id="google_translate_element"></div>

<style type="text/css">
        /* OVERRIDE GOOGLE TRANSLATE WIDGET CSS BEGIN */
       .goog-te-menu-value {
                                    padding: 3px !important;
                                }

                                .goog-te-gadget-simple {
                                    background-color: #fff;
                                    border-left: 1px solid #d5d5d5;
                                    border-top: 1px solid #9b9b9b;
                                    border-bottom: 1px solid #e8e8e8;
                                    border-right: 1px solid #d5d5d5;
                                    font-size: 10pt;
                                    display: inline-block;
                                    padding-top: 1px;
                                    padding-bottom: 2px;
                                    border-radius: 10px;
                                    cursor: pointer;
                                    zoom: 1;
                                }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value:hover {
            text-decoration: none;
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span {
            color: blue;
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:hover {
            color: blue;
        }




        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="border-left-color: rgb(187, 187, 187); border-left-width: 1px; border-left-style: solid;"] {
            display: none;
        }
        /* HIDE the google translate toolbar */
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
        body {
            top: 0px !important;
        }
        .skiptranslate iframe  {
visibility: hidden !important;
    }
body{
    top:0!important;

}
        /* OVERRIDE GOOGLE TRANSLATE WIDGET CSS END */
    </style>
    <!-- Google Translate Element end -->
	</div>
	<!-- //banner -->

	<!-- copyright -->


</div>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\shypdirect\resources\views/home/track-result.blade.php ENDPATH**/ ?>