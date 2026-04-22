


<?php $__env->startSection('content'); ?>
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
			  <span><img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>" width="150" height="39" ></span>
              <small class="pull-right"><?php echo e($settings->created_at); ?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            SENDER            <address>
              <h4><strong><?php echo e($user->sname); ?></strong></h4><br>

               <b>Phone:</b><?php echo e($user->sphone); ?><br/>
              <b>Address:</b> <?php echo e($user->saddress); ?><br/>
              <b>Email:</b> <?php echo e($user->semail); ?><br/>
			  <b>Country Origin:</b> <?php echo e($user->scountry); ?><br/>
			 
			 
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            RECIPIENT            <address>
              <h4><strong><?php echo e($user->sname); ?></strong></h4><br>
              
              <b>Phone:</b> <?php echo e($user->phone); ?><br/>
			    <b>Address:</b> <?php echo e($user->address); ?> <br/>
			  <b>Email:</b> <?php echo e($user->email); ?><br/>
              <b>Destination Country:</b> <?php echo e($user->country); ?><br/>
			 
			  
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
		  <table>
				<tr>
					<td>
						<center>
							<img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($user->trackingnumber); ?>&code=Code128" alt="<?php echo e($user->trackingnumber); ?>">						

						</center>
					</td>
					
				</tr>
			</table>
			<br/>           
            <b>Shipping Weight:</b>&nbsp;<?php echo e($user->weight); ?><br/>
			<b>Payment Method:</b> <small class="label label-danger"><i class="fa fa-money"></i>&nbsp;&nbsp;<?php echo e($method); ?></small><br/> 
			<b>Shipping Amount:</b>&nbsp;<?php echo e($amount); ?><?php echo e($settings->s_currency); ?>&nbsp;<br/>
          </div><!-- /.col -->		 
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  
                  <th>Product</th>
                  <th>Status</th>
                  <th>Current Location</th>
                  <th>Description</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  
                  <td><?php echo e($user->shipment_type); ?></td>
                  <td><small class="label label-success"><?php echo e($user->status); ?> </small></td>
                  <td><small class="label label-info"><?php echo e($user->addresslocation); ?> </small></td>
                  <td><?php echo e($user->description); ?></td>
                  <td><?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($amount); ?></td>
                </tr>               
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->
		<br>
		<br>
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
            <p class="lead">Methods of Payment:<?php echo e($method); ?></p>
            <img src="<?php echo e($settings->site_address); ?>/temp/securepayment.png" alt="Methods payments" />           
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              For your convenience we have several reliable, fast and secure payments.            </p>
          </div><!-- /.col -->
          <div class="col-xs-6">
            <p class="lead">Amount</p>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td><?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($amount); ?></td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td> <?php echo e($settings->s_currency); ?>&nbsp;<?php echo e($amount); ?></td>
                </tr>
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shipping\resources\views/admin/recieptprint.blade.php ENDPATH**/ ?>