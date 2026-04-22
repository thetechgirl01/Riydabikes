@extends('layouts.invoice')

@section('title', $settings->site_title)


@inject('content', 'App\Http\Controllers\FrontController')
@section('content')
   
  <body  style="background-color:teal;"  onload="window.print();">
      
      
	
	
    <div class="wrapper" id="background"> <p id="bg-text">Certified True Copy</p>

      <!-- Main content -->
      <section class="invoice" >
        <!-- title row -->
        <div class="row"  >
          <div class="col-xs-12">
            <h2 class="page-header">
			  <span><img src="{{ asset('storage/app/public/'.$settings->logo)}}"  height="45" width='130' > 
			  
			  <img class="pull-right"  src="{{ asset('temp/custom/banner.png') }}" alt=""  height="185"/> 
			  
			  <h3 style="color:red;"><strong> Tracking Number: {{$user->trackingnumber}}</strong>
			  </h3></span>
			  
            </h2>
          </div><!-- /.col -->
        </div>
        
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
			   <center> 
			       <strong style="color:green;">{{$settings->site_name}} Logistics Company<br>
Address: Canada, USA, UK, Asia and Europe<br>
Email: {{$settings->contact_email}}<br>
Company Website:{{$settings->site_address}}</strong></center>
            </h2>
          </div><!-- /.col -->
        </div>
        
        
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <strong style="color:blue;">FROM (SENDER)</strong>
            <address>
              <h3><strong style="color:green;">{{$user->sname}}</strong></h3>

              <b>Address:</b> {{$user->saddress}}<br/>
			  <b>Origin Office:</b> {{ $user->take_off_point }}            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <strong style="color:blue;">TO (CONSIGNEE)</strong>
            <address>
              <h3><strong style="color:green;">{{$user->name}}</strong></h3>
              
              <b>Phone:</b> {{$user->phone}}<br/>
			  <b>Address:</b> {{$user->address}}<br/>
              <b>Destination Office:</b> {{ $user->final_destination }}           </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
		  <table>
                                        	<tr>
                                                <td>
                                                    <center>
                                                      <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $user->trackingnumber }}&code=Code128" alt="{{ $user->trackingnumber }}"><br>
                                                        {{-- <strong>{{$user->trackingnumber}}</strong><br> --}}
                                                    </center>
                                                </td>
                                                
                                            </tr>
                                        </table>
			<br/>
            <b>Order ID:</b>&nbsp;&nbsp;{{ $user->id }} <br/>
			<b>Booking Mode:</b> <small class="label label-danger"><i class="fa fa-money"></i>&nbsp;&nbsp;ToPay</small><br/> 
		<b>Shipment  Cost:</b>&nbsp;{{ $settings->s_currency }}&nbsp;{{ $user->cost }}<br/>
    <b>Tracking Number:</b>&nbsp;&nbsp;{{ $user->trackingnumber }} <br/>    
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
                  <td>{{$user->qty }}</td>
                  <td>Parcel</td>
                  <td><small class="label label-success">{{ $user->status }} </small></td>
                  <td>{{ $user->description }} </td>
				  <td>{{ $settings->s_currency }}&nbsp;{{ $user->cost }} </td>
				  <td>{{ $settings->s_currency }}&nbsp;{{ $user->clearance_cost }}</td>
                  <td>{{ $settings->s_currency }}&nbsp;{{ $user->clearance_cost+$user->cost }}</td>
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
            <img src="{{ asset('temp/securepayment.png') }}" alt="Methods payments" /> 
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              For your convenience we have {{ $settings->site_name }} several payment reliable, fast, secure.
            </p>
         
          </div>
          
          <div class="col-xs-4">
            <p class="lead"><strong>Official Stamp/{{ \Carbon\Carbon::parse($user->created_at)->toDayDateTimeString() }}</strong></p>
            <img src=" {{ asset('temp/stamp1.png') }}" alt="" height="100" />           
             
          </div>
          <div class="col-xs-4">
            <p class="lead">Stamp Duty:</p>
            <img  class='text-center' src="{{ asset('temp/stamp2.png') }}" alt=""  height="100"/>           
             
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
                  <td>{{ $settings->s_currency }}&nbsp;{{ $user->cost }}</td>
                  <td>{{ $settings->s_currency }}&nbsp;{{ $user->clearance_cost }}</td>
                  <td>{{ $settings->s_currency }}&nbsp;{{ $user->clearance_cost+$user->cost }}</td>
                </tr>
                
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    @endsection