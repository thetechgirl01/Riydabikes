<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="<?php echo e($settings->site_name); ?> is a global logistics service provider." />
    <meta name="keywords" content="logistics, shipping, freight, courier, transport" />
    <meta name="author" content="<?php echo e($settings->site_name); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="google-site-verification" content="" />

    <link href="https://fonts.googleapis.com/css?family=Lato:400,900,700,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="temp/custom/css/plugin.css" type="text/css" />
    <link rel="stylesheet" href="temp/custom/css/style.css" type="text/css" />
    <link rel="stylesheet" href="temp/custom/css/responsive.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="<?php echo e(asset('storage/app/public/'.$settings->favicon)); ?>" rel="shortcut icon">
    <title>Welcome to <?php echo e($settings->site_name); ?></title>

    <script type="text/javascript" src="temp/custom/js/jquery.js"></script>
    <style>
        .goog-te-gadget-simple {
            padding: 12px 5px;
        }

        #google_translate_element img,
        #google_translate_element2 img {
            display: inline-block !important;
        }

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
        .skiptranslate iframe {
            visibility: hidden !important;
        }
        body{
            top:0!important;
        }
        /* OVERRIDE GOOGLE TRANSLATE WIDGET CSS END */

        /* WhatsApp float button */
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .my-float{
            margin-top:16px;
        }

        /* Video slider styles */
        #myVideo {
            position: relative;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            max-height1: 677px;
        }

        .slide-item {
            max-height: 677px;
        }

        /* Footer menu styles */
        .menu-footer-menu {
            list-style-type: disc;
            color: white;
        }

        .menu-footer-menu a {
            color: white;
        }

        .menu-footer-menu a:hover {
            color: #333;
        }
    </style>
</head>

<body>
    <div id="main-wrapper" class="clearfix">
        <header id="header" class="header-style-2 clearfix">
            <div class="site-header">
                <div class="top-header clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="top-header-wrap row">
                                <div class="logo col-md-4">
                                    <a href="/">
                                        <img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>" width="150px" alt="" />
                                    </a>
                                </div>
                                <script>
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'da',
                                        includedLanguages: 'da,pt,ar,pl,fr,es,it,en,ko,zh-CN',
                                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                                    }, 'google_translate_element');
                                }
                                </script>
                                <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                <div id="google_translate_element"></div>
 <?php if(Session::has('error')): ?>
                                        <span class='text-danger text-center'><strong>Error!!</strong>You have entered an incorrect Tracking Number.</span>
                                        <?php endif; ?>
                                <div class="info col-md-8">
                                    <ul>
                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            <p>
                                                <span class="heading">Opening Hours</span>
                                                <span>09.00 - 17.00</span>
                                            </p>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <p>
                                                <span class="heading">Call Us</span>
                                                <span>TOLL FREE</span>
                                            </p>
                                        </li>
                                        <li class="last">
                                            <i class="fa fa-envelope"></i>
                                            <p>
                                                <span class="heading">Email Us</span>
                                                <span><a href="mailto:<?php echo e($settings->contact_email); ?>"><?php echo e($settings->contact_email); ?></a></span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="slide-buttons">
                                    <button id="slide-buttons" class="slide-button icon icon-navicon"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="main-menu">
                                <ul class="menu">
                                    <li class="active current home">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="">
                                        <a href="about">About</a>
                                    </li>
                                    <li class="has-sub">
                                        <a href="services">Services</a>
                                        <ul>
                                            <li><a href="services">Sea/Ocean Freight</a></li>
                                            <li><a href="services">Road Transportation</a></li>
                                            <li><a href="services">Air Freight</a></li>
                                            <li><a href="services">Warehousing</a></li>
                                            <li><a href="services">Packaging & Storage</a></li>
                                            <li class="last"><a href="diplomatic">Diplomatic Bag and Secure Logistics</a></li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="track-order">Track Shipment</a>
                                    </li>
                                    <li class="">
                                        <a href="contact">Contact Us</a>
                                    </li>
                                </ul>
                                <div class="right-section">
                                    <div class="search">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <div class="quote-link"></div>
                                    <div class="search-input">

                                        <form method="POST" action="<?php echo e(route('trackingresult')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="text" name="trackingnumber" placeholder="Search..." class="untouched">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
                <button class="c-menu__close icon icon-close"></button>
                <div class="search-input"></div>
                <ul class="slide-menu-items">
                    <li class="active current home">
                        <a href="/">Home</a>
                    </li>
                    <li class="">
                        <a href="about">About</a>
                    </li>
                    <li class="has-sub">
                        <a href="services">Services</a>
                        <ul>
                            <li><a href="services">Sea/Ocean Freight</a></li>
                            <li><a href="services">Road Transportation</a></li>
                            <li><a href="services">Air Freight</a></li>
                            <li><a href="services">Warehousing</a></li>
                            <li><a href="services">Packaging & Storage</a></li>
                            <li class="last"><a href="diplomatic">Diplomatic Bag and Secure Logistics</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="track-order">Track Shipment</a>
                    </li>
                </ul>
            </nav>
            <div id="slide-overlay" class="slide-overlay"></div>
        </header>



        <?php echo $__env->yieldContent('content'); ?>

        <footer id="footer" class="wrapper clearfix">
            <div class="container">
                <div class="row">
                    <div class="footer-wrap row">
                        <div class="widget-footer col-md-4">
                            <div class="short-desc">
                                <div class="logo-footer">
                                    <img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>" alt="" style="width: 230px;" />
                                </div>
                                <h2 style="color: white;"><?php echo e($settings->site_name); ?>- Providing Smart Logistics Solution Across The World.</h2>
                            </div>
                        </div>

                        <div class="widget-footer col-md-4">
                            <div class="recent-post">
                                <h4 class="title">Information</h4>
                                <div class="footer-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="menu-footer-menu">
                                                <li><a href="/">Home</a></li>
                                                <li><a href="about">About Us</a></li>
                                                <li><a href="services">Our Services</a></li>
                                                <li><a href="contact">Contact Us</a></li>
                                                <li><a href="track-order">Track & Trace</a></li>
                                                
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="menu-footer-menu">
                                                <li><a href="services">Sea/Ocean Freight</a></li>
                                                <li><a href="services">Road Transportation</a></li>
                                                <li><a href="services">Air Freight</a></li>
                                                <li><a href="services">Warehousing</a></li>
                                                <li><a href="services">Packaging & Storage</a></li>
                                                <li><a href="diplomatic">Diplomatic Bag and Secure Logistics</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget-footer col-md-4">
                            <div class="contact-footer">
                                <h4 class="title">Contact Us</h4>
                                <div class="footer-content">
                                    <div class="contact-section" style="font-size: 15px;">
                                        <h4><?php echo e($settings->site_name); ?></h4>
                                        <p class="pb-4"><strong>Phone :</strong> TOLL FREE </p>
                                        <p class="pb-4"><strong>Email : </strong> <?php echo e($settings->contact_email); ?> <a href="mailto:<?php echo e($settings->contact_email); ?>"> </a></p>
                                    </div>
                                </div>
                                <a href="contact" class="button-normal white">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright text-center">
                <div class="container">
                    <div class="social-icon">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                    <p>
                        Copyright &copy; 2023 <?php echo e($settings->site_name); ?>. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>

    
<?php echo $__env->make('layouts.livechat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script data-cfasync="false" src="https://cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="temp/custom/js/plugin.js"></script>
    <script type="text/javascript" src="temp/custom/js/main.js"></script>
    <script type="text/javascript" src="temp/custom/js/formcalculations.js"></script>
</body>
</html>
<?php /**PATH /home/vectoranalysis/demo5.vectoranalysis.sbs/resources/views/layouts/base.blade.php ENDPATH**/ ?>