<?php $content = app('App\Http\Controllers\FrontController'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 
<meta
    http-equiv="content-type"
    content="text/html;charset=UTF-8"
  />
  <head>
 
    <meta charset="utf-8" />
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?> ">
    <meta name="description" content="<?php echo e($settings->site_name); ?>- Trading on Gold, Oil, Indices; Trading on Stocks, Gold, Oil, Indices with ultra-fast execution &amp; spreads from 0.0 pips. News, articles and training materials for experienced and novice traders." ><meta name=keywords content="forex, CFDs, CFD, Bitcoin trading, crypto trading, online trading, Forex trading, Oil trading, Gold trading, trading indexes, shares trading, commodities trading, trading platform, Cryptocurrencies day trading, trade stocks, trade forex, trade equities, trade commodities, trade shares, trade CFD, currency trading, cTrader, no commissions, low spreads, regulated "  />

    <meta
      name="keywords"
      content="blockit, uikit3, indonez, handlebars, scss, vanilla javascript"
    />
    <meta name="author" content="Indonez" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#f2f3f5" />
    <!-- Site Properties -->
    <link rel="stylesheet" href="temp/custom/alert/css/fake-notification-min.css">
	<link rel="stylesheet" href="temp/custom/alert/css/animate.min.css">
	<link rel="stylesheet" href="temp/custom/alert/css/font-awesome.min.css">


    <title>Online CFD Trading | Trading the Markets | cryptovigilante</title>
    <!-- Critical preload -->
    <link rel="preload" href="temp/custom/js/vendors/uikit.min.js" as="script" />
    <link rel="preload" href="temp/custom/css/vendors/uikit.min.css" as="style" />
    <link rel="preload" href="temp/custom/css/style.css" as="style" />
    <!-- Icon preload -->
    <link
      rel="preload"
      href="temp/custom/fonts/fa-brands-400.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <link
      rel="preload"
      href="temp/custom/fonts/fa-solid-900.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <!-- Font preload -->
    <link
      rel="preload"
      href="temp/custom/fonts/inter-v2-latin-regular.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <link
      rel="preload"
      href="temp/custom/fonts/inter-v2-latin-500.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <link
      rel="preload"
      href="fonts/inter-v2-latin-700.woff2"
      as="font"
      type="temp/custom/font/woff2"
      crossorigin
    />
    <!-- Favicon and apple icon -->
    <link rel="shortcut icon" href="<?php echo e(asset('storage/app/public/' . $settings->favicon)); ?>" type="image/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.html" />
    <!-- CSS -->
    <link rel="stylesheet" href="temp/custom/css/vendors/uikit.min.css" />
    <link rel="stylesheet" href="temp/custom/css/style.css" />
  </head>

  <body>
    <!-- preloader begin -->
    <div class="in-loader">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <!-- preloader end -->
    <header>
      <!-- header content begin -->
      <div class="uk-section uk-padding-remove-vertical">
        <nav
          class="uk-navbar-container"
          data-uk-sticky="show-on-up: true; animation: uk-animation-slide-top;"
        >
          <div class="uk-container" data-uk-navbar>
            <div class="uk-navbar-left">
              <div class="uk-navbar-item">
                <!-- logo begin -->
                <a class="uk-logo" href="/">
                  <img
                    src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>"
                    data-src="img/logo.png"
                    alt="logo"
                    width="260"
                    height="64"
                    data-uk-img
                  />
                </a>
                <!-- logo end -->
                <!-- navigation begin -->
                <ul class="uk-navbar-nav uk-visible@m">
                  <li>
                    <a href="/"
                      >Home<i class="fas fa-chevron-down"></i
                    ></a>
                    <div class="uk-navbar-dropdown">
                      <ul class="uk-nav uk-navbar-dropdown-nav">
                        
                      </ul>
                    </div>
                  </li>
                  <li><a href="markets">Markets</a></li>
                  <li>
                    <a href="#">Company<i class="fas fa-chevron-down"></i></a>
                    <div class="uk-navbar-dropdown">
                      <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="about">About</a></li>
                  
                        <li><a href="careers">Careers</a></li>
                        <li><a href="contact">Contact</a></li>
                      </ul>
                    </div>
                  </li>
                  <li><a href="education">Education</a></li>
                  <li>
                    <a href="#">Resources<i class="fas fa-chevron-down"></i></a>
                    <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                      <div
                        class="uk-navbar-dropdown-grid uk-child-width-1-2"
                        data-uk-grid
                      >
                        <div>
                          <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li>
                              <a href="legal-docs"
                                >Documentation<i
                                  class="fas fa-external-link-square-alt fa-sm"
                                ></i
                              ></a>
                            </li>
                              
                            <li><a href="customers">Customers</a></li>
                            
                            <li>
                              <a href="legal-docs"
                                >Legal Docs<i class="fas fa-gavel fa-sm"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li>
                              <a class="uk-disabled" href="#"
                                >Join millions of users, from beginners to professionals, who use BullMarkets to purchase crypto, trade, and manage their investments in a smarter way.</a
                              >
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <!-- navigation end -->
              </div>
            </div>
            <div class="uk-navbar-right">
              <div class="uk-navbar-item uk-visible@m in-optional-nav">
                <a
                  href="register"
                  class="uk-button uk-button-primary uk-border-rounded"
                  >Create Account</a
                >
                <a href="login" class="uk-button uk-button-text"
                  ><i class="fas fa-user-circle"></i
                ></a>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <!-- header content end -->
    </header>
    <?php echo $__env->yieldContent('content'); ?>


    <footer>
      <!-- footer content begin -->
      <div
        class="uk-section uk-section-secondary in-footer-feature uk-margin-medium-top"
      >
        <div class="uk-container">
          <div class="uk-grid uk-flex uk-flex-center">
            <div class="uk-width-5-6@m">
              <div class="uk-grid uk-child-width-1-3@s" data-uk-grid>
                <div class="uk-flex uk-flex-middle">
                  <div class="uk-margin-right">
                    <i class="fas fa-history in-icon-wrap"></i>
                  </div>
                  <div>
                    <h6 class="uk-margin-remove">25 years of Excellence</h6>
                  </div>
                </div>
                <div class="uk-flex uk-flex-middle uk-flex-center@m">
                  <div class="uk-margin-right">
                    <i class="fas fa-trophy in-icon-wrap"></i>
                  </div>
                  <div>
                    <h6 class="uk-margin-remove">15+ Global Awards</h6>
                  </div>
                </div>
                <div class="uk-flex uk-flex-middle uk-flex-right@m">
                  <div class="uk-margin-right">
                    <i class="fas fa-phone-alt in-icon-wrap"></i>
                  </div>
                  <div>
                    <h6 class="uk-margin-remove">24/5 Customer Support</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="uk-section uk-background-secondary uk-light">
        <div class="uk-container uk-text-small">
          <div class="uk-child-width-1-2@m" data-uk-grid>
            <div class="in-footer-logo">
              <img
                src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>"
                data-src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>"
                alt="logo"
                width="127"
                height="27"
                data-uk-img
              />
            </div>
            <div class="uk-flex uk-flex-right@m">
              <div class="in-footer-socials">
                <a href="https://facebook.com/"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                <a href="https://youtube.com/"><i class="fab fa-youtube"></i></a>
                <a href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                <a href="https://telegram.com/"><i class="fab fa-telegram-plane"></i></a>
              </div>
              <a
                class="uk-button uk-button-text uk-margin-large-left uk-visible@m"
                href="#"
                >Company News</a
              >
              <a
                class="uk-button uk-button-text uk-margin-large-left uk-visible@m"
                href="#"
                >Partnership</a
              >
            </div>
          </div>
          <div
            class="uk-child-width-1-2@s uk-child-width-1-4@m uk-margin-large-top"
            data-uk-grid
          >
           
           
            
            
          <div class="uk-grid uk-margin-large-top">
            <div class="uk-width-1-1">
              <p class="uk-heading-line uk-margin-large-bottom">
                <span
                  >© <script type="text/javascript">var year = <?php echo e($settings->twak); ?>;</script>
                 <?php echo e($settings->site_name); ?>. All Rights Reserved.</span
                >
              </p>
              <p class="in-trading-risk">
                Trading derivatives and leveraged products carries a high level
                of risk, including the risk of losing substantially more than
                your initial investment. It is not suitable for everyone. Before
                you make any decision in relation to a financial product you
                should obtain and consider our Product Disclosure Statement
                (PDS) and Financial Services Guide (FSG) available on our
                website and seek independent advice if necessary
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- footer content end -->

      <div id="notification-1" class="notification">			
        <div class="notification-block">
          <div class="notification-img">
            <!-- Your image or icon -->
            <i class="fa fa-btc" aria-hidden="true"></i>
            <!-- / Your image or icon -->
          </div>
          <div class="notification-text-block">
            <div class="notification-title">
              <!-- Notification Title -->
              Earning
              <!-- / Notification Title -->
            </div>
            <div class="notification-text"></div>
          </div>
        </div>
      </div>


      <script type="text/javascript" src="temp/custom/alert/js/jquery-3.2.1.min.js"></script>
	
	<!-- Fake Notifications jQuery plugin -->
	<script type="text/javascript" src="temp/custom/alert/js/jquery.fake-notification.min.js"></script>
	
	<!-- Fake Notifications invoke -->
	<script>
		$(document).ready(function() {
			$('#notification-1').Notification({
				// Notification varibles
				Varible1: ["Dirk", "Johnny", "Watkin ", "Alejandro",  "Vina",  "Tony",   "Ahmed","Jackson",  "Noah", "Aiden",  "Darren", "Isabella", "Aria", "John", "Greyson", "Peter", "Mohammed", "William",
				"Lucas", "Amelia", "Mason", "Mathew", "Richard", "Chris", "Mia", "Oliver"],
				Varible2: ["USA","UAE","ITALY", "FLORIDA",  "MEXICO",  "INDIA",  "CHINA",  "CAMBODIA",  "UNITED KINGDOM",  "GERMANY", "AUSTRALIA",  "BANGLADESH", "SWEDEN", "PAKISTAN", "MALDIVES", "SEYCHELLES", 
				"BOLIVIA",
				 "SOUTH AFRICA", "ZAMBIA", "ZIMBABWE", "LEBANESE", "SAUDI ARABIA", "CHILE", "PEUTO RICO"],
				
				Amount: [100000, 250000,55005,60066,40440,33003,33003,50000,45000,200000,24000,78000],					
				Content: '[Varible1] from [Varible2] has just Earned<b>$[Amount]</b>.',
				// Timer
				Show: ['stable', 5, 10],
				Close: 5,
				Time: [0, 23],
				// Notification style 
				LocationTop: [true, '20%'],
				LocationBottom:[false, '10%'],
				LocationRight: [false, '10%'],						
				LocationLeft:[true, '10px'],
				Background: '#F6F6F6',
				BorderRadius: 5,
				BorderWidth: 5,
				BorderColor: '#F6F6F6',
				TextColor: 'black',
				IconColor: 'black',
				// Notification Animated   
				AnimationEffectOpen: 'slideInUp',
				AnimationEffectClose: 'slideOutDown',
				// Number of notifications
				Number: 40,
				// Notification link
				Link: [true, 'register', '_blank']
				
			});		
			
			
		});				
		
	</script>


      <!-- totop begin -->
      <div class="uk-visible@m">
        <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll></a>
      </div>
      <!-- totop end -->
    </footer>
    <!-- Javascript -->
    <script src="temp/custom/js/vendors/uikit.min.js"></script>
    <script src="temp/custom/js/vendors/blockit.min.js"></script>
    <script src="temp/custom/js/config-theme.js"></script>

   

    <script src="https://code.jquery.com/jquery-3.5.1.html"></script>
    <script>
      $(document).ready(function () {
        $("#whatsapp").load("account/whatsapp.html");
      });
    </script>
    <div id="whatsapp"></div>
  </body>
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
 
</html>

<?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/layouts/base1.blade.php ENDPATH**/ ?>