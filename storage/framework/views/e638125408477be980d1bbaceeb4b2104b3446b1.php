


<?php $__env->startSection('title', $settings->site_title); ?>


<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>
   

  <!-- end full-header -->
  <section class="slider">
    <div class="fixed-form">
      <div class="container">
        <h3>LOGISTICS</h3>
        <h5>Check your delivery easily & quickly</h5>
        <?php if(Session::has('error')): ?>
        <span class='text-danger text-center'><strong>Error!!</strong>You have entered an incorrect Tracking Number.</span>
          <?php endif; ?>
        <form method="POST" action="<?php echo e(route('trackingresult')); ?>">
          <?php echo csrf_field(); ?>
          <input type="text" name="trackingnumber" placeholder="Enter your Tracking Number">
          &nbsp;
          <button  type="submit">TRACK ORDER</button>
        </form>
      </div>
      <!-- end container --> 
    </div>
    <!-- end fixed-form -->
    <div class="main-slider">
      <div class="slide1"> </div>
      <!-- end slider1 -->
      <div class="slide2"> </div>
      <!-- end slider2 -->
      <div class="slide3"> </div>
      <!-- end slider3 --> 
    </div>
  </section>
  <!-- end slider -->
  <section class="featured-services">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="left-side">
            <h3 class="section-title"><span>01</span>PACKING & STORAGE</h3>
            <p>Bringing you industry-specific expertise; whatever you’re shipping, wherever you’re shipping it. </p>
            <ul>
              <li>Shipper delivers a professional, efficient service </li>
              <li>Tailored to the specific needs of your business.</li>
              <li>Our services are designed around you.</li>
            </ul>
          </div>
          <!-- end left-side --> 
        </div>
        <!-- end col-5 -->
        <div class="col-md-7">
          <div class="right-side">
            <div class="service-box">
              <figure><img src="temp/custom/images/icon01.png" alt="Image">
                <figcaption>SEA SHIPPING</figcaption>
              </figure>
              <div class="desc"> We want to ensure that it’s as easy as possible to use the site to get.</div>
              <!-- end desc --> 
            </div>
            <!-- end service-box -->
            <div class="service-box spacing">
              <figure><img src="temp/custom/images/icon02.png" alt="Image">
                <figcaption>AIR SHIPPING</figcaption>
              </figure>
              <div class="desc"> Shipments moving, whether you’ve worked with us for years completely new.</div>
              <!-- end desc --> 
            </div>
            <!-- end service-box -->
            <div class="service-box">
              <figure><img src="temp/custom/images/icon03.png" alt="Image">
                <figcaption>LAND SHIPPING</figcaption>
              </figure>
              <div class="desc">International shipping. For further assistance, please get in touch. </div>
              <!-- end desc --> 
            </div>
            <!-- end service-box --> 
          </div>
          <!-- end right-side --> 
        </div>
        <!-- end col-7 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
  <!-- end featured-services -->
  <section class="contact">
    <div class="container">
      <div class="row">

        <!-- end col-12 -->
        <div class="col-md-12 col-sm-12">

                        <div class="request-area bg-simage padding-bottom-120 padding-top-120" style="padding-top:120px;padding-bottom:120px;background-image: url(temp/custom/assets/img/bg/06.html)">
                            <div class="container">
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="left-content-area">
                                            <div class="request-img" style="background-image: url(temp/custom/img/01.png);"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="color:#fff">
                                        <div class="righti-content-area">
                                            <div class="request-page-form-wrap">
                                                <div class="section-title white">
                                                    <h4 class="title" style="color:#fff">REQUEST A FREE QUOTE </h4>
                                                </div>
                                                <p style="color:#fff;margin-bottom:20px;">
                                                                                                    </p>
                                                <form  class="request-page-form" novalidate="novalidate">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <label class="text-white">Fright Type</label>
                                                            <select class="form-control" name="fright_type" required="" id="f-type">
                                                                <option value="">-- Select Type</option>
                                                                <option value="Air Freight">Air Freight</option>
                                                                <option value="Ocean Freight">Ocean Freight</option>
                                                                <option value="Road Freight">Road Freight</option>                                            
                                                            </select>
                                                            <div class="select-arrow"></div>
                                                            <div class="select-arrow"></div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="text-white">Email Address</label>
                                                                <input type="email" name="email" placeholder="Email" class="form-control" required="" aria-required="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="text-white">Departure Country</label>
                                                                <input type="text" name="departure_country" placeholder="Country of Departure" class="form-control" required="" aria-required="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="text-white">Total Weight (KG)</label>
                                                                <input type="text" name="weight" placeholder="Total Weight" class="form-control" required="" aria-required="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="text-white">Recipient's Country</label>
                                                                <input type="text" name="recipient_country" placeholder="Recipient Country" class="form-control" required="" aria-required="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label class="text-white">Expected Delivery Date</label>
                                                                <input type="date" name="expected_delivery_date" class="form-control" required="" aria-required="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="submit" name="quote_request" value="Submit Request" class="submit-btn">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

        <!-- end col-4 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
  <!-- end calculate-shipping -->
  <section class="steps-features">
    <div class="container">
      <div class="row spacing">
        <div class="col-md-4 col-sm-4 spacing">
          <div class="step-box bg-1"> <span>01</span>
            <h3>PACKING </h3>
            <h5>STORAGES</h5>
            <a href="#">READ MORE</a> </div>
          <!-- end step-box --> 
        </div>
        <!-- end col-4 -->
        <div class="col-md-4 col-sm-4 spacing">
          <div class="step-box bg-2 featured"> <span>02</span>
            <h3>LANDING</h3>
            <h5>FEATURES</h5>
            <a href="#">READ MORE</a> </div>
          <!-- end step-box --> 
        </div>
        <!-- end col-4 -->
        <div class="col-md-4 col-sm-4 spacing">
          <div class="step-box bg-3"> <span>03</span>
            <h3>DELIVERY</h3>
            <h5>SERVICES</h5>
            <a href="#">READ MORE</a> </div>
          <!-- end step-box --> 
        </div>
        <!-- end col-4 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
  <!-- end steps-features -->
  <section class="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="content-carousel">
            <div>
              <figure><img src="temp/custom/images/testimonial-head1.png" alt="Image"></figure>
              <blockquote><?php echo e($settings->site_name); ?> is a world leader in global container shipping and a company offering global service with local knowledge. <?php echo e($settings->site_name); ?> also provides integrated network of road, rail and sea transport resources which stretches across the globe.</blockquote>
              <i class="ion-android-hangout"></i>
              <h4>Steve Hardy</h4>
              <small>Jewelry Stores</small> </div>
            <!-- end div -->
            <div>
              <figure><img src="temp/custom/images/testimonial-head2.png" alt="Image"></figure>
              <blockquote><?php echo e($settings->site_name); ?> is privately owned global organisation operating a network of over 480 offices in 150 countries, employing a team of over 24,000 dedicated individuals. They have an established fleet of 480 container vessels with an intake capacity</blockquote>
              <i class="ion-android-hangout"></i>
              <h4>Jessica Carter</h4>
              <small>Apple Inc</small> </div>
            <!-- end div -->
            <div>
              <figure><img src="temp/custom/images/testimonial-head3.png" alt="Image"></figure>
              <blockquote>Their sea freight offering is complemented by our integrated warehousing and haulage services, which enable them to offer a true door-to-door service. As a company, they believe in operating as independent national carriers, this means they’re able to offer you a global.</blockquote>
              <i class="ion-android-hangout"></i>
              <h4>Chris O'Conner</h4>
              <small>Digital Power</small> </div>
            <!-- end div --> 
          </div>
          <!-- end content-carousel --> 
        </div>
        <!-- end col-12 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
  <!-- end testimonials -->
  <section class="latest-news">
    <div class="container">
      <div class="row spacing">
        <div class="col-xs-12 spacing">
          <h3 class="section-title"><span>03</span>LATEST NEWS</h3>
        </div>
        <!-- end col-12 -->
        <div class="col-md-4 col-sm-6 spacing">
          <div class="news-box">
            <figure><img src="temp/custom/images/news1.jpg" alt="Image"><span class="date">02/OCT</span></figure>
            <div class="news-caption">
              <h4>Social and demographic information</h4>
              <p>There are no hidden costs associated with our transportation services</p>
              <a href="#">READ MORE</a> </div>
            <!-- end news-caption --> 
          </div>
          <!-- end news-box --> 
        </div>
        <!-- end col-4 -->
        <div class="col-md-4 col-sm-6 hidden-xs spacing">
          <div class="news-box">
            <div class="news-caption">
              <h4>Team member to discuss our meeting</h4>
              <p>Offers you peace-of-mind that we’ll be on-hand to help whenever you need us.</p>
              <a href="#">READ MORE</a> </div>
            <!-- end news-caption -->
            <figure><img src="temp/custom/images/news2.jpg" alt="Image"><span class="date">02/OCT</span></figure>
          </div>
          <!-- end news-box --> 
        </div>
        <!-- end col-4 -->
        <div class="col-md-4 hidden-sm spacing">
          <div class="news-box">
            <figure><img src="temp/custom/images/news3.jpg" alt="Image"><span class="date">02/OCT</span></figure>
            <div class="news-caption">
              <h4>Financial Institutions changes control</h4>
              <p>As a company, we believe in operating as independent national carriers.</p>
              <a href="#">READ MORE</a> </div>
            <!-- end news-caption --> 
          </div>
          <!-- end news-box --> 
        </div>
        <!-- end col-4 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
  <!-- end latest-news -->
  <section class="clients">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li>
              <figure>
                <h5><img src="temp/custom/images/logo1.jpg" alt="Image"></h5>
              </figure>
            </li>
            <li>
              <figure>
                <h5><img src="temp/custom/images/logo2.jpg" alt="Image"></h5>
              </figure>
            </li>
            <li>
              <figure>
                <h5><img src="temp/custom/images/logo3.jpg" alt="Image"></h5>
              </figure>
            </li>
            <li>
              <figure>
                <h5><img src="temp/custom/images/logo4.jpg" alt="Image"></h5>
              </figure>
            </li>
            <li>
              <figure>
                <h5><img src="temp/custom/images/logo5.jpg" alt="Image"></h5>
              </figure>
            </li>
            <li>
              <figure>
                <h5><img src="temp/custom/images/logo6.jpg" alt="Image"></h5>
              </figure>
            </li>
          </ul>
        </div>
        <!-- end col-12 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>


  <section class="about-intro parent">
    <div class="left-side">
      <div class="content-box">
        <h3 class="section-title"><span>04</span>ABOUT <?php echo e($settings->site_name); ?></h3>
        <p>We have trained, experienced experts available for our full range of services including reefer, out-of-gauge, breakbulk and each of our trade services – each operating in tandem with your business. This gives us the ability to uphold the personal service we’re globally recognised</p>
        <div class="fun-facts">
          <h5>FUN FACTS</h5>
          <div class="fun-box"> <i class="ion-trophy"></i> <span class="title">GETTED AWARDS</span> <span class="plus">+</span><b class="counter">1.246</b> </div>
          <!-- end fun-box -->
          <div class="fun-box"> <i class="ion-umbrella"></i> <span class="title">CARRIED PACKAGE</span><span class="plus">+</span><b class="counter">2.638</b> </div>
          <!-- end fun-box --> 
        </div>
        <!-- end fun-facts --> 
      </div>
      <!-- end content-box --> 
    </div>

    <!-- end left-side -->
    <div class="right-side" data-stellar-background-ratio="0.5">
      <div class="overlay parent text-center">
        <div>LOGISTIC</div>
      </div>
    </div>
    <!-- end left-side --> 
  </section>
  <!-- end about-intro -->
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215313542/domains/remedycodes.info/public_html/tracking1/resources/views/home/index.blade.php ENDPATH**/ ?>