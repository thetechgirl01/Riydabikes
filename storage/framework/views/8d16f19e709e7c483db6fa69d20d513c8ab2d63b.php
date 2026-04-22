


<?php $__env->startSection('title', 'Home'); ?>

<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>
      

 

    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area">
        <div id="bootcarousel" class="carousel transparent-nav text-center inc-top-heading slide carousel-fade animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner text-light carousel-zoom">
                <div class="item active">
                    <div class="slider-thumb bg-cover" style="background-image: url(temp/front/assets/img/banner/7.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="content">
                                            <h3 data-animation="animated slideInRight">Welcome to <?php echo e($settings->site_name); ?></h3>
                                            <h1 data-animation="animated slideInLeft">Secured &  <span> Easy Way To Trade </span> Forex & Crypto</h1>
                                           <a data-animation="animated slideInUp" class="btn btn-light effect btn-sm" href="register">Signup</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-sm" href="login">Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-cover" style="background-image: url(temp/front/assets/img/banner/8.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="content">
                                            <h3 data-animation="animated slideInUp"><?php echo e($settings->site_name); ?></h3>
                                            <h1 data-animation="animated slideInDown">has exactly what you need to  <span>trade the world’s financial </span> markets with confidence</h1>
                                            <a data-animation="animated slideInUp" class="btn btn-light effect btn-sm" href="register">Signup</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-sm" href="login">Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-thumb bg-cover" style="background-image: url(temp/front/assets/img/banner/9.jpg);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft">Join Over 200,000 Traders</h3>
                                            <h1 data-animation="animated slideInRight"> Who trade <span>forex and crypto using </span> our advance tools</h1>
                                            <a data-animation="animated slideInUp" class="btn btn-light effect btn-sm" href="register">Signup</a>
                                            <a data-animation="animated slideInUp" class="btn btn-theme effect btn-sm" href="login">Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- End Banner -->
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container" style="padding-top:0px margin-top:0px;">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "Nasdaq 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "BTC/USD"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "ETH/USD"
    }
  ],
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "regular",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->

    <!-- Start Features
    ============================================= -->
    <div class="top-features-area about-area default-padding bg-gray" style="margin-top:-50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6  ">
                    <h3 class="text-center">POWERFUL TOOL FOR ACTIVE TRADINGS</h3>
					<span>Trade with maximum control and reliability on a platform built for FX traders.</span>
                    <div class="management-items management-carousel owl-carousel owl-theme">
                        <!-- Single Item -->
                        <div class="item">
                           <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_ee505"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">  new TradingView.widget(  {  "width": "100%",  "height": 460,  "symbol": "NASDAQ:AAPL",  "interval": "1",  "timezone": "Etc/UTC",  "theme": "light",  "style": "1",  "locale": "en",  "toolbar_bg": "#f1f3f6",  "enable_publishing": false,  "hide_side_toolbar": false,  "allow_symbol_change": true,  "studies": [    "MASimple@tv-basicstudies"  ],  "container_id": "tradingview_ee505"}  );  </script>
</div>
<!-- TradingView Widget END -->
							 	
                        </div>
                        
                        
                        
                    </div>
                </div>
                <div class="col-md-6 about-list">
                    <ul>
					<h3>LEVEL OF SECURITY</h3>
                        <li>
                            <div class="icon">
                                <i class="flaticon-fit"></i>
                            </div>
                            <div class="info">
                                <h5>REGULATION & FUNDS</h5>
                                <p>
                                    In accordance with international regulation standards, <?php echo e($settings->site_name); ?> uses separate accounts to keep protected customers' funds segregated from the company's balance sheets. This keeps your funds secure and untouched.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-chart"></i>
                            </div>
                            <div class="info">
                                <h5>DEPTH OF PROTECTION</h5>
                                <p>
                                    <?php echo e($settings->site_name); ?>  recommends you to verify your account by submitting your 
									personal ID scan and an address proof. This simple measure will make sure your transactions are authorized and secured.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-customer-service"></i>
                            </div>
                            <div class="info">
                                <h5>DDoS PROTECTION & SSL</h5>
                                <p>
                                   We have both an official DDOS protection as well as a certification courtesy of the Comodo Positive SSL that proves our genuine commitment and seriousness towards this matter. Because of this, our clients 
								   can keep their attention on accomplishing their goals without having to worry about their information being compromised at any point during our collaborative efforts.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->






    <!-- Start Skill
    ============================================= -->
    <div class="skill-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 info">
                    <h2>Why chose us</h2>
                    <p>
                        We're constantly updating our trading system to aid more accuracy, sustainability and giving you the best is our major priority and we tends to stick with that!.
                    </p>
                    <div class="skill-items">
                        <!-- Progress Bar Start -->
                        <div class="progress-box">
                            <h5>STRATEGY & ANALYSIS<span class="pull-right">88%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="87"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>WITHDRAWAL EFFICENCY<span class="pull-right">95%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="96"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>ACHIEVES GOALS<span class="pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="52"></div>
                            </div>
                        </div>
                        <!-- End Progressbar -->
                    </div>
                </div>
                <div class="col-md-6 tab-items">
                    <!-- Tab Nav -->
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                <span>Financial Market</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                <span>Trading Confort</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab3" aria-expanded="false">
                                <span>Best Care</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Tab Nav -->
                    <!-- Start Tab Content -->
                    <div class="tab-content tab-content-info">
                        <div id="tab1" class="tab-pane fade active in">
                            <div class="info title">
                                <h3>Access the financial markets all in one place</h3>
                                <p>
                                   <strong>Forget about complicated platforms! Start using our simple & success-geared
platform to trade the world’s biggest assets like EUR, USD.</strong>
<p>Trade Forex/CFDs all on our advanced, web-based trading platform designed with you, the user in mind. With our platform, you can trade on the largest lists of assets in the industry. From Currency pairs, and Commodities to stocks and indices, we have it all.</p>
                                </p>
                                
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <div class="info title">
                                <h3>Our multiple option Trading services</h3>
                                <p>
                                   You are unlikely to find a more comfortable Forex broker than <?php echo e($settings->site_name); ?>.
								   Our company provides Forex customers the best possible conditions for successful 
								   Forex trading as well as Binary and Crypto Trades. We have offers for both beginners and 
								   experienced traders. There are also many different bonuses, which are designed to help any 
								   trader in his profitable trading. The main engines of our progress at the financial trading 
								   market are spotless reputation; focus on customers and innovative approach to business development.
								   Our achievements have been confirmed by the successes of every one of our traders. 
                                </p>
                                 
                            </div>
                        </div>
                        <div id="tab3" class="tab-pane fade">
                            <div class="info title">
                                <h3>Providing best care</h3>
                                <p>
                                   We strive to build a relationship of trust with every client, for the long-term, 70% of our work is for clients that we have served for over 10 years.
                                </p>
                                 
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Skill -->








 
    <!-- Start Our About
    ============================================= -->
    <div class="about-area reverse bg-gray  default-padding" >
        <div class="container" style="margin-top:-80px;">
            <div class="row">
                <div class="">
                    <div class="col-md-6  ">
                        <div class="thumb">
                                    
						<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text">Exchange Rates</span></a> by <?php echo e($settings->site_name); ?></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
  {
  "width": 370,
  "height": 300,
  "currencies": [
    "EUR",
    "USD",
    "JPY",
    "GBP",
    "CHF",
    "AUD",
    "CAD",
    "NZD",
    "CNY"
  ],
  "isTransparent": true,
  "colorTheme": "light",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
         
                        </div>
                    </div>
                    <div class="col-md-6 info">
                       
                        <h3>We’ve made it super easy to get you started</h3>
                        <p>
                           <?php echo e($settings->site_name); ?> is truly one of the best brokers, all you have to do is choose all your 
						   favourite options and we’ll lead you to the perfect account type where you can start 
						   succeeding. You are unlikely to find a more comfortable Forex broker than <?php echo e($settings->site_name); ?>.
						   Our company provides Forex customers the best possible conditions for successful Forex
						   trading as well as Binary and Crypto Trades. We have offers for both beginners and experienced traders..
							 </p>
							   
                        <div class="f-item link">
							<ul>
							  
                                <li>
                                     <a href="#"><i class="fa fa-pen"></i>  Trade FX/crypto and Binary “Side By Side”..</a>
                                </li>
                                <li>
                                     <a href="#"><i class="fa fa-pen"></i>  Zero Margins.</a>
                                </li>
                                <li>
                                     <a href="#"><i class="fa fa-pen"></i>  Default Leverage of 1:50..</a>
                                </li>
                                <li>
                                     <a href="#"><i class="fa fa-pen"></i>  Tight Spread.</a>
                                </li>
                                
							</ul>						  
						</div>	 
                       
                         
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our About -->



    <!-- Start Blog Area
    ============================================= -->
    <div class="blog-area   default-padding bottom-less">
        <div class="container" style="margin-top:-80px;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Our Service</h2>
                        <p>
                           With  over 2,000,000 clients since it was founded in 2011, <?php echo e($settings->site_name); ?> has grown to a well established international Trading and investment firm and has become a true industry leader.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Item -->
                <div class="col-md-3 single-item">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img src="temp/front/assets/img/lea.jpg" alt="Thumb"></a>
                            
                        </div>
                        <div class="info">
                           
                            <h4>
                                <a href="#">Easy Forex Trading</a>
                            </h4>
                            <p>
                                Easy access for Beginners  & experienced traders. Forex traders are aware of their profits in advance — their main
		objective is to select the correct direction of the market movement.
                             </p>
                            <div class="meta">
                               
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-3 single-item">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img src="temp/front/assets/img/leader.jpg" alt="Thumb"></a>
                            
                        </div>
                        <div class="info">
                           
                            <h4>
                                <a href="#">Proper Planing</a>
                            </h4>
                            <p>
                              Realtime Analyisis & Proper planning, Watch asset's value in real time monitoring platform and decide when to trade in.
                            </p>
                            <div class="meta">
                               
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-3 single-item">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img src="temp/front/assets/img/trade.jpg" alt="Thumb"></a>
                            
                        </div>
                        <div class="info">
                           
                            <h4>
                                <a href="#">Good signals</a>
                            </h4>
                            <p>
                              High returns with our best trade signals.
                            </p>
                            <div class="meta">
                               
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item --> 
				<!-- Single Item -->
                <div class="col-md-3 single-item">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img src="temp/front/assets/img/consult.jpg" alt="Thumb"></a>
                            
                        </div>
                        <div class="info">
                           
                            <h4>
                                <a href="#">24/7 support</a>
                            </h4>
                            <p>
                              You can communicate with our support team at any time through the website chat support or You can contact us by sending an email.
                            </p>
                            <div class="meta">
                               
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
               
            </div>
        </div>
    </div>
    <!-- End Blog Area -->


 <!-- Start Contact Area
    ============================================= -->
    <div class="contact-area default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="contact-items bg-contain" style="background-image: url(temp/front/assets/img/map.svg);">
				 <p style="color: #333;" class="text-center"><strong>Forex/CFD trading involves substantial risk and may result in the loss of your invested/greater that your invested capital, respectively. </strong></p>
				  
                    <div class="col-md-6 address">
                        <h3 style="color: #666;">Access the financial markets all in one place</h3>
					<p style="color: #333;"> Trade Forex/CFDs all on our advanced, web-based trading platform designed with you, 
					the user in mind. With our platform, you can trade on the largest lists of assets in the industry. 
					From Currency pairs, and Commodities to stocks and indices, we have it all.</p><br />
					
					 <a style="margin-top: 5px;" href="register" class="trd-btn aos-item" data-aos="fade-right">Trade</a> 
                    </div>
					
                    <div class="col-md-6  ">
                       <img src="temp/front/assets/img/MT5-platform.png" class="img-responsive  "  alt = "forex" />
					
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

 
 

 
    <!-- Start Team Area
    ============================================= -->
    <div class="team-area carousel-shadow default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Forex Market Heat Map</h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
				<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container  aos-item" data-aos="fade-left">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/forex-heat-map/" rel="noopener" target="_blank"><span class="blue-text">Forex Heat Map</span></a> by <?php echo e($settings->site_name); ?></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-heat-map.js" async>
  {
  "width": "100%",
  "height": "100%",
  "currencies": [
    "EUR",
    "USD",
    "JPY",
    "GBP",
    "CHF",
    "AUD",
    "CAD",
    "NZD",
    "CNY"
  ],
  "isTransparent": false,
  "colorTheme": "light",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
		
		
              </div>
            </div>
        </div>
    </div>
    <!-- End Team Area -->










 <!-- Start Services 
    ============================================= -->
    <div class="services-area default-padding text-light  bottom-less shadow dark bg-fixed" style="background-image: url(temp/front/assets/img/banner/13.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h1>Ready to get started?</h1>
                        <h4>
                            It only takes 3 minutes to get your account set up and ready for trading
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="services-items text-center">
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height" >
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-report"></i> 
                            </div>
                            <div class="info">
                                <h4>Create And Verify Account</h4>
                                
                                <a href="#">First Step <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-piggy-bank"></i> 
                            </div>
                            <div class="info">
                                <h4>Fund Account</h4>
                                 
                                <a href="#">Second Step <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="icon">
                               <i class="flaticon-plan"></i>
                            </div>
                            <div class="info">
                                <h4>Start Trading</h4>
                                 
                                <a href="#">Final Step <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                   
                     
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->





 
 
 
 

    <!-- Start Pricing Area
    ============================================= -->
    <div id="pricing" class="pricing-area bg-gray default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Our Pricing</h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pricing pricing-simple text-center">
                   
                    
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="pricing-item active">
                            <ul>
                                <li class="icon">
                                    <i class="flaticon-quality-badge"></i>
                                </li>
                                <li class="title">
                                    <h4><?php echo e($plan->name); ?></h4>
                                </li>
                                <li class="pricing-header">
                                     <h4><?php echo e($plan->min_price); ?><?php echo e($settings->currency); ?> - <?php echo e($plan->max_price); ?><?php echo e($settings->currency); ?></h4>
                                </li>
                                 <li>Commission <i class="fas fa-times-circle" style="font-size: 14px"></i></li>
                                <li>Full access to all instrument types: High/low, Boundary, One Touch, Short Term<i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                 <li>Access to all trading assets: Currencies, Shares, Commodites, Indexes <i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                <li>24/7 live Support<i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                <li>Full access to the <?php echo e($settings->site_name); ?> education centre<i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                <li>24/7 live Support<i class="fas fa-check-circle" style="font-size: 14px"></i></li>
                                <!--<li><strong>Profit: <small>$/£/€ 9,800 - 27,986</small></strong></li>-->
                                <li class="footer">
                                  <a class="btn btn-dark border btn-sm"  href="login">Get Started</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->


 
 
 
  <!-- Start Achivement
    ============================================= -->
    <div class="achivement-area bg-fixed shadow dark text-light default-padding" style="background-image: url(temp/front/assets/img/banner/9.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 info">
                    <h2>Its time to make your <br> money work for you</h2>
                    <p>
Most trading platforms have a high-risk area where you can either double or even triple your capital and then lose it in few minutes. <?php echo e($settings->site_name); ?> have several advantages that make it possible to get more profit with little or no risk.                   
				   </p>
                    <p>
                    Opportunities arise daily and are numerous, and we provide you with the means to connect from one to the other
					</p>
                    <p>
                    Whether you’re new to the markets or a professional, dedicated customer support is an integral part of a successful trading experience; if you have questions, comments or concerns, our local staff is on-hand to answer all your needs.
					</p>
                    <a href="login" class="btn btn-theme effect btn-md">Start Now</a>
                </div>
                <div class="col-md-6 achivement-items">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 item">
                            <div class="fun-fact">
                                <div class="timer" data-to="1830" data-speed="5000"></div>
                                <span class="medium">DAILY TRANSACTIONS</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 item">
                            <div class="fun-fact">
                                <div class="timer" data-to="489" data-speed="4000"></div>
                                <span class="medium">ACTIVE ACCOUNTS</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 item">
                            <div class="fun-fact">
                                <div class="timer" data-to="88" data-speed="3000"></div>
                                <span class="medium">ACCOUNT MANAGER</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 item">
                            <div class="fun-fact">
                                <div class="timer" data-to="4348" data-speed="5000"></div>
                                <span class="medium">CLIENT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Achivement Area -->

  
 
    <!-- Start Testimonial & Faq
    ============================================= -->
    <div class="testimonials-faq about-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Testimonials -->
                <div class="col-md-6 management-quote">
                    <h2>What Clients say</h2>
                    <div class="management-items management-carousel owl-carousel owl-theme">
                        <!-- Single Item -->
                        <div class="item">
                            <p>
                            Very great work, made very huge amount of money with little or no effort at all. Special thanks to your automated trading device. 
							</p>
                            <div class="author">
                                <div class="thumb">
                                    <img src="temp/front/assets/img/team/5.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                    <span>Austin Paul</span>
                                    <b>Silver Package Trader</b>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                            <p>
                             Extremely satisfying service. <?php echo e($settings->site_name); ?> is the best, I have already cashed out big in just two weeks. 
							 </p>
                            <div class="author">
                                <div class="thumb">
                                    <img src="temp/front/assets/img/team/6.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                    <span>- Martins Mcmullen</span>
                                    <b>Silver Package Trader</b>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                              <p>
                               This is the real definition of being top notch. I literally watched my account blossom into what it is today and I believe there is more to come. 
							   </p>
                            <div class="author">
                                <div class="thumb">
                                    <img src="temp/front/assets/img/team/7.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                    <span>- Marron Bua</span>
                                    <b>Basic Package Trader</b>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                             <p>
                               I really did not think it was possible before now to make so much profit, but here I am right now saying "Anything is just possible with <?php echo e($settings->site_name); ?> 
							   </p>
                            <div class="author">
                                <div class="thumb">
                                    <img src="temp/front/assets/img/team/8.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                    <span>- Sunath park</span>
                                    <b>Gold Package Trader</b>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="item">
                           <p>Just when I think its good enough, its just keeps getting better. Made over 4 withdrawals and I must confess that this is the best service i've ever recieved.
						   </p>
								
                            <div class="author">
                                <div class="thumb">
                                    <img src="temp/front/assets/img/team/9.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                    <span>- Jone Doe</span>
                                    <b>Silver Package Trader</b>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <div class="item">
                            <p>Your company is exactly what I was looking for – clear, clean, continuous, with a focus on clients. Thank you so much for your work.
                                        </p>
                            <div class="author">
                                <div class="thumb">
                                    <img src="temp/front/assets/img/team/10.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                    <span>- Rose Powell</span>
                                    <b>Account Manager</b>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- End Single Item -->
                        <div class="item">
                             <p>Ive always liked good stylish programs, but never invested quite enough to have a good profit. Now, thanks to Digitalcryptostocks.com, we have a program we can be proud of.
                                        </p>
                            <div class="author">
                                <div class="thumb">
                                    <img src="temp/front/assets/img/team/11.jpg" alt="Thumb">
                                </div>
                                <div class="info">
                                    <span>- Paul Wills</span>
                                    <b>Silver Package Trader</b>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                    </div>
                </div>
                <!-- End Testimonials -->

                <!-- Start Faq -->
                <div class="col-md-6 faq-area">
                    <div class="heading">
                        <h2>Answer & Questions</h2>
                    </div>
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                            How secure is trading with you?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                         We take all possible measures to ensure your utmost security. We use the internationally accepted security system SSL (Secure Sockets Layer) that encrypts all credit card payments over the web. This system is automatic, and you will receive instant notification if your browser does not support it.
										 </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                           What currency can I use for trading?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        You can open an account in USD, EUR or GBP. Please note that you cannot change your currency selection after registration.
										</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                            Do I have to deposit money for registration?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                       No. A deposit is not required and no credit/debit card details are required in order to register for this site. However, you will have to deposit money to start trading.
									   </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac4">
                                            Are payouts taxable?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        <?php echo e($settings->site_name); ?> traders are responsible for their taxation liabilities, if any, at their place of residence. See our general terms for more details.
										</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac5">
                                            I have problems with the registration process. What should I do?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                       Our team at <?php echo e($settings->site_name); ?> is here for you! You can contact us via live chat, request a call-back, [<?php echo e($settings->contact_email); ?>]
									   </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac6">
                                           How can I register?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                       Registering at <?php echo e($settings->site_name); ?> is extremely simple:
									   </p>
									   <ol>
									   <li>Click on “Sign Up” on the home page.</li>
									   <li>Fill in the mandatory details.</li>
									   <li>Submit the form.</li>
									   <li>Log in into account.</li>
									   <li>deposit and start trading</li>
									   </ol>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->  <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac7">
                                           What is the registration fee?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                     Τhere is no registration fee.
									   </p>
									    
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->
                        </div>
                    </div>
                </div>
                <!-- End Faq -->
            </div>
        </div>
    </div>
    <!-- End Testimonial & Faq -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/pro.remedycodes.online/resources/views/home/index.blade.php ENDPATH**/ ?>