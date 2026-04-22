


<?php $__env->startSection('title', $settings->site_title); ?>


<?php $content = app('App\Http\Controllers\FrontController'); ?>
<?php $__env->startSection('content'); ?>
   <style>
       
       td{
           font-size: 22px
       }
   </style>

    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
  
    
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image:url(temp/custom2/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Tracking Result</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">                                
                                <li class="breadcrumb-item active" aria-current="page">tracking page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->
	
        <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0">
	<div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-2">
                        <div class="line"></div>
                        <h2>Tracking Result</h2>
                    </div>
                </div>
            </div>
        <div class="container">
            <div class="row">
                
					 		 <div id='track_page' class=''>

				<div id='track_details_wrapper'>
				    <hr>
					
				<?php if($courier->photo !=Null): ?>
  <div class="text-center">
 <img alt="Logo" src="<?php echo e(asset('storage/app/public/photos/' . $courier->photo)); ?>" style="height:auto; max-width:45%;"/>
 
   <h4>Package Image</h4>
 <hr>
				</div>
				<?php endif; ?>
				
				<br>
				<h5 class='track_headings'>A consignment was sent to you through <?php echo e($settings->site_name); ?> Logistics and Shipping Company  We recommend that you regularly keep track of your freight through our tracking system here. Feel free to contact us through our email in the contact page if you need any assistance of whatsoever kind.</h5>

					<h3 class='track_subheadings' style='text-align: center;'>Your consignment details are as stated below</h3>

<center>
                                                      <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo e($courier->trackingnumber); ?>&code=Code128" alt="<?php echo e($courier->trackingnumber); ?>"><br>
                                                        
                                                    </center>
            <center><img src=" <?php echo e(asset('temp/custom2/tracking-search.png')); ?>" /></center>
      <center><h2><a href="<?php echo e(route('printnow', $courier->id)); ?>" class='btn btn-success display-1'>Print Shipping Invoice</a></h2></center>
      
      
      
      <div style="width: 70%"><iframe width="1126" height="397" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=1126&amp;height=397&amp;hl=en&amp;q=<?php echo e($courier->location); ?>+(Tracking%20map)&amp;t=p&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href='https://maps-generator.com/'>Maps Generator</a></div>
	  
	  
	  <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
  color: white;
  
}

tr:nth-child(even){background-color: #db8e0e}
</style>
 

<h4>Receiver's Details</h4>
 

<div style="overflow-x:auto;">
  <table>
    <tr style="background-color: #1b2142;">
      <th>Full Name</th>
      <th>Address</th>
      <th>Email Address</th>
      <th>Phone Number</th>
  
    </tr>
    <tr>
      <td> <?php echo e($courier->name); ?> </td>
      <td> <?php echo e($courier->address); ?>  </td>
      <td> <?php echo e($courier->email); ?> </td>
      <td> <?php echo e($courier->phone); ?> </td>
 
    </tr>
 
 
  </table>
</div>
	  
<br>	  
	   
<h4>Sender's Details</h4>
<div style="overflow-x:auto;">
  <table>
    <tr style="background-color: #1b2142;">
      <th>Sender's Name</th>
      <th>Address</th>
       <th>Sender Email</th>
      <th>Phone Number</th>
  
    </tr>
    <tr>
      <td> <?php echo e($courier->sname); ?> </td>
      <td> <?php echo e($courier->saddress); ?> </td> 
       <td> <?php echo e($courier->semail); ?> </td>
      <td> <?php echo e($courier->sphone); ?> </td>
      
 
    </tr>
  </table>
</div> 
	  
<br>
<h4>Consignment's Details</h4>
<div style="overflow-x:auto;">
  <table>
    <tr style="background-color: #1b2142;">
      <th>Consignment No</th>
      <th>Package Weight</th>
      <th>Tracking Number</th>
	  <th>Status</th>
	  <th>Service Type</th>
	  <th>Delivery Mode</th>
	  <th>Delivery Completion</th>
  
    </tr>
    <tr>
      <td><?php echo e($courier->trackingnumber); ?></td>
      <td> <?php echo e($courier->weight); ?> </td> 
      <td> <?php echo e($courier->trackingnumber); ?> </td>
	  <td><?php echo e($courier->status); ?></td>
	  <td><?php echo e($courier->shipment_type); ?></td>
	  <td><?php echo e($courier->freight_type); ?></td>
	  <td><?php echo e($courier->percentage_complete); ?>% Complete</td>
 
    </tr>
  </table>
</div>	 

  
				 <hr>



                 <div style="overflow-x:auto;">
                    <table>
                      <tr style="background-color: #1b2142;">
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Pickup Date/Time</th>
                        <th>Date of Departure</th>
                        <th>Shipment Description</th>
                        <th>Expected delivery date</th>
                        
                    
                      </tr>
                      <tr>
                        <td ><?php echo e($courier->take_off_point); ?></td>
                        <td><?php echo e($courier->final_destination); ?>  </td> 
                        <td> <?php echo e(\Carbon\Carbon::parse($courier->expected_delivery)->toDayDateTimeString()); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($courier->date_shipped)->toDayDateTimeString()); ?></td>
                        <td><?php echo e($courier->description); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($courier->expected_delivery)->toDayDateTimeString()); ?></td>
                        
                   
                      </tr>
                    </table>
                  </div>	 
                  
                    
                                   <hr>

					<div id='trackline_wrap'>
						<div id='grey_line'>
							<div id='startpoint'></div>

							<div id='endpoint'></div>

							<div id='movingline'></div>

							<div id='pointer_img'>
								<img src='temp/custom2/pointer2.png' />
								<span id="perc_count">00%</span>
							</div>
						</div>
					</div>
            <hr>
			  
 
				
				<div style="overflow-x:auto;">
					<table >
						<caption>Tracking Informations</caption>
						
							<tr style="background-color: #1b2142;">
								 <th>Status</th>
								<th>Current Location</th>
                                <th>Arrival Country</th>  
								<th>Arrival Date</th>
								<th>Comments</th>
							</tr>
						
                            <?php $__empty_1 = true; $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

		<tr style="background-color: #db8e0e;">
						 
				<td class="track_dot display-5  " style='font-size: 17px;'>
			      <?php echo e($track->status); ?>

                </td> 
                <td class="display-5" style='font-size: 17px;'> <?php echo e($track->address); ?>, <?php echo e($track->city); ?> </td>  
                 <td class=" display-5 " style='font-size: 17px;'> <?php echo e($track->country); ?></td>
                <td class=" display-5" style='font-size: 17px;'> <?php echo e(\Carbon\Carbon::parse($track->created_at)->toDayDateTimeString()); ?></td> 
              
                <td class=" display-5" style='font-size: 17px;'><?php echo e($track->comment); ?></td>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <td colspan="9" class='text-center'>
                 Shipment History Not Available
               </td>    
               
               </tr>
               <?php endif; ?>
                
                

                
                </table>							
				</div>
					<table class='col-s-12 col-m-12 col-12'>
					
					<tr style="background-color: #1b2142;" >
						<th>Comment</th>
					</tr>
				
					<tr>
           <?php if(isset($latesttrack->comment)): ?>
             
          
					<td>	<h3 class='text-center text-white'>Notice: <?php echo e($latesttrack->comment); ?></h3></td>
            <?php endif; ?>

          
					</tr>
				</table>
				
				</div>
				<br/>
				<br/>
  

				<div id='vert_scroll_wrap'><p>Thanks for patronising us. Feel free to track your package anytime.</p></div>

			</div>

               
              </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### FAQ Area End ###### -->

     <!-- ##### Newsletter Area Start ###### -->
    <section class="newsletter-area section-padding-100 bg-img jarallax" style="background-image:url(temp/custom2/img/bg-img/6.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="nl-content text-center">
                        <h2>WE PROVIDE INTERNATIONAL FREIGHT & Courier SERVICE WORLDWIDE</h2>
                        <a href="services" class="btn credit-btn box-shadow">Get our Service</a>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ###### -->

    <!-- ##### Footer Area Start ##### -->
    
  
  
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.base1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/remedycodes/public_html/tracking.remedycodes.store/resources/views/home/track-result.blade.php ENDPATH**/ ?>