<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel ">
        <div class="content card">
            <div class="page-inner card-body ">
                <div class="mt-2 mb-4">
                    <h1 class="title1 text-<?php echo e($text); ?> text-center">Create A New Shipment</h1>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <div class="mb-5 row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card p-2 shadow ">
                            <div class="card-body">
                                <div>
                                    	<form method="POST" action="<?php echo e(route('createuser')); ?>" enctype="multipart/form-data">
													<?php echo csrf_field(); ?>
													<div class="form-row">
                                                        <div class="form-group col-md-12">
															<h2 class="text-<?php echo e($text); ?> ">Recipient Information:</h2>
															
														</div>
                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Reciver's Full Name</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="name"  placeholder="Recivers full name">
														</div>

                                                        
														<div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Reciver's Email</h6>
															<input type="email" class="form-control bg-<?php echo e($bg); ?>  text-<?php echo e($text); ?>" placeholder="Recivers email" name="email" required>
														</div>
                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>"> Reciver's Phone Number</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"  name="phone"  placeholder="Recivers Phone Number" required>
														</div>
                                                        <div class="form-group col-md-6">
                                                            <h6 class="text-<?php echo e($text); ?>">Reciver's Contact Address</h6>
                                                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"
                                                                name="address" placeholder="Recivers  Contact Address"  required>
                                                        </div>

                                                        <div class="form-group col-md-12">
															<h6 class="text-<?php echo e($text); ?>">Recipient Country</h6>
															<select type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="country" required>
                                                                <?php echo $__env->make('auth.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                            </select>
														</div>
                                                        
                                                


                                                        <div class="form-group col-md-12">
															<h2 class="text-<?php echo e($text); ?> ">Sender Information:</h2>
															
														</div>
                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Sender Full Name</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="sname"  placeholder="Sender Full Name">
														</div>

                                                        
														<div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Sender Email</h6>
															<input type="email" class="form-control bg-<?php echo e($bg); ?>  text-<?php echo e($text); ?>" placeholder="Sender email" name="semail" required>
														</div>
                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>"> Sender Phone Number</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"  name="sphone"  placeholder="Sender Phone Number" required>
														</div>
                                                        <div class="form-group col-md-6">
                                                            <h6 class="text-<?php echo e($text); ?>">Sender Contact Address</h6>
                                                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"
                                                                name="saddress" placeholder="Sender Address"  required>
                                                        </div>

                                                        <div class="form-group col-md-12">
															<h6 class="text-<?php echo e($text); ?>">Sender Country</h6>
															<select type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="scountry" required>
                                                                <?php echo $__env->make('auth.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                            </select>
														</div>
														

                                                        
                                        


                                                        <div class="form-group col-md-12">
															<h2 class="text-<?php echo e($text); ?> ">Shipping Information:</h2>
															
														</div>
                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Take of Point</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="take_off_point"  placeholder="Take of Point">
														</div>


                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Final Destination</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="final_destination"  placeholder="Final Destination">
														</div>

                                                        <div class="form-group col-md-6">
                                                            <h6 class="text-<?php echo e($text); ?>">Freight Type</h6>
                                                            <select type="text" class="form-control  bg-<?php echo e($bg); ?>  text-<?php echo e($text); ?>"
                                                                name="freight_type"  required>
                                                                <option value="Air Freight">Air Freight</option> 
                                                                <option value="Sea Freight">Sea Freight</option> 
                                                                <option value="Road Freight">Road Freight</option> 
                                                                <option value="Rail Freight">Rail Freight</option> 
                                                               
                                                        </select>
                                                        </div>


                                                        <div class="form-group col-md-6">
                                                            <h6 class=" text-<?php echo e($text); ?>">Shippment Content Type</h6>
                                                            <select type="text" class="form-control bg-<?php echo e($bg); ?>   text-<?php echo e($text); ?>"
                                                                name="shipment_type"  required>
                                                                <option value="Parcel">Parcel</option>
                                                                <option value="Box">Box</option>
                                                                <option value="Document">Document</option>
                                                                <option value="Container">Container</option> 
                                                               
                                                        </select>
                                                        </div>

														<div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Weight (eg 2kg)</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?>  text-<?php echo e($text); ?>" placeholder="Weight" name="weight" required>
														</div>

                                                        <div class="form-group col-md-6">
                                                            <h6 class=" text-<?php echo e($text); ?>">Shippment status</h6>
                                                            <select type="text" class="form-control bg-<?php echo e($bg); ?>   text-<?php echo e($text); ?>"
                                                                name="status"  required>
                                                                <option data-value="Approved ">Approved </option>
                                                                <option data-value="Available">Available</option>
                                                                <option data-value="Cancelled">Cancelled</option>
                                                                <option data-value="Customs">Customs</option>
                                                                <option data-value="Delivered">Delivered</option>
                                                                <option data-value="Dispenser">Dispenser</option>
                                                                <option data-value="Distribution">Distribution</option>
                                                                <option data-value="Earring Collection">Earring Collection</option>
                                                                <option data-value="Effective">Effective</option>
                                                                <option data-value="In Transit">In Transit</option>
                                                                <option data-value="In warehouse">In warehouse</option>
                                                                <option data-value="Invoiced">Invoiced</option>
                                                                <option data-value="On Hold">On Hold</option>
                                                                <option data-value="On route">On route</option>
                                                                <option data-value="Packaged">Packaged</option>
                                                                <option data-value="Pending">Pending</option>													</select>
                                                               
                                                        </select>
                                                        </div>
                                                        <div class="form-group col-md-12"> 
															<h6 class="text-<?php echo e($text); ?>"> Breif Description of Shipment</h6>
															<textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>  input-lg" name="description" rows="3" cols="4"> </textarea>
                                                            
														</div>
                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Date Shipped</h6>
															<input type="datetime-local" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="date_shipped" required>
														</div>

                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Expected Delivery Date</h6>
															<input type="datetime-local" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="expected_delivery" required>
														</div>
														


                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Tracking Number</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="trackingnumber" value='<?php echo e($trackingnumber); ?>' required>
														</div>
														

                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?>">Upload Profile photo</h6>
															<input type="file" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="photo" required>
														</div>
                                                        
                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?> text-danger">Shipment Current Location Address </h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="addresslocation" placeholder="Shipment Current Location" required>
														</div>
                                                        
                                                        <div class="form-group col-md-6">
															<h6 class="text-<?php echo e($text); ?> text-danger">Shipment Current City (This is the location that shows on the Map)</h6>
															<input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="location" placeholder="Shipment Current City" required>
														</div>


                                                        <div class="form-group col-md-6">
                                                            <h6 class="text-<?php echo e($text); ?> text-danger">Shipment Cost</h6>
                                                            <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="cost"   placeholder="Enter Shipping Cost Amount" >
                                                        </div>
                                
                                                        <div class="form-group col-md-6">
                                                            <h6 class="text-<?php echo e($text); ?> text-danger"> Clearance Cost</h6>
                                                            <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="clearance_cost"   placeholder="Enter  Clearance Cost" >
                                                        </div>
                                
                                                        <div class="form-group col-md-6">
                                                            <h6 class="text-<?php echo e($text); ?> text-danger"> QTY (eg 1, 2)</h6>
                                                            <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="qty"   placeholder="Enter  QTY" >
                                                        </div>
                                
                                                        <div class="form-group col-md-6">
                                                            <h6 class="text-<?php echo e($text); ?> text-danger"> Percentage Complete</h6>
                                                            <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="percentage_complete"   placeholder="Enter Shipping Percentage Completed" >
                                                        </div>
                                                        
                                                
                                                        </div>
                                                        
                                                       
														
                                                    <div class="form-group col-md-12">
                                                        <button type="submit" class="btn btn-primary">Generate Tracking</button>
                                                        </div>
												</form>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shipping\resources\views/admin/createnewuser.blade.php ENDPATH**/ ?>