
<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>



        <!-- end full-header -->
        <section class="sub-header">
            <h5 class="page-title">REQUEST A QUOTE</h5>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><span class="active">Request a Quote</span></li>
            </ul>
        </section>
        <!-- end sub-header -->
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h4 class="section-title">REQUEST A QUOTE</h4>
                    </div>
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

                    <!-- end col-12 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end contact -->
       

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/tracking.remedycodes.store/resources/views/home/request-quote.blade.php ENDPATH**/ ?>