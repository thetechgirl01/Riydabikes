

<?php $__env->startSection('title', $settings->site_title); ?>


<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>
   
  <body  style="background-color:teal;"  onload="window.print();">
      
      
	
	
    <div class="wrapper" id="background"> <p id="bg-text">Certified True Copy</p>

      <!-- Main content -->
      <section class="invoice" >
        <!-- title row -->
        <div class="row"  >
          <div class="col-xs-12">
            <h2 class="page-header">
			  <span><img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>"  height="45" width='130' > 
			  
			  <img class="pull-right"  src="<?php echo e(asset('temp/custom/banner.png')); ?>" alt=""  height="185"/> 
			  
			  <h3 style="color:red;"><strong> Tracking Number: <?php echo e($user->trackingnumber); ?></strong>
			  </h3></span>
			  
            </h2>
          </div><!-- /.col -->
        </div>
        
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
			   <center> 
			       <strong style="color:green;"><?php echo e($settings->site_name); ?> Logistics Company<br>
Address: Canada, USA, UK, Asia and Europe<br>
Email: <?php echo e($settings->contact_email); ?><br>
Company Website:<?php echo e($settings->site_address); ?></strong></center>
            </h2>
          </div><!-- /.col -->
        </div>
        
        
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <strong style="color:blue;">FROM (SENDER)</strong>
            <address>
              <h3><strong style="color:green;"><?php echo e($user->sname); ?></strong></h3>

              <b>Address:</b> <?php echo e($user->saddress); ?><br/>
			  <b>Origin Office:</b> <?php echo e($user->take_off_point); ?>            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <strong style="color:blue;">TO (CONSIGNEE)</strong>
            <address>
              <h3><strong style="color:green;"><?php echo e($user->name); ?></strong></h3>
              
              <b>Phone:</b> <?php echo e($user->phone); ?><br/>
			  <b>Address:</b> <?php echo e($user->address); ?><br/>
              <b>Destination Office:</b> <?php echo e($user->final_destination); ?>           </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
		  <table>
                                        	<tr>
                                                <td>
                                                    <center>
                                                      <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($user->trackingnumber); ?>&code=Code128" alt="<?php echo e($user->trackingnumber); ?>"><br>
                                                        
                                                    </center>
                                                </td>
                                                
                                            </tr>
                                        </table>
			<br/>
            <b>Order ID:</b>&nbsp;&nbsp;<?php echo e($user->id); ?> <br/>
			<b>Booking Mode:</b> <small class="label label-danger"><i class="fa fa-money"></i>&nbsp;&nbsp;ToPay</small><br/> 
		<b>Shipment  Cost:</b>&nbsp;<?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($user->cost); ?><br/>
    <b>Tracking Number:</b>&nbsp;&nbsp;<?php echo e($user->trackingnumber); ?> <br/>    
  </div><!-- /.col -->		 
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Qty</th>
                  <th>Product</th>
                  <th>Status</th>
                  <th>Description</th>
				  <th>Shipping Cost</th>
                  <th>Clearance Cost</th>
                  <th>Total Cost</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo e($user->qty); ?></td>
                  <td>Parcel</td>
                  <td><small class="label label-success"><?php echo e($user->status); ?> </small></td>
                  <td><?php echo e($user->description); ?> </td>
				  <td><?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($user->cost); ?> </td>
				  <td><?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($user->clearance_cost); ?></td>
                  <td><?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($user->clearance_cost+$user->cost); ?></td>
                </tr>               
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->
		<br>
		<br>
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-4">
            <p class="lead"><strong>Payment Methods:</strong></p>
            <img src="<?php echo e(asset('temp/securepayment.png')); ?>" alt="Methods payments" /> 
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              For your convenience we have <?php echo e($settings->site_name); ?> several payment reliable, fast, secure.
            </p>
         
          </div>
          
          <div class="col-xs-4">
            <p class="lead"><strong>Official Stamp/<?php echo e(\Carbon\Carbon::parse($user->created_at)->toDayDateTimeString()); ?></strong></p>
            <img src=" <?php echo e(asset('temp/stamp1.png')); ?>" alt="" height="100" />           
             
          </div>
          <div class="col-xs-4">
            <p class="lead">Stamp Duty:</p>
            <img  class='text-center' src="<?php echo e(asset('temp/stamp2.png')); ?>" alt=""  height="100"/>           
             
          </div>
          
          
          
          <!-- /.col -->
          <div class="col-xs-6">
            <p class="lead"><strong>Amount Due </strong></p>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">SHIPPING COST:</th>
                  <th>CLEARANCE COST:</th>
                  <th>TOTAL AMOUNT:</th> 
                </tr>
                <tr>
                  <td><?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($user->cost); ?></td>
                  <td><?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($user->clearance_cost); ?></td>
                  <td><?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($user->clearance_cost+$user->cost); ?></td>
                </tr>
                
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u215313542/domains/remedycodes.info/public_html/tracking1/resources/views/home/printinvoice.blade.php ENDPATH**/ ?>