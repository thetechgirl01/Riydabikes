 <!-- Top Up Modal -->
 <div id="topupModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Credit/Debit <?php echo e($user->name); ?> account.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form method="post" action="<?php echo e(route('topup')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-group">
                         <input class="form-control  " placeholder="Enter amount" type="text" name="amount"
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class="">Select where to Credit/Debit</h5>
                         <select class="form-control  " name="type" required>
                             <option value="" selected disabled>Select Column</option>
                             <option value="Bonus">Bonus</option>
                             <option value="Profit">Profit</option>
                             <option value="Ref_Bonus">Ref_Bonus</option>
                             <option value="balance">Account Balance</option>
                             <option value="Deposit">Deposit</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <h5 class="">Select credit to add, debit to subtract.</h5>
                         <select class="form-control  " name="t_type" required>
                             <option value="">Select type</option>
                             <option value="Credit">Credit</option>
                             <option value="Debit">Debit</option>
                         </select>
                         <small> <b>NOTE:</b> You cannot debit deposit</small>
                     </div>
                     <div class="form-group">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                         <input type="submit" class="btn " value="Submit">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /deposit for a plan Modal -->

 <div id="Upgradeaccount" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Generate Invoice for this shipment </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form role="form" method="post" action="<?php echo e(route('upgradeaccount')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <div class="form-group">
                            <h5 class=" "> Enter Amount (this is the amount you want to be on the reciept)</h5>
                            <input type="number" placeholder="Enter Amount " name="amount" class="form-control  " required> 
                        </div>
                    </div>
                    <div class="form-group">
                       
                        <div class="form-group">
                            <h5 class=" ">Enter Payment method (This is payment you want client you want user to use for payment )</h5>
                            <input type="text" name="method" class="form-control  " placeholder="Enter payment method" required>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Generate Invoice">
                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- send a single user email Modal-->
 <div id="userTax" class="modal fade" role="dialog">
    <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">On/ Off User Tax  for <?php echo e($user->name); ?> <?php echo e($user->l_name); ?> </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="<?php echo e(route('usertax')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-group">
                         <h5 class=" ">On/Off</h5>
                         <select class="form-control" name="taxtype">
                             <option value="" selected disabled></option>
                             
                                 <option value="on">On</option>
                                 <option value="off">Off</option>
                           
                         </select>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Amount</h5>
                         <input type="number" name="taxamount" class="form-control  ">
                     </div>
                    
                     <div class="form-group">
                         <input type="submit" class="btn " value="Add User Tax">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>




 <!-- send a single user email Modal-->
 <div id="sendmailtooneuserModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Send Email</h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">This message will be sent to <?php echo e($user->name); ?></p>
                 <form style="padding:3px;" role="form" method="post" action="<?php echo e(route('sendmailtooneuser')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class=" form-group">
                         <input type="text" name="subject" class="form-control  " placeholder="Subject" required>
                     </div>
                     <div class=" form-group">
                         <textarea placeholder="Type your message here" class="form-control  " name="message" row="8"
                             placeholder="Type your message here" required></textarea>
                     </div>
                     <div class=" form-group">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                         <input type="submit" class="btn " value="Send">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /Trading History Modal -->

 <div id="TradingModal" class="modal fade" role="dialog">
     <div class="modal-dialog col-md-12">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Update shipment status for <?php echo e($user->name); ?> </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="<?php echo e(route('addhistory')); ?>">
                     <?php echo csrf_field(); ?>

                     <div class="form-group">
                        <h5 class=" ">New Location Address</h5>
                        <input type="text" name="address" class="form-control" placeholder='New Location Address' required>
                    </div>

                    <div class="form-group">
                        <h5 class=" ">New Location City </h5>
                        <input type="text" name="city" class="form-control" placeholder='New Location City' required>
                    </div>
                     <div class="form-group">
                         <h5 class=" ">New Location Country</h5>
                         <select class="form-control  " name="country"  placeholder='New Location Country' required>
                            <option value="" selected disabled>Select Country</option>

                            <?php echo $__env->make('auth.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         </select>
                     </div>
                    
                     <div class="form-group">
                         <h5 class=" ">New Status</h5>
                         <select class="form-control  " name="status" required>
                             <option value="" selected disabled>Select New Status</option>
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
                                                                <option data-value="Pending">Pending</option>
                         </select>
                     </div>

                     <div class="form-group">
                        <h5 class=" ">Delivery Percentage Complete </h5>
                        <input type="number" name="percentage_complete" class="form-control" placeholder=' Delivery Percentage Complete' required>
                    </div>

                     <div class="form-group col-md-12"> 
                        <h5 class="text-<?php echo e($text); ?>"> Comment</h5>
                        <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>  input-lg" name="comment" rows="2" cols="2"> </textarea>
                        
                    </div>
                     <div class="form-group">
                         <input type="submit" class="btn btn-primary" value="Update History">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /send a single user email Modal -->

 <!-- Edit user Modal -->
 <div id="edituser" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Edit <?php echo e($user->name); ?> Shipment details.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                <form method="POST" action="<?php echo e(route('edituser')); ?>" enctype="multipart/form-data">
                   
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h2 class="text-<?php echo e($text); ?> ">Recipient Information:</h2>
                            
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Recivers Full Name</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="name" value="<?php echo e($user->name); ?>"  placeholder="Recivers full name">
                        </div>

                        
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Recivers Email</h6>
                            <input type="email" class="form-control bg-<?php echo e($bg); ?>  text-<?php echo e($text); ?>" placeholder="Recivers email" value="<?php echo e($user->email); ?>" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>"> Recivers Phone Number</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"  name="phone" value="<?php echo e($user->phone); ?>" placeholder="Recivers Phone Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Recivers Contact Address</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"
                                name="address" placeholder="Recivers  Contact Address" value="<?php echo e($user->address); ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <h6 class="text-<?php echo e($text); ?>">Recipient Country</h6>
                            <select type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="country" value="<?php echo e($user->country); ?>" required>
                               <option value="<?php echo e($user->country); ?>"><?php echo e($user->country); ?></option>
                               <option value="<?php echo e($user->country); ?>"><?php echo e($user->country); ?></option>
                                <?php echo $__env->make('auth.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </select>
                        </div>
                        
                


                        <div class="form-group col-md-12">
                            <h2 class="text-<?php echo e($text); ?> ">Sender Information:</h2>
                            
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Sender Full Name</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="sname" value="<?php echo e($user->sname); ?>" placeholder="Sender Full Name">
                        </div>

                        
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Sender Email</h6>
                            <input type="email" class="form-control bg-<?php echo e($bg); ?>  text-<?php echo e($text); ?>" placeholder="Sender email" value="<?php echo e($user->semail); ?>" name="semail" required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>"> Sender Phone Number</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"  name="sphone"  value="<?php echo e($user->sphone); ?>" placeholder="Sender Phone Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Sender Contact Address</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"
                                name="saddress" placeholder="Sender Address"  value="<?php echo e($user->saddress); ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <h6 class="text-<?php echo e($text); ?>">Sender Country</h6>
                            <select type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"  value="<?php echo e($user->scountry); ?>"name="scountry" required>
                                <option value="<?php echo e($user->scountry); ?>"><?php echo e($user->scountry); ?></option>
                                <?php echo $__env->make('auth.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </select>
                        </div>
                        

                        
        


                        <div class="form-group col-md-12">
                            <h2 class="text-<?php echo e($text); ?> ">Shipping Information:</h2>
                            
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Take of Point</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"   value="<?php echo e($user->take_off_point); ?>"   name="take_off_point"   placeholder="Take of Point">
                        </div>


                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Final Destination</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="final_destination"  value="<?php echo e($user->final_destination); ?>"  placeholder="Final Destination">
                        </div>

                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Freight Type</h6>
                            <select type="text" class="form-control  bg-<?php echo e($bg); ?>  text-<?php echo e($text); ?>"
                                name="freight_type"  required>
                                <option  value="<?php echo e($user->freight_type); ?>"><?php echo e($user->freight_type); ?></option>
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
                                <option  value="<?php echo e($user->shipment_type); ?>"><?php echo e($user->shipment_type); ?></option>
                                <option value="Parcel">Parcel</option>
                                <option value="Box">Box</option>
                                <option value="Document">Document</option>
                                <option value="Container">Container</option> 
                               
                        </select>
                        </div>

                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Weight (eg 2kg)</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?>   text-<?php echo e($text); ?>"  value="<?php echo e($user->weight); ?>"placeholder="Weight" name="weight" required>
                        </div>

                        <div class="form-group col-md-6">
                            <h6 class=" text-<?php echo e($text); ?>">Shippment status</h6>
                            <select type="text" class="form-control bg-<?php echo e($bg); ?>   text-<?php echo e($text); ?>"
                                name="status"  required>
                                <option  value="<?php echo e($user->status); ?>"><?php echo e($user->status); ?></option>
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
                            
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>  input-lg"  id="inputlg" name="description"   value="<?php echo e($user->description); ?>" placeholder="Sender Phone Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Date Shipped</h6>
                            <input type="datetime-local" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="date_shipped"  value="<?php echo e($user->date_shipped); ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Expected Delivery Date</h6>
                            <input type="datetime-local" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="expected_delivery" value="<?php echo e($user->expected_delivery); ?>" required>
                        </div>
                        


                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Tracking Number</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="trackingnumber" value='<?php echo e($user->trackingnumber); ?>' required>
                        </div>
                        

                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?>">Upload Profile photo</h6>
                            <input type="file" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="photo"  >
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?> text-danger">Shipment Current Location Address </h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" value='<?php echo e($user->addresslocation); ?>' name="addresslocation" placeholder="Shipment Current Location" required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?> text-danger">Shipment Current Location (This is the location that shows on the Map)</h6>
                            <input type="text" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="location"  value="<?php echo e($user->location); ?>" placeholder="Shipment Current City" required>
                        </div>
                        

                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?> text-danger">Shipment Cost</h6>
                            <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="cost"  value="<?php echo e($user->cost); ?>" placeholder="Enter Shipping Cost Amount" >
                        </div>

                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?> text-danger"> Clearance Cost</h6>
                            <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="clearance_cost"  value="<?php echo e($user->clearance_cost); ?>" placeholder="Enter Clearance Cost " >
                        </div>

                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?> text-danger"> QTY</h6>
                            <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="qty"  value="<?php echo e($user->qty); ?>" placeholder="Enter Shipping QTY" >
                        </div>

                        <div class="form-group col-md-6">
                            <h6 class="text-<?php echo e($text); ?> text-danger">Delivery Percentage Completed</h6>
                            <input type="number" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="percentage_complete"  value="<?php echo e($user->percentage_complete); ?>" placeholder="Delivery Percentage Completed" >
                        </div>
                        </div>
                        
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                        
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Update Shipping</button>
                        </div>
                </form> 
             </div>
             <script>
                 $('#input1').on('keypress', function(e) {
                     return e.which !== 32;
                 });
             </script>
         </div>
     </div>
 </div>
 <!-- /Edit user Modal -->

 <!-- Reset user password Modal -->
 <div id="resetpswdModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Reset Password</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">Are you sure you want to reset password for <?php echo e($user->name); ?> to <span
                         class="text-primary font-weight-bolder">user01236</span></p>
                 <a class="btn " href="<?php echo e(url('admin/dashboard/resetpswd')); ?>/<?php echo e($user->id); ?>">Reset Now</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Reset user password Modal -->

 <!-- Switch useraccount Modal -->
 <div id="switchuserModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">You are about to login as <?php echo e($user->name); ?>.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <a class="btn btn-success"
                     href="<?php echo e(url('admin/dashboard/switchuser')); ?>/<?php echo e($user->id); ?>">Proceed</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Switch user account Modal -->

 <!-- Clear account Modal -->
 <div id="clearacctModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Clear Account</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">You are clearing account for <?php echo e($user->name); ?> to <?php echo e($settings->currency); ?>0.00
                 </p>
                 <a class="btn " href="<?php echo e(url('admin/dashboard/clearacct')); ?>/<?php echo e($user->id); ?>">Proceed</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Clear account Modal -->

 <!-- Delete user Modal -->
 <div id="deleteModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">

                 <h4 class="modal-title ">Delete User</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body  p-3">
                 <p class="">Are you sure you want to delete <?php echo e($user->name); ?> Account? Everything associated
                     with this account will be loss.</p>
                 <a class="btn btn-danger" href="<?php echo e(url('admin/dashboard/delsystemuser')); ?>/<?php echo e($user->id); ?>">Yes
                     i'm sure</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Delete user Modal -->
<?php /**PATH /home/remedycodes/public_html/tracking.remedycodes.store/resources/views/admin/Users/users_actions.blade.php ENDPATH**/ ?>